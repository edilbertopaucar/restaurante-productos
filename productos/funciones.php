<?php
require_once __DIR__ . '/../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function agregarProducto($nombre, $precio, $descripcion) {
    global $productosCollection;
    $resultado = $productosCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'precio' => floatval(sanitizeInput($precio)),
        'descripcion' => sanitizeInput($descripcion)
    ]);
    return $resultado->getInsertedId();
}

function obtenerProductos() {
    global $productosCollection;
    return $productosCollection->find();
}

function obtenerProductoPorId($id) {
    global $productosCollection;
    return $productosCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function actualizarProducto($id, $nombre, $precio, $descripcion) {
    global $productosCollection;
    $resultado = $productosCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'precio' => floatval(sanitizeInput($precio)),
            'descripcion' => sanitizeInput($descripcion)
        ]]
    );
    return $resultado->getModifiedCount();
}

function eliminarProducto($id) {
    global $productosCollection;
    $resultado = $productosCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}