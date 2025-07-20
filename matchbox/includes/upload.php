
<?php

session_start();

include 'connection.php'; 

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
$target_dir2 = "images/";
$target_file2 = $target_dir2 . basename($_FILES["product_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// check if image file is a actual image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["product_image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "This file is not an image.";
    $uploadOk = 0;
  }
}


//check the file size
if ($_FILES["product_image"]["size"] > 500000) {
  echo "File is too large.";
  $uploadOk = 0;
}

//allow only certain file formats 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file



} else {
  if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["product_image"]["name"])). " has been uploaded."; 
    
    
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $category_id = $_POST['category_id'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $size_id = $_POST['size_id'];
    
    
    
    try {
    
    
    
        $sql = "INSERT INTO product (product_name, product_description, category_id, product_price, product_quantity, product_image, size_id) 
                VALUES (:product_name, :product_description, :category_id, :product_price, :product_quantity, :product_image, :size_id)";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bindValue(':product_name', $product_name, PDO::PARAM_STR);
        $stmt->bindValue(':product_description', $product_description, PDO::PARAM_STR);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_STR);
        $stmt->bindValue(':product_price', $product_price, PDO::PARAM_STR);
        $stmt->bindValue(':product_quantity', $product_quantity, PDO::PARAM_STR);
        $stmt->bindValue(':size_id', $size_id, PDO::PARAM_STR);
        $stmt->bindValue(':product_image', $target_file2, PDO::PARAM_STR);  
        $runstatement = $stmt->execute();
    
        //if it works keep the user on my products page
        if ($runstatement) {
            header('Location: ../index.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "An error happened";
        echo $e->getMessage();
    }



  } else {
    echo "Sorry, there was an error uploading your file. Please try again";
  }
}
?>