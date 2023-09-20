<!DOCTYPE html>
<html>
    <head>
        <title>Editar proveedor</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/juandencabezado.css">
        <link rel="stylesheet" href="../CSS/juand_campos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_crear_proveedor">
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
        <h1>EDITAR PROVEEDOR</h1>
        <br><br><br><br>
		<form action="editarDatosProveedor.php" class="formulario" method="POST">
        <?php 
                require_once("../conexion.php");

                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT * FROM proveedor WHERE idproveedor =".$_GET['Id'];
                $stmt = $conexion->prepare($query);
                $stmt->execute();
                $roww = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="formulario__grupo" id="Frecuencia">
				<label for="Frecuencia" class="formulario__label">Id producto</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="idproveedor" id="idproveedor" readonly value="<?php echo $roww['idproveedor'];?>">
				</div>
			</div>
			<!-- Grupo: Nombre -->
			<div class="formulario__grupo" id="Frecuencia">
				<label for="Frecuencia" class="formulario__label">Nombre proveedor</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre_proveedor" id="nombre_proveedor" placeholder="Ingrese el nombre del proveedor" required value="<?php echo $roww['nomproveedor'];?>">
				</div>
			</div>

			<!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="Temperatura">
				<label for="Temperatura" class="formulario__label">Representante</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="representante" id="representante" placeholder="Ingrese el nombre del representante" required value="<?php echo $roww['repreproveedor'];?>">
				</div>
			</div>
			<div class="formulario__grupo" id="Auscultacion">
				<label for="Auscultacion" class="formulario__label">Correo</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="Ej davidperez01@gmail.com" required value="<?php echo $roww['corproveedor'];?>">
				</div>
			</div>
			<div class="formulario__grupo" id="Empleado">
				<label for="Empleado" class="formulario__label">Telefono</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="telefono" id="telefono" placeholder="Ingrese el telefono del proveedor" required value="<?php echo $roww['telproveedor'];?>">
				</div>
			</div>
            <div class="formulario__grupo">
                <label>Ciudad</label>
                <select name="ciudad">
                <option selected disabled>Seleccione una ciudad</option>
            <?php
            require("../conexion.php");

            $sql1 = "SELECT * FROM ciudades WHERE idciudad=".$roww['idciudad'];
            $resultado1 = $conexion->prepare($sql1);
            $resultado1->execute();
            $row1 = $resultado1->fetch(PDO::FETCH_ASSOC);
            echo "<option selected value='".$row1['idciudad']."'>".$row1['nomciudad']."</option>";

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $query = "SELECT * FROM ciudades ORDER BY nomciudad";
                $stmt = $conexion->prepare($query);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idciudad = $row['idciudad'];
                    $nomciudad = $row['nomciudad'];
                    echo "<option value=\"$idciudad\">$nomciudad</option>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
                </select>

                </select>
            </div>	
            <div class="formulario__grupo">
                <label>Estado producto</label>
                <select name="estado">
                <option selected disabled>Seleccione un estado</option>
            <?php
            require("../conexion.php");

            $sql2 = "SELECT * FROM estado WHERE idestado=".$roww['idestado'];
            $resultado2 = $conexion->prepare($sql2);
            $resultado2->execute();
            $row2 = $resultado2->fetch(PDO::FETCH_ASSOC);
            echo "<option selected value='".$row2['idestado']."'>".$row2['nomestado']."</option>";

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
            <div class="formulario__grupo" id="examen">
				<label for="examen" class="formulario__label">NIT</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nit" id="nit" placeholder="Ingrese el NIT del proveedor" required value="<?php echo $roww['nit'];?>">
				</div>
			</div>
            <br>
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Actualizar proveedor</button>
			</div>
		</form>
	</main>
</body>
</html>