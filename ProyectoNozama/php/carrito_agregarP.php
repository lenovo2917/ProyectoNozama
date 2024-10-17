<?php
session_start();

// Simulación de datos de productos (en producción, deberías obtener esto de una base de datos)
$productos_disponibles = [
    1 => [
        'id' => 1,
        'nombre' => 'Producto 1',
        'descripcion' => 'Descripción del producto 1',
        'precio' => 100.00,
        'imagen' => 'producto1.jpg'
    ],
    2 => [
        'id' => 2,
        'nombre' => 'Producto 2',
        'descripcion' => 'Descripción del producto 2',
        'precio' => 200.00,
        'imagen' => 'producto2.jpg'
    ]
    // Añade más productos según sea necesario
];

// Verificar si se pasó el ID del producto
if (isset($_GET['id']) && isset($productos_disponibles[$_GET['id']])) {
    $id = (int)$_GET['id'];
    $producto = $productos_disponibles[$id];
    $producto['cantidad'] = 1; // Inicializar la cantidad

    // Inicializar el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Verificar si el producto ya está en el carrito
    $encontrado = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id'] === $producto['id']) {
            $item['cantidad'] += 1;
            $encontrado = true;
            break;
        }
    }

    // Si el producto no está en el carrito, añadirlo
    if (!$encontrado) {
        $_SESSION['carrito'][] = $producto;
    }
}

// Redirigir al carrito
header('Location: carrito.php');
exit;
