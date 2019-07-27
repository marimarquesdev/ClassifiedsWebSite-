<?php

class AdType{
    private $adtypeId;
    private $adtypeName;
    
    function __construct($adTypeID=null, $adTypeName=null){
        $this->adtypeId=$adTypeID;
        $this->adtypeName=$adTypeName;
    }
    public function getAdtypeId()
    {
        return $this->adtypeId;
    }

    public function getAdtypeName()
    {
        return $this->adtypeName;
    }

    public function setAdtypeId($adtypeId)
    {
        $this->adtypeId = $adtypeId;
    }

    public function setAdtypeName($adtypeName)
    {
        $this->adtypeName = $adtypeName;
    }

    public static function getHeader(){
        $str = "<div><a href='http://localhost/FinalProject/Views/AdType/create.php'>Create New</a><table class='table'>";
        $str = "$str<tr class='thead-dark'><th>Ad Type Id</th><th>Ad Type Name</th>";
        $str = "$str<th>Operations</th></tr>";
        return $str;
    }
    
    public static function getFooter(){
        
        return "</table></div>";
    }
    
    public function __toString(){
        $str = "<tr><td>$this->adtypeId</td><td>$this->adtypeName</td>";
        $str = "$str<td><a href='http://localhost/FinalProject/Views/AdType/update.php'>Edit<span>|</span></a><a href='#'>Details<span>|</span></a><a href='http://localhost/FinalProject/Views/AdType/delete.php'>Delete</a></td></tr>";
        return $str;
    }
    
    public function create($connection){
        $adTypeId = $this->adtypeId;
        $adTypeName = $this->adtypeName;
        
        $sqlCmd = "insert into adtype values($adTypeId,'$adTypeName')";
        $result = $connection -> exec($sqlCmd);
        return $result;
    }
    
    public function updateDescription($connection){
        $adTypeId = $this->adtypeId;
        $adTypeName = $this->adtypeName;
        $sqlCmd="update adtype set adtypeName='$adTypeName'
                   where adtypeId='$adTypeId'";
        $result = $connection->exec($sqlCmd);
        return $result;
    }
    
    public function delete($connection){
        $adTypeId = $this->adtypeId;
        $sqlCmd="delete from adtype
                   where adtypeId='$adTypeId'";
        $result = $connection->exec($sqlCmd);
        return $result;
    }
    
    public function getAllAds($connection){
        $counter=0;
        $query="select*from adtype";
        foreach ($connection->query($query) as $oneRow){
            $adType = new AdType($oneRow["adtypeId"],
                $oneRow["adtypeName"]);
            $listOfAdType[$counter++] =  $adType;
        }
        return  $listOfAdType;
    }
    
    public function displayAllAds($listOfAdType){
        echo self::getHeader();
        foreach ($listOfAdType as $oneType)
            echo $oneType;
            echo self::getFooter();
    }
    
}

