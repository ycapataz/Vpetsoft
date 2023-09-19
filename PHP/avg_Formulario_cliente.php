<!DOCTYPE html>
<html>
    <head>
        <title>Formulario_cliente</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/avg_encabezado.css">
        <link rel="stylesheet" href="../CSS/agv_Formulario_cliente.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_formulario_cliente">
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
                <img src="../Imegenes/recepcionista_perfil.jpg" width="40px"height="40px" alt="">
                <div>
                    <h4>CATALINA RUIZ MENDEZ</h4>
                    <small>RECEPCIONISTA</small>
                </div>
            </div>
        </header>
    </div>
    <br><br>
	<main>
        <h1>REGISTRO PROPIETARIO</h1>
        <br><br>
		<form action="avg_Formulario_cliente_guardar.php" class="formulario" method="POST">
			<!-- Grupo: Nombre Usuario -->
            <div class="formulario__grupo" id="Nombre">
				<label for="Nombre" class="formulario__label">Nombres</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombreCliente" id="nombreCliente"  value required>
				</div>
			</div>
            <div class="formulario__grupo" id="Apellidos">
				<label for="Apellidos" class="formulario__label">Apellidos</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="apellidosCliente" id="apellidosCliente"  value required>
				</div>
			</div>
            <!-- Grupo: Cedula -->
			<div class="formulario__grupo" id="Cedula">
				<label for="Cedula" class="formulario__label">Numero de Cedula</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="Cedula" id="Cedula" step="1" min="10000000" max="1999999999"placeholder="Ingresar numero sin puntos ni comas" required>
				</div>
			</div>
            <div class="formulario__grupo">
                <label>Ciudad</label>
                <select name="ciudad">
                <option selected disabled>Seleccione una ciudad</option>
            <?php
            require("../conexion.php");


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
                <br><br><br>
            </div>

			<div class="formulario__grupo" id="Celular">
				<label for="Celular" class="formulario__label">Numero Celular</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="Celular" id="Celular"min="3002000000" max="3509999999" value required>
				</div>
			</div>
            <div class="formulario__grupo" id="Email">
				<label for="Email" class="formulario__label">Email</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="Email" id="Email" required >
				</div>
			</div>
            <div class="formulario__grupo" id="Direccion">
				<label for="Direccion" class="formulario__label">Direccion</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Direccion" id="Direccion"  value required>
				</div>
			</div>
         	
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Guardar Propietario</button>
                
			</div>
            <div>
            <a href="../PHP/avg_Formulario_mascota.php">Crear Mascota</a>
            </div>
		</form>
	</main>
</body>
</html>