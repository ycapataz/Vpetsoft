<?php
session_start();
include '../conexion.php';

$nombre = $_SESSION['nombre'];
if (!isset($nombre)){
    header("location: ../HTML/iniciosesion.html");
}
?>

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
            <li><a href="../PHP/cerrar_sesion.php" class="logout">
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
                        <th>Hora cita</th>
                        <th>Nombre Propietario</th>
                        <th>Nombre Mascota</th>
                        <th>Estado</th>
                        <th>Veterinario</th>
                        <th>solucitud ingreso</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4:00 p.m.</td>
                        <td>David  Cifuentes</td>
                        <td>Zeta</td>
                        <td>
                            <p class="status pendiente">Pendiente</p>
                        </td>
                        <td>Paola Martelo</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>4:00 p.m.</td>
                        <td>Soraida Lopez</td>
                        <td>Copito</td>
                        <td>
                            <p class="status pendiente">Pendiente</p>
                        </td>
                        <td>Adriana Lima</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>4:00 p.m.</td>
                        <td>Tatiana Aristizabal</td>
                        <td>Appa</td>
                        <td>
                            <p class="status pendiente">Pendiente</p>
                        </td>
                        <td>Leonardo Reyes</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>3:30 p.m.</td>
                        <td>Luz Mery Guerra</td>
                        <td>Cherry Pie</td>
                        <td>
                            <p class="status pendiente">Pendiente</p>
                        </td>
                        <td>Paola Martelo</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>3:00 p.m.</td>
                        <td>Angelica Velasco</td>
                        <td>Aramis</td>
                        <td>
                            <p class="status delivered">En cita</p>
                        </td>
                        <td>Adriana Lima</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>3:00 p.m.</td>
                        <td>Samantha Restrepo</td>
                        <td>Akira</td>
                        <td>
                            <p class="status ausente">Inasistencia</p>
                        </td>
                        <td>Leonardo Reyes</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>2:30 p.m.</td>
                        <td>Alejandro Rodriguez</td>
                        <td>Luna</td>
                        <td>
                            <p class="status delivered">En cita</p>
                        </td>
                        <td>Paola Martelo</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>2:30 p.m.</td>
                        <td>Carolina Pardo</td>
                        <td>Artemis</td>
                        <td>
                            <p class="status delivered">Hospitalizado</p>
                        </td>
                        <td>Adriana Lima</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>2:30 p.m.</td>
                        <td>Samantha Restrepo</td>
                        <td>Akira</td>
                        <td>
                            <p class="status cancelled">Cerrado</p>
                        </td>
                        <td>Leonardo Reyes</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>2:00 p.m.</td>
                        <td>Valentina Lopez</td>
                        <td>Max</td>
                        <td>
                            <p class="status delivered">Observacion</p>
                        </td>
                        <td>Paola Martelo</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>2:00 p.m.</td>
                        <td>Liliana Orozco</td>
                        <td>Tokio</td>
                        <td>
                            <p class="status cancelled">Cerrado</p>
                        </td>
                        <td>Adriana Lima</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>2:00 p.m.</td>
                        <td>Eduardo Quinonez</td>
                        <td>Rufus</td>
                        <td>
                            <p class="status cancelled">Cerrado</p>
                        </td>
                        <td>Leonardo Reyes</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>1:30 p.m.</td>
                        <td>Sofia Martinez</td>
                        <td>Bella</td>
                        <td>
                            <p class="status cancelled">Cerrado</p>
                        </td>
                        <td>Paola Martelo</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>1:30 p.m.</td>
                        <td>Yolanda Gutierrez</td>
                        <td>Draco</td>
                        <td>
                            <p class="status cancelled">Cerrado</p>
                        </td>
                        <td>Adriana Lima</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>1:30 p.m.</td>
                        <td>Rodolfo Hernadez</td>
                        <td>Okoye</td>
                        <td>
                            <p class="status cancelled">Cerrado</p>
                        </td>
                        <td>Leonardo Reyes</td>
                        <td>
                            <img class="icono" src="../Imegenes/check.png" alt="">
                            <img class="icono" src="../Imegenes/cross.png" alt="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <br><br><br><br>
</body>
</html>