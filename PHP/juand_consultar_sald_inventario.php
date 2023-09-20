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
    <title>Consultar salidas en inventario</title>
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
            <h1>Salidas inventario</h1>
            <div class="input-group">
                <input type="search" id="busqueda" placeholder="Buscar producto">
                <img src="../Imegenes/search-icon.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table id="miTabla">
                <thead>
                    <tr>
                        <th>Id salida</th>
                        <th>Producto</th>
                        <th>Fecha salida</th>
                        <th>Cantidad</th>
                        <th>Tipo salida</th>
                        <th>Categoria</th>
                        <th>Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            require("../conexion.php");

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT registrosalida.idregistrosalida, nomproducto, fechasalida, cantsalida, nomtiposalida, nomcategoria, nomproveedor FROM registrosalida JOIN producto_has_registrosalida ON registrosalida.idregistrosalida = producto_has_registrosalida.idregistrosalida JOIN producto ON producto_has_registrosalida.idproducto = producto.idproducto JOIN tiposalida ON registrosalida.idtiposalida = tiposalida.idtiposalida JOIN categoria ON producto.idcategoria = categoria.idcategoria JOIN proveedor ON producto.idproveedor =proveedor.idproveedor ORDER BY registrosalida.idregistrosalida;";
                $stmt = $conexion->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idregistrosalida = $row['idregistrosalida'];
                    $nomproducto = $row['nomproducto'];
                    $fechasalida = $row['fechasalida'];
                    $cantsalida = $row['cantsalida'];
                    $nomtiposalida = $row['nomtiposalida'];
                    $nomcategoria = $row['nomcategoria'];
                    $nomproveedor = $row['nomproveedor'];
                    // Imprimir los valores en la tabla
                    echo "<tr>";
                    echo "<td>$idregistrosalida</td>";
                    echo "<td>$nomproducto</td>";
                    echo "<td>$fechasalida</td>";
                    echo "<td>$cantsalida</td>";
                    echo "<td>$nomtiposalida</td>";
                    echo "<td>$nomcategoria</td>";
                    echo "<td>$nomproveedor</td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
                </tbody>
            </table>
        </section>
    </main>
    <div class="formulario__grupo formulario__grupo-btn-enviar">
        <br><br><br><br>
		<button style='color: #fff;' type="submit" ><a href="../PHP/reporte_inventario.php" style='width: 250px,'>Generar reporte</a></button>  
    </div>
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