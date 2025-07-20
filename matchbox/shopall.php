<?php
// Start the session
session_start();

// Include database connection
include 'includes/connection.php'; 

// number of products per page
$productsPerPage = 9;

// Get the current page number, default to 1 if not set
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($page - 1) * $productsPerPage;

$categoryFilter = '';

// Check if a category filter is set
if(isset($_GET['category'])) {
    $categoryFilter = $_GET['category'];
}

// Query to fetch products with pagination and category filter
$sql = "SELECT product.*, category.category_name 
        FROM product 
        JOIN category ON product.category_id = category.category_id";

// Add category filter condition if set
if(!empty($categoryFilter)) {
    $sql .= " WHERE category.category_id = :category_id";
}

$sql .= " LIMIT :limit OFFSET :offset";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

// Bind category filter parameter if set
if(!empty($categoryFilter)) {
    $stmt->bindParam(':category_id', $categoryFilter, PDO::PARAM_INT);
}

$stmt->execute();
$products = $stmt->fetchAll();

// Count total number of products for pagination
$sqlCount = "SELECT COUNT(*) AS total FROM product";
$stmtCount = $conn->prepare($sqlCount);
$stmtCount->execute();
$totalProducts = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages = ceil($totalProducts / $productsPerPage);

// Query to fetch all categories for the filter dropdown
$sqlCategories = "SELECT * FROM category";
$stmtCategories = $conn->query($sqlCategories);
$categories = $stmtCategories->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop All</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
<body class="bg-light">
    
    <?php include 'includes/navigation.php'; ?>
    <?php include 'includes/header.php'; ?>

    <br>
    <h1 class="text-center">Shop All Match-Box</h1>
    <br> 

    <main class="container mt-4">
        <div class="row">
            <!-- product filters -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="mb-3">
                <div class="dropdown">
                    <button class="btn btn-addtobasket dropdown-toggle" type="button" id="categorydropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by Category
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="categorydropdown">
                        <li><button class="dropdown-item" type="submit" name="category" value="">All Products</button></li>
                        <?php foreach($categories as $category) : ?>
                            <li><button class="dropdown-item" type="submit" name="category" value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></button></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </form>

            <!-- Display all Products -->
            <?php foreach ($products as $product) : ?>
                <div class="col-lg-4 mb-4">
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
        
        <!-- page navigation -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-4">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>&category=<?= $categoryFilter ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </main>

    <?php include 'includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>