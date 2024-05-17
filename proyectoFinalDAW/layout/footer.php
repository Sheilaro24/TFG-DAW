<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="four columns">
                <p style="color:white">OTROS DESTINOS</p>
                <nav id="principal" class="menu">
                    <?php
                    $destinos = mostrarDestinos($conn);

                    foreach ($destinos as $destino) {
                        echo '
                        <a class="enlace" href="detalle-viaje.php?id=' . $destino['id'] . '" style="color:white">' . $destino['nombre'] . '</a>
                        ';
                    }


                    ?>
                </nav>
            </div>
            <div class="four columns u-pull-right">
                <div id="secundaria" class="menu">
                    <p style="color:white">Información:</p>
                    <p class="enlace" href="#" style="color:white">Dirección: C/ Viajes, 24</p>
                    <p class="enlace" href="#" style="color:white">Email: findingfream@viajes.es</p>
                    <p class="enlace" href="#" style="color:white">Teléfono: 0034 65871778</p>
                </div>
            </div>
            <form id="formSuscripcion" action="/controladores/suscripcion.php" method="post">
                <input type="email" name="email" placeholder="Tu correo electrónico" required>
                <button type="submit" style="color:white" title="Subscríbete a nuestra news letter">Suscríbete!</button>
            </form>
        </div>
    </div>
</footer>
<script src="js/app.js"></script>
</body>

</html>