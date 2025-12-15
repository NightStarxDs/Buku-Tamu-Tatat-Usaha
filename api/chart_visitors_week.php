<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../koneksi.php';
if (!isset($koneksi) || !($koneksi instanceof mysqli)) {
    echo json_encode(['error' => 'Database connection not available']);
    exit;
}

// --- REQUIRE YEAR AND MONTH PARAMETERS ---
if (!isset($_GET['year']) || !isset($_GET['month'])) {
    echo json_encode(['error' => 'Missing required URL parameters: year and month.']);
    exit;
}

// Get required parameters
$year = (int)$_GET['year'];
$month = (int)$_GET['month'];

// Validate month (1-12)
if ($month < 1 || $month > 12) {
    echo json_encode(['error' => 'Month must be between 1 and 12.']);
    exit;
}
// --- END REQUIREMENT CHECK ---

// Initialize counts for Mon..Sun
$counts = array_fill(0, 7, 0);

$sql = "SELECT DAYOFWEEK(visit_date) AS dow, COUNT(*) AS cnt
        FROM visit_data
        WHERE YEAR(visit_date) = ? AND MONTH(visit_date) = ? AND status = 'Done'
        GROUP BY dow";

$stmt = mysqli_prepare($koneksi, $sql);
if (!$stmt) {
    echo json_encode(['error' => mysqli_error($koneksi)]);
    exit;
}

mysqli_stmt_bind_param($stmt, 'ii', $year, $month);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $dow, $cnt);
while (mysqli_stmt_fetch($stmt)) {
    // DAYOFWEEK: 1=Sunday, 2=Monday, ... 7=Saturday
    // Map to index 0=Monday ... 6=Sunday
    if ($dow == 1) {
        $index = 6; // Sunday
    } else {
        $index = $dow - 2; // Monday-Saturday
    }
    $counts[$index] = (int)$cnt;
}
mysqli_stmt_close($stmt);

$labels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

echo json_encode([
    'year' => $year,
    'month' => $month,
    'labels' => $labels,
    'data' => $counts
]);
