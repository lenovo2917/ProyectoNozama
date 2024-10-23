<?php
// Incluir el archivo de conexión
include 'conexion.php'; 

// Consulta para obtener los productos disponibles
$sql = "SELECT Nombre, descripcion, precio, cantidad, imagen FROM Productos WHERE Id_categoria = 4";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    echo '<div class="carousel-inner">';

    // Variables para controlar las secciones de 3 productos
    $firstItem = true;
    $contador = 0;

    // Iniciar la primera sección del carrusel
    if ($firstItem) {
        echo '<div class="carousel-item active">';
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">'; // Iniciar la fila
        $firstItem = false;
    }

    // Iterar por los productos
    while ($producto = $resultado->fetch_assoc()) {
        // Convertir la imagen BLOB a base64
        $imagenBase64 = base64_encode($producto['imagen']);
        $imgSrc = 'data:image/jpeg;base64,' . $imagenBase64;

        // Mostrar la tarjeta de producto
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
            </div>';

        $contador++;

        // Si ya hemos agregado 3 productos en esta sección
        if ($contador % 3 == 0) {
            echo '</div></div>'; // Cerrar fila y carousel-item

            // Si quedan más productos, abrir una nueva sección del carrusel
            if ($contador < $resultado->num_rows) {
                echo '<div class="carousel-item">';
                echo '<div class="row row-cols-1 row-cols-md-3 g-4">'; // Nueva fila
            }
        }
    }

    // Si la última sección no tiene 3 productos, cerramos las etiquetas abiertas
    if ($contador % 3 != 0) {
        echo '</div></div>'; // Cerrar fila y carousel-item
    }

    echo '</div>';  // Cierre del .carousel-inner
} else {
    echo "No hay productos disponibles.";
}

$conn->close();
?>
