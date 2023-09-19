<?php
require_once("../conexion.php");

try { 

$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM producto where idproducto=".$_GET['Id'];

$stmt = $conexion->prepare($query);
// Ejecuta la consulta
$stmt->execute();
header("location:../PHP/juand_consultar_productos.php");
} catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>