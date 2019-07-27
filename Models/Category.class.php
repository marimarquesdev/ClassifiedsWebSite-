<?php
class Category{
    private $categoryId;
    private $categoryName_EN;
    private $categoryName_FR;
    private $Subcategories;
    
    function __construct($categoryId=null, $categoryName_EN=null, $categoryName_FR=null, $Subcategories=null){
        $this->categoryId=$categoryId;
        $this->categoryName_EN=$categoryName_EN;
        $this->categoryName_FR=$categoryName_FR;
        $this->Subcategories=$Subcategories;
    }
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getCategoryName_EN()
    {
        return $this->categoryName_EN;
    }

    public function getCategoryName_FR()
    {
        return $this->categoryName_FR;
    }

    public function getSubcategories()
    {
        return $this->Subcategories;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function setCategoryName_EN($categoryName_EN)
    {
        $this->categoryName_EN = $categoryName_EN;
    }

    public function setCategoryName_FR($categoryName_FR)
    {
        $this->categoryName_FR = $categoryName_FR;
    }

    public function setSubcategories($Subcategories)
    {
        $this->Subcategories = $Subcategories;
    }

    public static function getHeader(){
        $str = "<div><a href='http://localhost/FinalProject/Views/Category/create.php'>Create New</a><table class='table'>";
        $str = "$str<tr class='thead-dark'><th>Category Id</th><th>Category Name EN</th>";
        $str = "$str<th>Category Name FR</th><th>Subcategory</th>";
        $str = "$str<th>Operations</th></tr>";
        return $str;
    }
    
    public static function getFooter(){
        
        return "</table></div>";
    }
    
    public function __toString(){
      /*  $str = "<tr><td>$this->categoryId</td><td>$this->categoryName_EN</td>";
        $str = "$str<td>$this->categoryName_FR</td><td>$this->Subcategories</td>";
        $str = "$str<td><a href='http://localhost/FinalProject/Views/Category/update.php'>Edit<span>|</span></a><a href='#'>Details<span>|</span></a><a href='http://localhost/FinalProject/Views/Category/delete.php'>Delete</a></td></tr>";
        return $str; */
        $str = "<option value='$this->categoryId'>$this->categoryName_EN</option>";
        return $str;
    }
    
  
    public function create($connection){
        $categoryId = $this->categoryId;
        $nameEN = $this->categoryName_EN;
        $nameFR = $this->categoryName_FR;
        $subcategory = $this->Subcategories;
        
        $sqlCmd = "insert into category values($categoryId,'$nameEN','$nameFR','$subcategory')";
        $result = $connection -> exec($sqlCmd);
        return $result;
    }
    
    public function updateName($connection){
        $categoryId = $this->categoryId;
        $nameEN = $this->categoryName_EN;
        $nameFR = $this->categoryName_FR;
        $sqlCmd="update category set categoryName_EN='$nameEN', categoryName_FR='$nameFR'
                   where categoryId=$categoryId";
        $result = $connection->exec($sqlCmd);
        return $result;
    }
    
    public function delete($connection){
        $categoryId = $this->categoryId;
        $sqlCmd="delete from category
                   where categoryId=$categoryId";
        $result = $connection->exec($sqlCmd);
        return $result;
    }
    
    public function getAllCategories($connection){
        $counter=0;
        $query="select*from category";
        foreach ($connection->query($query) as $oneRow){
            $cat = new Category($oneRow["categoryId"],
                $oneRow["categoryName_EN"],
                $oneRow["categoryName_FR"],
                $oneRow["Subcategories"]);
            $listOfCat[$counter++] =  $cat;
        }
        return  $listOfCat;
    }
    
    public function displayAllAds($listOfCat){
        echo self::getHeader();
        foreach ($listOfCat as $oneCat)
            echo $oneCat;
            echo self::getFooter();
    }
}