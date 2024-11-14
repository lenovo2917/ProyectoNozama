<?php
$servidor = "localhost";
$usuario = "rogelio";  
$contrasena = "ROger1";  
$base_de_datos = "Nozama"; 

$conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar y validar datos del formulario
$id = isset($_POST['idDelProducto']) ? intval($_POST['idDelProducto']) : 0;

    // Preparar la consulta para eliminar el registro
    $stmt = $conn->prepare("DELETE FROM Productos WHERE Id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redireccionar con mensaje de éxito
        header("Location: crudAdmin.php?mensaje1=success");
    } else {
        // Redireccionar con mensaje de error
        header("Location: crudAdmin.php?mensaje1=error");
    }

    $stmt->close();


$conn->close();
?>