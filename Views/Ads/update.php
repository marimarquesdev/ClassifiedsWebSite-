<?php
include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Ads.class.php';

if(!empty($_POST["adId"])&& !empty($_POST["adDescription"])){
    $adId = $_POST['adId'];
    $adDescription = $_POST["adDescription"];
    try {
        $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
        $ads = new Ads();
        $ads->setAdId($adId);
        $ads->setAdDescription($adDescription);
        $result=$ads->updateDescription($connection);
        if ($result == true) {
            echo "<p class='text-center'>The ad with the id $adId was updated successfully!</p> <br/>";
        }else{
            $arrErr = $connection->errorInfo();
            echo "Sql state ".$arrErr[0]."<br/>";
            echo "Error Code ".$arrErr[1]."<br/>";
            echo "Error Message ".$arrErr[2]."<br/>";
        }
    } catch (Exception $pdoEx) {
        echo $pdoEx->getMessage();
        
    }
}

?>
<div class="container">
	<h1 class=text-center>Edit</h1>
	 <div style="width: 60%; margin:25px auto;">
    <form action="#" method="POST">
    	<div class="form-group">
            <label for="exampleFormControlTextarea1">Ad Id</label>
            <input class="form-control" type="text" name="adId"></input>
  		</div>
		 <div class="form-group">
            <label for="exampleFormControlTextarea1">Ad Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="adDescription"></textarea>
  		</div>
  		<div class="form-group">
        	<button class="btn btn-primary btn-block" type="Submit">Edit</button>
        </div>
	</form>
	 <a href="http://localhost/FinalProject/Views/Ads/retrive.php">Go Back</a>
 </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>