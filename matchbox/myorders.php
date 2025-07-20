<?php
include 'includes/connection.php';

// Start session
session_start();

// Check if the user is logged in
if (isset($_SESSION['email']) && isset($_SESSION['accountid'])) {
    // Fetch the orders associated with the signed-in user
    $sql = "SELECT sale.*, product.product_name, product.product_description, product.product_price, category.category_name 
            FROM sale 
            JOIN product ON sale.product_id = product.product_id
            JOIN category ON product.category_id = category.category_id
            WHERE sale.user_id = :user_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION['accountid']);
    $stmt->execute();
    $orders = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">

<?php include 'includes/navigation.php'; ?>
<?php include 'includes/header.php'; ?>

<main class="container mt-4 px-4">
    <?php if (isset($orders) && !empty($orders)) : ?>
        <div class="row">
            <?php foreach ($orders as $order) : ?>
                <div class="col-lg-4 mb-4">
                     <div class="card orange-shadow">
                        <div class="card-body">
                            <h5 class="card-title"><?= $order["product_name"] ?></h5>
                            <p class="card-text text-muted"><?= $order["product_description"] ?></p>
                            <hr>
                            <p class="card-text h6">Price: £<?= $order["product_price"] ?></p>
                            <p class="card-text h6">Category: <?= $order["category_name"] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <h2><p class="text-center">You have no orders</p></h2>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>