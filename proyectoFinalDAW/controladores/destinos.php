<?php

// --- FUNCION MOSTRAR DESTIOS ----

//obtener una lista de destinos  indica si cada destino es favorito para un usuario específico.
function mostrarDestinos($conn)
{
    //Implementar traer tambien los favoritos que coincidan con el id
    try {
        // consulta LEFT JOIN para unir la tabla favoritosinformación 
        //sobre si cada destino es favorito para un usuario específico. 
        $query = "SELECT d.*, 
        CASE WHEN f.id_usuario IS NOT NULL THEN 1 ELSE 0 END AS es_favorito
      FROM destinos d
      LEFT JOIN favoritos f ON d.id = f.id_destino AND f.id_usuario = :id_usuario";
        $statement = $conn->prepare($query);
        $statement->bindParam(':id_usuario', $_SESSION['id'], PDO::PARAM_INT);
        $statement->execute();
        $destinos = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $destinos;
    } catch (PDOException $e) {
        exit;
    }
}


// --- FUNCION MOSTRAR FAVORITOS ---

//para recuperar los datos de la tabla favoritos
function mostrarFavoritos($conn)
{
    try {
        $query = "SELECT * FROM favoritos";
        $statement = $conn->prepare($query);
        $statement->execute();
        $favoritos = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $favoritos;
    } catch (PDOException $e) {
        exit;
    }
}

// -- FUNCION MOSTRAS DESTINOS POR ID ---

//para recuperar la información de una destino que el cliente haya elegido del footer
function mostrarDestinoPorId($conn, $id)
{
    try {
        $query = "SELECT * FROM destinos WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $destino = $statement->fetch(PDO::FETCH_ASSOC);
        return $destino;
    } catch (PDOException $e) {
        exit;
    }
}
