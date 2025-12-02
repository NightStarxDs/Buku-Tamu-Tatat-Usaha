<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../koneksi.php';
if (!isset($koneksi) || !($koneksi instanceof mysqli)) {
    echo json_encode(['error' => 'Database connection not available']);
    exit;
}

// --- REQUIRE YEAR AND WEEK PARAMETERS ---
if (!isset($_GET['year']) || !isset($_GET['week'])) {
    echo json_encode(['error' => 'Missing required URL parameters: year and week.']);
    exit;
}

// Get required parameters
$year = (int)$_GET['year'];
$week = (int)$_GET['week'];
// --- END REQUIREMENT CHECK ---


// initialize counts for Mon..Sun
$counts = array_fill(0, 7, 0);

$sql = "SELECT DAYOFWEEK(visit_date) AS dow, COUNT(*) AS cnt
        FROM visit_data
        WHERE YEAR(visit_date) = ? AND WEEK(visit_date, 1) = ? AND status = 'Done'
        GROUP BY dow";

$stmt = mysqli_prepare($koneksi, $sql);
if (!$stmt) {
    echo json_encode(['error' => mysqli_error($koneksi)]);
    exit;
}

mysqli_stmt_bind_param($stmt, 'ii', $year, $week);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $dow, $cnt);
while (mysqli_stmt_fetch($stmt)) {
    // DAYOFWEEK: 1=Sunday,2=Monday,...7=Saturday
    // map to index 0=Monday ... 6=Sunday
    if ($dow == 1) $index = 6;
    else $index = $dow - 2;
    $counts[$index] = (int)$cnt;
}
mysqli_stmt_close($stmt);

$labels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

echo json_encode([
    'year' => $year,
    'week' => $week,
    'labels' => $labels,
    'data' => $counts
]);
