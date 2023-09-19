<!DOCTYPE html>
<html>
    <head>
        <title>Formulario_empleados</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/avg_encabezado.css">
        <link rel="stylesheet" href="../CSS/avg_Formulario_empleados.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_formulario_empleados">
        <ul>
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
        <h1>REGISTRO EMPLEADOS</h1>
        <br><br>
		<form action="" class="formulario" id="formulario">
			<!-- Grupo: Nombre Usuario -->
            <div class="formulario__grupo" id="Nombre">
				<label for="Nombre" class="formulario__label">Nombres</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Nombre" id="Nombre"  value required>
				</div>
			</div>
            <div class="formulario__grupo" id="Apellidos">
				<label for="Apellidos" class="formulario__label">Apellidos</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="Apellidos" id="Apellidos"  value required>
				</div>
			</div>
            <!-- Grupo: Cedula -->
			<div class="formulario__grupo" id="Cedula">
				<label for="Cedula" class="formulario__label">Numero de Cedula</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="Cedula" id="Cedula" step="1" min="10000000" max="1999999999"placeholder="Ingresar numero sin puntos ni comas" required>
				</div>
			</div>
            <div class="formulario__grupo" id="Fecha Nacimiento">
				<label for="Fecha Nacimiento" class="formulario__label">Fecha Nacimiento</label>
				<div class="formulario__grupo-input">
					<input type="date" class="formulario__input" name="Fecha Nacimiento" id="Fecha Nacimiento" step="1" min="1" max="3" required>
				</div>
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
            <div class="formulario__grupo">
                <label>Especialidad</label>
                <select>
                    <option selected disabled>Seleccione una especialidad</option>
                    <option>Medicina General</option>
                    <option>Cirugia</option>
                    <option>Terapias</option>
                    <option>Toma de muestras</option>
                    <option>Imagenes diagnosticas</option>
                    <option>Odontologia</option>
                    <option>Vacunacion</option>
                    <option>Auxiliar</option>
                </select>
            </div>		
            <div class="formulario__grupo">
                <label>Cargo</label>
                <select>
                    <option selected disabled>Seleccione el cargo</option>
                    <option>Veterinario</option>
                    <option>Recepcionista</option>
                    <option>Almacenista</option>
                </select>
            </div>	
            <div class="formulario__grupo">
                <label>EPS</label>
                <select>
                    <option selected disabled>Seleccione una especialidad</option>
                    <option>Salud Total</option>
                    <option>E.P.S. SANITAS S.A.</option>
                    <option>SOLSALUD E.P.S. S.A.</option>
                    <option>COOMEVA E.P.S. S.A.</option>
                    <option>EMDISALUD</option>
                    <option>ASMET SALUD</option>
                    <option>CRUZ BLANCA E.P.S. S.A.</option>
                    <option>E.P.S. FAMISANAR LIMITADA CAFAM-COLSUBSIDIO</option>
                    <option>CCF COLSUBSIDIO</option>
                    <option>COLMEDICA E.P.S. - ALIANSALUD  </option>
                    <option>COMFACUNDI</option>
                    <option>COMPENSAR E.P.S.</option>
                    <option>SALUD COLPATRIA E.P.S.</option>
                </select>
                <br><br><br>
            </div>	
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Guardar</button>
			</div>
		</form>
	</main>
</body>
</html>