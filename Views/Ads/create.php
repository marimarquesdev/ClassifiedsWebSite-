<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Ads.class.php';

if(!empty($_POST["adType"])&& !empty($_POST["adDescription"])){
    $adType = $_POST["adType"];
    $date = date('Y-m-d');
    $arrDate = explode("-", $date);
    $newDate = $arrDate[0]."-".$arrDate[1]."-".$arrDate[2];
  //  $expireDate = date('Y-m-d', strtotime($newDate." + 10 day"));
    $userId = 1;
    $adDescription =  $_POST["adDescription"];
    $categoryId = $_POST["categoryId"];
    $subcategoryId = $_POST["subcategoryId"];
    $payment =  0;
    $discount = 0;
    $images = $_POST["images"];
    try {
        $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
        $ads = new Ads();
        $ads->setAdType($adType);
      //  $ads->setRegisterDate($newDate);
      //  $ads->setExpireDate($newDate);
        $ads->setUserId($userId);
        $ads->setAdDescription($adDescription);
        $ads->setCategoryId($categoryId);
        $ads->setSubcategoryId($subcategoryId);
        $ads->setPayment($payment);
        $ads->setDiscount($discount);
        $ads->setImages($images);
        $result = $ads->create($connection);
        if ($result == true) {
            echo "<p class='text-center'>The ad was added successfully!</p> <br/>";
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
	<h1 class=text-center>New Ad</h1>
	 <div style="width: 60%; margin:25px auto;">
    <form action="#" method="POST">
     	<div class="form-group">
            <label for="exampleFormControlSelect1">Ad Type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="adType">
              <option value=1>Free Ads</option>
              <option value=2>Paid Ads</option>
            </select>
 		 </div>
 		  <div class="form-group">
            <label for="exampleFormControlTextarea1">Ad Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="adDescription"></textarea>
  		</div>
  		<div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="categoryId">
              <option value='1'>Real Estate</option>
              <option value='2'>Cars & Vehicles</option>
              <option value='3'>No Category</option>
            </select>
 		 </div>
 		 <div class="form-group">
            <label for="exampleFormControlSelect1">Sub Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="subcategoryId">
              <option value='1'>All in Real Estate</option>
              <option value='2'>For Rent</option>
              <option value='3'>For Sale</option>
              <option value='4'>Real Estate Services</option>
              <option value='5'>All in Cars & Vehicles</option>
              <option value='6'>Classic Cars</option>
            </select>
 		 </div>
 		 <label for="imageFile">Select Image</label>
  		<div class="input-group">
          <input id="imageFile" type="file" name="images" accept="image/*">
        </div><br/>
        <div class="form-group">
        <button class="btn btn-primary btn-block" type="Submit">Save</button>
        </div>
    </form>
     <a href="http://localhost/FinalProject/Views/Ads/retrive.php">Go Back</a>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>