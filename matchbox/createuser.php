<?php
//Starts the session
session_start();
?>

<?php 
include 'includes/connection.php'; 

try 
{
  $SQL = "select * from user"; // searches the customer table in the database
  $stmt = $conn -> query($SQL);
}

catch (PDOException $e) //Catches any errors that happen if the code is wrong
{
  echo "an error happened";
  echo $e; //Prints out the error message
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

<?php include 'includes/navigation.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container mt-5"> 
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card orange-shadow">
                <div class="card-body">
                    <h2 class="text-center mb-4">Create Match-Box Account</h2>
                    <form method="post" action="createuserprocess.php">
                        <div class="mb-3">
                            <input type="text" class="form-control text-center" name="email" placeholder="Email Address" required />
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control text-center" name="password" placeholder="Password" required />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control text-center" name="firstname" placeholder="First Name" required />
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control text-center" name="lastname" placeholder="Last Name" required />
                        </div>
                        <div class="mb-3">
                            <input type="date" class="form-control text-center" name="dateofbirth" placeholder="Date Of Birth" required />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-addtobasket">Sign Up</button>
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
