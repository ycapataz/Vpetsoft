<?php
require_once("../conexion.php");
require_once("../PHP/avg_Formulario_cliente.php");
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $nomcliente = $_POST["nombreCliente"];
    $apeclientes = $_POST["apellidosCliente"];
    $cedula = $_POST["Cedula"];
    $ciudad = $_POST["ciudad"];
    $celular = $_POST["Celular"];
    $email = $_POST["Email"];
    $direccion = $_POST["Direccion"];
 



    // Realiza la inserción en la base de datos utilizando PDO
    try {
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "INSERT INTO cliente (idcliente, nomcliente, apecliente, ceducliente, idciudad, telcliente, corcliente, dircliente) VALUES (null, :nomcliente, :apecliente, :cedula, :ciudad, :celular, :email, :direccion);";
        $stmt = $conexion->prepare($query);

        // Bind de los valores
        $stmt->bindParam(":nomcliente", $nomcliente, PDO::PARAM_STR);
        $stmt->bindParam(":apecliente", $apeclientes, PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $cedula, PDO::PARAM_INT);
        $stmt->bindParam(":ciudad", $ciudad, PDO::PARAM_INT);
        $stmt->bindParam(":celular", $celular, PDO::PARAM_INT);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);

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
