<?php
$servidor = "localhost";
$usuario = "root";  
$contrasena = ""; 
$base_de_datos = "Nozama"; 

try {
    // Crear una nueva conexión a MySQL
    $conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

    // Verificar la conexión
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }
} catch (Exception $e) {
    echo '  <div class="alert alert-danger" role="alert">
    ' . htmlspecialchars($e->getMessage()) . '
    </div>';
}
?>
