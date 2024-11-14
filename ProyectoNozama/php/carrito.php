<?php 
include './header.php';

// Obtiene el carrito desde la sesión
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$total_productos = 0; // Cambiado para acumular cantidades
$total_precio = 0;

// Calcula el total del precio y la suma total de productos
foreach ($carrito as $producto) {
    $total_productos += $producto['cantidad']; // Acumula la cantidad total
    $total_precio += $producto['cantidad'] * $producto['precio'];
}
?>
<!--librería ajax, usarlo para que al agregar productos no actualice la página-->
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
                                        <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" alt="Imagen del Producto"
                                            class="img-fluid" style="max-width: 100px; height: auto; margin-right: 15px;">
                                        <div>
                                            <h5><?php echo $producto['Nombre']; ?></h5>
                                            <p class="text-muted"><?php echo $producto['descripcion']; ?></p>
                                        </div>
                                    </div>
                                </td>

                                <td class="align-middle">
                                    <form action="carrito_agregarP.php" method="POST">
                                        <input type="hidden" name="index" value="<?php echo $index; ?>">

                                        <input type="hidden" name="cantidad_agregar" class="form-control" value="1" min="1"
                                            max="<?php echo $producto['cantidad']; ?>"
                                            style="width: 70px; margin-bottom: 10px;">

                                        <input type="number" class="form-control" value="<?php echo $producto['cantidad']; ?>"
                                            min="1" style="width: 70px; margin-bottom: 10px;" readonly>

                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="bi bi-plus"></i> Agregar
                                        </button>
                                    </form>
                                </td>

                                <td class="align-middle">
                                    $<?php echo number_format($producto['precio'], 2); ?>
                                </td>

                                <td class="align-middle">
                                    $<?php echo number_format($producto['cantidad'] * $producto['precio'], 2); ?>
                                </td>

                                <td class="align-middle">
                                    <form action="carrito_eliminarP.php" method="POST">
                                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                                        <input type="number" name="cantidad_eliminar" class="form-control" value="1" min="1"
                                            max="<?php echo $producto['cantidad']; ?>"
                                            style="width: 70px; margin-bottom: 10px;">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
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
                <div class="alert alert-warning" role="alert">
                    Tu carrito está vacío. <a href="./main.php" class="text-decoration-none">Empieza a
                        comprar</a>.
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php
include './footer.php';
?>