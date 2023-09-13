<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla_Ingresos</title>
    <link rel="stylesheet" href="../CSS/avg_encabezado.css">
    <link rel="stylesheet" href="../CSS/avg_Tabla_ingresos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="shortcut icon" href="../Imegenes/logo1.png">
</head>
<body>
    <nav id="tabla_ingresos">
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="../Imegenes/logo.png" alt="">
                    <span class="nav-item">Citas e Ingresos</span>
                </a>
            </li>
            <li><a href="../HTML/avg_tabla_ingresos.html">
                <i class="fas fa-home"></i>
                <span class="nav-item">Inicio</span>
            </a></li>
            <li><a href="../HTML/avg_Formulario_cliente.html">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">Propietario / Mascota</span>
            </a></li>
            <li><a href="../HTML/avg_Formulario_citas.html">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">Citas</span>
            </a></li>
            <li><a href="../HTML/avg_Formulario_empleados.html">
                <i class="fas fa-cog"></i>
                <span class="nav-item">Equipo de trabajo</span>
            </a></li>
            <li><a href="../HTML/avg_Formulario_perfil_recep.html">
                <i class="fas fa-user"></i>
                <span class="nav-item">Perfil</span>
            </a></li>
            <li><a href="../HTML/avg_tabla_notif_recepcion.html">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">Notificaciones</span>
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
    <main class="table">
        <section class="table__header">
            <h1>Ingresos</h1>
            <div class="input-group">
                <input type="search" placeholder="Buscar ">
                <img src="../Imegenes/search-icon.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Nombre Mascota</th>
                        <th>Color Mascota</th>
                        <th>Fecha Nacimiento</th>
                        <th>Raza</th>
                        <th>Especie</th>
                        <th>Numero microchip</th>
                        <th>Genero</th>
                        <th>Nombre Propietario</th>
                    </tr>
                </thead>
                <tbody>
                <?php
            require("../conexion.php");

            try {
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT nommascota, colmascota, fecnacmascota, nomraza, nomespecie, num_microchipmascota, nomgenmascota, nomcliente FROM mascota JOIN genmascota ON mascota.idgenmascota = genmascota.idgenmascota JOIN raza ON mascota.idraza=raza.idraza JOIN especie ON mascota.idespecie=especie.idespecie JOIN cliente ON mascota.idcliente=cliente.idcliente;";
                $stmt = $conexion->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $nommascota = $row['nommascota'];
                    $colmascota = $row['colmascota'];
                    $fechanac = $row['fecnacmascota'];
                    $nomraza = $row['nomraza'];
                    $nomespecie = $row['nomespecie'];
                    $microchip = $row['num_microchipmascota'];
                    $nomgenmasco = $row['nomgenmascota'];
                    $nomcliente = $row['nomcliente'];
                    
                    // Imprimir los valores en la tabla
                    echo "<tr>";
                    echo "<td>$nommascota</td>";
                    echo "<td>$colmascota</td>";
                    echo "<td>$fechanac</td>";
                    echo "<td>$nomraza</td>";
                    echo "<td>$nomespecie</td>";
                    echo "<td>$microchip</td>";
                    echo "<td>$nomgenmasco</td>";
                    echo "<td>$nomcliente</td>";
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
    <br><br><br><br>
</body>
</html>