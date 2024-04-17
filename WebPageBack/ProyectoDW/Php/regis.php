<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "dweb";

$conn = new mysqli($servername, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$id = $_POST['id'];
$genero = $_POST['genero'];
$user = $_POST['user'];
$password = $_POST['psw'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

// Preparar la consulta SQL para insertar datos4
$sql = "INSERT INTO Registro (nombre, apellido, id, genero, user, password, correo, telefono, direccion) VALUES ('$nombre', '$apellido', '$id', '$genero', '$user', '$password', '$correo', '$telefono', '$direccion')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    header("Location: ../InicioSesion.html?mensaje=exito");
} else {
    header("Location: ../crearperfil.html?mensaje=error&detalle=" . urlencode($conn->error));
}

// Cerrar la conexión
$conn->close();
?>