<?php
require('../vendor/autoload.php');
require('../conexion.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$sql = 'SELECT 
        registroclinico.idregistroclinico, frecardiaca, temperatura, nomempleado,
        nommascota,nomcliente, ceducliente, fechregistroclinico, mascota_has_registroclinico.observaciones
        FROM registroclinico
        JOIN mascota_has_registroclinico ON registroclinico.idregistroclinico = mascota_has_registroclinico.idregistroclinico
        JOIN empleado ON empleado.idempleado = registroclinico.idempleado
        JOIN mascota ON mascota_has_registroclinico.idmascota = mascota.idmascota JOIN cliente ON cliente.idcliente = mascota.idcliente
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
$hojaActiva->setCellValue('F1', 'Nombre del cliente');
$hojaActiva->setCellValue('G1', 'Cedula del cliente');
$hojaActiva->setCellValue('H1', 'Fecha');
$hojaActiva->setCellValue('I1', 'Observaciones');

// Llenar datos
$row = 2;
foreach ($resultados as $registro) {
    $hojaActiva->getColumnDimension('A')->setWidth(10);//con este comando se le da espacio a las columna cuando descarga el archivo
    $hojaActiva->setCellValue('A' . $row, $registro['idregistroclinico']);
    $hojaActiva->getColumnDimension('B')->setWidth(10);
    $hojaActiva->setCellValue('B' . $row, $registro['frecardiaca']);
    $hojaActiva->getColumnDimension('C')->setWidth(10);
    $hojaActiva->setCellValue('C' . $row, $registro['temperatura']);
    $hojaActiva->getColumnDimension('D')->setWidth(30);
    $hojaActiva->setCellValue('D' . $row, $registro['nomempleado']);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E' . $row, $registro['nommascota']);
    $hojaActiva->getColumnDimension('F')->setWidth(40);
    $hojaActiva->setCellValue('F' . $row, $registro['nomcliente']);
    $hojaActiva->getColumnDimension('G')->setWidth(25);
    $hojaActiva->setCellValue('G' . $row, $registro['ceducliente']);
    $hojaActiva->getColumnDimension('H')->setWidth(17);
    $hojaActiva->setCellValue('H' . $row, $registro['fechregistroclinico']);
    $hojaActiva->getColumnDimension('I')->setWidth(100);
    $hojaActiva->setCellValue('I' . $row, $registro['observaciones']);
    $row++;
}

// Habilitar filtros
$hojaActiva->setAutoFilter('A1:I' . ($row - 1));

// Guardar el archivo
$writer = new Xlsx($excel);
$writer->save('registro_clinico.xlsx');

// Descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="registro_clinico.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
