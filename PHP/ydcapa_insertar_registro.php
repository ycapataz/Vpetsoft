<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("../conexion.php");

    try {
        $pdo = new PDO("mysql:host=127.0.0.1:3308;dbname=vpetsoft", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }

    // Recopila los datos del formulario
    $frecuencia = $_POST["Frecuencia"];
    $temperatura = $_POST["Temperatura"];
    $empleado = $_POST["Empleado"];
    $mascota = $_POST["Mascota"];
    $enfermedad = $_POST["enfermedad"];
    $observacion = $_POST["nota"];

    // Consulta de inserción
    $query = "INSERT INTO registro_clinico (frecardiaca, temperatura, idingreso, idempleado, idexamenmedico) VALUES (:frecuencia, :temperatura, :idingreso, :idempleado, :idexamenmedico)";

    // Preparar y ejecutar la consulta
    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':frecuencia', $frecuencia);
        $stmt->bindParam(':temperatura', $temperatura);
        $stmt->bindParam(':empleado', $empleado);
        $stmt->bindParam(':mascota', $mascota);
        $stmt->bindParam(':enfermedad', $enfermedad);
        $stmt->bindParam(':observacion', $observacion);
        $stmt->execute();
        echo "Registro exitoso";
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }

    // Cerrar la conexión
    $pdo = null;
} else {
    echo "Acceso no autorizado";
}
?>
