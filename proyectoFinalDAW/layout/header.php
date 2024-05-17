<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finding Dreams</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <?php
    session_start();
    include 'bd/bd.php';
    //Importaciónd e Controladores
    include 'controladores/user.php';
    include 'controladores/destinos.php';
    include 'controladores/favoritos.php';
    ?>
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="four columns">
                    <a href="index.php">
                        <img src="img/vuelo-en-avion.png" width="50" alt="Logo web" style="display: inline;">
                        <h3 id="titulo" style="display: inline;">Finding Dreams</h3>
                    </a>
                </div>
                <div class="two columns u-pull-right"> <!-- Agregamos la clase u-pull-right aquí -->
                    <?php
                    //Si hay una sesión, el botón que se muestra en el menues para ir al perfil de usuario
                    //Si NO hay una sesión. El botón me llevará a logearme
                    if (isset($_SESSION['usuario'])) {
                        echo '
                        <a href="perfil.php">
                        <img src="img/acceso.png" width="50" alt="acceso" style="display: inline;" title="Perfil">
                    </a>
                        ';
                    } else {
                        echo '
                        <a href="login.php">
                        <img src="img/acceso.png" width="50" alt="acceso" style="display: inline;" title="Inicio sesión">
                    </a>
                        ';
                    }
                    ?>
                    <form action="" method="POST">

                        <?php

                        if (isset($_SESSION['usuario'])) {
                            echo '
    <button name="logout">Logout</button>
    ';
                        } else {
                            echo '';
                        }
                        ?>
                    </form>


                </div>
                <div class="four columns u-pull-right">

                    <ul>
                        <li class="submenu">
                            <img src="img/carro2.png" width="50" id="img-carro" title="Carrito de la compra">
                            <div id="carro">

                                <table id="lista-carro" class="u-full-width">
                                    <thead>
                                        <tr>

                                            <th>Viaje</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody><!--aqui van los viajes que se compran-->
                                </table>
                                <p id="total">Total: <span>0</span> €</p>

                                <a href="#" id="#" class="button u-full-width">Comprar</a>
                                <a href="#" id="vaciar-carro" class="button u-full-width">Borrar</a>
                            </div>


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>