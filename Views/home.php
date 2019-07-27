<?php
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Ads.class.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Category.class.php';


try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
    $ads = new Ads();
    $result = $ads->getAllAds($connection);
    $category = new Category();
    $catResult = $category->getAllCategories($connection);
    
} catch (Exception $pdoEx) {
    echo $pdoEx->getMessage();  
}
?>

<div class='container'>
	<div class='row' style='display:flex; flex-wrap: wrap;'>
    		<?php 
    		foreach ($result as $oneRow){
    		    if($oneRow->getAdType()==2){?>
    		       <div class='col-md-3'><div class='card'>
    		        <form action='http://localhost/FinalProject/Views/Ads/details.php' method='POST'>
        		        <img src='http://localhost/FinalProject/img/<?php echo $oneRow->getImages()?>' class='img-thumbnail' alt='img'>
        		        <div class='card-body'><p class='card-text'><?php echo $oneRow->getAdDescription() ?></p>
            		        <input type='hidden' class='form-control' readonly name="adId" value=<?php echo $oneRow->getAdId()?>></input>
            		        <button class="btn btn-info" type=submit>Details</button>
        		        </div>
    		        </form>
    		        </div>
    			 </div>
    		<?php    }
    		}
        	?>	
</div>
</div>
<hr/>

<div class='container'>
	<form action="#" method="POST">
	<label for="exampleFormControlSelect1">Search by Category</label>
		<div class="input-group" style='width: 60%; margin:0;'>
            <select class="form-control" id="exampleFormControlSelect1" name="categoryId">
            <option  value=0 selected="selected">All</option>
              <?php   $category->displayAllAds($catResult);?>
            </select>
            <span class="input-group-btn">
             	<button type="submit" class="btn btn-success">Search</button>
             </span>
 		 </div><hr/>
 	</form>
</div>
<?php
try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
    $ads = new Ads();
   
} catch (Exception $pdoEx) {
    echo $pdoEx->getMessage();  
}
?>

<div class='container'>
	<div class='row' style='display:flex; flex-wrap: wrap;'>
    		<?php 
    		if (empty($_POST["categoryId"])) {
    		    $result = $ads->getAllAds($connection);
    		foreach ($result as $oneRow){
    		    if($oneRow->getAdType()==1){?>
    		       <div class='col-md-3'><div class='card'>
    		        <form action='http://localhost/FinalProject/Views/Ads/details.php' method='POST'>
    		         <div class='card-body'><p class='card-title'><?php echo $oneRow->getCatName()?></p>
        		         <input type='hidden' class='card-text' name="adId" value='<?php echo $oneRow->getAdId() ?>'>
                		 <button class="btn btn-link" type=submit><?php echo $oneRow->getAdDescription() ?></button>
        		      </div>
    		        </form>
    		        </div>
    			 </div>
    		<?php    }
    		}
    		}else {
    		    $catId = $_POST["categoryId"];
    		    $result = $ads->getAdsByCategory($connection, $catId);
    		    $header= "<div class=container><div class='row' style='display:flex; flex-wrap: wrap;'>";
    		    $str = "";
    		    foreach ($result as $oneRow){
    		        if($oneRow->getAdType()==1){?>
        		    <div class='col-md-3'><div class='card'>
        		        <form action='http://localhost/FinalProject/Views/Ads/details.php' method='POST'>
        		         <div class='card-body'><p class='card-title'><?php echo $oneRow->getCatName()?></p>
            		         <input type='hidden' class='card-text' name="adId" value='<?php echo $oneRow->getAdId() ?>'>
                    		 <button class="btn btn-link" type=submit><?php echo $oneRow->getAdDescription() ?></button>
            		      </div>
        		        </form>
        		        </div>
        			 </div>
    		            
    		  <?php    }
    		      }
    		}
        	?>	
</div>
</div>
<hr/>




