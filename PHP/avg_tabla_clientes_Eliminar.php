<?php
require_once("../conexion.php");

try { 

$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM cliente where idcliente=".$_GET['Id'];

$stmt = $conexion->prepare($query);
// Ejecuta la consulta
$stmt->execute();
header("location:../PHP/avg_tabla_clientes.php");
} catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

?>