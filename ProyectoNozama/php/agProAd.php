<?php
$servidor = "localhost";
$usuario = "rogelio";  
$contrasena = "ROger1";  
$base_de_datos = "Nozama"; 

$conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar datos del formulario
$nombre = $_POST['nombreProducto'];
$precio = $_POST['precioProducto'];
$descripcion = $_POST['descripcionProducto'];
$disponibilidad = $_POST['disponibilidadProducto'];
$cantidad = $_POST['cantidadProducto'];
$fecha_creacion = $_POST['fechaCreacionProducto'];
$categoria = $_POST['idCategoria'];

// Manejar la imagen
if ($_FILES['imagenProducto']['name']) {
    $imagen = addslashes(file_get_contents($_FILES['imagenProducto']['tmp_name']));
} else {
    $imagen = NULL;
}

// Consulta para insertar los datos
$sql = "INSERT INTO productos (nombre, precio, descripcion, disponible, cantidad, fecha_creacion, Id_categoria, imagen) 
        VALUES ('$nombre', '$precio', '$descripcion', '$disponibilidad', '$cantidad', '$fecha_creacion', '$categoria', '$imagen')";

if ($conn->query($sql) === TRUE) {
    // Redireccionar con mensaje de éxito
    header("Location: crudAdmin.php?mensaje=success");
} else {
    // Redireccionar con mensaje de error
    header("Location: crudAdmin.php?mensaje=error");
}

$conn->close();
?>


