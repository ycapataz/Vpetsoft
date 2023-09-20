<?php
session_start();
include '../conexion.php';

$nombre = $_SESSION['nombre'];
if (!isset($nombre)){
    header("location: ../HTML/iniciosesion.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar proveedores</title>
    <link rel="shortcut icon" href="../Imegenes/logo1.png">
    <link rel="stylesheet" href="../CSS/juandencabezado.css">
    <link rel="stylesheet" href="../CSS/juand_tablas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <nav id="consultar_proveedores">
        <ul>
        <li>
                <a href="#" class="logo">
                    <img src="../Imegenes/logo.png" alt="">
                    <span class="nav-item">Inventario</span>
                </a>
            </li>
            <li><a href="../PHP/juand_perfil_inventario.php">
                <i class="fas fa-user"></i>
                <span class="nav-item">Perfil</span>
            </a></li>
            <li><a href="../PHP/juand_crear_producto.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Crear producto</span>
            </a></li>
            <li><a href="../PHP/juan_crear_proveedor.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Crear proveedor</span>
            </a></li>
            <li><a href="../PHP/juand_registro_entrada.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Registrar entrada</span>
            </a></li>
            <li><a href="../PHP/juand_registro_salida.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Registrar salida</span>
            </a></li>
            <li><a href="../PHP/juand_consultar_productos.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Consultar productos</span> 
            </a></li>
            <li><a href="../PHP/juand_consultar_proveedores.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Consultar proveedores</span> 
            </a></li>
            <li><a href="../PHP/juand_consultar_ent_inventario.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Entradas en inventario</span> 
            </a></li>
            <li><a href="../PHP/juand_consultar_sald_inventario.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Salidas en inventario</span> 
            </a></li>
            <li><a href="../PHP/cerrar_sesion.php" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Salir</span> 
            </a></li>
        </ul>
    </nav>
    <div class="main-content">
        <header>
            <h2>
                <label for "">
                    <span class="las la-bars"></span>
                </label>
                Dogsano
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Buscar"/>
            </div>

            <div class="user-wrapper">
                <img src="../Imegenes/almacenista.jpg" width="40px"height="40px" alt="">
                <div>
                    <h4><?php echo $nombre; ?></h4>
                    <small>ALMACENISTA</small>
                </div>
            </div>
        </header>
    </div>
    <main class="table">
        <section class="table__header">
            <h1>Proveedores</h1>
            <div class="input-group">
                <input type="search" id="busqueda" placeholder="Buscar proveedor">
                <img src="../Imegenes/search-icon.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table id="miTabla">
                <thead>
                    <tr>
                        <th>Id proveedor</th>
                        <th>Nombre</th>
                        <th>Representante</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>NIT</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            require("../conexion.php");

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT idproveedor,nomproveedor, repreproveedor,corproveedor, telproveedor, nomciudad, nomestado, nit FROM proveedor JOIN ciudades ON proveedor.idciudad=ciudades.idciudad JOIN estado ON proveedor.idestado=estado.idestado ORDER BY idproveedor;";
                $stmt = $conexion->prepare($query);
                $stmt->execute();

                while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idproveedor = $resultado['idproveedor'];
                    $nomproveedor = $resultado['nomproveedor'];
                    $repreproveedor = $resultado['repreproveedor'];
                    $corproveedor = $resultado['corproveedor'];
                    $telproveedor = $resultado['telproveedor'];
                    $nomciudad = $resultado['nomciudad'];
                    $nomestado = $resultado['nomestado'];
                    $nit = $resultado['nit'];
                    ?>
                    <tr>
                        <td><?php echo $idproveedor?></td>
                        <td><?php echo $nomproveedor?></td>
                        <td><?php echo $repreproveedor?></td>
                        <td><?php echo $corproveedor?></td>
                        <td><?php echo $telproveedor?></td>
                        <td><?php echo $nomciudad?></td>
                        <td><?php echo $nomestado?></td>
                        <td><?php echo $nit?></td>
                        <td>
                        <button style='width: 95%; background-color: #1d71b8;text-decoration: none;border-radius: 25%;border: #fff;'><a style='width: 2px' href="../PHP/editarProveedor.php?Id=<?php echo $resultado['idproveedor']?>"><i class='fas fa-edit' style='color: white;'></i></a></button>
                        <button style='width: 95%; background-color: #f72b2b; text-decoration: none; border-radius: 25%; border: #fff;'><a style='width: 2px' href="../PHP/eliminarProveedor.php?Id=<?php echo $resultado['idproveedor']?> " onclick="return confirm('¿ESTA SEGURO QUE QUIERE ELIMINAR ESTE PROVEEDOR?'); false"><i class='fas fa-trash-alt' style='color: white;'></i></a></button><br>
                        </td>
                    </tr>
                    <?php
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
                </tbody>
            </table>
        </section>
    </main>
    <script>
        document.getElementById('busqueda').addEventListener('input', function() {
            let filtro = this.value.toLowerCase();
            let filas = document.querySelectorAll('#miTabla tbody tr');

            console.log(filas);

            filas.forEach(function(fila) {
                let textoFila = fila.textContent.toLowerCase();
                fila.style.display = textoFila.includes(filtro) ? '' : 'none';
            });
        });
    </script>
</body>
</html>