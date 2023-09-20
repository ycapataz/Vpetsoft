<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifi_recepcion</title>
    <link rel="stylesheet" href="../CSS/avg_encabezado.css">
    <link rel="stylesheet" href="../CSS/avg_Tablas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="shortcut icon" href="../Imegenes/logo1.png">
</head>
<body>
    <nav id="nav_notificaciones">
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
            <h1>Notificaciones</h1>
            <div class="input-group">
                <input type="search" id="busqueda" placeholder="Buscar ">
                <img src="../Imegenes/search-icon.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table id="miTabla">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tienes un mensaje de Paola Martelo</td>
                        <td>23-06-13</td>
                        <td>3:05 p.m</td>
                        <td>
                            <p class="status pendiente">Pendiente</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mensaje de Adriana Lima</td>
                        <td>23-06-13</td>
                        <td>2:58 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mesaje de Paola Martelo</td>
                        <td>23-06-13</td>
                        <td>2:25 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mensaje de Adriana Lima</td>
                        <td>23-06-13</td>
                        <td>2:23 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mensaje de Paola Martelo</td>
                        <td>23-06-13</td>
                        <td>2:05 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mensaje de Adriana Lima</td>
                        <td>23-06-13</td>
                        <td>1:58 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mensaje de Leonardo Reyes</td>
                        <td>23-06-13</td>
                        <td>1:55 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mensaje de Samuel Burbano</td>
                        <td>23-06-13</td>
                        <td>1:54 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mensaje de Johanna Fuentes</td>
                        <td>23-06-13</td>
                        <td>1:50 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Tienes un mensaje de Nuria Sotelo</td>
                        <td>23-06-13</td>
                        <td>1:45 p.m</td>
                        <td>
                            <p class="status delivered">Recibido</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

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