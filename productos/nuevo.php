<?php
require_once __DIR__ . '/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarProducto($_POST['nombre'], $_POST['precio'], $_POST['descripcion']);
    if ($id) {
        header("Location: index.php?mensaje=Producto agregado con éxito");
        exit;
    } else {
        $error = "No se pudo agregar el producto.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Producto</title>
    <link rel="stylesheet" href="../config/style.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Producto</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre del Producto: 
                <input type="text" name="nombre" required>
            </label>
            <label>Precio: 
                <input type="number" step="0.01" name="precio" required>
            </label>
            <label>Descripción: 
                <textarea name="descripcion" required></textarea>
            </label>
            <div class="button-row">
                <button type="submit">Agregar Producto</button>
                <a href="index.php" class="button">Volver a la lista de Productos</a>
            </div>
        </form>
    </div>
</body>
</html>