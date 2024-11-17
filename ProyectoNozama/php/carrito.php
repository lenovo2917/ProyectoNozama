<?php
include './header.php';
include './conexion.php';


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

<?php
    // Suponiendo que tienes el ID del cliente en la sesión
    $id_cliente = $_SESSION['id_cliente'];

    // Consulta los envíos y formas de pago asociadas al cliente
    $query_envios = "SELECT * FROM Envio WHERE Id_Cliente = $id_cliente";
    $query_formas_pago = "SELECT * FROM Forma_Pago WHERE Id_Cliente = $id_cliente";

    $result_envios = mysqli_query($conn, $query_envios);
    $result_formas_pago = mysqli_query($conn, $query_formas_pago);

    $envios = mysqli_fetch_all($result_envios, MYSQLI_ASSOC);
    $formas_pago = mysqli_fetch_all($result_formas_pago, MYSQLI_ASSOC);
?>



<link rel="stylesheet" href="../css/main.css">
<script src="../js/pago.js" defer></script>

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

                <div class="row">
                    <div class="col-md-6">
                        <h5>Selecciona una Dirección de Envío</h5>
                        <?php if (!empty($envios)) { ?>
                            <?php foreach ($envios as $envio) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="id_envio" id="envio_<?php echo $envio['Id_Envio']; ?>" 
                                        value="<?php echo $envio['Id_Envio']; ?>">
                                    <label class="form-check-label" for="envio_<?php echo $envio['Id_Envio']; ?>">
                                        <?php echo $envio['DireccionEnvio'] . ' (' . $envio['Tipo'] . ')'; ?>
                                    </label>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p>No tienes direcciones de envío. Agrega una nueva:</p>
                            <form action="agregar_envio.php" method="POST">
                                <input type="text" name="direccion" placeholder="Dirección" required>
                                <input type="text" name="cp" placeholder="Código Postal" required>
                                <input type="text" name="telefono" placeholder="Teléfono" maxlength="10" required>
                                <input type="text" name="estado" placeholder="Estado" required>
                                <input type="hidden" name="id_cliente" value="<?php echo $_SESSION['id_cliente']; ?>"> <!-- Si tienes un sistema de sesiones -->
                                <button type="submit" class="btn btn-primary">Agregar Dirección</button>
                            </form>
                        <?php } ?>
                    </div>

                    <div class="col-md-6">
                        <h5>Selecciona una Forma de Pago</h5>
                        <?php if (!empty($formas_pago)) { ?>
                            <?php foreach ($formas_pago as $pago) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="id_forma_pago" id="pago_<?php echo $pago['Id_FormaPago']; ?>" 
                                        value="<?php echo $pago['Id_FormaPago']; ?>">
                                    <label class="form-check-label" for="pago_<?php echo $pago['Id_FormaPago']; ?>">
                                        <?php echo $pago['Banco'] . ' - ' . $pago['No_Tarjeta']; ?>
                                    </label>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p>No tienes formas de pago registradas. Agrega una nueva:</p>
                            <form action="agregar_forma_pago.php" method="POST">
                                <input type="text" name="banco" placeholder="Banco" required>
                                <input type="text" name="no_tarjeta" placeholder="Número de Tarjeta" maxlength="16" required>
                                <input type="text" name="fecha_vencimiento" placeholder="Fecha de Vencimiento (MM/YY)" required>
                                <input type="text" name="cvv" placeholder="CVV" maxlength="3" required>
                                <input type="text" name="nombre_beneficiario" placeholder="Nombre del Beneficiario" required>
                                <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>"> <!-- Puedes incluir esto como un campo oculto si el id_cliente ya está disponible -->
                                <button type="submit" class="btn btn-primary">Agregar Forma de Pago</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>


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
                                <!-- Formulario de resumen -->
                                <form action="procesar_pedido.php" method="POST">
                                    <input type="hidden" name="total_productos" value="<?php echo $total_productos; ?>">
                                    <input type="hidden" name="total_precio" value="<?php echo $total_precio; ?>">
                                    <input type="hidden" name="id_envio" value="">
                                    <input type="hidden" name="id_forma_pago" value="">
                                    <button type="submit" id="boton_pago" class="btn btn-primary mt-3 w-100" disabled>Proceder al Pago</button>
                                </form>
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