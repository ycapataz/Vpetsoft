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
        <title>Formulario_citas</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/avg_encabezado.css">
        <link rel="stylesheet" href="../CSS/avg_Formulario_citas.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_formulario_citas">
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
                <label for"">
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
        <h1>AGENDAMIENTO CITAS</h1>
        <br><br>
		<form action="" class="formulario" id="formulario">
			<!-- Grupo: Nombre Usuario -->
            <div class="formulario__grupo" id="Nombre_pro">
				<label for="Nombre_pro" class="formulario__label">Nombre Propietario (Confirmar)</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Nombre_pro" id="Nombre_pro" placeholder="David Fernando" readonly  value>
				</div>
			</div>
            <div class="formulario__grupo" id="Apellidos_pro">
				<label for="Apellidos_pro" class="formulario__label">Apellidos Propietario (Confirmar)</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Apellidos_pro" id="Apellidos_pro" placeholder="Cifuentes Cardozo" readonly  value>
				</div>
			</div>
           
            <div class="formulario__grupo">
                <label>Mascota</label>
                <select>
                    <option selected disabled>Seleccione mascota</option>
                    <option>Zeta</option>
                    <option>Haru</option>
                    <option>Tanathos</option>
                    <option>Sakura</option>
                </select>
            </div>	
            <div class="formulario__grupo" id="Fecha_cita">
				<label for="Fecha_cita" class="formulario__label">Fecha</label>
				<div class="formulario__grupo-input">
					<input type="date" class="formulario__input" name="Fecha_cita" id="Fecha_cita">
				</div>
			</div>	
            <div class="formulario__grupo">
                <label>Veterinarios</label>
                <select>
                    <option selected disabled>Seleccione un veterinario</option>
                    <option>Samuel Burbano</option>
                    <option>Leonardo Reyes</option>
                    <option>Paola Martelo</option>
                    <option>Adriana Lina</option>
                    <option>Johanna Fuentes</option>
                    <option>Tatiana Moreno</option>
                    <option>Gloria Hernandez</option>
                    <option>Nuria Sotelo</option>
                    <option>Giovanny Gomez</option>
                </select>
            </div>	
            <div class="formulario__grupo">
                <label>Especialidad</label>
                <select>
                    <option selected disabled>Seleccione una especialidad</option>
                    <option>Medicina general</option>
                    <option>Cirugia</option>
                    <option>Terapias</option>
                    <option>Toma de muestras</option>
                    <option>Imagenes Diagnosticas</option>
                    <option>Odontologia</option>
                    <option>Vacunacion</option>
                </select>
                <br><br><br>
            </div>		
		
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn" onclick="location.href='tabla_citas.html'">Buscar</button>
			</div>
		</form>
	</main>
</body>
</html>