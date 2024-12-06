<?php
require_once __DIR__ . '/funciones.php';

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarCliente($_GET['id']);
    $mensaje = $count > 0 ? "Cliente eliminado con éxito." : "No se pudo eliminar al Cliente.";
}

$clientes = obtenerClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="../config/style.css">
</head>
<body>
<div class="container">
    <h1>Gestión de Clientes</h1>
   

    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <a href="nuevo.php" class="button">Agregar Nuevo Cliente</a>

    <h2>Lista de Clientes</h2>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>occiones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
            <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
            <td><?php echo htmlspecialchars($cliente['email']); ?></td>
            <td class="actions">
                <a href="editar.php?id=<?php echo $cliente['_id']; ?>" class="button">Editar</a>
                <a href="index.php?accion=eliminar&id=<?php echo $cliente['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar a este cliente?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>