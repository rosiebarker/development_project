<?php 
include 'includes/connection.php'; 

//Starts the session
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

try {
    // Statement to check the users details
    $sql = "SELECT * FROM user LEFT JOIN account ON account.user_id = user.user_id WHERE user_email = :email AND user_password = :userpassword";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':userpassword', $password, PDO::PARAM_STR);

    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //Checks if the user is in the database
    if ($stmt->rowCount() > 0) {
        //User is authenticated, store the email and account type in the session
        $_SESSION['email'] = $email;
        $_SESSION['account_type'] = $user['account_type']; // Assuming 'account_type' is the column name
        $_SESSION['account_id'] = $user['account_id'];
        //Direct to the account page
        header('Location: account.php');
        exit();
    } else {
        //Invalid user details
        echo "Invalid User Details. Please try again.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
