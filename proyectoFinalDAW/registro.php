<?php include 'layout/header.php' // incluir cabecera  ?>

<div id="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 py-3 d-flex justify-content-center">
                <div class="contenido-hero">
                    <h3 style="color:white">Registro de Usuarios</h3>
                    <p style="color:white">Un viaje se vive tres veces: cuando lo soñamos, cualdo lo vivimos y cuando lo recordamo.</p>
                    <p style="color:white">Te ayudamos a hacer tu viaje de ensueño.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- <?php
        // require "./bd/bd.php";
        // $message = " ";
        // if (!empty($_POST["email"]) && !empty($_POST["pass"])) {
        //     $sql = "INSERT INTO users (email, pass) VALUES (:email, :pass)";
        //     $stm = $conn->prepare($sql);
        //     $stm->bindParam(":email", $_POST["email"]);
        //     $password = password_hash($_POST["pass"], PASSWORD_BCRYPT);
        //     $stm->bindParam(":pass", $password);

        //     if ($stm->execute()) {
        //         $message = "Usuario Creado";
        //     } else {
        //         $message = "Error al crear usuario";
        //     }
        // }
        ?> -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 py-3 d-flex justify-content-center">

            <?php
            //para que un usuario pueda crearse tiene que tener todos los campos rellenos
            // si no saltara el siguiente error
            if (isset($_GET['errorformregistro']) && $_GET['errorformregistro'] === 'true') {
                echo "<p>Campos vacios</p>";
            }

            if (isset($_GET['successregistro']) && $_GET['successregistro'] === 'true') {
                echo "<p>Cuenta creada correctamente!</p>";
            }

            if (isset($_GET['errordb']) && $_GET['errordb'] === 'true') {
                echo "<p>Cuenta creada correctamente!</p>";
            }
            ?>



            <form class="col-lg-4 col-md-4 col-sm-4 py-4 justify-content-center" method="POST">


                <!--formulario para crear registos-->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" autocomplete="nombre" placeholder="Nombre...">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email...">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass" placeholder="Contraseña...">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Repetir Contraseña</label>
                    <input type="password" class="form-control" name="reppass" placeholder="Repetir contseña...">
                </div>
                <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>

            </form>
        </div>

        <div class="text-center">



            <p>Para salir o iniciar sesión:</p>
            <a href="./index.php" class="btn btn-secondary">Salir</a> <a href="./login.php" class="btn btn-secondary">Iniciar Sesion</a>
        </div>
    </div>
</div>
</div>
<?php include 'layout/footer.php' ?>