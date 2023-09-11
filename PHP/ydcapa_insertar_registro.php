<?php
require_once("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frecuencia = $_POST['Frecuencia'];
    $temperatura = $_POST['Temperatura'];
    $empleado = $_POST['empleado'];
    $mascota = $_POST['Mascota'];
    $enfermedad = $_POST['enfermedad'];
    $observacion = $_POST['nota'];

    try {
        // Verificar si hay una cita para la mascota y el empleado
        $query_cita = "SELECT idcita FROM cita WHERE idmascota = '$mascota' AND idempleado = '$empleado' order by idcita DESC LIMIT 1";
        $stmt_cita = $conexion->prepare($query_cita);
        $stmt_cita->execute();
        $row_cita = $stmt_cita->fetch(PDO::FETCH_ASSOC);

        if ($row_cita) {
            $idcita = $row_cita['idcita'];

            // Obtener el idingreso correspondiente
            $query_ingreso = "SELECT idingreso FROM ingreso WHERE idcita = '$idcita'";
            $stmt_ingreso = $conexion->prepare($query_ingreso);
            $stmt_ingreso->execute();
            $row_ingreso = $stmt_ingreso->fetch(PDO::FETCH_ASSOC);

            if ($row_ingreso) {
                $idingreso = $row_ingreso['idingreso'];

                // Insertar en registroclinico con idingreso obtenido
                $query_registroclinico = "INSERT INTO registroclinico (frecardiaca, temperatura, idingreso, idempleado, idexamenmedico) 
                                          VALUES ('$frecuencia', '$temperatura', '$idingreso', '$empleado', 1)";
                $stmt_registroclinico = $conexion->prepare($query_registroclinico);
                $stmt_registroclinico->execute();

                    // Obtener el último idregistroclinico insertado
                $idregistroclinico = $conexion->lastInsertId();

                    // Paso 2: Insertar en mascota_has_registroclinico
                $query_mascota_registroclinico = "INSERT INTO mascota_has_registroclinico (idmascota, idregistroclinico, observaciones, fechregistroclinico, idenfermedad) 
                                                    VALUES ('$mascota', '$idregistroclinico', '$observacion', NOW(), '$enfermedad')";
                $stmt_mascota_registroclinico = $conexion->prepare($query_mascota_registroclinico);
                $stmt_mascota_registroclinico->execute();

                // Limpiar campos del formulario
                echo '<script>
                        alert("Registro clínico creado exitosamente");
                        window.location.href = "http://localhost/pagina_con_crud/PHP/ydcapa_registro_clinico.php";
                        document.getElementById("Frecuencia").value = "";
                        document.getElementById("Temperatura").value = "";
                        document.getElementById("empleado").value = "";
                        document.getElementById("Mascota").value = "";
                        document.getElementById("enfermedad").value = "";
                        document.getElementById("nota").value = "";
                      </script>';

            } else {
                echo '<script>
                        alert("No se encontró un ingreso asociado a la cita");
                        window.history.back(); // Volver a la página anterior
                      </script>';
            }
        } else {
            echo '<script>
                    alert("No se encontró una cita para la mascota y el empleado");
                    window.history.back(); // Volver a la página anterior
                  </script>';
        }

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
