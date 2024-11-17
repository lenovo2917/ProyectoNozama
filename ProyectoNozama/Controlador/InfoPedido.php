<?php 
require '../php/conexion.php';

$pedidos = [];

// Obtener el ID 
if (isset($_GET['id_cliente'])) {
    $id_cliente = intval($_GET['Id_Cliente']);

    // Consulta detalles de todos los pedidos del cliente
    $sql = "SELECT P.*, DC.Nombre AS ClienteNombre, C.Correo AS Email
            FROM Pedido P
            INNER JOIN Cliente C ON P.Id_Cliente = C.Id_Cliente
            INNER JOIN Datos_Cliente DC ON C.Id_dato = DC.Id_dato
            WHERE P.Id_Cliente = ?"; 

    if ($stmt = $conn->prepare($sql)) {
        // Enlazar el parámetro de entrada (Id_Cliente)
        $stmt->bind_param("i", $id_cliente);
        
        // Ej consulta
        $stmt->execute();
        
        // resultado
        $result = $stmt->get_result();

        // Verificar si se encontraron pedidos
        if ($result->num_rows > 0) {
            // Obtener pedidos 
            while ($row = $result->fetch_assoc()) {
                $pedidos[] = $row; 
            }
        }

        $stmt->close(); // Cerrar
    }
} else {
    // Excepciones
}

//$conn->close();
?>
