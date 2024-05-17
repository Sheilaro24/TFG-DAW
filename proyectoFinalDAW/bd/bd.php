<?php
//Establecer conexción PDO con la base de datos
$host = "localhost";
$username = "root";
$password = "";
$database = "agencia_viajes";

//por si falla la concexión se envuelve en un try catch
try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '<p>BD Conectada</p>';
} catch (PDOException $e) {
    echo '<p>Error de conexión</p>';
}
