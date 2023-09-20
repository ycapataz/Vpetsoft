<?php
require('../vendor/autoload.php');
require('../conexion.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$sql = "SELECT registrosalida.idregistrosalida, nomproducto, fechasalida, cantsalida, cantproducto,nomtiposalida, nomcategoria, nomproveedor FROM registrosalida JOIN producto_has_registrosalida ON registrosalida.idregistrosalida = producto_has_registrosalida.idregistrosalida JOIN producto ON producto_has_registrosalida.idproducto = producto.idproducto JOIN tiposalida ON registrosalida.idtiposalida = tiposalida.idtiposalida JOIN categoria ON producto.idcategoria = categoria.idcategoria JOIN proveedor ON producto.idproveedor =proveedor.idproveedor ORDER BY registrosalida.idregistrosalida;";


$stmt = $conexion->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Salidas_inventario");

// Encabezados
$hojaActiva->setCellValue('A1', 'ID');
$hojaActiva->setCellValue('B1', 'Producto');
$hojaActiva->setCellValue('C1', 'Fecha Salida');
$hojaActiva->setCellValue('D1', 'Cantidad Salida');
$hojaActiva->setCellValue('E1', 'Cantidad Disponible');
$hojaActiva->setCellValue('F1', 'Tipo salida');
$hojaActiva->setCellValue('G1', 'Categoria');
$hojaActiva->setCellValue('H1', 'Proveedor');

// Llenar datos
$row = 2;
foreach ($resultados as $registro) {
    $hojaActiva->setCellValue('A' . $row, $registro['idregistrosalida']);
    $hojaActiva->setCellValue('B' . $row, $registro['nomproducto']);
    $hojaActiva->setCellValue('C' . $row, $registro['fechasalida']);
    $hojaActiva->setCellValue('D' . $row, $registro['cantsalida']);
    $hojaActiva->setCellValue('E' . $row, $registro['cantproducto']);
    $hojaActiva->setCellValue('F' . $row, $registro['nomtiposalida']);
    $hojaActiva->setCellValue('G' . $row, $registro['nomcategoria']);
    $hojaActiva->setCellValue('H' . $row, $registro['nomproveedor']);
    $row++;
}

// Habilitar filtros
$hojaActiva->setAutoFilter('A1:G' . ($row - 1));

// Guardar el archivo
$writer = new Xlsx($excel);
$writer->save('salidas_inventario.xlsx');

// Descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="salidas_inventario.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');