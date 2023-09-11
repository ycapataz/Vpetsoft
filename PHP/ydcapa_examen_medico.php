<!DOCTYPE html>
<html>
    <head>
        <title>Examenes medicos</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/ydcapa_encabezado.css">
        <link rel="stylesheet" href="../CSS/ydcapa_campos_3.css">
        <script src="../JAVASCRIPT/ydcapa_duplicar_campos.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_examen_medico">
        <ul>
            <li>
                <a href="../HTML/index.html" class="logo">
                    <img src="../Imegenes/logo.png" alt="">
                    <span class="nav-item">Historia Clinica</span>
                </a>
            </li>
            <li><a href="../PHP/ydcapa_perfil_veterinario.html">
                <i class="fas fa-user"></i>
                <span class="nav-item">Perfil</span>
            </a></li>
            <li><a href="../PHP/ydcapa_tabla_ingreso.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Ingresos</span>
            </a></li>
            <li><a href="../PHP/ydcapa_registro_clinico.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Registro clinico</span>
            </a></li>
            <li><a href="../PHP/ydcapa_historia_clicnico.php">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">Historias Clinicas</span>
            </a></li>
            <li><a href="../PHP/ydcapa_Formula_medica.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Formula medica</span>
            </a></li>
            <li><a href="../PHP/ydcapa_examen_medico.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Examenes</span>
            </a></li>
            <!--
            <li><a href="#">
                <i class="fas fa-question-circle"></i>
                <span class="nav-item">Ayuda</span> 
            </a></li>
            -->
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
                <img src="../Imegenes/veterinaria_3.jpg" width="40px"height="40px" alt="">
                <div>
                    <h4>PAOLA ANDREA MARLETO</h4>
                    <small>VETERINARIO</small>
                </div>
            </div>
        </header>
    </div>
    <br><br>
    <h1>EXAMENES MEDICOS</h1>
    <br>
	<main>
		<form action="" class="formulario" id="formulario">
			<div class="formulario__grupo" id="cantidad">
				<label for="registro" class="formulario__label">cantidad</label>
				<div class="formulario__grupo-input">
					<input type="number" class="formulario__input" name="registro" id="registro" min="1" placeholder="1" required>
			</div>
			</div>
			<div class="formulario__grupo" id="medicamento">
				<label for="Frecuencia" class="formulario__label">Examen</label>
			    <div class="formulario__grupo-input">
                    <select>
                    <?php
                    require("../conexion.php");

                    try {
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = "SELECT * FROM examenmedico ORDER BY idexamenmedico";
                        $stmt = $conexion->prepare($query);
                        $stmt->execute();


                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $idexamenmedico = $row['idexamenmedico'];
                            $tipoexamenmedico = $row['tipoexamenmedico'];
                            echo "<option value=\"$idexamenmedico\">$tipoexamenmedico</option>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                    </select>
				</div>
			</div>
			<div class="formulario__grupo" id="grupo__Observaciones">
				<label for="Notas" class="formulario__label">Observaciones</label>
				<div class="formulario__grupo-input">
					<textarea id="nota" name="nota" rows="8" cols="35" required></textarea>
				</div>
                <button id="boton_duplicar" type="button" onclick="duplicarCampos()">+</button>
			</div>
            <div class="formulario__grupo" id="camposDuplicados">
                <!-- Campos duplicados se agregarán aquí -->
              </div>
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" id="btn" class="formulario__btn">Guardar</button>
			</div>
		</form>
	</main>
</body>
</html>