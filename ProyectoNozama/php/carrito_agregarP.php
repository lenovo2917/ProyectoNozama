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
    ],
    3 => [
        'id' => 3,
        'nombre' => 'Producto 3',
        'descripcion' => 'Descripción del producto 3',
        'precio' => 300.00,
        'imagen' => 'producto3.jpg'
    ]
];

// Función para obtener un producto por su índice (ID)
function obtenerProductoPorId($id) {
    global $productos_disponibles; // Usa el array global de productos
    return isset($productos_disponibles[$id]) ? $productos_disponibles[$id] : null;
}

// Verificar si se pasó el ID del producto a agregar al carrito (GET)
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $producto = obtenerProductoPorId($id);

    if ($producto) {
        $producto['cantidad'] = 1; // Inicializar la cantidad

        // Inicializar el carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Verificar si el producto ya está en el carrito
        $encontrado = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] === $producto['id']) {
                $item['cantidad'] += 1; // Incrementar cantidad si ya está en el carrito
                $encontrado = true;
                break;
            }
        }

        // Si el producto no está en el carrito, añadirlo
        if (!$encontrado) {
            $_SESSION['carrito'][] = $producto;
        }
    }

    // Redirigir de vuelta a la página del carrito
    header('Location: carrito.php');
    exit();
}

// Verificar si se pasó el índice del producto y la cantidad a actualizar (POST)
if (isset($_POST['index']) && isset($_POST['cantidad_agregar'])) {
    $index = (int)$_POST['index'];
    $cantidadAgregar = intval($_POST['cantidad_agregar']);

    // Asegurarse de que el carrito exista
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$index])) {
        // Si el producto ya existe, solo se actualiza la cantidad
        $_SESSION['carrito'][$index]['cantidad'] += $cantidadAgregar;
    } else {
        // Si el producto no está en el carrito, se obtiene y agrega
        $producto = obtenerProductoPorId($index); // Obtener producto por índice (ID)
        if ($producto) {
            $producto['cantidad'] = $cantidadAgregar; // Establecer la cantidad inicial
            $_SESSION['carrito'][$index] = $producto; // Agregar producto al carrito
        }
    }

    // Redirigir de vuelta al carrito
    header('Location: carrito.php');
    exit();
}
