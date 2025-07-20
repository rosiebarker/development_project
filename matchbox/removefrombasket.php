<?php
// Start session
session_start();

// Check if product_id is provided
if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the product exists in the basket
    if(isset($_SESSION['basket'][$product_id])) {
        // Remove the product from the basket
        unset($_SESSION['basket'][$product_id]);
        // Redirect back to the basket page
        header("Location: basket.php");
        exit();
    } else {
        // Product not found in the basket
        echo "Error: Product not found in the basket.";
    }
} else {
    // Product ID is not provided
    echo "Error: Product ID is required.";
}
?>