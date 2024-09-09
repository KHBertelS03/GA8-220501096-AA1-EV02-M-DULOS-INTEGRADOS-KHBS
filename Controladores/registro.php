<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Nombre de usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$database = "keirypdf"; // Nombre de la base de datos

// Datos del formulario
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['usuario'])) {
    // Verificar que no estén vacíos
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['usuario'])) {
        // Asignar los valores
        $nombres = $_POST['name'];
        $correo = $_POST['email'];
        $contraseña = $_POST['password'];
        $usuario = $_POST['usuario'];
        
        // Ahora puedes proceder con estos valores sabiendo que no son nulos
    } else {
        // Manejar el caso donde al menos uno de los campos está vacío
        header("Location: ../vistas/fatalerror.html");
        exit; 
    }
} else {
    // Manejar el caso donde al menos uno de los campos no está presente
    echo "Alguno de los campos no está presente.";
}

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Verificar si el usuario ya existe
$sql_check_user = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result_check_user = $conn->query($sql_check_user);

if ($result_check_user->num_rows > 0) {
    echo "El usuario ya existe, por favor prueba con otro.";
    echo'<a href="../vistas/register.html"> Volver Atrás</a>';
} else {
    // Insertar usuario en la base de datos
    $sql_insert_user = "INSERT INTO usuarios (Nombres, Correo, Contraseña, usuario) VALUES ('$nombres', '$correo', '$contraseña', '$usuario')";
    
    // Comprobar la ejecución del insert y que el usuario se cree//
    if ($conn->query($sql_insert_user) === TRUE) {
        echo "Usuario creado exitosamente";
        echo'<a href="../vistas/index.html"> Volver Atrás</a>';
    } else { // nos mostrara el error en la insercion del usuario //
        echo "Error al crear el usuario: " . $conn->error; 
    }
}

// Cerrar conexión
$conn->close();
?>