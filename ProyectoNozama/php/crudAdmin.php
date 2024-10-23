<!DOCTYPE html>
<html>

<head>
    <title>NOZAMA</title>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto:ital,
    wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/plantilla.css">
</head>

<body>
    <!--Header-->
    <header class="container mb-5"> <!-- Usamos 'container' para centrar la barra de navegación -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- Logo y nombre de la página -->
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="logo.png" alt="NOZAMA Logo" width="40" height="40" class="me-2">
                    <span class="fs-4">NOZAMA</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
                aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Barra de búsqueda -->
                    <form class="d-flex mx-auto" role="search" style="width: 50%;">
                        <input class="form-control me-2" type="search" placeholder="Buscar productos..." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                    
                    <!-- Iconos de sesión y carrito -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-circle fs-5"></i> Iniciar Sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="#">
                                <i class="bi bi-cart4 fs-5"></i> Carrito
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    0
                                    <span class="visually-hidden">productos en carrito</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <hr> 

        <nav class="navbar nav-underline navbar-expand-lg submenu">
            <div class="container-fluid">
                <ul class="navbar-nav nav-fill w-100 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-speaker fs-5"></i> Bocinas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-battery-charging fs-5"></i> Cargadores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-bezier fs-5"></i> Cables
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-battery-full fs-5"></i> Baterías
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-headphones fs-5"></i> Audífonos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-plug fs-5"></i> Adaptadores
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
    </header>

    <!--Main o contenido-->
    <main class="container mt-4">
    <div class="row">
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Añadir producto:</h5>
                    <form action="agProAd.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="nombreProducto">Nombre:</label>
                            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Ingresa el nombre" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="precioProducto">Precio:</label>
                            <input type="number" class="form-control" id="precioProducto" name="precioProducto" placeholder="Ingresa el precio" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="descripcionProducto">Descripción:</label>
                            <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" rows="3" placeholder="Ingresa la descripción" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="disponibilidadProducto">Disponibilidad:</label>
                            <input type="number" class="form-control" id="disponibilidadProducto" name="disponibilidadProducto" placeholder="Unidades disponibles" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cantidadProducto">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidadProducto" name="cantidadProducto" placeholder="Cantidad" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="fechaCreacionProducto">Fecha de Creación:</label>
                            <input type="date" class="form-control" id="fechaCreacionProducto" name="fechaCreacionProducto" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="idCategoria">Categoría:</label>
                            <input type="number" class="form-control" id="idCategoria" name="idCategoria" placeholder="Ingrese categoría" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="imagenProducto">Imagen:</label>
                            <input type="file" class="form-control" id="imagenProducto" name="imagenProducto" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Añadir Producto Nuevo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Modificar producto:</h5>
                    <div class="form-group mb-3">
                        <label for="idProducto">ID:</label>
                        <input type="number" class="form-control" id="idProducto" placeholder="Ingresa el id">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nombreProducto">Nombre:</label>
                        <input type="text" class="form-control" id="nombreProducto" placeholder="Ingresa el nombre">
                    </div>
                    <div class="form-group mb-3">
                        <label for="descripcionProducto">Descripción:</label>
                        <textarea class="form-control" id="descripcionProducto" rows="3" placeholder="Ingresa la descripción"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="precioProducto">Precio:</label>
                        <input type="number" class="form-control" id="precioProducto" placeholder="Ingresa el precio">
                    </div>
                    <div class="form-group mb-3">
                        <label for="disponibilidadProducto">Disponibilidad:</label>
                        <input type="number" class="form-control" id="disponibilidadProducto" placeholder="Unidades disponibles">
                    </div>
                    <div class="form-group mb-3">
                        <label for="fechaCreacionProducto">Fecha de Creación:</label>
                        <input type="date" class="form-control" id="fechaCreacionProducto">
                    </div>
                    <div class="form-group mb-3">
                        <label for="imagenProducto">Imagen:</label>
                        <input type="file" class="form-control" id="imagenProducto">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">Aplicar cambios</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Eliminar producto:</h5>
                    <div class="form-group mb-3">
                        <label for="nombreProducto">ID:</label>
                        <input type="text" class="form-control" id="nombreProducto" placeholder="Ingresa el ID del producto">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">Buscar producto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-12 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Listado de productos</h5>
                <div class="d-flex flex-wrap justify-content-between mb-3">
                    <button class="btn btn-primary mb-2" id="btnTabla1">Bocinas</button>
                    <button class="btn btn-primary mb-2" id="btnTabla2">Cargadores</button>
                    <button class="btn btn-primary mb-2" id="btnTabla3">Cables</button>
                    <button class="btn btn-primary mb-2" id="btnTabla4">Baterías</button>
                    <button class="btn btn-primary mb-2" id="btnTabla5">Audífonos</button>
                    <button class="btn btn-primary mb-2" id="btnTabla6">Adaptadores</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Disponibilidad</th>
                                <th>Fecha Creación</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody id="tablaContenido">
                            <!-- Agregar aquí las filas de productos -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>



    <footer class="container-fluid bg-light text-dark py-5 mt-5 border-top">
        <div class="container">
            <div class="row">
                <!-- Información de la compañía -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">Sobre NOZAMA</h5>
                    <p>NOZAMA es tu tienda en línea de confianza para encontrar los mejores productos electrónicos. Nos
                        esforzamos por ofrecer la más alta calidad y servicio a nuestros clientes.</p>
                    <p>&copy; 2024 NOZAMA. Todos los derechos reservados.</p>
                </div>
    
                <!-- Menú de navegación -->
                <div class="col-md-2 mb-4">
                    <h5 class="fw-bold">Navegación</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-dark text-decoration-none">Inicio</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Productos</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Ofertas</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Contacto</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Términos y Condiciones</a></li>
                    </ul>
                </div>
    
                <!-- Servicio al cliente -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold">Servicio al Cliente</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-dark text-decoration-none">Preguntas Frecuentes</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Política de Devoluciones</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Métodos de Pago</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Envíos y Entregas</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Contáctanos</a></li>
                    </ul>
                </div>
    
                <!-- Suscripción al boletín -->
                <div class="col-md-3">
                    <h5 class="fw-bold">Suscríbete a nuestro boletín</h5>
                    <p>Recibe ofertas y novedades directamente en tu bandeja de entrada.</p>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Tu correo electrónico">
                        <button class="btn btn-outline-primary" type="submit">Suscribirse</button>
                    </form>
                </div>
            </div>
    
            <hr>
    
            <!-- Redes sociales -->
            <div class="d-flex justify-content-center mt-3">
                <a href="#" class="text-dark me-4">
                    <i class="bi bi-facebook fs-4"></i>
                </a>
                <a href="#" class="text-dark me-4">
                    <i class="bi bi-instagram fs-4"></i>
                </a>
                <a href="#" class="text-dark me-4">
                    <i class="bi bi-twitter fs-4"></i>
                </a>
                <a href="#" class="text-dark">
                    <i class="bi bi-youtube fs-4"></i>
                </a>
            </div>
        </div>
    </footer>
    

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const mensaje = urlParams.get('mensaje');

            if (mensaje === 'success') {
                alert("Producto añadido correctamente.");
            } else if (mensaje === 'error') {
                alert("Error al añadir el producto.");
            }
        }
    </script>
</body>

</html>
