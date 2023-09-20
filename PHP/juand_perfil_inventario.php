<?php
session_start();
include '../conexion.php';

$nombre = $_SESSION['nombre'];
if (!isset($nombre)){
    header("location: ../HTML/iniciosesion.html");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Perfil almacenista</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../CSS/juandencabezado.css">
        <link rel="stylesheet" href="../CSS/juand_campos.css">
        <link rel="stylesheet" href="../CSS/ydcapa_ventana_emergente.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_perfil_almacenista">
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
        <br><br><br><br>
        <main>
        <h1><?php echo $_SESSION['nombre']; ?></h1>
        <div class="img_usuaro">
            <img src="../Imegenes/almacenista.jpg">
        </div>
        <br><br><br><br>
		<form action="" class="formulario" id="formulario">
			<!-- Grupo: Nombre Usuario -->
            <div class="formulario__grupo" id="Nombre">
				<label for="Nombre" class="formulario__label">Nombres</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Nombre" id="Nombre" placeholder="Paola Andrea" readonly value="<?php echo $_SESSION['nombre'];?>">
				</div>
			</div>
            <div class="formulario__grupo" id="Apellidos">
				<label for="Apellidos" class="formulario__label">Apellidos</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Apellidos" id="Apellidos" placeholder="Marleto" readonly  value="<?php echo $_SESSION['apellido'];?>">
				</div>
			</div>
            <!-- Grupo: Cedula -->
			<div class="formulario__grupo" id="Cedula">
				<label for="Cedula" class="formulario__label">Numero de Cedula</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="Cedula" id="Cedula" step="1" min="10000000" max="1999999999"placeholder="1026897450" readonly  value="<?php echo $_SESSION['documento'];?>">
				</div>
			</div>
            <div class="formulario__grupo" id="Fecha Nacimiento">
				<label for="Fecha Nacimiento" class="formulario__label">Fecha Nacimiento</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Fecha Nacimiento" id="Fecha Nacimiento" step="1" min="1" max="3" placeholder="06/10/1996" readonly  value="<?php echo $_SESSION['fecha'];?>">
				</div>
			</div>
			<div class="formulario__grupo" id="Celular">
				<label for="Celular" class="formulario__label">Numero Celular</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="Celular" id="Celular"min="3002000000" max="3509999999" placeholder="3217864500" readonly  value="<?php echo $_SESSION['telefono'];?>">
				</div>
			</div>
            <div class="formulario__grupo" id="Email">
				<label for="Email" class="formulario__label">Email</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="Email" id="Email"  placeholder="pamarteloc@dogsano.com" readonly  value="<?php echo $_SESSION['email'];?>" >
				</div>
			</div>
            <div class="formulario__grupo" id="Direccion">
				<label for="Direccion" class="formulario__label">Direccion</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Direccion" id="Direccion"  placeholder="Cll 6 # 75 47" readonly  value="<?php echo $_SESSION['direccion'];?>">
				</div>
			</div>
            <div class="formulario__grupo" id="Especialidad">
				<label for="Especialidad" class="formulario__label">Especialidad</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Especialidad" id="Especialidad"  placeholder="Medico general" readonly  value="<?php echo $_SESSION['nomespecialidad'];?>">
				</div>
			</div>
            <div class="formulario__grupo" id="Cargo">
				<label for="Cargo" class="formulario__label">Cargo</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Cargo" id="Cargo"  placeholder="Veterinario" readonly  value="<?php echo $_SESSION['nomcargo'];?>">
				</div>
			</div>
            <div class="formulario__grupo" id="Eps">
				<label for="Eps" class="formulario__label">Eps</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Eps" id="Eps"  placeholder="COMPENSAR S.A." readonly  value="<?php echo $_SESSION['nomeps'];?>">
				</div>
			</div>
            <br><br><br>
			<div class="formulario__grupo formulario__grupo-btn-enviar">
                <button id="btn-abrir-popup" type="button" class="formulario__btn">Editar</button>
			</div>
		</form>
	</main>
    <div class="overlay" id="overlay">
			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h4 class="title">Recuerda siempre poner informacion real.</h4>
				<form action="../PHP/juand_editar_perfil.php" method="POST">
					<div class="contenedor-inputs">
                        <input name="telefono" type="number" placeholder="telefono celular" value="<?php echo $_SESSION['telefono'];?>" >
                        <input name="correo" type="text" placeholder="Correo electronico" value="<?php echo $_SESSION['email'];?>" onfocus="mostrarMensaje()">

                        <div>
                        <span id="mensaje" style="color: red; position: relative;"></span>
                        
                        <script>
                        function mostrarMensaje() {
                            var mensajeSpan = document.getElementById('mensaje');
                            mensajeSpan.textContent = "NOTA: Al editar este campo, editará el correo electrónico con el que inicia sesión.";
                        }
                        </script>
                        </div>
                        <input name="direccion" type="text" placeholder="Dirección" value="<?php echo $_SESSION['direccion'];?>" >
					</div>
					<input type="submit" class="btn-submit" value="editar">
				</form>
			</div>
		</div>
	</div>
	<script src="../JAVASCRIPT/ydcapa_ventana.js"></script>
</body>
</html>