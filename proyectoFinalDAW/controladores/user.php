<?php
//acciones relacionadas con la autenticación y el registro de usuarios, así como la 
//gestión de sesiones y la actualización de perfiles de usuario

// ============= REGISTRO USUARIOR =================

//verificar a través de post que se han eviado los datos necessarios
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnregistrar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $reppass = $_POST['reppass'];

//llamar a la funcion 
    registrarUsuario($conn, $nombre, $email, $pass,  $reppass);
}

// --- FUNCION REGISTROAR USUARIOS ---

function registrarUsuario($conn, $nombre,  $email, $pass,  $reppass){
    //Elimino los espacios innecesarios
    $nombre = trim($nombre);
    $email = trim($email);
    $pass = trim($pass);
    $reppass = trim($reppass);

    //verifica si algún campo está vacío y se redirige 
    //de vuelta al formulario de registro con un mensaje de error si es necesario.
    if (empty($nombre) || empty($email) || empty($pass) || empty($reppass)) {
        header('Location: ../registro.php?errorformregistro=true');
        exit;
    } else {
        //si estan los datos OK se volcaran en la tabla users
        try {
            $query = "INSERT INTO users (nombre, email , pass ) VALUES (:nombre, :email , :pass)";
            $statement = $conn->prepare($query);
            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
            $statement->execute();
            header('Location: ../registro.php?successregistro=true');
       
        } catch (PDOException $e) {
            header('Location: ../registro.php?errordb=true');
        }
    }
}

// ============== LOGIN USUARIO ===================

// Si el usuarrio está registrado puede iniciar sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    //llamar a la función
    loginUsuario($conn, $email, $pass);
}


//--- FUNCION LOGIN USUARIOS ---

function loginUsuario($conn, $email, $pass){
    // si algun campo esta vacion te reedirige 
    if (empty($email) || empty($pass)) {
        header('Location: ../index.php?errorform=true');
        exit;
    } else {
        // consulta para berificar con la tabla sql 
        try {
            $query = "SELECT * FROM users WHERE email = :email AND pass = :pass";
            $statement = $conn->prepare($query);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
            $statement->execute();
            $usuario = $statement->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                // Usuario autenticado, establecer la sesión
                session_start();
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['id'] = $usuario['id'];

                header('Location: index.php');
                exit;
            } else {
                // Credenciales inválidas, mostrar mensaje de error
                header('Location: login.php?errorcredenciales=true');
                exit;
            }
        } catch (PDOException $e) {
            header('Location: login.php?errordb=true');
            exit;
        }
    }
}

//============= LOGOUT USUARIO ===============

// destruir sesion 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    session_start();
    session_destroy();

    header('Location: index.php');
    exit;
}


//============ ACTUALIZAR USUARIO PERFIL =============

// se berifican que los datos se hayan enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizarPerfil'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    actualizarPerfil($conn, $nombre, $email, $pass);
}

// -- FUNCION ACTUARLIZAR PERFIL --- 
function actualizarPerfil($conn, $nombre, $email, $pass){
    try {
        // ejecutar consulta en tabla usere
        $queryCheck = "SELECT * FROM users WHERE id = :id";
        $statementCheck = $conn->prepare($queryCheck);
        $statementCheck->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $statementCheck->execute();
        $userData = $statementCheck->fetch(PDO::FETCH_ASSOC);
        if (empty($nombre)) {
            $nombre = $userData['nombre'];
        }
        if (empty($email)) {
            $email = $userData['email'];
        }
        if (empty($pass)) {
            $pass = $userData['pass'];
        }
        // consulta para enviar los datos actualizados
        $query = "UPDATE users SET nombre = :nombre, email = :email, pass = :pass WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':pass', $pass, PDO::PARAM_STR);
        $statement->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $statement->execute();
        header('Location: perfil.php?actualizado=true');
        exit;
    } catch (PDOException $e) {
        header('Location: perfil.php?errordb=true');
        exit;
    }
}

// --- FUNCION GET USUARIO ---

// se comprueba la autenrificacion de los usuarios 
function getUsuario($conn){
    try {
        $query = "SELECT * FROM users WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $statement->execute();
        $usuario = $statement->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    } catch (PDOException $e) {
        exit;
    }
}
