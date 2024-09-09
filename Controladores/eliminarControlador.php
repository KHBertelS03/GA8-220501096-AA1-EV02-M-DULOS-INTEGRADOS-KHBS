<?php

require "../Conex/conexion.php";

// Verificar si se ha enviado el ID a través de GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar y ejecutar la consulta SQL para eliminar el usuario
    $sql = "DELETE FROM `Usuarios` WHERE id = :id";
    $preparacion = $pdo->prepare($sql);

    // Enlazar el parámetro ID
    $preparacion->bindParam(':id', $id, PDO::PARAM_INT);

    // Ejecutar la consulta
    if ($preparacion->execute()) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro";
    }
} else {
    echo "ID no proporcionado";
}

?>
