<?php
//Start the session
session_start();
//Connect the database
include 'includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MatchBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <style>
    .pagination .page-link {
        color: orange;
    }

    .pagination .page-item.active .page-link {
        background-color: #EC731A;
        border-color: #FDCA82;
    }
</style>

</head>
<body>

<?php include 'includes/navigation.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
include 'includes/connection.php'; 


$sql = "SELECT product.*, category.category_name 
        FROM product 
        JOIN category ON product.category_id = category.category_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();

?>

<div class="container mt-5 text-center"> 
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card orange-shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Add a product</h2>
                    <form action="includes/upload.php" method="post" enctype="multipart/form-data">
                
                        <!--productname-->
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>

                        <!-- description-->
                        <div class="mb-3">
                            <label for="product_description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="product_description" name="product_description" required>
                        </div>

                        <!--size-->
                        <div class="mb-3">
                            <label for="size_id" class="form-label">Size</label>
                            <select class="form-select" id="size_id" name="size_id">
                                <option value="" disabled selected hidden>Select Size</option> 
                                <option value="1">0 - 3 Months</option>
                                <option value="2">3 - 6 Months</option>
                                <option value="3">6 - 9 Months</option>
                                <option value="4">12 Months</option>
                                <option value="5">18 Months</option>
                                <option value="6">2 Years</option>
                                <option value="7">3 - 4 Years</option>
                                <option value="8">4 - 6 Years</option>     
                                <option value="9">6 - 8 Years</option> 
                                <option value="10">8 - 9 Years</option>                            
                            </select>
                        </div>

                        <!--category-->
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="" disabled selected hidden>Select Category</option> <!--hide the first option of the dropdown-->
                                <option value="1">T-Shirts</option>
                                <option value="2">Pyjamas</option>
                                <option value="3">Shoes</option>
                                <option value="4">Hoodie</option>
                                <option value="5">Accessories</option>
                                <option value="6">Coats</option>   
                                <option value="7">Swimwear</option>   
                                <option value="8">Rompers</option>    
                                <option value="9">Sets</option>  
                                <option value="10">Baby Grow</option>     
                                <option value="11">Jumper</option>                                                                                
                            </select>
                        </div>

                        <!-- price-->
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">£</span>
                                <input type="number" min="1" step="0.01" class="form-control" id="product_price" name="product_price" required>
                            </div>
                        </div>

                        <!--quantity-->
                        <div class="mb-3">
                            <label for="product_quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="product_quantity" name="product_quantity" required>
                        </div>

                        <!--product image-->
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-addtobasket mx-auto" data-bs-toggle="tooltip" data-bs-placement="top" title="Submit Form">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// only make 6 products appear per page
$productsPerPage = 6;
$totalProducts = count($products);
$totalPages = ceil($totalProducts / $productsPerPage);

//Get the youre on from the url query
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

$offset = ($page - 1) * $productsPerPage;

$currentPageProducts = array_slice($products, $offset, $productsPerPage);
?>

<main class="container mt-4">
    <div class="row">
        <?php foreach ($currentPageProducts as $product) : ?>
            <div class="col-lg-4 mb-4">
                <div class="card orange-shadow">
                    <?php
                    $imageData = base64_encode($product["product_image"]);
                    echo "<img src='" . $product['product_image'] . "' class='card-img-top img-fluid' style='height: 350px;'>";
                    ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $product["product_name"] ?></h5>
                        <p class="card-text text-muted"><?= $product["product_description"] ?></p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text h6">Category: <?= $product["category_name"] ?></p>
                            <p class="card-text h6">Price: £<?= $product["product_price"] ?></p>
                            <form action="deleteproductprocess.php" method="POST">
                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Product">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center mt-4">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
</main>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>