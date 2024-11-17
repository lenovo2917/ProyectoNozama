<?php
session_start();
require '../Controlador/InfoPedido.php'; 

// Obtener el carrito y los datos del cliente desde la sesión
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
if (isset($_SESSION['id_cliente'])) {
    $id_cliente = $_SESSION['id_cliente'];
} else {
    die("Error: No se encontró el ID del cliente.");
}

// Verificar si se ha seleccionado la forma de pago y el envío
$id_forma_pago = isset($_POST['id_forma_pago']) ? $_POST['id_forma_pago'] : null;
$id_envio = isset($_POST['id_envio']) ? $_POST['id_envio'] : null;

if (!$id_forma_pago || !$id_envio) {
    die("Error: Forma de pago o método de envío no especificado.");
}

// Verificar que el carrito no esté vacío
if (!empty($carrito)) {
    // Total de productos y precio obtenidos del POST
    $total_productos = $_POST['total_productos'];
    $total_precio = $_POST['total_precio'];

    // Insertar en la tabla carrito
    $query_carrito = "INSERT INTO carrito (precio, Id_FormaPago, Id_Envio) 
                      VALUES (?, ?, ?)";
    $stmt_carrito = $conn->prepare($query_carrito);
    $stmt_carrito->bind_param("dii", $total_precio, $id_forma_pago, $id_envio);
    
    if ($stmt_carrito->execute()) {
        $id_carrito = $stmt_carrito->insert_id; // Obtener el ID del carrito recién creado

        // Insertar cada producto en el detalle del carrito
        foreach ($carrito as $producto) {
            // Verificar si el producto existe en la tabla productos
            $producto_id = $producto['Id'];
            $query_producto = "SELECT Id, Precio FROM productos WHERE Id = ?";
            $stmt_producto = $conn->prepare($query_producto);
            $stmt_producto->bind_param("i", $producto_id);
            $stmt_producto->execute();
            $resultado = $stmt_producto->get_result();

            if ($resultado->num_rows > 0) {
                // Producto existe, obtener el precio
                $row = $resultado->fetch_assoc();
                $precio_producto = $row['Precio'];
                
                // Insertar en detalle_carrito
                $query_detalle_carrito = "INSERT INTO detalle_carrito (Id_Carrito, Id_Producto, Cantidad, Precio) 
                                          VALUES (?, ?, ?, ?)";
                $stmt_detalle_carrito = $conn->prepare($query_detalle_carrito);
                $stmt_detalle_carrito->bind_param("iiid", $id_carrito, $producto_id, $producto['cantidad'], $precio_producto);
                if (!$stmt_detalle_carrito->execute()) {
                    echo "Error al agregar el producto al detalle del carrito: " . $stmt_detalle_carrito->error . "<br>";
                }
            } else {
                echo "El producto con ID $producto_id no existe en la tabla productos. <br>";
            }
        }

        // Inserta el pedido en la tabla `pedido` con el Id_Carrito
        $query_pedido = "INSERT INTO pedido (Id_Cliente, Total, Estado, Fecha, Id_Carrito) 
                         VALUES (?, ?, 0, NOW(), ?)";
        $stmt_pedido = $conn->prepare($query_pedido);
        $stmt_pedido->bind_param("idi", $id_cliente, $total_precio, $id_carrito); // Asegúrate de incluir Id_Carrito
        $stmt_pedido->execute();
        $id_pedido = $stmt_pedido->insert_id; // Obtener el ID del pedido recién creado

        // Limpia el carrito después de realizar el pedido
        unset($_SESSION['carrito']);
        
        // Redirige a pedido.php para visualizar el pedido
        header("Location: pedido.php");
        exit();
    } else {
        echo "Error al agregar el carrito: " . $stmt_carrito->error . "<br>";
    }
} else {
    echo "El carrito está vacío.";
}
?>
