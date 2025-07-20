<?php
//Starts the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Your Website Name</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">

<body>

<?php include 'includes/navigation.php'; ?>
<?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card orange-shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">

                        <h1 class="mb-4 text-center">About Us</h1>

                        <p class="text-center">Welcome to MatchBox</p>

                        <p class="text-center">
                        <img src="images/grimsbyandcleesells.png" alt="Grimsby & Clee Sells" class="img-fluid"></p>

                        <h2 class="mt-4 bg-warning text-dark p-2 rounded text-center">Our Mission</h2>

                        <p class="text-center">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. 
                                    If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <main class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card orange-shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body">

                        <h1 class="mb-4 text-center">About Us</h1>

                        <p class="text-center">
                        <img src="images/grimsbyandcleesells.png" alt="Grimsby & Clee Sells" class="img-fluid"></p>

                        <h2 class="mt-4 bg-dark text-light p-2 rounded text-center">Our Mission</h2>

                        <p class="text-center">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. 
                                    If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. 
                                    It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php include 'includes/footer.php' ?>

</body>

</html>



