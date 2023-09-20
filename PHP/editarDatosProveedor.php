<?php
require_once("../conexion.php");

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $idproveedor = $_POST['idproveedor'];
    $nomproveedor = $_POST["nombre_proveedor"];
    $repreproveedor = $_POST["representante"];
    $corproveedor = $_POST["correo"];
    $telproveedor = $_POST["telefono"];
    $idciudad = $_POST["ciudad"];
    $idestado = $_POST["estado"];
    $nit = $_POST["nit"];
    try{
        // Realiza la inserción en la base de datos utilizando PDO
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE proveedor SET nomproveedor= :nomproveedor, repreproveedor= :repreproveedor,corproveedor=:corproveedor,telproveedor=:telproveedor,idciudad=:idciudad,idestado=:idestado,nit=:nit WHERE idproveedor=:idproveedor";
        $stmt = $conexion->prepare($sql);

        // Bind de los valores
        $stmt->bindParam(":idproveedor", $idproveedor, PDO::PARAM_INT);
        $stmt->bindParam(":nomproveedor", $nomproveedor, PDO::PARAM_STR);
        $stmt->bindParam(":repreproveedor", $repreproveedor, PDO::PARAM_STR);
        $stmt->bindParam(":corproveedor", $corproveedor, PDO::PARAM_STR);
        $stmt->bindParam(":telproveedor", $telproveedor, PDO::PARAM_INT);
        $stmt->bindParam(":idciudad", $idciudad, PDO::PARAM_INT);
        $stmt->bindParam(":idestado", $idestado, PDO::PARAM_INT);
        $stmt->bindParam(":nit", $nit, PDO::PARAM_INT);
        // Ejecuta la consulta
        $stmt->execute();
        echo '<script> 
        alert("Proveedor editado exitosamente");
        window.location.href = "../PHP/juand_consultar_proveedores.php";
        </script>';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // El formulario no se ha enviado
    echo "El formulario no se ha enviado correctamente.";
}
?>
