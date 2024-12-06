<?php
require_once __DIR__ . '/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarCliente($_POST['nombre'], $_POST['email'], $_POST['telefono']);
    if ($id) {
        header("Location: index.php?mensaje=Cliente agregado con éxito");
        exit;
    } else {
        $error = "No se pudo agregar al cliente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Cliente</title>
    <link rel="stylesheet" href="../config/style.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Cliente</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre Completo: 
                <input type="text" name="nombre" required>
            </label>
            <label>Email: 
                <input type="email" name="email" required>
            </label>
            <label>Teléfono: 
                <input type="telefono" name="telefono" required>
            </label>
            <div class="button-row">
            <button type="submit">Agregar Cliente</button>
            <a href="index.php" class="button">Volver a la lista de Clientes</a>
        </div>
    </form>
</div>

</body>
</html>