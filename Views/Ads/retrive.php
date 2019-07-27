<?php 
include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Ads.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/User.class.php';

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
    $ads = new Ads();
    if (isset($_SESSION["type"])) {
        if ($_SESSION["type"] == 1) {
            $result = $ads->getAllAds($connection);
            $ads->displayAllAds($result);
        }else{ 
            $ads->setUserId($_SESSION["userId"]);
            $result = $ads->getAdByUserId($connection);
            if ($result != null) {
                $ads->displayAllAds($result);
            }else{
                echo Ads::getHeader();
                echo Ads::getFooter();
            }
        }
    }
    
} catch (Exception $pdoEx) {
    echo $pdoEx->getMessage();
    
}

?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>