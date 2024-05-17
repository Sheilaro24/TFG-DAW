<?php
// Incluir el archivo de conexión a la base de datos
include '../bd/bd.php';

// Iniciar sesión
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verificar si el email no está vacío
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        // Obtener el email del formulario
        $email = $_POST["email"];

        // Preparar la consulta SQL
        $sql = $conn->prepare("INSERT INTO suscripciones (email) VALUES (?)");

        // Verificar si la consulta se preparó correctamente
        if ($sql) {
            // Ejecutar la consulta
            if ($sql->execute([$email])) {
                echo "<div class='alert alert-success'>Suscripción completada</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al suscribirse</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Error al preparar la consulta</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Email vacío</div>";
    }
}

// Verificar si se ha enviado el formulario de logout
if (isset($_POST['logout'])) {
    // Destruir la sesión
    session_destroy();
    // Redirigir al usuario a la página de inicio
    header("Location: index.php");
    exit;
}
?>