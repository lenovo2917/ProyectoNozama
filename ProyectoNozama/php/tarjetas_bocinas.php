<?php
// Incluir el archivo de conexión
include 'conexion.php'; 

// Consulta para obtener los productos disponibles
$sql = "SELECT Nombre, descripcion, precio, cantidad, imagen FROM Productos WHERE disponible = 1";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo '<div class="carousel-inner">';

    // Primer producto se marca como "active"
    $firstItem = true;

    while ($producto = $resultado->fetch_assoc()) {
        if ($firstItem) {
            echo '<div class="carousel-item active">';
            $firstItem = false;
        } else {
            echo '<div class="carousel-item">';
        }

        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';

        // Convertir la imagen BLOB a base64
        $imagenBase64 = base64_encode($producto['imagen']);
        $imgSrc = 'data:image/jpeg;base64,' . $imagenBase64; // Cambia "jpeg" por el tipo correcto si es diferente

        echo '<div class="col">
                <div class="card h-100">
                    <img src="' . $imgSrc . '" class="card-img-top" alt="' . $producto["Nombre"] . '">
                    <div class="card-body">
                        <h5 class="card-title">' . $producto["Nombre"] . '</h5>
                        <p class="card-text">' . $producto["descripcion"] . '</p>
                        <h6 class="card-subtitle mb-2 text-muted">$' . $producto["precio"] . '</h6>
                        <p class="card-text">Cantidad disponible: ' . $producto["cantidad"] . '</p>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-primary w-100">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>';
    }
    echo '</div>';  // Cierre del .carousel-inner
} else {
    echo "No hay productos disponibles.";
}

$conn->close();
?>
