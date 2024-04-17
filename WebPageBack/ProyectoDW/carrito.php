<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="Css/Style.css" rel="stylesheet">
    <link rel="stylesheet" href="Css/Estilo.css">

    <script>
        function showPopup() {
            document.getElementById('cart-popup').style.display = 'block';
        }
        function hidePopup() {
            document.getElementById('cart-popup').style.display = 'none';
        }
        function animateButton(button) {
            /* Aquí puedes añadir el código para animar el botón */
        }
        function redirectToInicio() {
            window.location.href = 'index.html';
        }
        function redirectToAdopta() {
            window.location.href = 'adopta.html';
        }
        function redirectToProductos() {
            window.location.href = 'Compras.html';        
        }
    </script>
</head>

<body>
    <?php
    session_start(); // Inicia la sesión

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = []; // Inicializa $_SESSION['carrito'] como un array vacío
    }

    $total_carrito = 0;
    var_dump($_SESSION);
    ?>
    <header>
        <nav>
          <div class="menu-logo">
              <img src="Imagenes/logo.png" alt="Logo Amigo Peludo">
              <img src="Imagenes/tituloNegro.png" alt="Titulo">
          </div>
          <div class="menu-items">
              <button class="menu-button" onclick="redirectToInicio()">Inicio</button>            
              <button class="menu-button" onclick="redirectToAdopta()">Adopta</button>
              <button class="menu-button" onclick="redirectToProductos()">Productos</button>
              <img class="menu-icon" src="Imagenes/Carrito.png" alt="Carrito" onclick="showPopup()">
             <a href="InicioSesion.html"><img class="menu-icon" src="Imagenes/usuario.png" alt="Usuario"></a>
          </div>
        </nav>
    </header>

    <main class="container my-5" style="background-color: white;">
        <div class="row carrusel">
        <h1>Carrito de Compras</h1>
            <div class="col-md-8">
                <div class="card mb-3">
                    
                    <div class="card-body">
                        <h5 class="card-title"><?= $id_prod ?></h5>
                        <p class="card-text">Descripción del producto.</p>
                        <p class="card-text">Cantidad: <input type="number" name="cantidad" value="<?= $cantidad ?>" min="1">></p>
                        <p class="card-text">Precio por unidad: $<?= obtenerPrecio($conn, $id_prod) ?></p>
                        <p class="card-text">Subtotal: $<?= obtenerPrecio($conn, $id_prod) * $cantidad ?></p>
                        <a href="?eliminar=<?= $id_prod ?>">
                            <button class="btn btn-danger">Eliminar</button>
                        </a>
                    </div>
                </div>
                <!-- Agregar más productos aquí -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Resumen del Carrito</h5>
                        <p>Total de Productos: 1</p>
                        <p>Total a Pagar: $100</p>
                        <a href="#" class="btn btn-primary">Proceder al Pago</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <h1>Carrito de Compras</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['carrito'] as $id_prod => $cantidad) : 
                        ?>
                <tr>
                    <td>Nombre del Producto</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id_prod" value="<?= $id_prod ?>">
                            <input type="number" name="cantidad" value="<?= $cantidad ?>" min="1">
                            <input type="submit" name="actualizar" value="Actualizar">
                        </form>
                    </td>
                    <td>$<?= obtenerPrecio($conn, $id_prod) ?></td>
                    <td>$<?= obtenerPrecio($conn, $id_prod) * $cantidad ?></td>
                    <td><a href="?eliminar=<?= $id_prod ?>">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Total a Pagar: $<?= $total_carrito ?></h3>

    <footer>
        <div class="grupo1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="Imagenes/logoFnegro.png" alt="MiAmigoPeludo">
                    </a>                 
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore fugiat libero vitae mollitia ius</p>
                <p>¡Agradecemos las donaciones!</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="redSocial">
                    <img src="Imagenes/facebook.png" alt="Facebook">
                    <img src="Imagenes/instagram.png" alt="Instagram">
                    <img src="Imagenes/x.png" alt="X">                    
                </div>
            </div>
        </div>
        <div class="grupo2">
            <small>&copy; 2024 <b>Amigo Peludo</b> Todos los derechos reservados.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>