<?php
require_once __DIR__ . '/funciones.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$cliente = obtenerClientePorId($_GET['id']);

if (!$cliente) {
    header("Location: index.php?mensaje=Cliente no encontrado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarCliente($_GET['id'], $_POST['nombre'], $_POST['email'], $_POST['telefono']);
    if ($count > 0) {
        header("Location: index.php?mensaje=Cliente actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar el cliente.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../config/style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nombre Completo: 
                <input type="text" name="nombre" 
                       value="<?php echo htmlspecialchars($cliente['nombre']); ?>" 
                       required>
            </label>
            <label>Email: 
                <input type="email" name="email" 
                       value="<?php echo htmlspecialchars($cliente['email']); ?>" 
                       required>
            </label>
            <label>Teléfono: 
                <input type="tel" name="telefono" 
                       value="<?php echo htmlspecialchars($cliente['telefono']); ?>" 
                       required>
            </label>
            <input type="submit" value="Actualizar Cliente">
        </form>
        <a href="index.php" class="button">Volver a la lista de Clientes</a>
    </div>
</body>
</html>