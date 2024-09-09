<?php
require "../conex/conexion.php";

$sql = "SELECT * FROM `usuarios`";

$prepacion = $pdo->prepare($sql);
//$prepacion->bindParam('dato1',$dato1);
//$dato1 = 1;

$prepacion->execute();
$datos = $prepacion->fetchAll(PDO::FETCH_ASSOC);
//print_r($datos);
echo json_encode($datos);

/*
foreach($datos as $usuario){
    echo $usuario['Nombres'];
    echo "<br>";
    echo $usuario['Correo'];
     echo "<br>";
     echo $usuario['Contrasena'];
      echo "<br>";
      echo $usuario['Usuario'];
      echo "<br>";
} */

?>