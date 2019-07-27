<?php
class Ads{
    private $adId;
    private $adType;
    private $registerDate;
    private $expireDate;
    private $userId;
    private $adDescription;
    private $categoryId;
    private $subcategoryId;
    private $payment;
    private $discount;
    private $images;
    private $catName;
    
    
    function __construct($adId=null, $adType=null,$registerDate=null,$expireDate=null,$userId=null,$adDescription=null,$categoryId=null,$subcategoryId=null,$payment=null,$discount=null,$images=null){
        $this->adId=$adId;
        $this->adType=$adType;
        $this->registerDate=$registerDate;
        $this->expireDate=$expireDate;
        $this->userId=$userId;
        $this->adDescription=$adDescription;
        $this->categoryId=$categoryId;
        $this->subcategoryId=$subcategoryId;
        $this->payment=$payment;
        $this->discount=$discount;
        $this->images=$images;
    }
    
    
    public function getCatName()
    {
        return $this->catName;
    }

    public function setCatName($catName)
    {
        $this->catName = $catName;
    }

    public function getAdId()
    {
        return $this->adId;
    }

    public function setAdId($adId)
    {
        $this->adId = $adId;
    }

    public function getAdType()
    {
        return $this->adType;
    }

    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    public function getExpireDate()
    {
        return $this->expireDate;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getAdDescription()
    {
        return $this->adDescription;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getSubcategoryId()
    {
        return $this->subcategoryId;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setAdType($adType)
    {
        $this->adType = $adType;
    }

    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }

    public function setExpireDate($expireDate)
    {
        $this->expireDate = $expireDate;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setAdDescription($adDescription)
    {
        $this->adDescription = $adDescription;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function setSubcategoryId($subcategoryId)
    {
        $this->subcategoryId = $subcategoryId;
    }

    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }

    
    public static function getHeader(){
        $str = "<div><a href='http://localhost/FinalProject/Views/Ads/create.php'>Create New</a><table class='table'>";
        $str = "$str<tr class='thead-dark'><th>adId</th><th>adType</th>";
        $str = "$str<th>registerDate</th><th>expireDate</th><th>userId</th><th>adDescription</th>";
        $str = "$str<th>categoryId</th><th>subcategoryId</th><th>payment</th><th>discount</th>";
        $str = "$str<th>images</th><th>Operations</th></tr>";
        return $str;
    }
    
    public static function getFooter(){
        
        return "</table></div>";
    }
    
    public function __toString(){
        $str = "<tr><td>$this->adId</td><td>$this->adType</td>";
        $str = "$str<td>$this->registerDate</td><td>$this->expireDate</td>";
        $str = "$str<td>$this->userId</td><td>$this->adDescription</td>";
        $str = "$str<td>$this->catName</td><td>$this->subcategoryId</td>";
        $str = "$str<td>$this->payment</td><td>$this->discount</td>";
        $str = "$str<td><img style='width: 200px; height=200px;' class='img-fluid' src='http://localhost/FinalProject/img/$this->images'></td>";
        $str = "$str<td><a href='http://localhost/FinalProject/Views/Ads/update.php'>Edit<span>|</span></a><a href='#'>Details<span>|</span></a><a href='http://localhost/FinalProject/Views/Ads/delete.php'>Delete</a></td></tr>";
        return $str;
    }
    
    public function create($connection){
        $adType = $this->adType;
        $registerDate = $this->registerDate;
        $expireDate = $this->expireDate;
        $userId = $this->userId;
        $adDescription =  $this->adDescription;
        $categoryId = $this->categoryId;
        $subcategoryId = $this->subcategoryId;
        $payment =  $this->payment;
        $discount = $this->discount;
        $images = $this->images;
        
        $date = date('Y-m-d');
        $arrDate = explode("-", $date);
        $newDate = $arrDate[0]."-".$arrDate[1]."-".$arrDate[2];
        
        //,registerDate,expireDate,
        $sqlCmd = "insert into ads (adType,userId,adDescription,categoryId,subcategoryId,payment,discount,images) values($adType,$userId,'$adDescription',$categoryId,$subcategoryId,$payment,$discount,'$images')";
        echo $sqlCmd;
        $result = $connection -> exec($sqlCmd);
        return $result;
    }
    
    public function updateDescription($connection){
        $adId = $this->adId;
        $adDescription = $this->adDescription;
        $sqlCmd="update ads set adDescription='$adDescription'
                   where adId='$adId'";
        $result = $connection->exec($sqlCmd);
        return $result;
    }
    
    public function delete($connection){
        $adId = $this->adId;
        $sqlCmd="delete from ads
                   where adId='$adId'";
        $result = $connection->exec($sqlCmd);
        return $result;
    }
    
    public function getAllAds($connection){
        $counter=0;
        $query="SELECT ads.adId,ads.adType,ads.registerDate,ads.expireDate,ads.userId,ads.adDescription,category.categoryName_EN,
                ads.subcategoryId,ads.payment,ads.discount,ads.images
                FROM (ads
                INNER JOIN category ON ads.categoryId = category.categoryId) ORDER BY ads.registerDate;";
        foreach ($connection->query($query) as $oneRow){
            $ads = new Ads();
            $ads->setAdId($oneRow["adId"]);
            $ads->setAdType($oneRow["adType"]);
            $ads->setRegisterDate($oneRow["registerDate"]);
            $ads->setExpireDate($oneRow["expireDate"]);
            $ads->setUserId($oneRow["userId"]);
            $ads->setAdDescription($oneRow["adDescription"]);
            $ads->setCatName($oneRow["categoryName_EN"]);
            $ads->setSubcategoryId($oneRow["subcategoryId"]);
            $ads->setPayment($oneRow["payment"]);
            $ads->setDiscount($oneRow["discount"]);
            $ads->setImages($oneRow["images"]);
            $listOfAds[$counter++] =  $ads;
        }
        return  $listOfAds;
    }
    
    public function getAdsByCategory($connection, $catId){
        $counter=0;
        $query="SELECT ads.adId,ads.adType,ads.registerDate,ads.expireDate,ads.userId,ads.adDescription,category.categoryName_EN, ads.subcategoryId,ads.payment,ads.discount,ads.images 
                FROM (ads INNER JOIN category ON ads.categoryId = category.categoryId) 
                WHERE ads.categoryId = $catId ORDER BY ads.registerDate;";
        foreach ($connection->query($query) as $oneRow){
            $ads = new Ads();
            $ads->setAdId($oneRow["adId"]);
            $ads->setAdType($oneRow["adType"]);
            $ads->setRegisterDate($oneRow["registerDate"]);
            $ads->setExpireDate($oneRow["expireDate"]);
            $ads->setUserId($oneRow["userId"]);
            $ads->setAdDescription($oneRow["adDescription"]);
            $ads->setCatName($oneRow["categoryName_EN"]);
            $ads->setSubcategoryId($oneRow["subcategoryId"]);
            $ads->setPayment($oneRow["payment"]);
            $ads->setDiscount($oneRow["discount"]);
            $ads->setImages($oneRow["images"]);
            $listOfAds[$counter++] =  $ads;
        }
        return  $listOfAds;
    }
    
    public function fetAdById($connection){
        $sqlCmd="SELECT ads.adId,ads.adType,ads.registerDate,ads.expireDate,ads.userId,ads.adDescription,category.categoryName_EN, ads.subcategoryId,ads.payment,ads.discount,ads.images 
                FROM (ads INNER JOIN category ON ads.categoryId = category.categoryId) 
                WHERE ads.adId = $this->adId;";
        $prepQuery=$connection->prepare($sqlCmd);
        $prepQuery->bindValue(":adId",$this->adId, PDO::PARAM_INT);
        $prepQuery->execute();
        $result=$prepQuery->fetchAll();
        $tObj="";
        if(count($result)>0){
            foreach ($result as $oneRec){
                $tObj=new Ads();
                $tObj->setAdId($oneRec["adId"]);
                $tObj->setAdType($oneRec["adType"]);
                $tObj->setRegisterDate($oneRec["registerDate"]);
                $tObj->setExpireDate($oneRec["expireDate"]);
                $tObj->setUserId($oneRec["userId"]);
                $tObj->setAdDescription($oneRec["adDescription"]);
                $tObj->setCatName($oneRec["categoryName_EN"]);
                $tObj->setSubcategoryId($oneRec["subcategoryId"]);
                $tObj->setPayment($oneRec["payment"]);
                $tObj->setDiscount($oneRec["discount"]);
                $tObj->setImages($oneRec["images"]);
            }
        }
        return $tObj;
    }
    
    public function getAdByUserId($connection){
        $counter=0;
        $query="SELECT ads.adId,ads.adType,ads.registerDate,ads.expireDate,ads.userId,ads.adDescription,category.categoryName_EN, ads.subcategoryId,ads.payment,ads.discount,ads.images
                FROM (ads INNER JOIN category ON ads.categoryId = category.categoryId)
                WHERE ads.userId = $this->userId;";
            foreach ($connection->query($query) as $oneRow){
                $ads = new Ads();
                $ads->setAdId($oneRow["adId"]);
                $ads->setAdType($oneRow["adType"]);
                $ads->setRegisterDate($oneRow["registerDate"]);
                $ads->setExpireDate($oneRow["expireDate"]);
                $ads->setUserId($oneRow["userId"]);
                $ads->setAdDescription($oneRow["adDescription"]);
                $ads->setCatName($oneRow["categoryName_EN"]);
                $ads->setSubcategoryId($oneRow["subcategoryId"]);
                $ads->setPayment($oneRow["payment"]);
                $ads->setDiscount($oneRow["discount"]);
                $ads->setImages($oneRow["images"]);
                $listOfAds[$counter++] =  $ads;
            }
            return  $listOfAds;
    }
    
    public function displayAllAds($listOfAds){
        echo self::getHeader();
        foreach ($listOfAds as $oneAd)
            echo $oneAd;
            echo self::getFooter();
    }
}