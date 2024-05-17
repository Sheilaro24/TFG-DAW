<?php
//agregar o quietar favoritos

//para savber si se ha pulsado el boton favorito a través del id del viaje
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregarfav'])) {
    $idDestino = $_POST['id_destino'];
    //llamada a función
    toggleFav($conn, $idDestino);
    exit;
}


// --- FUNCION PARA AGREGAR O QUITAR VIAJES ---
function toggleFav($conn, $idDestino)
{
    try {
        //Para tener la funcion de poder agregar a favs, el usuario tiene que estar registrado
        //verifacar que el usuario está registrado
        if (!isset($_SESSION['id'])) {
            header('Location: login.php');
        }

        // verificacion Verificar si el destino ya está guardado como favorito por el usuario actual
        $query_check = "SELECT COUNT(*) FROM favoritos WHERE id_usuario = :id_usuario AND id_destino = :id_destino";
        $statement_check = $conn->prepare($query_check);
        $statement_check->bindParam(':id_usuario', $_SESSION['id'], PDO::PARAM_INT);
        $statement_check->bindParam(':id_destino', $idDestino, PDO::PARAM_INT);
        $statement_check->execute();
        $num_rows = $statement_check->fetchColumn();

        //  Si el destino ya está guardado como favorito, eliminarlo
        if ($num_rows > 0) {
            $query_delete = "DELETE FROM favoritos WHERE id_usuario = :id_usuario AND id_destino = :id_destino";
            $statement_delete = $conn->prepare($query_delete);
            $statement_delete->bindParam(':id_usuario', $_SESSION['id'], PDO::PARAM_INT);
            $statement_delete->bindParam(':id_destino', $idDestino, PDO::PARAM_INT);
            $statement_delete->execute();
        } else {
            // Si el destino no está guardado como favorito, insertarlo
            $query_insert = "INSERT INTO favoritos (id_usuario, id_destino) VALUES (:id_usuario, :id_destino)";
            $statement_insert = $conn->prepare($query_insert);
            $statement_insert->bindParam(':id_usuario', $_SESSION['id'], PDO::PARAM_INT);
            $statement_insert->bindParam(':id_destino', $idDestino, PDO::PARAM_INT);
            $statement_insert->execute();
        }

        header('Location: index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
