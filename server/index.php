<?php

require_once 'model/product-model.php';
require_once 'views/product-api.php';

$productModel = new ProductModel($pdo);
$productApi = new ProductApi();

// Hämtar alla produkter
if (isset($_GET['action'])) {
    $chosenAction = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

    if ($chosenAction == 'products') {
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