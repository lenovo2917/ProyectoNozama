<?php
$servidor = "localhost";
$usuario = "rogelio";  
$contrasena = "ROger1";  
$base_de_datos = "Nozama"; 

$conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
  
}

if (isset($_POST['idProducto'])) {
    $id = $_POST['idProducto'];
    $sql = "SELECT * FROM Productos WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Producto no encontrado.']);
    }    
}

$conn->close();
?>