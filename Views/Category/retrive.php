<?php 
include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/Category.class.php';

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
    $cat = new Category();
    $result = $cat->getAllCategories($connection);
} catch (Exception $pdoEx) {
    echo $pdoEx->getMessage();
}

echo Category::getHeader();
foreach ($result as $oneRow){
     $str = "<tr><td>".$oneRow->getCategoryId()."</td><td>".$oneRow->getCategoryName_EN()."</td>";
     $str = "$str<td>".$oneRow->getCategoryName_FR()."</td><td>".$oneRow->getSubcategories()."</td>";
     $str = "$str<td><a href='http://localhost/FinalProject/Views/Category/update.php'>Edit<span>|</span></a><a href='#'>Details<span>|</span></a><a href='http://localhost/FinalProject/Views/Category/delete.php'>Delete</a></td></tr>";
     echo $str;
}
echo Category::getFooter();

include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';
?>