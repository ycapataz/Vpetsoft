<?php
require_once("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idregistroclinico = $_POST['idregistroclinico']; // Asegúrate de obtener el id del registro clínico a editar
    $frecuencia = $_POST['Frecuencia'];
    $temperatura = $_POST['Temperatura'];
    $empleado = $_POST['empleado'];
    $mascota = $_POST['Mascota'];
    $enfermedad = $_POST['enfermedad'];
    $observacion = $_POST['nota'];

    try {
        // Actualizar registroclinico
        $query_registroclinico = "UPDATE registroclinico 
                                  SET frecardiaca = '$frecuencia', 
                                      temperatura = '$temperatura', 
                                      idempleado = '$empleado' 
                                  WHERE idregistroclinico = '$idregistroclinico'";
        $stmt_registroclinico = $conexion->prepare($query_registroclinico);
        $stmt_registroclinico->execute();

        // Actualizar mascota_has_registroclinico
        $query_mascota_registroclinico = "UPDATE mascota_has_registroclinico 
                                         SET idmascota = '$mascota', 
                                             observaciones = '$observacion', 
                                             idenfermedad = '$enfermedad' 
                                         WHERE idregistroclinico = '$idregistroclinico'";
        $stmt_mascota_registroclinico = $conexion->prepare($query_mascota_registroclinico);
        $stmt_mascota_registroclinico->execute();

        echo '<script>
                    alert("Registro clínico editado exitosamente.");
                    window.location.href = "../PHP/ydcapa_historia_clicnico.php";
                </script>';

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // El formulario no se ha enviado
    echo '<script>
            alert("El formulario no se ha enviado correctamente.");
            window.history.back(); // Volver a la página anterior
          </script>';
}
?>