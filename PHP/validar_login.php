<?php
session_start();
require_once("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Consulta preparada para evitar SQL injection
    $stmt = $conexion->prepare("SELECT * FROM empleado WHERE corempleado = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Si las credenciales son correctas

        // Obtener el nombre del empleado
        $_SESSION['email'] = $row['corempleado'];
        $stmt_empleado = $conexion->prepare("SELECT nomempleado, idcargo FROM empleado WHERE corempleado = :email");
        $stmt_empleado->bindParam(':email', $email);
        $stmt_empleado->execute();
        $row_empleado = $stmt_empleado->fetch(PDO::FETCH_ASSOC);
        $_SESSION['nombre'] = $row_empleado['nomempleado']; // Guardar el nombre del empleado en una variable

        // Validar el rol del empleado basado en el idcargo
        $idcargo = $row_empleado['idcargo'];

        // Consultar el cargo
        $stmt_cargo = $conexion->prepare("SELECT nomcargo FROM cargo WHERE idcargo = :idcargo");
        $stmt_cargo->bindParam(':idcargo', $idcargo);
        $stmt_cargo->execute();
        $row_cargo = $stmt_cargo->fetch(PDO::FETCH_ASSOC);

        $_SESSION['nomcargo'] = $row_cargo['nomcargo']; // Guardar el rol en una variable de sesión
        // Redireccionar según el rol
        switch($idcargo) {
            case 1:
                header("Location: ../PHP/ydcapa_perfil_veterinario.php");
                break;
            case 2:
                header("Location: ../HTML/avg_tabla_ingresos.html");
                break;
            case 3:
                header("Location: ../PHP/juand_consultar_sald_inventario.php");
                break;
            default:
                echo "Rol desconocido";
        }
    } else {
        echo "Credenciales incorrectas.";
    }
    //echo "<script>alert('".$_SESSION['nomcargo']."');</script>";
}

?>
