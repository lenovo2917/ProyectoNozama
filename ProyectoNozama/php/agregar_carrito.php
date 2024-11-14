<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['id'];

// Obtener el carrito desde la sesión
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Conectar a la base de datos
include 'conexion.php';

// Obtener la información del producto desde la base de datos
$sql = "SELECT Id, Nombre, descripcion, precio, imagen FROM Productos WHERE Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();

if ($producto) {
    // Verificar si el producto ya está en el carrito
    $index = array_search($productId, array_column($_SESSION['carrito'], 'Id'));
    if ($index !== false) {
        // Si el producto ya está en el carrito, incrementar la cantidad
        $_SESSION['carrito'][$index]['cantidad']++;
    } else {
        // Si el producto no está en el carrito, agregarlo con cantidad 1
        $producto['cantidad'] = 1;
        $_SESSION['carrito'][] = $producto;
    }

    // Calcular el total de productos en el carrito
    $totalProductos = array_sum(array_column($_SESSION['carrito'], 'cantidad'));

    echo json_encode(['success' => true, 'totalProductos' => $totalProductos]);
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>