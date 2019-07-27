<?php
include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/AdType.class.php';

if(!empty($_POST["adTypeId"])&& !empty($_POST["adTypeName"])){
    $adTypeId = $_POST["adTypeId"];
    $adTypeName = $_POST["adTypeName"];
    try {
        $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
        $adType = new AdType();
        $adType->setAdtypeId($adTypeId);
        $adType->setAdtypeName($adTypeName);
        $result=$adType->updateDescription($connection);
        if ($result == true) {
            echo "<p class='text-success text-center'>The ad type with the id $adTypeId was updated successfully!</p> <br/>";
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
            <label for="exampleFormControlTextarea1">Ad Type Id</label>
            <input type="number" class="form-control" name="adTypeId">
  		</div>
  		<div class="form-group">
            <label for="exampleFormControlTextarea1">Ad Type Name</label>
             <input type="text" class="form-control" name="adTypeName">
  		</div>
  		<div class="form-group">
        	<button class="btn btn-primary btn-block" type="Submit">Edit</button>
        </div>
	</form>
	 <a href="http://localhost/FinalProject/Views/AdType/retrive.php">Go Back</a>
 </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>