<?php
include 'includes/connection.php';

// Checks if the product ID is provided
if(isset($_POST['product_id'])) {

    //Retrieves the product ID from the form
    $product_id = $_POST['product_id'];

    try {
        //SQL statement to delete the product from the product table
        $sql = "DELETE FROM product WHERE product_id = :product_id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

        // Execute Statement 
        if ($stmt->execute()) {
            // Product deleted successfully, redirect to the success page
            header("Location: deleteproductsuccess.php");
            exit(); 
        } else {
            //error handling
            echo "An error occured please try again";
        }
    } catch (PDOException $e) {
        // Handle PDO exception
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Product ID not provided.";
}

// Close connection
$conn = null;
?>