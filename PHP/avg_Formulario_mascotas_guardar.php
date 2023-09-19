<?php
require_once("../conexion.php");
require_once("../PHP/avg_tabla_mascotas.php");
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $numCedula = $_POST["Cedula"];
    $nomPropietario = $_POST["Nombre_pro"];
    $nomMascota = $_POST["Nombre_mascota"];
    $color = $_POST["Color"];
    $fechaNacimiento = $_POST["Fecha_Nacimiento"];
    $genero = $_POST["genero"];
    $numChip = $_POST["Chip"];
    $raza = $_POST["raza"];
    $especie = $_POST["especie"];



    // Realiza la inserción en la base de datos utilizando PDO
    try {
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "INSERT INTO proveedor (idproveedor, nomproveedor, repreproveedor, corproveedor, telproveedor, idciudad, idestado, nit) VALUES (null, :nomproveedor, :representante, :correo, :telefono, :ciudad, :estado, :nit);";
        $stmt = $conexion->prepare($query);

        // Bind de los valores
        $stmt->bindParam(":numCedula", $numCedula, PDO::PARAM_STR);
        $stmt->bindParam(":nomPropietario", $nomPropietario, PDO::PARAM_STR);
        $stmt->bindParam(":nomMascota", $nomMascota, PDO::PARAM_STR);
        $stmt->bindParam(":color", $color, PDO::PARAM_INT);
        $stmt->bindParam(":fechaNacimiento", $fechaNacimiento, PDO::PARAM_INT);
        $stmt->bindParam(":genero", $genero, PDO::PARAM_INT);
        $stmt->bindParam(":numChip", $numChip, PDO::PARAM_INT);
        $stmt->bindParam(":raza", $raza, PDO::PARAM_INT);
        $stmt->bindParam(":especie", $especie, PDO::PARAM_INT);

        // Ejecuta la consulta
        $stmt->execute();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // El formulario no se ha enviado
    echo "El formulario no se ha enviado correctamente.";
}
?> SELECT nommascota, colmascota, fecnacmascota, nomraza, nomespecie, num_microchipmascota, nomgenmascota, nomcliente,ceducliente FROM mascota JOIN genmascota ON mascota.idgenmascota = genmascota.idgenmascota JOIN raza ON mascota.idraza=raza.idraza JOIN especie ON mascota.idespecie=especie.idespecie JOIN cliente ON mascota.idcliente=cliente.idcliente;
