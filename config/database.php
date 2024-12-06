<?php
require_once __DIR__ . '/../vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb+srv://admin:Tl4NIwknK3IGXSuL@cluster0.bwlcp.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$database = $mongoClient->selectDatabase('instituto');
$clientesCollection = $database->clientes;