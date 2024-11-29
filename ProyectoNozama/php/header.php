<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>NOZAMA</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/plantilla.css">
</head>

<body>
    <!--Header-->
    <header class="container mb-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="./main.php">
                    <img src="../img/logo/logo.png" alt="NOZAMA Logo" width="40px" height="40px" class="me-2">
                    <span class="fs-4">NOZAMA</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex mx-auto" role="search" style="width: 50%;" action="main.php" method="GET">
                        <input class="form-control me-2" type="search" id="query" name="query"
                            placeholder="Buscar productos o categorías..." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <?php if (isset($_SESSION['correo'])): ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle fs-5"></i> <?php echo $_SESSION['correo']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="configuracion.php">Configuración de cuenta</a></li>
                                <li><a class="dropdown-item" href="pedido.php">Pedidos</a></li>
                                <li><a class="dropdown-item" href="#" id="logout">Cerrar sesión</a></li>
                            </ul>
                        <?php else: ?>
                            <a class="nav-link" href="login.php">
                                <i class="bi bi-person-circle fs-5"></i> Iniciar Sesión
                            </a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="./carrito.php">
                            <i class="bi bi-cart4 fs-5"></i> Carrito
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>
                                <span class="visually-hidden">productos en carrito</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <nav class="navbar nav-underline navbar-expand-lg submenu">
        <div class="container-fluid">
            <ul class="navbar-nav nav-fill w-100 me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="main.php#bocinas"><i class="bi bi-speaker fs-5"></i>
                        Bocinas</a></li>
                <li class="nav-item"><a class="nav-link" href="main.php#cargadores"><i
                        class="bi bi-battery-charging fs-5"></i> Cargadores</a></li>
                <li class="nav-item"><a class="nav-link" href="main.php#cables"><i class="bi bi-bezier fs-5"></i>
                        Cables</a></li>
                <li class="nav-item"><a class="nav-link" href="main.php#baterias"><i
                        class="bi bi-battery-full fs-5"></i> Baterías</a></li>
                <li class="nav-item"><a class="nav-link" href="main.php#audifonos"><i class="bi bi-headphones fs-5"></i>
                        Audífonos</a></li>
                <li class="nav-item"><a class="nav-link" href="main.php#adaptadores"><i class="bi bi-plug fs-5"></i>
                        Adaptadores</a></li>
            </ul>
        </div>
    </nav>

    <!-- Modal de confirmación de cierre de sesión -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirmación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Seguro que quieres salir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmLogout">Salir</button>
            </div>
        </div>
    </div>
</div>

    <script>
    function buscarProductos(event) {
        event.preventDefault();
        const query = document.getElementById('query').value.toLowerCase();
        window.location.href = `main.php?query=${query}`;
    }

    document.getElementById('logout').addEventListener('click', function(event) {
    event.preventDefault();
    var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
    logoutModal.show();
});

document.getElementById('confirmLogout').addEventListener('click', function() {
    window.location.href = './logout.php';
});
    </script>
</body>
</html>