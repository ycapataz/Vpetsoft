<!DOCTYPE html>
<html>
    <head>
        <title>Editar producto</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/juandencabezado.css">
        <link rel="stylesheet" href="../CSS/juand_campos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_crear_producto">
        <ul>
        <li>
                <a href="#" class="logo">
                    <img src="../Imegenes/logo.png" alt="">
                    <span class="nav-item">Inventario</span>
                </a>
            </li>
            <li><a href="../HTML/juand_perfil_inventario.html">
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
            <li><a href="../HTML/index.html" class="logout">
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
                    <h4>CARLOS ANDRES HERRERA DIAZ</h4>
                    <small>ALMACENISTA</small>
                </div>
            </div>
        </header>
        <br><br><br><br>
	<main>
        <h1>EDITAR PRODUCTO</h1>
        <br><br><br>
		<form action="../PHP/editarDatosProducto.php" class="formulario" method="POST">
            <?php 
                require_once("../conexion.php");

                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT * FROM producto WHERE idproducto =".$_GET['Id'];
                $stmt = $conexion->prepare($query);
                $stmt->execute();
                $roww = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            
            <div class="formulario__grupo" id="Frecuencia">
				<label for="Frecuencia" class="formulario__label">Id producto</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="idproducto" id="idproducto" readonly value="<?php echo $roww['idproducto'];?>">
				</div>
			</div>
			<div class="formulario__grupo" id="Frecuencia">
				<label for="Frecuencia" class="formulario__label">Nombre producto</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre_producto" id="nombre_producto" placeholder="Ingrese el nombre del producto" required value="<?php echo $roww['nomproducto'];?>">
				</div>
			</div>

			<!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="Temperatura">
				<label for="Temperatura" class="formulario__label">Fecha vencimiento</label>
				<div class="formulario__grupo-input">
					<input type="date" class="formulario__input" name="fecha_ven" id="fecha_ven" required value="<?php echo $roww['fecvenproducto'];?>">
				</div>
			</div>
			<div class="formulario__grupo" id="Auscultacion">
				<label for="Auscultacion" class="formulario__label">Cantidad</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="cant" id="cant" placeholder="1" required pattern="[0-9]" value="<?php echo $roww['cantproducto'];?>">
				</div>
			</div>
            <div class="formulario__grupo" id="examen">
				<label for="examen" class="formulario__label">Lote producto</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="lote" id="lote" placeholder="Ingrese el lote del producto" required value="<?php echo $roww['loteproducto'];?>">
				</div>
			</div>
            <div class="formulario__grupo">
                <label>Proveedor</label>
                <select name="proveedor">
                <option selected disabled>Seleccione un proveedor</option>
            <?php
            require("../conexion.php");

            $sql1 = "SELECT * FROM proveedor WHERE idproveedor=".$roww['idproveedor'];
            $resultado1 = $conexion->prepare($sql1);
            $resultado1->execute();
            $row1 = $resultado1->fetch(PDO::FETCH_ASSOC);
            echo "<option selected value='".$row1['idproveedor']."'>".$row1['nomproveedor']."</option>";

         try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $query = "SELECT * FROM proveedor ORDER BY nomproveedor ";
                $stmt = $conexion->prepare($query);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idproveedor = $row['idproveedor'];
                    $nomproveedor = $row['nomproveedor'];
                    echo "<option value=\"$idproveedor\">$nomproveedor</option>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
            </select>
            </div> 
            <div class="formulario__grupo">
                <label>Categoria</label>
                <select name="categoria">
                <option selected disabled>Seleccione una categoria</option>
            <?php
            require("../conexion.php");

            $sql2 = "SELECT * FROM categoria WHERE idcategoria=".$roww['idcategoria'];
            $resultado2 = $conexion->prepare($sql2);
            $resultado2->execute();
            $row2 = $resultado2->fetch(PDO::FETCH_ASSOC);
            echo "<option selected value='".$row2['idcategoria']."'>".$row2['nomcategoria']."</option>";

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $query = "SELECT * FROM categoria ORDER BY nomcategoria";
                $stmt = $conexion->prepare($query);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idcategoria = $row['idcategoria'];
                    $nomcategoria = $row['nomcategoria'];
                    echo "<option value=\"$idcategoria\">$nomcategoria</option>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </select>
            </div>
            <div class="formulario__grupo">
                <label>Estado producto</label>
                <select name="estado">
                <option selected disabled>Seleccione un estado</option>
            <?php
            require("../conexion.php");

            $sql3 = "SELECT * FROM estado WHERE idestado=".$roww['idestado'];
            $resultado3 = $conexion->prepare($sql3);
            $resultado3->execute();
            $row3 = $resultado3->fetch(PDO::FETCH_ASSOC);
            echo "<option selected value='".$row3['idestado']."'>".$row3['nomestado']."</option>";

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $query = "SELECT * FROM estado ORDER BY nomestado";
                $stmt = $conexion->prepare($query);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idestado = $row['idestado'];
                    $nomestado = $row['nomestado'];
                    echo "<option value=\"$idestado\">$nomestado</option>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
            </select>
            </div>

            
			<div class="formulario__grupo formulario__grupo-btn-enviar">
            <br><br>
				<button type="submit" class="formulario__btn">Actualizar producto</button>
			</div>
		</form>
	</main>
</body>
</html>