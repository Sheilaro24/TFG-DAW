<?php include('layout/header.php'); //incliur cabezado con conexión a la bd


// verivicar que el id existe
if (isset($_GET['id'])) {
}
//llamar a la función mostrar destino por ide si el id exisye
$destinoDetalle = mostrarDestinoPorId($conn, $_GET['id']);
// si existe impriir la siguiente pagina
if ($destinoDetalle) {
    echo '
    <div id="hero">
    <div class="container">
        <div class="row">
            <div class="six columns">
                <div class="contenido-hero">
                    <h2 style="color: white">' . strtoupper($destinoDetalle['nombre']) . '</h2>
                    <p style="color: white">Tu viaje empieza aquí...</p>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="viajes" class="container" style="text-align: center;">
    <h2 id="encabezado" class="encabezado">INFROMACIÓN</h2>
    <div id="viajes" class="container" style="text-align: center;">


        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 text-center">
                    <img src="img/' . strtolower($destinoDetalle['nombre']) . '.jpg" class="img-fluid" alt="Imagen de ' . strtolower($destinoDetalle['nombre']) . '" width="70%">
                    <div class="mt-3">
                        </br>
                        <p>"' . $destinoDetalle['descripcion'] . '"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    ';
    //si no existe es id se mostrará el siguiente mensaje
} else {
    echo '
    <div id="hero">
    <div class="container">
        <div class="row">
            <div class="six columns">
                <div class="contenido-hero">
                    <h2 style="color: white">Este destino no existe!</h2>
                    <p style="color: white">Si no existe, no podrás recorrerlo! :(</p>

                </div>
            </div>
        </div>
    </div>
    </div>
    ';
}
?>


<?php include('layout/footer.php'); //incluir el footer?>