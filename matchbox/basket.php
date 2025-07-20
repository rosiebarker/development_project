<?php
// Start session
session_start();

//Connect the database
include 'includes/connection.php';

// Add items to basket
if (!empty($_SESSION['basket'])) {
    $basketproducts = $_SESSION['basket'];
} else {
    $basketproducts = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Basket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<?php include 'includes/navigation.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container mt-5 orange-shadow p-4 rounded" style="max-width: 600px;">
    <h2 class="text-center">Your Basket</h2>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col"></th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col"></th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($basketproducts as $product_id => $quantity) : ?>
                <tr>
                    <!-- Product Image -->
                    <td>
                        <img src="<?= getproductimage($product_id) ?>" class="card-img-top img-fluid" style="height: 100px; width: 100px;">
                    </td>
                    <!-- Product Name -->
                    <td><?= getproductname($product_id) ?></td>
                    <!-- Quantity -->
                    <td><?= $quantity ?></td>
                    <!-- Price -->
                    <td>£<?php echo getproductprice($product_id); ?></td>
                    <!-- Delete Button -->
                    <td>
                        <form action="removefrombasket.php" method="post">
                            <input type="hidden" name="product_id" value="<?= $product_id ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p class="h4">Total: £<?php echo calculatetotalprice($basketproducts); ?></p>

    <div class="row justify-content-end"> 
        <div class="col-auto"> 
            <form action="proceedtopayment.php" method="post">
                <input type="submit" class="btn btn-addtobasket" value="Proceed To Payment">
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php
//Function to calculate the total price of the basket
function calculatetotalprice($items)
{
    $total = 0;
    foreach ($items as $product_id => $quantity) {
        $product_price = getproductprice($product_id);
        $total += $quantity * $product_price;
    }
    return $total;
}

//Function to fetch the product price based on product ID
function getproductprice($product_id)
{
    global $conn;

    $sql = "SELECT product_price FROM product WHERE product_id = :product_id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

    $stmt->execute();

    $price = $stmt->fetchColumn();

    $stmt->closeCursor();

    return $price;
}




function getproductname($product_id) {
    global $conn;

    // Prepare SQL query to fetch product name
    $sql = "SELECT product_name FROM product WHERE product_id = :product_id";

    //Prepare the statement
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

    //Execute the query
    $stmt->execute();

    //Fetch the result
    $product_name = $stmt->fetchColumn();

    //Close the statement
    $stmt->closeCursor();

    //Return the product name
    return $product_name;
}

function getproductimage($product_id) {
    global $conn;

    // Prepare SQL query to fetch product name
    $sql = "SELECT product_image FROM product WHERE product_id = :product_id";

    //Prepare the statement
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);

    //Execute the query
    $stmt->execute();

    //Fetch the result
    $product_image = $stmt->fetchColumn();

    //Close the statement
    $stmt->closeCursor();

    //Return the product name
    return $product_image;
}
?>
