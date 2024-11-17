<?php
// Incluir archivo de conexión
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $banco = $_POST['banco'];
    $no_tarjeta = $_POST['no_tarjeta'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $cvv = $_POST['cvv'];
    $nombre_beneficiario = $_POST['nombre_beneficiario'];
    $id_cliente = $_POST['id_cliente'];

    // Consulta SQL para agregar la forma de pago
    $sql = "INSERT INTO Forma_Pago (Banco, No_Tarjeta, Fecha_Vencimiento, CVV, Nombre_beneficiario, Id_Cliente) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    // Preparar y ejecutar la consulta
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssi", $banco, $no_tarjeta, $fecha_vencimiento, $cvv, $nombre_beneficiario, $id_cliente); // "sssssi" indica los tipos de datos para cada parámetro
        if ($stmt->execute()) {
            // Redirigir a carrito.php si la inserción fue exitosa
            header("Location: carrito.php");
            exit();  // Detener la ejecución del script después de la redirección
        } else {
            echo "Error al agregar la forma de pago.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }
}
?>
