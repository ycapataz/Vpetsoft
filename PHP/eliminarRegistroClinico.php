<?php
require_once("../conexion.php");

if(isset($_GET['Id']) && !empty($_GET['Id'])) {
    $id_registroclinico = $_GET['Id'];

    try {
        // Eliminar formulamedica asociada al registroclinico
        $query_formulamedica = "DELETE FROM formulamedica WHERE idregistroclinico = :id_registroclinico";
        $stmt_formulamedica = $conexion->prepare($query_formulamedica);
        $stmt_formulamedica->bindParam(':id_registroclinico', $id_registroclinico, PDO::PARAM_INT);
        $stmt_formulamedica->execute();

        // Eliminar mascota_has_registroclinico asociados al registroclinico
        $query_mascota_registroclinico = "DELETE FROM mascota_has_registroclinico WHERE idregistroclinico = :id_registroclinico";
        $stmt_mascota_registroclinico = $conexion->prepare($query_mascota_registroclinico);
        $stmt_mascota_registroclinico->bindParam(':id_registroclinico', $id_registroclinico, PDO::PARAM_INT);
        $stmt_mascota_registroclinico->execute();

        // Eliminar el registroclinico
        $query_registroclinico = "DELETE FROM registroclinico WHERE idregistroclinico = :id_registroclinico";
        $stmt_registroclinico = $conexion->prepare($query_registroclinico);
        $stmt_registroclinico->bindParam(':id_registroclinico', $id_registroclinico, PDO::PARAM_INT);
        $stmt_registroclinico->execute();

        echo '<script>
                    alert("Registro clínico eliminado exitosamente.");
                    window.location.href = "../PHP/ydcapa_historia_clicnico.php";
                </script>';

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // No se proporcionó un ID válido
    echo '<script>
            alert("No se proporcionó un ID válido.");
            window.history.back(); // Volver a la página anterior
          </script>';
}
?>
