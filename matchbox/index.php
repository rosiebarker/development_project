<?php
// Start the session
session_start();

include 'includes/connection.php'; 

// fetch products
$sql = "SELECT product.*, category.category_name 
        FROM product 
        JOIN category ON product.category_id = category.category_id
        LIMIT 4";

$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MatchBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navigation.php'; ?>

<main>

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="front-page-image">
                <img src="images/matchboxfrontpage.png" alt="Big Image" class="img-fluid">
            </div>
        </div>
        <?php foreach ($products as $product) : ?>
            <div class="col-lg-3 mb-4"> 
                <div class="card orange-shadow">
                    <?php
                    $imageData = base64_encode($product["product_image"]);
                    echo "<img src='" . $product['product_image']."' class='card-img-top img-fluid' style='height: 350px;'>"; 
                    ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $product["product_name"] ?></h5>
                        <p class="card-text text-muted"><?= $product["product_description"] ?></p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text h6">Category: <?= $product["category_name"] ?></p>
                            <p class="card-text h6">Price: £<?= $product["product_price"] ?></p>
                            <form action="addtobasket.php" method="POST">
                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                <button type="submit" class="btn btn-dark btn-addtobasket" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Basket">
                                    <i class="bi bi-bag-plus-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>