<?php 
include 'includes/connection.php'; 
include 'includes/upload.php'; 


$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$category_id = $_POST['category_id'];
$product_price = $_POST['product_price'];
$product_quantity = $_POST['product_quantity'];
$product_image = $_POST['product_image'];



try {



    $sql = "INSERT INTO account (product_name, product_description, category_id, product_price, product_quantity, product_image) 
            VALUES (:product_name, :product_description, :category_id, :product_price, :product_quantity, :product_image)";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
    $stmt->bindValue(':product_description', $product_description, PDO::PARAM_STR);
    $stmt->bindValue(':category_id', $category_id, PDO::PARAM_STR);
    $stmt->bindValue(':product_price', $product_price, PDO::PARAM_STR);
    $stmt->bindValue(':product_quantity', $product_quantity, PDO::PARAM_STR);
    $stmt->bindValue(':product_image', $product_image, PDO::PARAM_STR);

    $runstatement = $stmt->execute();

    if ($runstatement) {
        header('Location: account.php');
        exit();
    }
} catch (PDOException $e) {
    echo "An error happened";
    echo $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product Process</title>
</head>
<body>
    
</body>
</html>