<?php
header('Content-Type: application/json; charset=utf-8');

include '../koneksi.php';
if (!isset($koneksi) || !($koneksi instanceof mysqli)) {
    echo json_encode(['error' => 'Database connection not available']);
    exit;
}

$year = isset($_GET['year']) ? (int)$_GET['year'] : (int)date('Y');

// init months 1..12 with zero
$counts = array_fill(1, 12, 0);

$sql = "SELECT MONTH(visit_date) AS mo, COUNT(*) AS cnt
        FROM visit_data
        WHERE YEAR(visit_date) = ? AND `status` = 'Done'
        GROUP BY mo";
$stmt = mysqli_prepare($koneksi, $sql);
if (!$stmt) {
    echo json_encode(['error' => mysqli_error($koneksi)]);
    exit;
}
mysqli_stmt_bind_param($stmt, 'i', $year);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $mo, $cnt);
while (mysqli_stmt_fetch($stmt)) {
    $counts[(int)$mo] = (int)$cnt;
}
mysqli_stmt_close($stmt);

$labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
$data = [];
for ($m = 1; $m <= 12; $m++) $data[] = $counts[$m];

echo json_encode([
    'year' => $year,
    'labels' => $labels,
    'data' => $data
]);
