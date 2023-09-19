<?php
require('../vendor/autoload.php');
require('../conexion.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$sql = 'SELECT 
    registroclinico.idregistroclinico, frecardiaca, temperatura, nomempleado,
    nommascota, fechregistroclinico, mascota_has_registroclinico.observaciones
    FROM registroclinico
    JOIN mascota_has_registroclinico ON registroclinico.idregistroclinico = mascota_has_registroclinico.idregistroclinico
    JOIN empleado ON empleado.idempleado = registroclinico.idempleado
    JOIN mascota ON mascota_has_registroclinico.idmascota = mascota.idmascota
    ORDER BY registroclinico.idregistroclinico;';

$stmt = $conexion->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Registro Clinico");

// Encabezados
$hojaActiva->setCellValue('A1', 'ID');
$hojaActiva->setCellValue('B1', 'Frecuencia Cardiaca');
$hojaActiva->setCellValue('C1', 'Temperatura');
$hojaActiva->setCellValue('D1', 'Empleado');
$hojaActiva->setCellValue('E1', 'Mascota');
$hojaActiva->setCellValue('F1', 'Fecha');
$hojaActiva->setCellValue('G1', 'Observaciones');

// Llenar datos
$row = 2;
foreach ($resultados as $registro) {
    $hojaActiva->setCellValue('A' . $row, $registro['idregistroclinico']);
    $hojaActiva->setCellValue('B' . $row, $registro['frecardiaca']);
    $hojaActiva->setCellValue('C' . $row, $registro['temperatura']);
    $hojaActiva->setCellValue('D' . $row, $registro['nomempleado']);
    $hojaActiva->setCellValue('E' . $row, $registro['nommascota']);
    $hojaActiva->setCellValue('F' . $row, $registro['fechregistroclinico']);
    $hojaActiva->setCellValue('G' . $row, $registro['observaciones']);
    $row++;
}

// Habilitar filtros
$hojaActiva->setAutoFilter('A1:G' . ($row - 1));

// Guardar el archivo
$writer = new Xlsx($excel);
$writer->save('registro_clinico.xlsx');

// Descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="registro_clinico.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
