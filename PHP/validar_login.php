<?php
session_start();
require_once("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conexion->prepare("SELECT * FROM empleado WHERE corempleado = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['id_empleado'] = $row['idempleado'];
        $_SESSION['email'] = $row['corempleado'];
        $_SESSION['nombre'] = $row['nomempleado'];
        $_SESSION['apellido'] = $row['apeempleado'];
        $_SESSION['documento'] = $row['cedempleado'];
        $_SESSION['edad'] = $row['edadempleado'];
        $_SESSION['direccion'] = $row['dirempleado'];
        $_SESSION['telefono'] = $row['telempleado'];
        $_SESSION['fecha'] = $row['fecnacempleado'];
        $_SESSION['idcargo'] = $row['idcargo'];
        

        // Obtener el nombre del cargo
        $stmt_cargo = $conexion->prepare("SELECT nomcargo FROM cargo WHERE idcargo = :idcargo");
        $stmt_cargo->bindParam(':idcargo', $row['idcargo']);
        $stmt_cargo->execute();
        $row_cargo = $stmt_cargo->fetch(PDO::FETCH_ASSOC);
        $_SESSION['nomcargo'] = $row_cargo['nomcargo'];

        // Obtener el nombre de la especialidad
        $stmt_especialidad = $conexion->prepare("SELECT nomespecialidad FROM especialidad WHERE idespecialidad = :idespecialidad");
        $stmt_especialidad->bindParam(':idespecialidad', $row['idespecialidad']);
        $stmt_especialidad->execute();
        $row_especialidad = $stmt_especialidad->fetch(PDO::FETCH_ASSOC);
        $_SESSION['nomespecialidad'] = $row_especialidad['nomespecialidad'];

        // Obtener el nombre de la EPS
        $stmt_eps = $conexion->prepare("SELECT nomeps FROM eps WHERE ideps = :ideps");
        $stmt_eps->bindParam(':ideps', $row['ideps']);
        $stmt_eps->execute();
        $row_eps = $stmt_eps->fetch(PDO::FETCH_ASSOC);
        $_SESSION['nomeps'] = $row_eps['nomeps'];

        switch($row['idcargo']) {
            case 1:
                header("Location: ../PHP/ydcapa_perfil_veterinario.php");
                break;
            case 2:
                header("Location: ../PHP/avg_tabla_ingresos.php");
                break;
            case 3:
                header("Location: ../PHP/juand_consultar_sald_inventario.php");
                break;
            default:
                echo "Rol desconocido";
        }
    } else {
        echo '<script>
        alert("Credenciales incorrectas.");
        window.location.href = "../HTML/iniciosesion.html";
        </script>';
    }
}
?>
