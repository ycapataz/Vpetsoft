<?php
require_once("../conexion.php");

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $idcliente = $_POST['idcliente'];
    $nomcliente = $_POST['nomcliente'];
    $apecliente = $_POST['apecliente'];
    $ceducliente = $_POST['ceducliente'];
    $idciudad = $_POST['ciudad'];
    $telcliente = $_POST['telcliente'];
    $corcliente = $_POST['corcliente'];
    $dircliente = $_POST['dircliente'];

    try{
        // Realiza la inserción en la base de datos utilizando PDO
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE cliente SET nomcliente= :nomcliente, apecliente= :apecliente, ceducliente=:ceducliente, idciudad=:idciudad, telcliente=:telcliente, corcliente=:corcliente, dircliente=:dircliente WHERE idcliente=:idcliente";
        $stmt = $conexion->prepare($sql);

        // Bind de los valores
        $stmt->bindParam(":idcliente", $idcliente, PDO::PARAM_INT);
        $stmt->bindParam(":nomcliente", $nomcliente, PDO::PARAM_STR);
        $stmt->bindParam(":apecliente", $apecliente, PDO::PARAM_STR);
        $stmt->bindParam(":ceducliente", $ceducliente, PDO::PARAM_INT);
        $stmt->bindParam(":idciudad", $idciudad, PDO::PARAM_INT);
        $stmt->bindParam(":telcliente", $telcliente, PDO::PARAM_INT);
        $stmt->bindParam(":corcliente", $corcliente, PDO::PARAM_STR);
        $stmt->bindParam(":dircliente", $dircliente, PDO::PARAM_STR);
      
        // Ejecuta la consulta
        $stmt->execute();
        header("location:../PHP/avg_tabla_clientes.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // El formulario no se ha enviado
    echo "El formulario no se ha enviado correctamente.";
}
?>

