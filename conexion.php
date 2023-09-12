<?php
// Datos de conexión a la base de datos
$host = "127.0.0.1";
$dbname = "vpetsoft";
$usuario = "root";
$contrasena = "";

try {
    // Se crea una conexión PDO
    $conexion = new PDO("mysql:host={$host};dbname={$dbname}", $usuario, $contrasena);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //echo "La conexión a la base de datos se ha establecido correctamente.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
