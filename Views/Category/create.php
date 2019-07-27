<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Category.class.php';


if(!empty($_POST["categoryId"])&& !empty($_POST["categoryName_EN"])){
    $catId = $_POST["categoryId"];
    $nameEn = $_POST["categoryName_EN"];
    $nameFn = $_POST["categoryName_FR"];
    $Subcategory = $_POST["Subcategories"];
    try {
        $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
        $cat = new Category($catId, $nameEn,$nameFn,$Subcategory);
        $result = $cat->create($connection);
        if ($result == true) {
            echo "<p class='text-success text-center'>The category was added successfully!</p> <br/>";
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
	<h1 class=text-center>New Category</h1>
	 <div style="width: 60%; margin:25px auto;">
    <form action="#" method="POST">
 		  <div class="form-group">
            <label for="exampleFormControlTextarea1">Ad Type Id</label>
            <input type="number" class="form-control" name="categoryId">
  		</div>
  		<div class="form-group">
            <label for="exampleFormControlTextarea1">Category Name EN</label>
             <input type="text" class="form-control" name="categoryName_EN">
  		</div>
  		<div class="form-group">
            <label for="exampleFormControlTextarea1">Category Name FR</label>
             <input type="text" class="form-control" name="categoryName_FR">
  		</div>
  		<div class="form-group">
            <label for="exampleFormControlSelect1">Sub Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="Subcategories">
              <option value='All in Real Estate'>All in Real Estate</option>
              <option value='For Rent'>For Rent</option>
              <option value='For Sale'>For Sale</option>
              <option value='Real Estate Services'>Real Estate Services</option>
              <option value='All in Cars & Vehicles'>All in Cars & Vehicles</option>
              <option value='Classic Cars'>Classic Cars</option>
              <option value='No Subcategory'>No Subcategory</option>
            </select>
 		 </div>
        <div class="form-group">
        <button class="btn btn-primary btn-block" type="Submit">Save</button>
        </div>
    </form>
     <a href="http://localhost/FinalProject/Views/Category/retrive.php">Go Back</a>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>