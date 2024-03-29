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
            <li><a href="../pagina_con_cud/HTML/ydcapa_perfil_veterinario.html">
                <i class="fas fa-user"></i>
                <span class="nav-item">Perfil</span>
            </a></li>
            <li><a href="../pagina_con_cud/HTML/ydcapa_tabla_ingreso.html">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Ingresos</span>
            </a></li>
            <li><a href="../pagina_con_cud/HTML/ydcapa_registro_clinico.html">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Registro clinico</span>
            </a></li>
            <li><a href="../pagina_con_cud/HTML/ydcapa_historia_clicnico.html">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">Historias Clinicas</span>
            </a></li>
            <li><a href="../pagina_con_cud/HTML/ydcapa_Formula_medica.html">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Formula medica</span>
            </a></li>
            <li><a href="../pagina_con_cud/HTML/ydcapa_examen_medico.html">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Examenes</span>
            </a></li>
            <!--
            <li><a href="#">
                <i class="fas fa-question-circle"></i>
                <span class="nav-item">Ayuda</span> 
            </a></li>
            -->
            <li><a href="../pagina_con_cud/HTML/index.html" class="logout">
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
        <br><br>
    </div>
<main class="table">
    <section class="table__header">
        <h1>Ingresos</h1>
        <div class="input-group">
            <input type="search" placeholder="Buscar ingresos">
            <img src="../Imegenes/search-icon.png" alt="">
        </div>
    </section>
    <section class="table__body">
        <table>
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
                $pdo = new PDO("mysql:host=127.0.0.1:3308;dbname=vpetsoft", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT idingreso,nomcliente,nommascota,horaingreso,nomestadoingreso,fecingreso FROM cliente JOIN mascota ON cliente.idcliente=mascota.idcliente JOIN cita ON cita.idmascota=mascota.idmascota JOIN ingreso ON cita.idcita=ingreso.idcita JOIN estadoingreso ON ingreso.idestadoingreso=estadoingreso.idestadoingreso ORDER BY idingreso;";
                $stmt = $pdo->prepare($query);
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
</body>
</html>