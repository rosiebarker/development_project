<?php
session_start();

if (isset($_SESSION['searchresults'])) {
    $searchresults = $_SESSION['searchresults'];

    // Display the search results as needed
    foreach ($searchresults as $result) {
        echo '<div class="col-lg-4 mb-4">
                <div class="card">
                    <!-- Display other product information as needed -->
                    <h5 class="card-title">' . $result['product_name'] . '</h5>
                    <p class="card-text text-muted">' . $result['product_description'] . '</p>
                    <p class="card-text h6">Price: £' . $result['product_price'] . '</p>

                    <a href="message.php" class="btn btn-dark messagebutton">Message Seller</a>
                    <a href="addtobasket.php" class="btn btn-dark addtobasketbutton" data-product-id="' . $result['product_id'] . '" onclick="addtobasket(this)">Add to basket</a>
                </div>
            </div>';
    }

    // Clear the search results from the session to avoid displaying outdated results
    unset($_SESSION['searchresults']);
} else {
    echo 'No search results found.';
}
?>