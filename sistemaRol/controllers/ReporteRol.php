<?php
require_once __DIR__ . '/../libs/fpdf/fpdf.php';
require_once __DIR__ . '/../models/Rol.php';

$id = $_GET['id'];
if (!$id) die ('No se ha especificado el ID del rol.');
$rolModel = new Rol();
$data = $rolModel->obtenerPorId($id);
if (!$data) die ('No se encontró el rol con el ID especificado.');

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de Rol de Pago', 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 8, "Empleado: {$data['nombre']} {$data['apellido']}", 0, 1);
$pdf->Cell(0, 8, "CI: {$data['ci_empleado']}", 0, 1);
$pdf->Cell(100, 8, "Mes: {$data['mes']}", 0, 1);
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetFillColor(34, 139, 34);
$pdf->Cell(95, 10, "Ingresos:",1,0,'C',true);
$pdf->Cell(95, 10, "Egresos:",1,1,'C',true);
$pdf->SetFont('Arial', '', 12);

// Ingresos y Egresos como arrays asociativos
$ingresos = [
    "Hora 25%"      => $data['hora25'],
    "Hora 50%"      => $data['hora50'],
    "Hora 100%"     => $data['hora100'],
    "Bono"          => $data['bono'],
    "Sueldo"        => $data['sueldo'],
    "Total Ingreso" => $data['total_ingreso']
];
$egresos = [
    "IESS"          => $data['iess'],
    "Multas"        => $data['multas'],
    "Atrasos"       => $data['atrasos'],
    "Alimentación"  => $data['alimentacion'],
    "Anticipos"     => $data['anticipos'],
    "Otros"         => $data['otros'],
    "Total Egreso"  => $data['total_egreso']
];

$maxFilas = max(count($ingresos), count($egresos));
$ingKeys = array_keys($ingresos);
$egreKeys = array_keys($egresos);

for ($i = 0; $i < $maxFilas; $i++) {
    // Ingresos
    if (isset($ingKeys[$i])) {
        $pdf->Cell(47, 8, utf8_decode($ingKeys[$i]), 1);
        $pdf->Cell(48, 8, number_format($ingresos[$ingKeys[$i]],2), 1);
    } else {
        $pdf->Cell(47, 8, '', 1);
        $pdf->Cell(48, 8, '', 1);
    }
    // Egresos
    if (isset($egreKeys[$i])) {
        $pdf->Cell(47, 8, utf8_decode($egreKeys[$i]), 1);
        $pdf->Cell(48, 8, number_format($egresos[$egreKeys[$i]],2), 1);
    } else {
        $pdf->Cell(47, 8, '', 1);
        $pdf->Cell(48, 8, '', 1);
    }
    $pdf->Ln();
}

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(95, 10, "Total a Pagar:",1,0,'C',true);
$pdf->Cell(95, 10, number_format($data['total_pagar'],2),1,1,'C',true);

//pie de página
$pdf->Ln(5);
$pdf->Cell(0, 8, "Fecha de Registro: {$data['fecha_registro']}", 0, 1, 'C');
$pdf->Cell(0,10 , 'Generado el ' . date('d/m/Y'), 0, 1, 'C');
$pdf->Ln(20);
$pdf->Cell(0, 10, 'Firma de RRHH', 0, 1, 'C');
$pdf->Ln(5);    
$pdf->Cell(0, 10, '_________________________', 0, 1, 'C');
$pdf->Ln(20);
$pdf->Cell(0, 10, "Firma de {$data['nombre']} {$data['apellido']}", 0, 1, 'C');
$pdf->Ln(5);
$pdf->Cell(0, 10, '_________________________', 0, 1, 'C');
$pdf->Output(); 
?>