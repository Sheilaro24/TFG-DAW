<?php include 'layout/header.php' ?>

<div id="hero" style="display: flex; justify-content: center; align-items: center; height: 50vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 py-3 text-center">
                <div class="contenido-hero">
                    <h3 style="color:white">Inicio de Sesión</h3>
                    <p style="color:white">Inicia sesirón aquí</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-4 py-4">
            <?php
            if (isset($_GET['errorformregistro']) && $_GET['errorformregistro'] === 'true') {
                echo "<p>Campos vacíos</p>";
            }

            if (isset($_GET['errorcredenciales']) && $_GET['errorcredenciales'] === 'true') {
                echo "<p>Error de credenciales. Los datos son incorrectos</p>";
            }

            if (isset($_GET['errordb']) && $_GET['errordb'] === 'true') {
                echo "<p>Hubo algún tipo de error, inténtelo más tarde</p>";
            }
            ?>

            <form method="POST" action="">
                <div class="mb-3">
        </br>
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" autocomplete="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass" autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Inicio Sesión</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
            <p>¿No tienes una cuenta? <a href="./registro.php">Regístrate aquí</a>.</p>
            <p>Para salir:</p>
            <a href="./index.php" class="btn btn-secondary">Salir</a>
        </div>
    </div>
</div>

<?php include 'layout/footer.php' ?>