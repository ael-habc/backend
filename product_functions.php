<?php

include_once 'db.php';

function addToCart($userId, $productId) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO `order` (status, id_user, id_product) VALUES ('cart', ?, ?)");
    $stmt->bind_param("ii", $userId, $productId);

    return $stmt->execute();
}

function getProducts() {
    global $conn;

    $result = $conn->query("SELECT id_product, name, description FROM product");
    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

function getProduct($productId) {
    global $conn;

    $stmt = $conn->prepare("SELECT id_product, name, description FROM product WHERE id_product = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $stmt->bind_result($id, $name, $description);

    if ($stmt->fetch()) {
        return ["id_product" => $id, "name" => $name, "description" => $description];
    } else {
        return false;
    }
}

?>
