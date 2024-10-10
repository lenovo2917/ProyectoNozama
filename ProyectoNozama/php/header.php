<!DOCTYPE html>
<html>
<head>
    <title>NOZAMA</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/plantilla.css">
</head>
<body>
<body>
    <!--Header-->
    <header class="container mb-5">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
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
                    <form class="d-flex mx-auto" role="search" style="width: 50%;">
                        <input class="form-control me-2" type="search" placeholder="Buscar productos..." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                    
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
            <li class="nav-item"><a class="nav-link" href="#bocinas"><i class="bi bi-speaker fs-5"></i> Bocinas</a></li>
            <li class="nav-item"><a class="nav-link" href="#cargadores"><i class="bi bi-battery-charging fs-5"></i> Cargadores</a></li>
            <li class="nav-item"><a class="nav-link" href="#cables"><i class="bi bi-bezier fs-5"></i> Cables</a></li>
            <li class="nav-item"><a class="nav-link" href="#baterias"><i class="bi bi-battery-full fs-5"></i> Baterías</a></li>
            <li class="nav-item"><a class="nav-link" href="#audifonos"><i class="bi bi-headphones fs-5"></i> Audífonos</a></li>
            <li class="nav-item"><a class="nav-link" href="#adaptadores"><i class="bi bi-plug fs-5"></i> Adaptadores</a></li>
        </ul>
    </div>
</nav>


        

    </header>
