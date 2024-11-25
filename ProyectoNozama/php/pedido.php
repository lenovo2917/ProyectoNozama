<?php 
    include './header.php'; 
    require '../Controlador/InfoPedido.php';

    // Obtener el ID del cliente desde la sesión
    $id_cliente = $_SESSION['id_cliente'] ?? null;

    if (!$id_cliente) {
        echo "Error: No se ha encontrado el ID del cliente en la sesión.";
        exit();
    }

    // Consulta para obtener todos los pedidos del cliente
    $query = "SELECT * FROM pedido WHERE Id_Cliente = ? ORDER BY fecha DESC"; // Ordenar por fecha (opcional)
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $result = $stmt->get_result();
    $pedidos = $result->fetch_all(MYSQLI_ASSOC);
?>

<main class="container"> 
    <div class="row">
        <div class="col">
            <?php 
                if (!empty($pedidos)) { 
                    foreach ($pedidos as $pedido) { ?>
                    <table class="table table-bordered mb-4">
                        <h2>Detalle Pedido</h2>
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Descripción</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="6" style="vertical-align: middle;">
                                    <img src="../img/pedido/pedido.png" alt="Imagen del Pedido" class="img-fluid" style="max-width: 150px; height: auto;">
                                </td>
                                <td><strong>Fecha:</strong></td>
                                <td><?php echo $pedido['fecha']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Total:</strong></td>
                                <td>$<?php echo $pedido['Total']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Estado:</strong></td>
                                <td>
                                    <span class="estado <?php echo $pedido['estado'] == 1 ? 'completado' : ($pedido['estado'] == 0 ? 'pendiente' : 'cancelado'); ?>">
                                        <?php echo ($pedido['estado'] == 1 ? 'Completado' : ($pedido['estado'] == 0 ? 'Pendiente' : 'Cancelado')); ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Carrito ID:</strong></td>
                                <td>
                                    <?php echo $pedido['Id_Carrito']; ?>
                                    <!-- Enlace para redirigir al detalle del carrito -->
                                    <a href="detalle_carrito.php?Id_Carrito=<?php echo $pedido['Id_Carrito']; ?>" class="btn btn-primary btn-sm">Ver Carrito</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } // Fin del foreach 
                } else { ?>
                    <div class="alert alert-warning" role="alert">
                        Usted no ha realizado pedidos :C 
                        <a href="./main.php" class="text-decoration-none">Empieza a
                        comprar</a>.
                    </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php include './footer.php'; ?>
