<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "rogelio";
$contrasena = "ROger1";
$base_de_datos = "Nozama";

$conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['idProducto'])) {
    $idProducto = intval($_GET['idProducto']);

    $query = $conn->prepare("SELECT Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria FROM Productos WHERE Id = ?");
    $query->bind_param("i", $idProducto);
    $query->execute();
    $resultado = $query->get_result();

    if ($producto = $resultado->fetch_assoc()) {
        echo json_encode($producto); // Devolver los datos en formato JSON
    } else {
        echo json_encode(["error" => "Producto no encontrado"]);
    }

    $query->close();
}

$conn->close();
?>