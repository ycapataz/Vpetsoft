<!DOCTYPE html>
<html>
    <head>
        <title>Registro clinico</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/ydcapa_encabezado.css">
        <link rel="stylesheet" href="../CSS/ydcapa_campos_2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_registro_clinico">
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
    <br><br><br><br>
    <main>
        <h1>REGISTRO CLINICO</h1>
        <br><br>
        <form action="../PHP/ydcapa_insertar_registro.php" method="post" class="formulario" id="formulario">
            <!--  
            <div class="formulario__grupo" id="registro">
                <label for="registro" class="formulario__label">Id registro clinico</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" name="registro" id="registro" placeholder="1">
                </div>
            </div>
            -->
            <div class="formulario__grupo" id="Frecuencia">
                <label for="Frecuencia" class="formulario__label">Frecuencia cardiaca</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" name="Frecuencia" id="Frecuencia" step="1" min="1" max="300" placeholder="100" required>
                </div>
            </div>

            <div class="formulario__grupo" id="Temperatura">
                <label for="Temperatura" class="formulario__label">Temperatura</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" name="Temperatura" id="Temperatura" step="0.01" min=".1" placeholder="39,2" required>
                </div>
            </div>
            <div class="formulario__grupo" id="Empleado">
                <label for="Empleado" class="formulario__label">Empleado</label>
                <div class="formulario__grupo-input">
                <select name="empleado">
                <?php
                require("../conexion.php");


                try {
                    $pdo = new PDO("mysql:host=127.0.0.1:3308;dbname=vpetsoft", "root", "");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $query = "SELECT * FROM empleado ORDER BY idempleado";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();


                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $idempleado = $row['idempleado'];
                        $nomempleado = $row['nomempleado'];
                        echo "<option value=\"$idempleado\">$nomempleado</option>";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
                </select>
                </div>
            </div>


            <!-- Grupo: Teléfono -->
            <div class="formulario__grupo" id="Mascota">
                <label for="Mascota" class="formulario__label">Mascota</label>
                <div class="formulario__grupo-input">
                <select name="Mascota">
            <?php
            require("../conexion.php");


            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $query = "SELECT * FROM mascota ORDER BY idmascota";
                $stmt = $conexion->prepare($query);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idmascota = $row['idmascota'];
                    $nommascota = $row['nommascota'];
                    echo "<option value=\"$idmascota\">$nommascota</option>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </select>
                </div>
            </div>
            <div class="formulario__grupo" id="medicamento">
                <label for="Frecuencia" class="formulario__label">Enfermedad</label>
                <div class="formulario__grupo-input">
                <select name="enfermedad">
            <?php
            require("../conexion.php");


            try {
                $conexion = new PDO("mysql:host=127.0.0.1:3308;dbname=vpetsoft", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $query = "SELECT * FROM enfermedad ORDER BY idenfermedad";
                $stmt = $conexion->prepare($query);
                $stmt->execute();


                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idenfermedad = $row['idenfermedad'];
                    $nomenfermedad = $row['nomenfermedad'];
                    echo "<option value=\"$idenfermedad\">$nomenfermedad</option>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </select>
                </div>
            </div>
            <div class="formulario__grupo" id="Observacion">
                <label for="Notas" class="formulario__label">Observacion</label>
                <div class="formulario__grupo-input">
                    <textarea id="nota" name="nota" rows="12" cols="40" required></textarea>
                </div>
            </div>
            <br><br>
            <div class="formulario__grupo formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn">Enviar</button>
            </div>
        </form>
    </main>
</body>
</html>