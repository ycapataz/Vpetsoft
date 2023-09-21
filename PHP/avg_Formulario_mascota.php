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
        <title>Formulario_mascota</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/avg_encabezado.css">
        <link rel="stylesheet" href="../CSS/avg_Formulario_mascota.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_formulario_mascotas">
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="../Imegenes/logo.png" alt="">
                    <span class="nav-item">Citas e Ingresos</span>
                </a>
            </li>
            <li><a href="../PHP/avg_tabla_ingresos.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">Inicio</span>
            </a></li>
            <li><a href="../PHP/avg_Formulario_cliente.php">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">Propietario / Mascota</span>
            </a></li>
            <li><a href="../PHP/avg_Formulario_citas.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Citas</span>
            </a></li>
            <li><a href="../PHP/avg_Formulario_empleados.php">
                <i class="fas fa-cog"></i>
                <span class="nav-item">Equipo de trabajo</span>
            </a></li>
            <li><a href="../PHP/avg_Formulario_perfil_recep.php">
                <i class="fas fa-user"></i>
                <span class="nav-item">Perfil</span>
            </a></li>
            <li><a href="../PHP/avg_tabla_notif_recepcion.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Notificaciones</span>
            </a></li>          
                <li><a href="../PHP/avg_tabla_mascotas.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Consulta Mascota</span> 
            </a></li>
            <li><a href="../PHP/avg_tabla_clientes.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Consulta Propietario</span> 
            </a></li>    
           <!-- <li><a href="#">
                <i class="fas fa-question-circle"></i>
                <span class="nav-item">Ayuda</span> 
            </a></li>-->
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
                <img src="../Imegenes/recepcionista_perfil.jpg" width="40px"height="40px" alt="">
                <div>
                    <h4>CATALINA RUIZ MENDEZ</h4>
                    <small>RECEPCIONISTA</small>
                </div>
            </div>
        </header>
    </div>
    <br><br><br><br>
	<main>
        <h1>REGISTRO NUEVA MASCOTA</h1>
        <br><br>
		<form action="avg_Formulario_mascotas_guardar.php"class="formulario" method="POST"> <!-- Se modifica para php -->
			<!-- Grupo: Nombre Usuario -->
            <div class="formulario__grupo" id="Cedula">
				<label for="Cedula" class="formulario__label">Numero de Cedula</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="Cedula" id="Cedula" step="1" min="10000000" max="1999999999"placeholder="Ingresar numero sin puntos ni comas" required>
				</div>
			</div>
            <div class="formulario__grupo" id="Nombre_pro">
				<label for="Nombre_pro" class="formulario__label">Nombre Propietario (Confirmar)</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Nombre_pro" id="Nombre_pro" readonly value >
				</div>
			</div>
            <div class="formulario__grupo" id="Nombre">
				<label for="Nombre" class="formulario__label">Nombres Mascota</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Nombre_mascota" id="Nombre" required>
				</div>
			</div>
            <div class="formulario__grupo" id="Color">
				<label for="Color" class="formulario__label">Color</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Color" id="Color" required>
				</div>
			</div>
			<div class="formulario__grupo" id="Fecha Nacimiento">
				<label for="Fecha Nacimiento" class="formulario__label">Fecha Nacimiento</label>
				<div class="formulario__grupo-input">
					<input type="date" class="formulario__input" name="Fecha_Nacimiento" id="Fecha Nacimiento" step="1" min="1" max="3" required>
				</div>
			</div>
            <div class="formulario__grupo">
                <label>Genero</label>
                <select name="genero">
                    <option selected disabled>Seleccione un genero</option>
                    <?php
                    require("../conexion.php");


                    try {
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                        $query = "SELECT * FROM genmascota ORDER BY nomgenmascota";
                        $stmt = $conexion->prepare($query);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $idgenmascota = $row['idgenmascota'];
                            $nomgenmascota = $row['nomgenmascota'];
                            echo "<option value=\"$idgenmascota\">$nomgenmascota</option>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
               
                </select>
            </div>	
            <div class="formulario__grupo" id="Chip">
				<label for="Fecha Nacimiento" class="formulario__label">Numero de Chip</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Chip" id="Chip" required>
				</div>
			</div>	
            <div class="formulario__grupo">
                <label>Raza</label>
                <select name="raza">
                    <option selected disabled>Seleccione una raza</option>
                    <?php
                    require("../conexion.php");


                    try {
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                        $query = "SELECT * FROM raza ORDER BY nomraza";
                        $stmt = $conexion->prepare($query);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $idraza = $row['idraza'];
                            $nomraza = $row['nomraza'];
                            echo "<option value=\"$idraza\">$nomraza</option>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>

                
                </select>
            </div>	
            <div class="formulario__grupo">
                <label>Especie</label>
                <select name="especie">
                    <option selected disabled>Seleccione la especie</option>
                    <?php
                    require("../conexion.php");


                    try {
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                        $query = "SELECT * FROM especie ORDER BY nomespecie";
                        $stmt = $conexion->prepare($query);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $idespecie = $row['idespecie'];
                            $nomespecie = $row['nomespecie'];
                            echo "<option value=\"$idespecie\">$nomespecie</option>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>

                </select>
            </div>		
            <br><br>
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Guardar Mascota</button>
			</div>
		</form>
	</main>
</body>
</html>