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
    <title>Consultar productos</title>
    <link rel="shortcut icon" href="../Imegenes/logo1.png">
    <link rel="stylesheet" href="../CSS/juandencabezado.css">
    <link rel="stylesheet" href="../CSS/juand_tablas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
        <nav id="nav_consultar_producto">
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
            <h1>Productos</h1>
            <div class="input-group">
                <input type="search" id="busqueda" placeholder="Buscar producto">
                <img src="../Imegenes/search-icon.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table id="miTabla">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>vencimiento</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                        <th>Lote</th>
                        <th>Categoria</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            require("../conexion.php");

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT idproducto,nomproducto,fecvenproducto,cantproducto,nomestado,loteproducto,nomcategoria, nomproveedor FROM producto JOIN estado ON producto.idestado=estado.idestado JOIN categoria ON producto.idcategoria=categoria.idcategoria JOIN proveedor ON producto.idproveedor=proveedor.idproveedor ORDER BY idproducto;";
                $stmt = $conexion->prepare($query);
                $stmt->execute();

                while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idproducto = $resultado['idproducto'];
                    $nomproducto = $resultado['nomproducto'];
                    $fecvenproducto = $resultado['fecvenproducto'];
                    $cantproducto = $resultado['cantproducto'];
                    $nomestado = $resultado['nomestado'];
                    $loteproducto = $resultado['loteproducto'];
                    $nomcategoria = $resultado['nomcategoria'];
                    $nomproveedor = $resultado['nomproveedor'];
                    ?>
                    <tr>
                        <td><?php echo $idproducto?></td>
                        <td><?php echo $nomproducto?></td>
                        <td><?php echo $fecvenproducto?></td>
                        <td><?php echo $cantproducto?></td>
                        <td><?php echo $nomestado?></td>
                        <td><?php echo $loteproducto?></td>
                        <td><?php echo $nomcategoria?></td>
                        <td><?php echo $nomproveedor?></td>
                        <td>
                        <button style='width: 95%; background-color: #1d71b8;text-decoration: none;border-radius: 25%;border: #fff;'><a style='width: 2px' href="../PHP/editarProducto.php?Id=<?php echo $resultado['idproducto']?>"><i class='fas fa-edit' style='color: white;'></i></a></button>
                        <button style='width: 95%; background-color: #f72b2b; text-decoration: none; border-radius: 25%; border: #fff;'><a style='width: 2px' href="../PHP/eliminarProducto.php?Id=<?php echo $resultado['idproducto']?> " onclick="return confirm('¿ESTA SEGURO QUE QUIERE ELIMINAR ESTE PRODUCTO?'); false"><i class='fas fa-trash-alt' style='color: white;'></i></a></button><br>
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