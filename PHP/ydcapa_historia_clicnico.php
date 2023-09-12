<!DOCTYPE html>
<html>
    <head>
        <title>Historia clinica</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../Imegenes/logo1.png">
        <link rel="stylesheet" href="../CSS/ydcapa_encabezado.css">
        <link rel="stylesheet" href="../CSS/ydcapa_tablas.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    </head>
<body>
    <nav id="nav_historias_clinicas">
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
        <br><br>
    </div>
    <main class="table">
        <section class="table__header">
            <h1>Historias clinicas</h1>
            <div class="input-group">
                <input type="search" id="busqueda" placeholder="Buscar Historia clinica">
                <img src="../Imegenes/search-icon.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table id="miTabla">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Frecuencia C</th>
                        <th>Temperatura</th>
                        <th>Empleado</th>
                        <th>Mascota</th>
                        <th>Fecha</th>
                        <th>Documento</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require("../conexion.php");

                    try {
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $query = "SELECT registroclinico.idregistroclinico, frecardiaca, temperatura, nomempleado, nommascota, fechregistroclinico FROM registroclinico JOIN mascota_has_registroclinico ON registroclinico.idregistroclinico = mascota_has_registroclinico.idregistroclinico JOIN empleado ON empleado.idempleado = registroclinico.idempleado JOIN mascota ON mascota_has_registroclinico.idmascota = mascota.idmascota ORDER BY registroclinico.idregistroclinico;";
                        $stmt = $conexion->prepare($query);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $idregistroclinico = $row['idregistroclinico'];
                            $frecardiaca = $row['frecardiaca'];
                            $temperatura = $row['temperatura'];
                            $nomempleado = $row['nomempleado'];
                            $nommascota = $row['nommascota'];
                            $fechregistroclinico = $row['fechregistroclinico'];
                            // Imprimir los valores en la tabla
                            echo "<tr>";
                            echo "<td>$idregistroclinico</td>";
                            echo "<td>$frecardiaca</td>";
                            echo "<td>$temperatura</td>";
                            echo "<td>$nomempleado</td>";
                            echo "<td>$nommascota</td>";
                            echo "<td>$fechregistroclinico</td>";
                            echo "<td><img class='icono' src='../Imegenes/accept.png'></td>";
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
        document.getElementById('busqueda').addEventListener('input', function() {
            let filtro = this.value.toLowerCase();
            let filas = document.querySelectorAll('#miTabla tbody tr');

            console.log(filas);

            filas.forEach(function(fila) {
                let textoFila = fila.textContent.toLowerCase();
                fila.style.display = textoFila.includes(filtro) ? '' : 'none';
            });
        });
    </script>
</body>
</html>