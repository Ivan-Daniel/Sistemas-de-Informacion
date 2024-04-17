<?php
session_start(); // Inicia la sesión si no está iniciada

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header('Location: login.php');
    exit(); // Termina el script después de la redirección
}

function obtenerPrecio($conn, $id_prod){
    $id_prod = 1; 

    $sql = "SELECT precio FROM producto WHERE id_prod = $id_prod";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si se encontró el producto, obtén su precio
        $row = $result->fetch_assoc();
        $precio_prod = $row["precio"];
    } else {
        $precio_prod = 0; 
    }

    // Liberar el resultado
    $result->close();
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dweb";
$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Agregar producto al carrito
if (isset($_POST['agregar'])) {
    $id_prod = $_POST['id_prod'];
    $cantidad = $_POST['cantidad'];

    // Agregar el producto al carrito
    $_SESSION['carrito'][$id_prod] = $cantidad;
}

// Actualizar cantidad del producto en el carrito
if (isset($_POST['actualizar'])) {
    $id_prod = $_POST['id_prod'];
    $cantidad = $_POST['cantidad'];

    // Actualizar la cantidad del producto en el carrito
    $_SESSION['carrito'][$id_prod] = $cantidad;
}

// Eliminar producto del carrito
if (isset($_GET['eliminar'])) {
    $id_prod = $_GET['eliminar'];

    // Eliminar el producto del carrito
    unset($_SESSION['carrito'][$id_prod]);
}

// Calcular totales del carrito
$total_carrito = 0;

foreach ($_SESSION['username'] as $id_prod => $cantidad) {
    // Obtener precio del producto desde la base de datos o un array de precios
    $precio_prod = obtenerPrecio($id_prod);
    $subtotal = $cantidad * $precio_prod;
    $total_carrito += $subtotal;
}
?>