<?php
session_start();
include '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $idempleado = $_SESSION['id_empleado'];

    try {
        $stmt = $conexion->prepare("UPDATE empleado SET corempleado=:corempleado, dirempleado=:dirempleado, telempleado=:telempleado WHERE idempleado=:idempleado");
        $stmt->bindParam(':corempleado', $correo);
        $stmt->bindParam(':dirempleado', $direccion);
        $stmt->bindParam(':telempleado', $telefono);
        $stmt->bindParam(':idempleado', $idempleado);
        $stmt->execute();
        echo '<script>
        alert("Información actualizada correctamente para ver los cambios cierre sesion e ingresar nuevamente.");
        window.location.href = "../PHP/juand_perfil_inventario.php";
        </script>';
        echo "";
    } catch(PDOException $e) {
        echo "Error al actualizar la información: " . $e->getMessage();
    }
}
?>