<?php
require 'vendor/autoload.php';

// Koneksi Database (Sesuaikan dengan config Anda)
$koneksi = mysqli_connect("localhost", "root", "", "guest_book");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// 1. Tangkap Input
$periode = $_POST['periode'];
$format  = $_POST['format'];
$whereClause = "WHERE v.status = 'Done'"; // Default hanya status Done
$judulPeriode = "";

// 2. Logic Filter Tanggal
if ($periode == 'minggu_ini') {
    $whereClause .= " AND YEARWEEK(v.visit_date, 1) = YEARWEEK(CURDATE(), 1)";
    $judulPeriode = "Mingguan";
} elseif ($periode == 'bulan_ini') {
    $whereClause .= " AND MONTH(v.visit_date) = MONTH(CURDATE()) AND YEAR(v.visit_date) = YEAR(CURDATE())";
    $judulPeriode = "Bulanan";
} elseif ($periode == 'tahun_ini') {
    $whereClause .= " AND YEAR(v.visit_date) = YEAR(CURDATE())";
    $judulPeriode = "Tahunan";
} elseif ($periode == 'custom') {
    $start = $_POST['start_date'];
    $end   = $_POST['end_date'];
    $whereClause .= " AND v.visit_date BETWEEN '$start' AND '$end'";
    $judulPeriode = "$start s/d $end";
}

// 3. Query Data dengan JOIN (Staf & Unit)
// Menambahkan v.visit_desc ke dalam SELECT
$query = "SELECT 
            v.visit_date, 
            v.guest_name, 
            v.company_name, 
            v.visit_regards, 
            v.visit_desc,
            v.time_in, 
            v.time_out, 
            s.staf_name, 
            u.unit_name
          FROM visit_data v
          LEFT JOIN staf s ON v.id_staf = s.id_staf
          LEFT JOIN unit u ON v.id_unit = u.id_unit
          $whereClause
          ORDER BY v.visit_date DESC";

$result = mysqli_query($koneksi, $query);
$dataKunjungan = [];
while ($row = mysqli_fetch_assoc($result)) {
    $dataKunjungan[] = $row;
}

// ==========================================
// PROSES EXPORT EXCEL
// ==========================================
if ($format == 'excel') {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set Header Judul (Merge sampai kolom I karena ada tambahan kolom)
    $sheet->setCellValue('A1', 'DATA KUNJUNGAN (DONE)');
    $sheet->setCellValue('A2', 'Periode: ' . $judulPeriode);
    $sheet->mergeCells('A1:I1');
    $sheet->mergeCells('A2:I2');

    // Header Tabel
    // Tambahkan 'Deskripsi' ke array headers
    $headers = ['No', 'Tanggal', 'Nama Tamu', 'Instansi', 'Keperluan', 'Deskripsi', 'Bertemu', 'Unit', 'Jam Masuk/Keluar'];
    $col = 'A';
    foreach ($headers as $header) {
        $sheet->setCellValue($col . '4', $header);
        $sheet->getColumnDimension($col)->setAutoSize(true);
        $col++;
    }

    // Isi Data
    $rowNum = 5;
    $no = 1;
    foreach ($dataKunjungan as $row) {
        $sheet->setCellValue('A' . $rowNum, $no++);
        $sheet->setCellValue('B' . $rowNum, date('d-m-Y', strtotime($row['visit_date'])));
        $sheet->setCellValue('C' . $rowNum, $row['guest_name']);
        $sheet->setCellValue('D' . $rowNum, $row['company_name']);
        $sheet->setCellValue('E' . $rowNum, $row['visit_regards']);
        $sheet->setCellValue('F' . $rowNum, $row['visit_desc']); // Kolom Baru
        $sheet->setCellValue('G' . $rowNum, $row['staf_name'] ?? '-');
        $sheet->setCellValue('H' . $rowNum, $row['unit_name'] ?? '-');
        $sheet->setCellValue('I' . $rowNum, $row['time_in'] . ' - ' . $row['time_out']);
        $rowNum++;
    }

    // Styling Border (Update range sampai kolom I)
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
            ],
        ],
    ];
    // Apply style sampai kolom I
    $sheet->getStyle('A4:I' . ($rowNum - 1))->applyFromArray($styleArray);

    // Output Headers untuk Download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan_Kunjungan_' . time() . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}

// ==========================================
// PROSES EXPORT PDF
// ==========================================
elseif ($format == 'pdf') {
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetCreator('Sistem Kunjungan');
    $pdf->SetAuthor('Admin');
    $pdf->SetTitle('Laporan Kunjungan');

    // Set Margin
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->AddPage();

    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'LAPORAN DATA KUNJUNGAN', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 10, 'Periode: ' . $judulPeriode, 0, 1, 'C');
    $pdf->Ln(5);

    // Buat Tabel HTML
    // Lebar kolom (%) disesuaikan agar muat dengan tambahan kolom Deskripsi
    $html = '<table border="1" cellpadding="5" cellspacing="0">
    <tr style="background-color:#cccccc; font-weight:bold; text-align:center;">
        <th width="5%">No</th>
        <th width="10%">Tanggal</th>
        <th width="15%">Nama Tamu</th>
        <th width="12%">Instansi</th>
        <th width="13%">Keperluan</th>
        <th width="15%">Deskripsi</th>
        <th width="12%">Bertemu</th>
        <th width="8%">Unit</th>
        <th width="10%">Waktu</th>
    </tr>';

    $no = 1;
    foreach ($dataKunjungan as $row) {
        $staf = $row['staf_name'] ?? '-';
        $unit = $row['unit_name'] ?? '-';
        $tgl  = date('d-m-Y', strtotime($row['visit_date']));
        $desc = $row['visit_desc'] ?? '-';

        $html .= '<tr>
            <td align="center">' . $no++ . '</td>
            <td>' . $tgl . '</td>
            <td>' . $row['guest_name'] . '</td>
            <td>' . $row['company_name'] . '</td>
            <td>' . $row['visit_regards'] . '</td>
            <td>' . $desc . '</td>
            <td>' . $staf . '</td>
            <td>' . $unit . '</td>
            <td align="center">' . $row['time_in'] . '<br>' . $row['time_out'] . '</td>
        </tr>';
    }
    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF
    $pdf->Output('Laporan_Kunjungan_' . time() . '.pdf', 'D');
    exit;
}
