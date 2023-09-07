<?php

require_once("juand_crear_producto.php");
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $nomproducto = $_POST["nombre_producto"];
    $frecuencia = $_POST["Frecuencia"];
    $temperatura = $_POST["Temperatura"];
    $empleado = $_POST["Empleado"];
    $mascota = $_POST["Mascota"];
    $enfermedad = $_POST["enfermedad"];
    $observacion = $_POST["nota"];


    // Realiza la inserción en la base de datos utilizando PDO
    try {
        $pdo = new PDO("mysql:host=127.0.0.1:3308;dbname=vpetsoft", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "INSERT INTO registro_clinico (id_registro, frecuencia_cardiaca, temperatura, empleado, mascota, enfermedad, observacion) VALUES (:registro, :frecuencia, :temperatura, :empleado, :mascota, :enfermedad, :observacion)";
        $stmt = $pdo->prepare($query);


        // Bind de los valores
        $stmt->bindParam(":registro", $registro, PDO::PARAM_INT);
        $stmt->bindParam(":frecuencia", $frecuencia, PDO::PARAM_INT);
        $stmt->bindParam(":temperatura", $temperatura, PDO::PARAM_STR);
        $stmt->bindParam(":empleado", $empleado, PDO::PARAM_STR);
        $stmt->bindParam(":mascota", $mascota, PDO::PARAM_STR);
        $stmt->bindParam(":enfermedad", $enfermedad, PDO::PARAM_INT);
        $stmt->bindParam(":observacion", $observacion, PDO::PARAM_STR);


        // Ejecuta la consulta
        $stmt->execute();


        // Redirige a una página de éxito o muestra un mensaje de éxito
        header("Location: exito.html");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // El formulario no se ha enviado
    echo "El formulario no se ha enviado correctamente.";
}
?>
