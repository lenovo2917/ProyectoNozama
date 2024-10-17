<?php
session_start();

// Verificar si se pasó el índice del producto
if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index = (int) $_GET['index'];

    // Verificar que el índice existe en el carrito
    if (isset($_SESSION['carrito'][$index])) {
        // Eliminar el producto del carrito
        array_splice($_SESSION['carrito'], $index, 1);
    }
}

// Redirigir de nuevo al carrito
header('Location: carrito.php');
exit;
