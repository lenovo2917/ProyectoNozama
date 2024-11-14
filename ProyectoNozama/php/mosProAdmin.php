<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "rogelio";
$password = "ROger1";
$dbname = "Nozama";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$categoriaId = isset($_GET['categoriaId']) ? intval($_GET['categoriaId']) : 0;

$sql = "SELECT Id, Nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria, imagen 
        FROM Productos 
        WHERE Id_categoria = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $categoriaId);
$stmt->execute();
$result = $stmt->get_result();

$productos = [];
while ($row = $result->fetch_assoc()) {
    $row['imagen'] = base64_encode($row['imagen']);  // Codificar la imagen en Base64
    $productos[] = $row;
}

$stmt->close();
$conn->close();

header("Content-Type: application/json");
echo json_encode($productos);
?>


