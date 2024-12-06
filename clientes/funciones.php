<?php
require_once __DIR__ . '/../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function agregarCliente($nombre, $telefono, $email) {
    global $clientesCollection;
    $resultado = $clientesCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'telefono' => sanitizeInput($telefono),
        'email' => sanitizeInput($email)
    ]);
    return $resultado->getInsertedId();
}

function obtenerClientes() {
    global $clientesCollection;
    return $clientesCollection->find();
}

function obtenerClientePorId($id) {
    global $clientesCollection;
    return $clientesCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function actualizarCliente($id, $nombre, $telefono, $email) {
    global $clientesCollection;
    $resultado = $clientesCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'telefono' => sanitizeInput($telefono),
            'email' => sanitizeInput($email)
        ]]
    );
    return $resultado->getModifiedCount();
}

function eliminarCliente($id) {
    global $clientesCollection;
    $resultado = $clientesCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}