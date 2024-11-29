<?php
$servidor = "localhost";
$usuario = "rogelio";  
$contrasena = "ROger1";  
$base_de_datos = "Nozama"; 

$conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idProducto = $_POST['idProducto'];
    $nombreProducto = $_POST['nProducto'];
    $precioProducto = $_POST['pProducto'];
    $descripcionProducto = $_POST['dProducto'];
    $disponibilidadProducto = $_POST['disProducto'];
    $cantidadProducto = $_POST['cProducto'];
    $fechaCreacionProducto = $_POST['fCreacionProducto'];
    $idCategoria = $_POST['idC'];

    // Subir la imagen si fue seleccionada
    if (!empty($_FILES['imaProducto']['name'])) {
        $imagenProducto = $_FILES['imaProducto']['tmp_name'];
        $imagenProductoContenido = addslashes(file_get_contents($imagenProducto)); // CORRECCIÓN
        
        // Preparar la consulta incluyendo la imagen
        $stmt = $conn->prepare("UPDATE Productos SET 
                    Nombre = ?, 
                    precio = ?, 
                    descripcion = ?, 
                    disponible = ?, 
                    cantidad = ?, 
                    fecha_creacion = ?, 
                    Id_categoria = ?, 
                    imagen = ?
                WHERE Id = ?");
        $stmt->bind_param("sdssiissi", $nombreProducto, $precioProducto, $descripcionProducto, $disponibilidadProducto, $cantidadProducto, $fechaCreacionProducto, $idCategoria, $imagenProductoContenido, $idProducto);
    } else {
        // Preparar la consulta sin la imagen
        $stmt = $conn->prepare("UPDATE Productos SET 
                    Nombre = ?, 
                    precio = ?, 
                    descripcion = ?, 
                    disponible = ?, 
                    cantidad = ?, 
                    fecha_creacion = ?, 
                    Id_categoria = ?
                WHERE Id = ?");
        $stmt->bind_param("sdssiisi", $nombreProducto, $precioProducto, $descripcionProducto, $disponibilidadProducto, $cantidadProducto, $fechaCreacionProducto, $idCategoria, $idProducto);
    }

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: crudAdmin.php");
    } else {
        echo "Error al modificar el producto: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>

