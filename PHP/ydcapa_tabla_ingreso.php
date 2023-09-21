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
        <title>Ingreso</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/ydcapa_encabezado.css">
        <link rel="stylesheet" href="../CSS/ydcapa_tablas.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>
<body>
    <nav id="nav_ingreso">
        <ul>
            <li>
                <a href="../pagina_con_cud/HTML/index.html" class="logo">
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
        <br><br>
    </div>
<main class="table">
    <section class="table__header">
        <h1>Ingresos</h1>
        <div class="input-group">
            <input id="busqueda" type="search" placeholder="Buscar ingresos">
            <img src="../Imegenes/search-icon.png" alt="">
        </div>
    </section>
    <section class="table__body">
        <table id="miTabla">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre propietario</th>
                    <th>Nombre mascota</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Fecha ingreso</th>
                    <th>solucitud ingreso</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require("../conexion.php");

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT idingreso,nomcliente,nommascota,horaingreso,nomestadoingreso,fecingreso FROM cliente JOIN mascota ON cliente.idcliente=mascota.idcliente JOIN cita ON cita.idmascota=mascota.idmascota JOIN ingreso ON cita.idcita=ingreso.idcita JOIN estadoingreso ON ingreso.idestadoingreso=estadoingreso.idestadoingreso ORDER BY idingreso;";
                $stmt = $conexion->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $idingreso = $row['idingreso'];
                    $fecingreso = $row['nomcliente'];
                    $horaingreso = $row['nommascota'];
                    $idcita = $row['horaingreso'];
                    $idestadoingreso = $row['nomestadoingreso'];
                    $idtipoingreso = $row['fecingreso'];
                    // Imprimir los valores en la tabla
                    echo "<tr>";
                    echo "<td>$idingreso</td>";
                    echo "<td>$fecingreso</td>";
                    echo "<td>$horaingreso</td>";
                    echo "<td>$idcita</td>";
                    echo "<td>$idestadoingreso</td>";
                    echo "<td>$idtipoingreso</td>";
                    echo "<td><img class='icono' src='../Imegenes/check.png'></td>";
                    echo "</tr>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
            </tbody>
        </table>
    </section>
</main>
    <!--filtro de de busqueda de la tabla-->
    <script>
        document.getElementById('busqueda').addEventListener('keyup', function() {
            let filtro = this.value.toLowerCase();
            let filas = document.querySelectorAll('#miTabla tbody tr');

            let filasMostradas = [];

            filas.forEach(function(fila) {
                let textoFila = fila.textContent.toLowerCase();
                if (textoFila.includes(filtro)) {
                    filasMostradas.push(fila);
                }
            });

            filas.forEach(function(fila) {
                fila.style.display = filasMostradas.includes(fila) ? '' : 'none';
            });
        });
    </script>
</body>
</html>