<?php include 'layout/header.php';
//incluir cabecera?>

<div id="hero">
    <div class="container">
        <div class="row">
            <div class="six columns">
                <div class="contenido-hero">
                    <h2 style="color:white">Viajes</h2>
                    <p style="color:white">Te ayudamos a hacer tu viaje de ensueño.</p>
                    <p style="color:white">Tu viaje empieza aquí...</p>
                    <form action="#" id="busqueda" method="post" class="formulario">
                        <input class="u-full-width" type="text" placeholder="Destino" id="buscador">
                        <input type="submit" id="submit-buscador" class="submit-buscador">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="viajes" class="container">
    <!--SECCION DE VIAJES MAS BUCADOS-->
    <h1 id="encabezado" class="encabezado">Los más buscados</h1>
    
    <?php
    //llamando a la función mostrarDestinos que muestradestinos desde la base de datos.
    $destinos = mostrarDestinos($conn);
    $contador = 0;
    // se recorren con un forecha para mostrar los destino es los siguentes div
    foreach ($destinos as $destino) {
        if ($contador == 0) {
            echo '<div class="row">';
        }

        echo '
        <div class="four columns">
            <div class="card">
                <img src="img/' . strtolower($destino['nombre']) . '.jpg" class="imagen-curso u-full-width">
                <div class="info-card">
                    <h4>' . strtoupper($destino['nombre']) . '</h4>
                    <p style="font-size: 12px;">5 días, vuelo y hotel incluidos (precios por persona)</p>
                    <div class="logos">
                        <img src="img/pasaporte.png" alt="Logo de pasaporte" class="logo">
                        <img src="img/hotel.png" alt="Logo de hotel" class="logo">
                    </div>
                    <p class="precio">Desde<span class="u-pull-right ">' . $destino['precio'] . '</span></p>
                    <a href="#img-carro" class="u-full-width button-primary button input agregar-carro" data-id="' . $destino['id'] . '">Comprar</a>';

        // Verificar si hay un usuario logeado, si es así se mostrará el boton de favoritos
        if (isset($_SESSION['id'])) {
            echo '
                <form method="POST" action="">
                    <input type="hidden" name="id_destino" value="' . $destino['id'] . '">
                    <button type="submit" name="agregarfav">
                        <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
                            <path fill="' . ($destino['es_favorito'] == 1 ? '#e11d48' : 'none') . '" stroke="#e11d48" d="m12 21.35l-1.45-1.32C5.4 15.36 2 12.27 2 8.5C2 5.41 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.08C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.41 22 8.5c0 3.77-3.4 6.86-8.55 11.53z" />
                        </svg>
                    </button>
                </form>';
                
        }

        echo '
                </div>
                
            </div>
            
        </div>';

//código para dividir las card de los viajes de 3 en 3
        $contador++;

        if ($contador == 3) {
            echo '</div> <!--.row-->';
            $contador = 0;
        }
    }

    if ($contador > 0) {
        echo '</div> <!--.row-->';
    }
    // enlace a editar perfil si el usuario esta registaso
    if (isset($_SESSION['id'])) {
        echo '<div class="row">
                <div class="twelve columns">
                    <a href="perfil.php" class="button-primary">editar perfil</a>
                </div>
              </div>';
    }

    ?>
    
</div>


<?php include 'layout/footer.php'; //icluir el footer?>