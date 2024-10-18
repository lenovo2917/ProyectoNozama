<?php
include './header.php';
session_start();

// Obtiene el carrito desde la sesión
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$total_productos = count($carrito);
$total_precio = 0;

// Calcula el total del precio
foreach ($carrito as $producto) {
    $total_precio += $producto['cantidad'] * $producto['precio'];
}
?>

<link rel="stylesheet" href="../css/main.css">

<main class="container">
    <div class="row">
        <div class="col">
            <h2>Carrito de Compras</h2>

            <!-- Comprobar si hay productos en el carrito -->
            <?php if (!empty($carrito)) { ?>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Renderizar los productos del carrito -->
                        <?php foreach ($carrito as $index => $producto) { ?>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <img src="../img/productos/<?php echo $producto['imagen']; ?>" alt="Imagen del Producto"
                                             class="img-fluid" style="max-width: 100px; height: auto; margin-right: 15px;">
                                        <div>
                                            <h5><?php echo $producto['nombre']; ?></h5>
                                            <p class="text-muted"><?php echo $producto['descripcion']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <input type="number" class="form-control" value="<?php echo $producto['cantidad']; ?>"
                                           min="1" style="width: 70px;">
                                </td>
                                <td class="align-middle">$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td class="align-middle">$<?php echo number_format($producto['cantidad'] * $producto['precio'], 2); ?></td>
                                <td class="align-middle">
                                    <a href="carrito_eliminarP.php?index=<?php echo $index; ?>" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Resumen del carrito -->
                <div class="row">
                    <div class="col-md-6 offset-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Resumen del Pedido</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total productos:</span>
                                        <span><?php echo $total_productos; ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total:</span>
                                        <span>$<?php echo number_format($total_precio, 2); ?></span>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-primary mt-3 w-100">Proceder al Pago</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else { ?>
                <!-- Mensaje si el carrito está vacío -->
                <div class="alert alert-warning" role="alert">
                    Tu carrito está vacío. <a href="carrito_productos.php" class="text-decoration-none">Empieza a comprar</a>.
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php 
include '../footer.php'; ?>
