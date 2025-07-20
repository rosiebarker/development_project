<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection function
    include 'includes/connection.php'; 

    // Get the search query from the form submission
    $searchName = $_POST['search_name'];

    // Use the search query to fetch relevant data from your database
    $searchResults = searchProducts($searchName);

    // Store the search results in the session for display on another page
    $_SESSION['searchresults'] = $searchResults;

    // Redirect to a search results page or another appropriate page
    header('Location: searchbarresults.php');
    exit();
}

function searchProducts($name) {
    // Replace this with your database query logic
    // Example: SELECT * FROM products WHERE product_name LIKE :name OR product_description LIKE :name OR product_price LIKE :name
    // Execute the query and return the results

    // For simplicity, we'll return a hardcoded array in this example
    $searchResults = array(
        array('product_name' => 'Product 1', 'product_description' => 'Description 1', 'product_price' => 19.99),
        array('product_name' => 'Product 2', 'product_description' => 'Description 2', 'product_price' => 24.99),
        // Add more results as needed
    );

    return $searchResults;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Bar Process</title>
</head>
<body>
    
</body>
</html>