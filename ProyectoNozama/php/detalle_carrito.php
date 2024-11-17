<?php
    include './header.php';
    require '../Controlador/InfoPedido.php';

    // Recibir el id_carrito desde la URL
    $id_carrito = $_GET['Id_Carrito'] ?? null;

    // Inicializar el array de productos
    $productos = [];

    // Verificar si se ha proporcionado un id_carrito
    if ($id_carrito) {
        // Consulta para obtener los productos del carrito
        $query = "SELECT P.Nombre AS ProductoNombre, D.Cantidad, P.Precio, P.Imagen 
                  FROM detalle_carrito D 
                  JOIN productos P ON D.Id_Producto = P.Id
                  WHERE D.Id_Carrito = ?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_carrito); // Se pasa el id_carrito como parámetro
        $stmt->execute();
        $result = $stmt->get_result();

        // Recuperar los resultados
        $productos = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "<p>No se proporcionó un ID de carrito válido.</p>";
    }
?>

<main class="container">
    <div class="row">
        <div class="col">
            <h2>Productos en el Carrito</h2>

            <?php 
                if (!empty($productos)) {
                    echo '<table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';
                    foreach ($productos as $producto) {
                        $total_producto = $producto['Precio'] * $producto['Cantidad'];
                        echo '<tr>
                                <td><img src="../img/productos/' . $producto['Imagen'] . '" alt="' . $producto['ProductoNombre'] . '" class="img-fluid" style="max-width: 100px;"></td>
                                <td>' . $producto['ProductoNombre'] . '</td>
                                <td>' . $producto['Cantidad'] . '</td>
                                <td>$' . number_format($producto['Precio'], 2) . '</td>
                                <td>$' . number_format($total_producto, 2) . '</td>
                              </tr>';
                              
                    }
                    echo '</tbody></table>
                    <form action="pedido.php" method="get">
                        <button type="submit" class="btn btn-primary">Volver a Pedidos</button>
                    </form>';
                } else {
                    echo "<p>No se encontraron productos para este carrito.</p>";
                }
            ?>
        </div>
    </div>
</main>

<?php include './footer.php'; ?>
