<?php
require_once("../conexion.php");

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $idproducto = $_POST['idproducto'];
    $nomproducto = $_POST["nombre_producto"];
    $fechaven = $_POST["fecha_ven"];
    $cant = $_POST["cant"];
    $idproveedor = $_POST["proveedor"];
    $idcategoria = $_POST["categoria"];
    $idestado = $_POST["estado"];
    $lote = $_POST["lote"];
    try{
        // Realiza la inserción en la base de datos utilizando PDO
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE producto SET nomproducto= :nomproducto, fecvenproducto= :fechaven,cantproducto=:cant,loteproducto=:lote,idproveedor=:idproveedor,idcategoria=:idcategoria,idestado=:idestado WHERE idproducto=:idproducto";
        $stmt = $conexion->prepare($sql);

        // Bind de los valores
        $stmt->bindParam(":idproducto", $idproducto, PDO::PARAM_INT);
        $stmt->bindParam(":nomproducto", $nomproducto, PDO::PARAM_STR);
        $stmt->bindParam(":fechaven", $fechaven, PDO::PARAM_STR);
        $stmt->bindParam(":cant", $cant, PDO::PARAM_INT);
        $stmt->bindParam(":idproveedor", $idproveedor, PDO::PARAM_INT);
        $stmt->bindParam(":idcategoria", $idcategoria, PDO::PARAM_INT);
        $stmt->bindParam(":idestado", $idestado, PDO::PARAM_INT);
        $stmt->bindParam(":lote", $lote, PDO::PARAM_INT);
        // Ejecuta la consulta
        $stmt->execute();
        echo '<script> 
        alert("Producto editado exitosamente");
        window.location.href = "../PHP/juand_consultar_productos.php";
        </script>';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // El formulario no se ha enviado
    echo "El formulario no se ha enviado correctamente.";
}
?>

