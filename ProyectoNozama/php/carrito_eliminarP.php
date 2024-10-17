<!--Este archivo es backend-->
<?php
session_start();

// Asegurarse de que el índice y la cantidad estén establecidos
if (isset($_POST['index']) && isset($_POST['cantidad_eliminar'])) {
    $index = $_POST['index'];
    $cantidadEliminar = intval($_POST['cantidad_eliminar']);

    // Verificar si el carrito existe y si el índice es válido
    if (isset($_SESSION['carrito'][$index])) {
        // Obtener la cantidad actual del producto
        $producto = $_SESSION['carrito'][$index];
        $cantidadActual = intval($producto['cantidad']);

        // Asegurarse de que la cantidad a eliminar sea válida
        if ($cantidadEliminar > 0 && $cantidadEliminar <= $cantidadActual) {
            // Si la cantidad a eliminar es igual o menor que la cantidad actual
            if ($cantidadEliminar < $cantidadActual) {
                // Actualizar la cantidad
                $_SESSION['carrito'][$index]['cantidad'] -= $cantidadEliminar;
            } else {
                // Eliminar el producto del carrito si la cantidad es igual
                unset($_SESSION['carrito'][$index]);
            }
        }
    }
}

// Redirigir de vuelta al carrito
header("Location: carrito.php");
exit();
?>
