<?php
//Starts the session
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">

<?php include 'includes/navigation.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container mt-5"> <!-- Add custom class for orange background -->
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!--Payment block-->
            <div class="card">
                <div class="card-header text-center bg-light text-dark">
                    <h5 class="mb-0">Payment Details</h5>
                </div>
                <div class="card-body shadow">
                    <form method="post" action="paymentsuccess.php">
                        <div class="mb-3">
                            <label for="cardnumber" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Enter Card Number" required>
                        </div>

                        <!--Expiry Date-->
                        <div class="row">
                            <div class="col">
                                <label for="expirydate" class="form-label">Expiry Date</label>
                                <input type="text" class="form-control" id="expirydate" name="expirydate" placeholder="MM/YYYY" required>
                            </div>

                            <!--CVV-->
                            <div class="col">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV" required>
                            </div>
                        </div>

                        <!--Cardholder's name-->
                        <div class="mb-3">
                            <label for="cardHolder" class="form-label">Cardholder Name</label>
                            <input type="text" class="form-control" id="cardHolder" name="cardHolder" placeholder="Enter Cardholder's Name" required>
                        </div>

                        <!--Pay now button, made the whole length of the container -->
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-addtobasket btn-block">Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>