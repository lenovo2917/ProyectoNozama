<?php 
include '../php/header.php'; 
require '../Controlador/InfoPedido.php';
?>
<main class="container"> 
    <div class="row">
        <div class="col">
            <?php 
                // Verificar si se encontraron pedidos
                if (!empty($pedidos)) { ?>
                <?php foreach ($pedidos as $pedido) { ?>
                <table class="table table-bordered mb-4"> <!-- Añadir margen en la parte inferior -->
                <h2>Detalle Pedido</h2> <!-- Encabezado para toda la tabla -->
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
                                    <?php 
                                    echo ($pedido['estado'] == 1 ? 'Completado' : ($pedido['estado'] == 0 ? 'Pendiente' : 'Cancelado')); 
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Nombre del Cliente:</strong></td>
                            <td><?php echo $pedido['ClienteNombre']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><?php echo $pedido['Email']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Carrito ID:</strong></td>
                            <td><?php echo $pedido['Id_Carrito']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php } // Fin del foreach ?>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    No se encontraron pedidos para el cliente con ID <?php echo isset($id_cliente) ? $id_cliente : ''; ?>.
                </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php include '../php/footer.php'; ?>
