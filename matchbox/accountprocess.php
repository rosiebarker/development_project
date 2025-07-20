<?php 

session_start();


include 'includes/connection.php'; 

$account_type = $_POST['account_type'];
$account_address = $_POST['account_address'];
$account_postcode = $_POST['account_postcode'];
$account_town = $_POST['account_town'];


try {
    // insert account details
    $sql = "UPDATE account SET account_type = :account_type, account_address = :account_address, account_postcode = :account_postcode, account_town = :account_town WHERE account_id = :account_id";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':account_type', $account_type, PDO::PARAM_STR);
    $stmt->bindValue(':account_address', $account_address, PDO::PARAM_STR);
    $stmt->bindValue(':account_postcode', $account_postcode, PDO::PARAM_STR);
    $stmt->bindValue(':account_town', $account_town, PDO::PARAM_STR);
    $stmt->bindValue(':account_id', $_SESSION['account_id'], PDO::PARAM_STR);

    $runstatement = $stmt->execute();

    if ($runstatement) {
        header('Location: account.php');
        exit();
    }

} catch (PDOException $e) {
    echo "An error happened: " . $e->getMessage();
}


?>