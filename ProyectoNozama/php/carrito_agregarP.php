<?php
session_start();

// Asegurarse de que el índice y la cantidad estén establecidos
if (isset($_POST['index']) && isset($_POST['cantidad_agregar'])) {
    $index = $_POST['index'];
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
        // Si el producto no está en el carrito, se agrega
        // Asumiendo que tienes un array de productos originales desde donde obtienes los datos
        // Aquí deberías obtener el producto completo basado en el index o el id
        $producto = obtenerProductoPorIndex($index); // Implementa esta función según tu lógica
        $producto['cantidad'] = $cantidadAgregar; // Establece la cantidad inicial
        $_SESSION['carrito'][$index] = $producto; // Agregar producto al carrito
    }
}

// Redirigir de vuelta al carrito
header("Location: carrito.php");
exit();

// Función para obtener el producto por index (debes implementarla según tu lógica)
function obtenerProductoPorIndex($index) {
    // Aquí deberías tener acceso a la lista de productos, 
    // esto puede ser desde una base de datos o un array en tu código
    // Por ejemplo:
    $productos = [
        // Ejemplo de array de productos
        // 'index' => ['nombre' => 'Producto 1', 'precio' => 100.00, 'descripcion' => 'Descripción', 'imagen' => 'imagen.jpg']
    ];
    
    return $productos[$index]; // Asegúrate de que el index sea válido
}
?>
