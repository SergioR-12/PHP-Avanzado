<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Productos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="background-color: antiquewhite;">
        <h1>Lista de Productos</h1>
        <div class="product-list">
            <?php include 'lectura-bd.php'; ?>
        </div>
    </div>
</body>
</html>

