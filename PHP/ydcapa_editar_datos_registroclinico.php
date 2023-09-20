<?php
session_start();
include '../conexion.php';

$nombre = $_SESSION['nombre'] ;
if (!isset($nombre)){
    header("location: ../HTML/iniciosesion.html");
}
?>

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
            <li><a href="../PHP/ydcapa_perfil_veterinario.php">
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
                <img src="../Imegenes/veterinaria_3.jpg" width="40px"height="40px" alt="">
                <div>
                    <h4><?php echo $nombre; ?></h4>
                    <small>VETERINARIO</small>
                </div>
            </div>
        </header>
    </div>
    <br><br><br><br>
    <main>
        <h1>EDITAR REGISTRO CLINICO</h1>
        <br><br>
        <form action="../PHP/ydcapa_editar_R.php" method="post" class="formulario" id="formulario">
        <?php 
                require_once("../conexion.php");

                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query =    "SELECT * FROM registroclinico WHERE idregistroclinico =".$_GET['Id'];
                $stmt = $conexion->prepare($query);
                $stmt->execute();
                $roww = $stmt->fetch(PDO::FETCH_ASSOC);

                $query_1 =    "SELECT * FROM mascota_has_registroclinico WHERE idregistroclinico =".$_GET['Id'];
                $stmt = $conexion->prepare($query_1);
                $stmt->execute();
                $roww1 = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

            <div class="formulario__grupo" id="Frecuencia">
				<label for="Frecuencia" class="formulario__label">Id registro clinico</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="idregistroclinico" id="idproducto" readonly value="<?php echo $roww['idregistroclinico'];?>">
				</div>
			</div>
            <div class="formulario__grupo" id="Frecuencia">
                <label for="Frecuencia" class="formulario__label">Frecuencia cardiaca</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" name="Frecuencia" id="Frecuencia" step="1" min="1" max="300" placeholder="100" required value="<?php echo $roww['frecardiaca'];?>">
                </div>
            </div>

            <div class="formulario__grupo" id="Temperatura">
                <label for="Temperatura" class="formulario__label">Temperatura</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" name="Temperatura" id="Temperatura" step="0.01" min=".1" placeholder="39,2" required  value="<?php echo $roww['temperatura'];?>">
                </div>
            </div>
            <div class="formulario__grupo" id="Empleado">
                <label for="Empleado" class="formulario__label">Empleado</label>
                <div class="formulario__grupo-input">
                <select name="empleado">
                <option selected disabled>Seleccione un empleado</option>
                <?php
                require("../conexion.php");
                
                $sql1 = "SELECT * FROM empleado WHERE idempleado=".$roww['idempleado'];
                $resultado1 = $conexion->prepare($sql1);
                $resultado1->execute();
                $row1 = $resultado1->fetch(PDO::FETCH_ASSOC);
                echo "<option selected value='".$row1['idempleado']."'>".$row1['nomempleado']."</option>";

                try {
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $query = "SELECT * FROM empleado ORDER BY idempleado";
                    $stmt = $conexion->prepare($query);
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
                <option selected disabled>Seleccione una Mascota</option>
            <?php
            require("../conexion.php");
            
            $sql2 = "SELECT * FROM mascota WHERE idmascota=".$roww1['idmascota'];
            $resultado2 = $conexion->prepare($sql2);
            $resultado2->execute();
            $row2 = $resultado2->fetch(PDO::FETCH_ASSOC);
            echo "<option selected value='".$row2['idmascota']."'>".$row2['nommascota']."</option>";

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

            $sql3 = "SELECT * FROM enfermedad WHERE idenfermedad=".$roww1['idenfermedad'];
            $resultado3 = $conexion->prepare($sql3);
            $resultado3->execute();
            $row3 = $resultado3->fetch(PDO::FETCH_ASSOC);
            echo "<option selected value='".$row3['idenfermedad']."'>".$row3['nomenfermedad']."</option>";

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


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
                    <textarea id="nota" name="nota" rows="12" cols="40" required><?php echo $roww1['observaciones'];?></textarea>
                </div>
            </div>
            <br><br>
            <div class="formulario__grupo formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn">editar</button>
            </div>
        </form>
    </main>
</body>
</html>