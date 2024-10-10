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
                        <!-- Primera fila de productos (3 productos) -->
                        <div class="carousel-item active">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/500x300?text=Producto+1"
                                            class="card-img-top" alt="Bocina 1">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocina 1</h5>
                                            <p class="card-text">Descripción breve de la bocina 1, sus características y
                                                detalles técnicos.</p>
                                            <h6 class="card-subtitle mb-2 text-muted">$59.99</h6>
                                            <div class="rating mb-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                (120 reseñas)
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/500x300?text=Producto+2"
                                            class="card-img-top" alt="Bocina 2">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocina 2</h5>
                                            <p class="card-text">Descripción breve de la bocina 2, sus características y
                                                detalles técnicos.</p>
                                            <h6 class="card-subtitle mb-2 text-muted">$79.99</h6>
                                            <div class="rating mb-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-half text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                (85 reseñas)
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/500x300?text=Producto+3"
                                            class="card-img-top" alt="Bocina 3">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocina 3</h5>
                                            <p class="card-text">Descripción breve de la bocina 3, sus características y
                                                detalles técnicos.</p>
                                            <h6 class="card-subtitle mb-2 text-muted">$99.99</h6>
                                            <div class="rating mb-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                (200 reseñas)
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Segunda fila de productos (3 productos) -->
                        <div class="carousel-item">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/500x300?text=Producto+4"
                                            class="card-img-top" alt="Bocina 4">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocina 4</h5>
                                            <p class="card-text">Descripción breve de la bocina 4, sus características y
                                                detalles técnicos.</p>
                                            <h6 class="card-subtitle mb-2 text-muted">$89.99</h6>
                                            <div class="rating mb-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                (60 reseñas)
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/500x300?text=Producto+5"
                                            class="card-img-top" alt="Bocina 5">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocina 5</h5>
                                            <p class="card-text">Descripción breve de la bocina 5, sus características y
                                                detalles técnicos.</p>
                                            <h6 class="card-subtitle mb-2 text-muted">$129.99</h6>
                                            <div class="rating mb-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                (100 reseñas)
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/500x300?text=Producto+6"
                                            class="card-img-top" alt="Bocina 6">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocina 6</h5>
                                            <p class="card-text">Descripción breve de la bocina 6, sus características y
                                                detalles técnicos.</p>
                                            <h6 class="card-subtitle mb-2 text-muted">$149.99</h6>
                                            <div class="rating mb-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                (250 reseñas)
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tercera fila de productos (2 productos) -->
                        <div class="carousel-item">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/500x300?text=Producto+7"
                                            class="card-img-top" alt="Bocina 7">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocina 7</h5>
                                            <p class="card-text">Descripción breve de la bocina 7, sus características y
                                                detalles técnicos.</p>
                                            <h6 class="card-subtitle mb-2 text-muted">$109.99</h6>
                                            <div class="rating mb-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                (90 reseñas)
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="https://via.placeholder.com/500x300?text=Producto+8"
                                            class="card-img-top" alt="Bocina 8">
                                        <div class="card-body">
                                            <h5 class="card-title">Bocina 8</h5>
                                            <p class="card-text">Descripción breve de la bocina 8, sus características y
                                                detalles técnicos.</p>
                                            <h6 class="card-subtitle mb-2 text-muted">$139.99</h6>
                                            <div class="rating mb-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-half text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                (170 reseñas)
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<?php include './footer.php'; ?>