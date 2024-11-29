<?php
session_start();
?>


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
    <header class="container mb-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="../img/logo/logo.png" alt="NOZAMA Logo" width="40px" height="40px" class="me-2">
                    <span class="fs-4">NOZAMA</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <?php if (isset($_SESSION['correo'])): ?>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle fs-5"></i> <?php echo $_SESSION['correo']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    
                                    <li><a class="dropdown-item" href="logout.php" id="logout">Cerrar sesión</a></li>
                                </ul>
                            <?php else: ?>
                                <a class="nav-link" href="login.php">
                                    <i class="bi bi-person-circle fs-5"></i> Iniciar Sesión
                                </a>
                            <?php endif; ?>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <!--Main o contenido-->
    <main class="container mt-4">
    <div class="row">
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Añadir producto al inventario:</h5>
                    <form action="agProAd.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="nombreProducto">Nombre:</label>
                            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Ingresa el nombre del producto" required>
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
                    <h5 class="card-title">Modificar producto del inventario:</h5>
                    <form action="modProAd.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="idProducto">ID:</label>
                            <input type="number" class="form-control" id="idProducto" name="idProducto" placeholder="Ingresa el id para ubicar producto" required onblur="buscarProducto()">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nProducto">Nombre:</label>
                            <input type="text" class="form-control" id="nProducto" name="nProducto"  required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="pProducto">Precio:</label>
                            <input type="number" class="form-control" id="pProducto" name="pProducto"  required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dProducto">Descripción:</label>
                            <textarea class="form-control" id="dProducto" name="dProducto" rows="3"  required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="disProducto">Disponibilidad:</label>
                            <input type="number" class="form-control" id="disProducto" name="disProducto" placeholder="Valores de 0 y 1" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cProducto">Cantidad:</label>
                            <input type="number" class="form-control" id="cProducto" name="cProducto"  required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="fCreacionProducto">Fecha de Creación:</label>
                            <input type="date" class="form-control" id="fCreacionProducto" name="fCreacionProducto" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="idC">Categoría:</label>
                            <input type="number" class="form-control" id="idC" name="idC" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="imaProducto">Imagen:</label>
                            <input type="file" class="form-control" id="imaProducto" name="imaProducto" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Modificar producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-30 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Eliminar algún producto</h5>
                    <form action="eliProdAdmin.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="idDelProducto">ID:</label>
                            <input type="text" class="form-control" id="idDelProducto" name="idDelProducto" placeholder="Ingresa el ID del producto">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-danger">Eliminar producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-12 mb-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Listado de productos</h5>
                <div class="d-flex flex-wrap justify-content-between mb-3">
                    <button class="btn btn-primary mb-2" id="1">Bocinas</button>
                    <button class="btn btn-primary mb-2" id="2">Cargadores</button>
                    <button class="btn btn-primary mb-2" id="3">Cables</button>
                    <button class="btn btn-primary mb-2" id="4">Baterías</button>
                    <button class="btn btn-primary mb-2" id="5">Audífonos</button>
                    <button class="btn btn-primary mb-2" id="6">Adaptadores</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Disponibilidad</th>
                                <th>Cantidad</th>
                                <th>Fecha Creación</th>
                                <th>Categoria</th>
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

    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const mensaje1 = urlParams.get('mensaje1');

            if (mensaje1 === 'success') {
                alert("Producto eliminado correctamente.");
            } else if (mensaje1 === 'error') {
                alert("Error al eliminar el producto.");
            }
        }
    </script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("button.btn-primary").forEach(button => {
        button.addEventListener("click", () => {
            const categoriaId = button.id;
            console.log("Botón presionado, Id de categoría:", categoriaId); // Mensaje de depuración
            fetchProducts(categoriaId);
        });
    });
});

function fetchProducts(categoriaId) {
    fetch(`http://127.0.0.1/ProyectoNozama/ProyectoNozama/php/mosProAdmin.php?categoriaId=${categoriaId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error("Error en la respuesta de la red");
            }
            return response.json();
        })
        .then(data => {
            const tablaContenido = document.getElementById("tablaContenido");
            tablaContenido.innerHTML = ""; // Limpiar la tabla antes de agregar nuevos datos

            data.forEach(product => {
                const row = `
                    <tr>
                        <td>${product.Id}</td>
                        <td>${product.Nombre}</td>
                        <td>${product.precio}</td>
                        <td>${product.descripcion}</td>
                        <td>${product.disponible == 1 ? 'Disponible' : 'No Disponible'}</td>
                        <td>${product.cantidad}</td>
                        <td>${product.fecha_creacion}</td>
                        <td>${product.Id_categoria}</td>
                        <td><img src="data:image/jpeg;base64,${product.imagen}" width="50" height="50"></td>
                    </tr>
                `;
                tablaContenido.insertAdjacentHTML("beforeend", row); // Añadir fila a la tabla
            });
        })
        .catch(error => console.error("Error al obtener productos:", error));
}
</script>

<script>
function buscarProducto() {
    const idProducto = document.getElementById("idProducto").value;

    if (idProducto) {
        // Llamada AJAX usando Fetch API
        fetch(`buscarProducto.php?idProducto=${idProducto}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Llenar los campos del formulario
                    document.getElementById("nProducto").value = data.Nombre || "";
                    document.getElementById("pProducto").value = data.precio || "";
                    document.getElementById("dProducto").value = data.descripcion || "";
                    document.getElementById("disProducto").value = data.disponible || "";
                    document.getElementById("cProducto").value = data.cantidad || "";
                    document.getElementById("fCreacionProducto").value = data.fecha_creacion || "";
                    document.getElementById("idC").value = data.Id_categoria || "";
                }
            })
            .catch(error => {
                console.error("Error al buscar el producto:", error);
                alert("Error al buscar el producto. Intenta nuevamente.");
            });
    }
}
</script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</body>
</html>
