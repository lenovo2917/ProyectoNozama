<?php
$servidor = "localhost";
$usuario = "root";  
$contrasena = "root";  
$base_de_datos = "Nozama"; 

$conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo '<div class="alert alert-success text-center" role="alert">
            Conexión exitosa 
          </div>';
}
?>
