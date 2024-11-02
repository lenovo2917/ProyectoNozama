<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "Nozama";

$conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$categoria_id = $_GET['categoria_id'];

$sql = "SELECT Id, Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria, imagen FROM Productos WHERE Id_categoria = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $categoria_id);
$stmt->execute();
$result = $stmt->get_result();

$productos = [];
while ($row = $result->fetch_assoc()) {
    $row['imagen'] = base64_encode($row['imagen']);  // Codifica la imagen en base64
    $productos[] = $row;
}

echo json_encode($productos);

$stmt->close();
$conn->close();
?>
