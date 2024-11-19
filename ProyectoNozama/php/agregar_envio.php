<?php
// Incluir archivo de conexión
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $tipo = "Express";
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $id_cliente = $_POST['id_cliente'];

    // Consulta SQL para agregar la dirección
    $sql = "INSERT INTO Envio (Tipo, DireccionEnvio, CP, Telefono, Estado, Id_Cliente) VALUES (?, ?, ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssi", $tipo, $direccion, $cp, $telefono, $estado, $id_cliente);
        if ($stmt->execute()) {
            echo "Dirección de envío agregada correctamente.";
            header("Location: carrito.php");
        } else {
            echo "Error al agregar la dirección de envío.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }
}
?>
