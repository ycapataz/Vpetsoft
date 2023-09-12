<?php
// Datos de conexión a la base de datos
$host = "127.0.0.1"; // Cambia esto si tu base de datos no está en localhost
$dbname = "vpetsoft";
$usuario = "root";
$contrasena = "";

try {
    // Crear una conexión PDO
    $conexion = new PDO("mysql:host={$host};dbname={$dbname}", $usuario, $contrasena);

    // Establecer el modo de error de PDO a excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ahora puedes utilizar $conexion para ejecutar consultas SQL
    //echo "La conexión a la base de datos se ha establecido correctamente.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
