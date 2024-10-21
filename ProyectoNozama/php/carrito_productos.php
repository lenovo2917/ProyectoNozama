<?php
include './header.php';
session_start();


// nomás hay dos de prueba, después se sustituye por el php anterior al carrito
$productos = [
    [
        'id' => 1,
        'nombre' => 'Producto 1',
        'precio' => 100,
        'descripcion' => 'Descripción del producto 1',
        'imagen' => 'producto1.jpg'
    ],
    [
        'id' => 2,
        'nombre' => 'Producto 2',
        'precio' => 200,
        'descripcion' => 'Descripción del producto 2',
        'imagen' => 'producto2.jpg'
    ],
    [
        'id' => 3,
        'nombre' => 'Producto 3',
        'descripcion' => 'Descripción del producto 3',
        'precio' => 300.00,
        'imagen' => 'producto3.jpg'
    ]
];
?>

<div class="container">
    <h2>Productos</h2>
    <div class="row">
        <?php foreach ($productos as $producto) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="../img/productos/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                        <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                        <p class="card-text">$<?php echo number_format($producto['precio'], 2); ?></p>
                        <a href="carrito_agregarP.php?id=<?php echo $producto['id']; ?>" class="btn btn-primary">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php 
    include '../footer.php'; 
?>
