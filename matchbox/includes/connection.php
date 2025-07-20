<?php

$servername = "localhost"; //name of the server - server machin e is local host
$username ="root"; //what we need to login - phpmyadmin is usually root by default
$password = ""; //no password is used in phpmyadmin by default
$database = "matchbox"; //name of the database that is to be loaded
$error; //made to hold an error code or message later on

try //try to run the code inside the { } brackets
{
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset-utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error) //catch any erros that occur during what we are trying to run
{
    echo "Error 404" . $error->getMessage();
}

