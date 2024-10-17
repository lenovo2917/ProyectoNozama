<?php include './header.php'; ?>
<link rel="stylesheet" href="../css/main.css">

<main class="container">
    <div class="row">
        <div class="col">
            <!-- Carrusel de productos electrónicos -->
            <div id="carouselExampleControls" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/carruseles/001.jpg" class="d-block w-100" alt="Producto 1">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/carruseles/002.jpg" class="d-block w-100" alt="Producto 2">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/carruseles/003.jpg" class="d-block w-100" alt="Producto 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



            <!-- Sección de Beneficios -->
            <section class="container py-5">
                <div class="row text-center">
                    <div class="col-md-4">
                        <i class="bi bi-credit-card fs-1 mb-3"></i>
                        <h5 class="fw-bold">Elige cómo pagar</h5>
                        <p>Puedes pagar con tarjeta, débito, efectivo o con Meses sin Tarjeta.</p>
                        <a href="#" class="text-primary text-decoration-none">Cómo pagar con Mercado Pago</a>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-box-seam fs-1 mb-3"></i>
                        <h5 class="fw-bold">Envío gratis desde $299</h5>
                        <p>Al registrarte en NOZAMA tienes envíos gratis en miles de productos.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="bi bi-shield-lock fs-1 mb-3"></i>
                        <h5 class="fw-bold">Seguridad, de principio a fin</h5>
                        <p>No te gusta? ¡Devuélvelo! En NOZAMA, no hay nada que no puedas hacer, porque estás siempre
                            protegido.</p>
                        <a href="#" class="text-primary text-decoration-none">Cómo te protegemos</a>
                    </div>
                </div>
            </section>

            <!-- Banner -->
            <div class="row mb-4">
                <div class="col">
                    <img src="../img/banners/00002.jpg" class="img-fluid" alt="Banner Promocional">
                </div>
            </div>

            <!-- Sección de Bocinas -->
            <section id="bocinas" class="category-section mb-5">
                <h2>Bocinas</h2>
                <div id="bocinasCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicadores (bolitas) -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#bocinasCarousel" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#bocinasCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#bocinasCarousel" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">
                        <?php include './tarjetas_bocinas.php'; ?>
                        <?php include './; '?> <!--Rogelio: faltó una comilla ahí, tons se dañaba el resto del codigo xd-->
                    </div>
                </div>
            </section>






            <!-- Sección de Cargadores -->
            <section id="cargadores" class="category-section mb-5">
                <h2>Cargadores</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Tarjetas de productos de cargadores -->
                    <!-- Reemplazar con los productos específicos de esta categoría -->
                </div>
            </section>

            <!-- Sección de Cables -->
            <section id="cables" class="category-section mb-5">
                <h2>Cables</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Tarjetas de productos de cables -->
                    <!-- Reemplazar con los productos específicos de esta categoría -->
                </div>
            </section>

            <!-- Sección de Baterías -->
            <section id="baterias" class="category-section mb-5">
                <h2>Baterías</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Tarjetas de productos de baterías -->
                    <!-- Reemplazar con los productos específicos de esta categoría -->
                </div>
            </section>

            <!-- Sección de Audífonos -->
            <section id="audifonos" class="category-section mb-5">
                <h2>Audífonos</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Tarjetas de productos de audífonos -->
                    <!-- Reemplazar con los productos específicos de esta categoría -->
                </div>
            </section>

            <!-- Sección de Adaptadores -->
            <section id="adaptadores" class="category-section mb-5">
                <h2>Adaptadores</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Tarjetas de productos de adaptadores -->
                    <!-- Reemplazar con los productos específicos de esta categoría -->
                </div>
            </section>
        </div>
    </div>
</main>
<?php include '../footer.php'; ?>