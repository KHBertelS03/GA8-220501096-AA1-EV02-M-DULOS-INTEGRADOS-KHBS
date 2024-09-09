<?php 

$host = "localhost";
$dbnombre = "keirypdf";
$usuariobd = "root";
$contrasenabd = "";

//conexión a la base de datos//

try {
    //conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "","keirypdf");
    
} catch (PDOException $e) {
    echo "Error en la conexion" . $e->getMessage();
}


//validación de los datos del formulario//
session_start(); 
$usuario=$_POST['Usuario'];
$password=$_POST['contrasena'];


$ejecutar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Usuario='$usuario' and contraseña='$password'");

if (mysqli_num_rows($ejecutar) > 0) {
    $usuario_info = mysqli_fetch_assoc($ejecutar);
 
            header("location: ../vistas/inicio.html"); 
    exit; 
}
 /*muestra el mensaje mensaje error en caso de estar mal la contraseña o usuario*/
  else {  
    header("Location: ../vistas/badlogin.html");
    exit();
  }

?>