<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dweb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(["success" => false, "error" => "Error de conexión: " . $conn->connect_error]));
}

session_start(); // Inicia la sesión

// Verifica si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validar las credenciales del usuario
    if (validarCredenciales($username, $password, $conn)) {
        $_SESSION['username'] = $username;
        // Redirige a la página de perfil u otra página después del inicio de sesión
        header('Location: ../index.html');
        exit(); // Termina el script después de la redirección
    } else {
        header("Location: ../InicioSesion.html?mensaje=error&detalle=Credenciales Incorrectas");
        exit();
    }
}

// Función para validar las credenciales del usuario
function validarCredenciales($username, $password, $conn) {
    $sql = "SELECT * FROM Registro
        WHERE user = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    
    // Verifica si se encontró algún resultado
    if ($result && $result->num_rows > 0) {
        return true; // Credenciales válidas
    } else {
        return false; // Credenciales inválidas
    }
}

// Cerrar la conexión
$conn->close();
?>