<?php

include_once 'user_functions.php';
include_once 'product_functions.php';

// Assuming this script is named api.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Endpoint for user registration
    if (isset($_POST['action']) && $_POST['action'] === 'register') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mail = $_POST['mail'];

        $result = registerUser($username, $password, $mail);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'User registered successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to register user']);
        }
    }

    // Endpoint for user login
    elseif (isset($_POST['action']) && $_POST['action'] === 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userId = loginUser($username, $password);

        if ($userId) {
            echo json_encode(['success' => true, 'message' => 'Login successful', 'user_id' => $userId]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
        }
    }

    // Endpoint for adding a product to the cart
    elseif (isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
        $userId = $_POST['user_id'];
        $productId = $_POST['product_id'];

        $result = addToCart($userId, $productId);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Product added to cart successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add product to cart']);
        }
    }
}

// Endpoint for getting all products
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'get_products') {
        $products = getProducts();
        echo json_encode(['success' => true, 'products' => $products]);
    }
}

// Endpoint for getting a specific product
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'get_product') {
        $productId = $_GET['product_id'];
        $product = getProduct($productId);

        if ($product) {
            echo json_encode(['success' => true, 'product' => $product]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Product not found']);
        }
    }
}

?>
