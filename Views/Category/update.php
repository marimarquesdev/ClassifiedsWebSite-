<?php
include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Category.class.php';

if(!empty($_POST["catId"])&& !empty($_POST["nameEn"])){
    $catId = $_POST["catId"];
    $nameEn = $_POST["nameEn"];
    $nameFr = $_POST["nameFr"];
    try {
        $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
        $cat = new Category();
        $cat->setCategoryId($catId);
        $cat->setCategoryName_EN($nameEn);
        $cat->setCategoryName_FR($nameFr);
        $result=$cat->updateName($connection);
        if ($result == true) {
            echo "<p class='text-success text-center'>The category with the id $catId was updated successfully!</p> <br/>";
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
            <input type="number" class="form-control" name="catId">
  		</div>
  		<div class="form-group">
            <label for="exampleFormControlTextarea1">Category Name EN</label>
             <input type="text" class="form-control" name="nameEn">
  		</div>
  		<div class="form-group">
            <label for="exampleFormControlTextarea1">Category Name FR</label>
             <input type="text" class="form-control" name="nameFr">
  		</div>
  		<div class="form-group">
        	<button class="btn btn-primary btn-block" type="Submit">Edit</button>
        </div>
	</form>
	 <a href="http://localhost/FinalProject/Views/Category/retrive.php">Go Back</a>
 </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>