<?php
require "../conex/conexion.php";

try {
    // Verificar si se ha proporcionado un ID en la solicitud
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']); // Convertir a entero para evitar inyecciones SQL
        $sql = "SELECT * FROM `usuarios` WHERE id = :id";
        $preparacion = $pdo->prepare($sql);
        $preparacion->bindParam(':id', $id, PDO::PARAM_INT);
        $preparacion->execute();
        $datos = $preparacion->fetch(PDO::FETCH_ASSOC); // Usamos fetch para un solo resultado
    } else {
        // Si no ingresamos id sale error
        $datos = array("error" => "ID inválido o no proporcionado");
    }

    // Enviar la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($datos);

} catch (PDOException $e) {
    echo json_encode(array("error" => $e->getMessage()));
}
?>
