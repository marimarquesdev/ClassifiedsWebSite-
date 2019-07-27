<?php 
include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/AdType.class.php';

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
    $adType = new AdType();
    $result = $adType->getAllAds($connection);
    
    $adType->displayAllAds($result);
} catch (Exception $pdoEx) {
    echo $pdoEx->getMessage();
    
}
  

?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>