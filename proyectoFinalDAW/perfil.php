<?php include 'layout/header.php' ?>
<div id="hero" style="display: flex; justify-content: center; align-items: center; height: 50vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 py-3 text-center">
                <div class="contenido-hero">
                    <h3 style="color:white">Perfil del usuario</h3>
                    <p style="color:white">Edita tus datos</p>
                    
                </div>
            </div>
            </div>
    </div>
</div>
</br>
<div class="container">
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 py-3 d-flex justify-content-center">

            <?php
            $usuario = getUsuario($conn);

            //formulario para que el usuario pueda actualizar sus datos

            if (isset($_GET['actualizado']) && $_GET['actualizado'] === 'true') {
                echo "<p>Datos actualizados correctamente!</p>";
            }
            // si hay un error, saltara el siguiete mensaje
            if (isset($_GET['errordb']) && $_GET['errordb'] === 'true') {
                echo "<p>Hubo algún tipo de error, intentelo más tarde</p>";
            }
            echo '
            <form class="col-lg-4 col-md-4 col-sm-4 py-4 justify-content-center" method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" placeholder="' . $usuario['nombre'] . '"  class="form-control" name="nombre" autocomplete="nombre">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" placeholder="' . $usuario['email'] . '" class="form-control" name="email" autocomplete="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass" autocomplete="current-password">
                </div>
                <button type="submit" class="btn btn-primary" name="actualizarPerfil">Actualizar</button>
            </form>
            ';
            ?>
        </div>

    </div>
</div>
<?php include 'layout/footer.php' ?>