..<!DOCTYPE html>
<html>
    <head>
        <title>Registrar entrada</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/juandencabezado.css">
        <link rel="stylesheet" href="../CSS/juand_campos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_registro_entrada">
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
            <li><a href="../juand_consultar_sald_inventario.php">
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
        <h1>REGISTRAR ENTRADA</h1>
        <br><br><br><br>
		<form action="" class="formulario" id="formulario">
        <div class="formulario__grupo">
                <label>Nombre producto</label>
                <select>
                <option selected disabled>Seleccione un producto</option>
            <?php
            require("../conexion.php");


            try {
                $pdo = new PDO("mysql:host=127.0.0.1;dbname=vpetsoft", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $query = "SELECT idproducto, nomproducto FROM producto ORDER BY idproducto";
                $stmt = $pdo->prepare($query);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idproducto = $row['idproducto'];
                    $nomproducto = $row['nomproducto'];
                    echo "<option value=\"$idproducto\">$nomproducto</option>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
                </select>
            </div>
			<div class="formulario__grupo" id="Temperatura">
				<label for="Temperatura" class="formulario__label">Fecha registro entrada</label>
				<div class="formulario__grupo-input">
					<input type="date" class="formulario__input" name="Temperatura" required>
				</div>
			</div>
			<div class="formulario__grupo" id="Auscultacion">
				<label for="Auscultacion" class="formulario__label">Cantidad</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="Auscultacion" id="Auscultacion" min="1" placeholder="1" required pattern="[0-9]">
				</div>
			</div>
			<div class="formulario__grupo" id="Empleado">
				<label for="Empleado" class="formulario__label">Fecha vencimiento producto</label>
				<div class="formulario__grupo-input">
					<input type="date" class="formulario__input" name="Empleado" id="Empleado" placeholder="Ingrese el proveedor del producto" required >
				</div>
			</div>
			<div class="formulario__grupo formulario__grupo-btn-enviar">
                <br><br>
				<button type="submit" class="formulario__btn">Guardar entrada</button>
			</div>
		</form>
	</main>
</body>
</html>