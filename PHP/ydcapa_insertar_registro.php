<?php
require_once("../conexion.php");
require_once("../PHP/ydcapa_registro_clinico.php");
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $Frecuencia = $_POST["Frecuencia"];
    $Temperatura = $_POST["Temperatura"];
    $Empleado = $_POST["Empleado"];
    $Mascota = $_POST["Mascota"];
    $enfermedad = $_POST["enfermedad"];
    $nota = $_POST["nota"];



    // Realiza la inserción en la base de datos utilizando PDO
    try {
        // Crear una conexión PDO
        $pdo = new PDO("mysql:host=127.0.0.1:3308;dbname=tu_basededatos", "tu_usuario", "tu_contraseña");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Consulta: Insertar un registro sin especificar idregistroclinico
        $query = "INSERT INTO registroclinico (frecardiaca, temperatura, idingreso, idempleado, idexamenmedico) VALUES (:frecardiaca, :temperatura, :idingreso, :idempleado, :idexamenmedico)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":frecardiaca", $frecardiaca);
        $stmt->bindParam(":temperatura", $temperatura);
        $stmt->bindParam(":idingreso", $idingreso);
        $stmt->bindParam(":idempleado", $idempleado);
        $stmt->bindParam(":idexamenmedico", $idexamenmedico);
        $frecardiaca = 122;
        $temperatura = 392;
        $idingreso = 1; // Debes proporcionar un valor para idingreso
        $idempleado = 1; // Debes proporcionar un valor para idempleado
        $idexamenmedico = 1; // Debes proporcionar un valor para idexamenmedico
        $stmt->execute();
    
        // Obtener el último idregistroclinico insertado
        $ultimoIdRegistro = $pdo->lastInsertId();
    
        // Cerrar la conexión PDO
        $pdo = null;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // El formulario no se ha enviado
    echo "El formulario no se ha enviado correctamente.";
}
?>
