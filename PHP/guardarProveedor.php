<?php
require_once("../conexion.php");
require_once("../PHP/juan_crear_proveedor.php");
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $nomproveedor = $_POST["nombre_proveedor"];
    $representante = $_POST["representante"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $ciudad = $_POST["ciudad"];
    $idestado = $_POST["estado"];
    $nit = $_POST["nit"];



    // Realiza la inserción en la base de datos utilizando PDO
    try {
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "INSERT INTO proveedor (idproveedor, nomproveedor, repreproveedor, corproveedor, telproveedor, idciudad, idestado, nit) VALUES (null, :nomproveedor, :representante, :correo, :telefono, :ciudad, :estado, :nit);";
        $stmt = $conexion->prepare($query);

        // Bind de los valores
        $stmt->bindParam(":nomproveedor", $nomproveedor, PDO::PARAM_STR);
        $stmt->bindParam(":representante", $representante, PDO::PARAM_STR);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_INT);
        $stmt->bindParam(":ciudad", $ciudad, PDO::PARAM_INT);
        $stmt->bindParam(":estado", $idestado, PDO::PARAM_INT);
        $stmt->bindParam(":nit", $nit, PDO::PARAM_INT);


        // Ejecuta la consulta
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // El formulario no se ha enviado
    echo "El formulario no se ha enviado correctamente.";
}
?>
