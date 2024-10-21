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
    <main class="container">
    <div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Añadir producto:</h5>

            <!-- Campo para el nombre -->
            <div class="form-group mb-3">
                <label for="nombreProducto">Nombre:</label>
                <input type="text" class="form-control" id="nombreProducto" placeholder="Ingresa el nombre">
            </div>

            <!-- Campo para la descripción -->
            <div class="form-group mb-3">
                <label for="descripcionProducto">Descripción:</label>
                <textarea class="form-control" id="descripcionProducto" rows="3" placeholder="Ingresa la descripción"></textarea>
            </div>

            <!-- Campo para el precio -->
            <div class="form-group mb-3">
                <label for="precioProducto">Precio:</label>
                <input type="number" class="form-control" id="precioProducto" placeholder="Ingresa el precio">
            </div>

            <!-- Campo para la disponibilidad -->
            <div class="form-group mb-3">
                <label for="disponibilidadProducto">Disponibilidad:</label>
                <input type="number" class="form-control" id="disponibilidadProducto" placeholder="Unidades disponibles">
            </div>

            <!-- Campo para la fecha de creación -->
            <div class="form-group mb-3">
                <label for="fechaCreacionProducto">Fecha de Creación:</label>
                <input type="date" class="form-control" id="fechaCreacionProducto">
            </div>

            <!-- Campo para la imagen -->
            <div class="form-group mb-3">
                <label for="imagenProducto">Imagen:</label>
                <input type="file" class="form-control" id="imagenProducto">
            </div>

            <!-- Botones -->
            <div class="row">
            <div class="col-6 mb-2">
                <button class="btn btn-primary w-100">Bocinas</button>
            </div>
            <div class="col-6 mb-2">
                <button class="btn btn-primary w-100">Cargadores</button>
            </div>
            <div class="col-6 mb-2">
                <button class="btn btn-primary w-100">Cables</button>
            </div>
            <div class="col-6 mb-2">
                <button class="btn btn-primary w-100">Baterías</button>
            </div>
            <div class="col-6">
                <button class="btn btn-primary w-100">Audífonos</button>
            </div>
            <div class="col-6">
                <button class="btn btn-primary w-100">Adaptadores</button>
            </div>
        </div>



            </div>
        </div>
    </div>


        <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Modificar producto:</h5>

                <!-- Campo para el ID -->
                <div class="form-group mb-3">
                    <label for="nombreProducto">ID:</label>
                    <input type="number" class="form-control" id="idProducto" placeholder="Ingresa el id">
                </div>
                
                <!-- Campo para el nombre -->
                <div class="form-group mb-3">
                    <label for="nombreProducto">Nombre:</label>
                    <input type="text" class="form-control" id="nombreProducto" placeholder="Ingresa el nombre">
                </div>

                <!-- Campo para la descripción -->
                <div class="form-group mb-3">
                    <label for="descripcionProducto">Descripción:</label>
                    <textarea class="form-control" id="descripcionProducto" rows="3" placeholder="Ingresa la descripción"></textarea>
                </div>

                <!-- Campo para el precio -->
                <div class="form-group mb-3">
                    <label for="precioProducto">Precio:</label>
                    <input type="number" class="form-control" id="precioProducto" placeholder="Ingresa el precio">
                </div>

                <!-- Campo para la disponibilidad -->
                <div class="form-group mb-3">
                    <label for="disponibilidadProducto">Disponibilidad:</label>
                    <input type="number" class="form-control" id="disponibilidadProducto" placeholder="Unidades disponibles">
                </div>

                <!-- Campo para la fecha de creación -->
                <div class="form-group mb-3">
                    <label for="fechaCreacionProducto">Fecha de Creación:</label>
                    <input type="date" class="form-control" id="fechaCreacionProducto">
                </div>

                <!-- Campo para la imagen -->
                <div class="form-group mb-3">
                    <label for="imagenProducto">Imagen:</label>
                    <input type="file" class="form-control" id="imagenProducto">
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary">Aplicar cambios</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-30 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Eliminar producto:</h5>

            <!-- Campo para el nombre -->
            <div class="form-group mb-3">
                <label for="nombreProducto">ID:</label>
                <input type="text" class="form-control" id="nombreProducto" placeholder="Ingresa el nombre">
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary">Buscar producto</button>
            </div>
        </div>
    </div>
</div>


     <!-- Cuarto cuadro -->
            <<div class="col-lg-12 col-md-8 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Listado de productos</h5>
                    <!-- Sección de botones -->
                    <div class="d-flex flex-wrap justify-content-between mb-3">
                        <button class="btn btn-primary mb-2" id="btnTabla1">Bocinas</button>
                        <button class="btn btn-primary mb-2" id="btnTabla2">Cargadores</button>
                        <button class="btn btn-primary mb-2" id="btnTabla3">Cables</button>
                        <button class="btn btn-primary mb-2" id="btnTabla4">Baterias</button>
                        <button class="btn btn-primary mb-2" id="btnTabla5">Audifonos</button>
                        <button class="btn btn-primary mb-2" id="btnTabla6">Adaptadores</button>
                    </div>
                    <!-- Sección de la tabla -->
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
                                <tr>
                                    <td>1</td>
                                    <td>Bocina JBL Flip 5</td>
                                    <td>Bocina portátil con sonido potente, resistente al agua.</td>
                                    <td>$1,500</td>
                                    <td>En stock</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/jbl-flip5.jpg" alt="Bocina JBL Flip 5" width="100"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Bose SoundLink Revolve</td>
                                    <td>Sonido envolvente 360 grados, diseño portátil.</td>
                                    <td>$3,200</td>
                                    <td>En stock</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/bose-soundlink.jpg" alt="Bose SoundLink Revolve" width="100"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sonos Move</td>
                                    <td>Bocina inteligente con integración de asistentes de voz.</td>
                                    <td>$4,500</td>
                                    <td>Agotado</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/sonos-move.jpg" alt="Sonos Move" width="100"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Ultimate Ears BOOM 3</td>
                                    <td>Bocina portátil resistente al agua con sonido envolvente.</td>
                                    <td>$2,000</td>
                                    <td>En stock</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/ue-boom3.jpg" alt="Ultimate Ears BOOM 3" width="100"></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Marshall Emberton</td>
                                    <td>Bocina portátil con diseño clásico y sonido nítido.</td>
                                    <td>$3,000</td>
                                    <td>En stock</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/marshall-emberton.jpg" alt="Marshall Emberton" width="100"></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Harman Kardon Onyx Studio 6</td>
                                    <td>Bocina con diseño elegante y sonido de alta calidad.</td>
                                    <td>$3,800</td>
                                    <td>Agotado</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/hk-onyx6.jpg" alt="Harman Kardon Onyx Studio 6" width="100"></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>JBL Charge 4</td>
                                    <td>Bocina portátil con batería de larga duración y sonido potente.</td>
                                    <td>$2,500</td>
                                    <td>En stock</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/jbl-charge4.jpg" alt="JBL Charge 4" width="100"></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Sony SRS-XB43</td>
                                    <td>Bocina con sonido extra bass y luces LED personalizables.</td>
                                    <td>$3,000</td>
                                    <td>En stock</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/sony-srs-xb43.jpg" alt="Sony SRS-XB43" width="100"></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Amazon Echo (4ta Gen)</td>
                                    <td>Bocina inteligente con Alexa integrada y sonido envolvente.</td>
                                    <td>$2,200</td>
                                    <td>En stock</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/amazon-echo4.jpg" alt="Amazon Echo 4ta Gen" width="100"></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Anker Soundcore 2</td>
                                    <td>Bocina portátil económica con excelente rendimiento de batería.</td>
                                    <td>$1,200</td>
                                    <td>En stock</td>
                                    <td>2024-10-16</td>
                                    <td><img src="https://example.com/anker-soundcore2.jpg" alt="Anker Soundcore 2" width="100"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
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
</body>

</html>
