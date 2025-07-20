<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .nav-link.text-dark {
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbardropdown"
            aria-controls="navbardropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbardropdown">
            <ul class="navbar-nav w-100 justify-content-around">
                <li class="nav-item">
                    <a class="nav-link active text-dark" aria-current="page" href="index.php">
                        <img src="images/homebutton.png" alt="Home button" style="width: 110px; height: 30px; padding: 0px; margin: 0px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Home Page">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Shop All" href="shopall.php">Shop All</a>
                </li>
                <?php
                    // Checks if there is a user logged in, if not, display Register Account and Log In links
                    if (!isset($_SESSION['email'])) {
                        echo '<li class="nav-item">
                                <a class="nav-link text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Register Account" href="createuser.php">Register Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Log In" href="login.php">Log In</a>
                            </li>';
                    }
                ?>
                <!-- Always display the basket icon -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="basket.php"
                        style="padding: 0px 0px; margin-right: 0px;">
                        <i class="bi bi-cart-fill fs-3"></i> 
                    </a>
                </li>
                <!-- Display My Account dropdown if user is logged in -->
                <?php
                // Check if the email is logged in the session, if so, display My Account dropdown
                if (isset($_SESSION['email'])) {
                    echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="myaccount.php" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="padding: 0px 0px; margin-right: 0px;">
                                <i class="bi bi-person-circle fs-3"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
                            
                    // Check if the user is an Administrator
                    if (isset($_SESSION['account_type']) && $_SESSION['account_type'] === 'Administrator') {
                        echo '<li><a class="dropdown-item text-dark" href="productmanagment.php">Product Managment</a></li>';
                    } else {
                        echo '<li><a class="dropdown-item text-dark" href="myorders.php">Order History</a></li>';
                        echo '<li><a class="dropdown-item text-dark" href="account.php">Account</a></li>';
                    }
                    
                    echo '<li><a class="dropdown-item text-dark" href="logoutprocess.php">Log Out</a></li>
                        </ul>
                        </li>';
                }
                ?>
                <!-- Search bar with icon -->
                <li class="nav-item">
                    <div class="input-group">
                        <button class="btn btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#searchcollapse" aria-expanded="false" aria-controls="searchcollapse">
                            <i class="bi bi-search"></i>
                        </button>
                        <div class="collapse" id="searchcollapse">
                            <form class="d-flex" action="searchbarprocess.php" method="post">
                                <input class="form-control me-2" type="search" name="search_name" placeholder="Search Products" aria-label="Search">
                                <button class="btn btn-outline-dark search-submit searchbutton" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>