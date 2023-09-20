<?php
require_once("../conexion.php");

try { 

$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM proveedor where idproveedor=".$_GET['Id'];

$stmt = $conexion->prepare($query);
// Ejecuta la consulta
$stmt->execute();
header("location:../PHP/juand_consultar_proveedores.php");
} catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>