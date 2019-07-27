<?php
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Ads.class.php';

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
    $ads = new Ads();
    $ads->setAdId($_POST["adId"]);
    $result = $ads->fetAdById($connection);
    
} catch (Exception $pdoEx) {
    echo $pdoEx->getMessage();
    
}


?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="http://localhost/FinalProject/Style/details.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Details</title>
	</head>
	<body>
		<header class="text-white bg-dark">Details</header>
		<div class="card">
          <div class="card-body">
                <h5 class="card-title"><?php echo $result->getAdId()." - ".$result->getCatName()?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $result->getRegisterDate()?></h6>
                <p class="card-text"><?php echo $result->getAdDescription()?></p>
                 <img style="width: 500px; height=300px;" class="card-img-bottom" src='http://localhost/FinalProject/img/<?php echo $result->getImages()?>' alt="No images available">
          </div>
    	</div>
    	<a class="link-item" href="http://localhost/FinalProject/index.php">Return To Home Page</a>
	</body>
</html>
