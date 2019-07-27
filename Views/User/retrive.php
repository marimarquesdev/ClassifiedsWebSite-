<?php
include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/User.class.php';

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
    $user = new User();
    $result = $user->getAllUsers($connection);
    
    $user->displayAllUsers($result);
} catch (Exception $pdoEx) {
    echo $pdoEx->getMessage();
    
}


?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>