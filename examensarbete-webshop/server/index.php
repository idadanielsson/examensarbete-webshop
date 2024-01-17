<?php

require_once 'model/product-model.php';
require_once 'view/product-api.php';

$pdo = connect($host, $database, $user, $password);


$productModel = new ProductModel($pdo);
$productApi = new ProductApi();

// Hämtar alla produkter
if (isset($_GET['action'])) {
    $chosenAction = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

    if ($chosenAction == 'products') {
        echo 'hej';
        $products = $productModel->getAllProducts();
        $productApi->outputProducts($products);
    }         
}

// Hämtar en produkt baserat på id
if ($chosenAction == 'products-id') {
    if (isset($_GET['id'])) {
            $productId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $product = $productModel->getProductById($productId);
            $productApi->outputProductById($product);
    }
}


?>