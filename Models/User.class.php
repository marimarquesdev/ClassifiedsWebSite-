<?php
class User{
    private $userId;
    private $name;
    private $address;
    private $city;
    private $state;
    private $phone;
    private $email;
    private $password;
    private $type;
    
    function __construct($userId=null,$name = null, $address=null, $city=null,$state=null,$phone=null,$email=null,$password=null,$type=null){
        $this->userId=$userId;
        $this->name=$name;
        $this->address=$address;
        $this->city=$city;
        $this->state=$state;
        $this->city=$city;
        $this->phone=$phone;
        $this->email=$email;
        $this->password=$password;
        $this->type=$type;
    }
    
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
    
    public static function getHeader(){
        $str = "<div><a href='http://localhost/FinalProject/Views/User/create.php'>Create New</a><table class='table'>";
        $str = "$str<tr class='thead-dark'><th>Name</th><th>Address</th>";
        $str = "$str<th>City</th><th>State</th><th>Phone</th><th>Email</th>";
        $str = "$str<th>Operations</th></tr>";
        return $str;
    }
    
    public static function getFooter(){
        
        return "</table></div>";
    }

    public function __toString(){
        $str = "<tr><td>$this->name</td><td>$this->address</td>";
        $str = "$str<td>$this->city</td><td>$this->state</td>";
        $str = "$str<td>$this->phone</td><td>$this->email</td>";
        $str = "$str<td><a href='http://localhost/FinalProject/Views/User/update.php'>Edit<span>|</span></a><a href='#'>Details<span>|</span></a><a href='http://localhost/FinalProject/Views/User/delete.php'>Delete</a></td></tr>";
        return $str;
    }
    
    public function create($connection){
        $name = $this->name;
        $address = $this->address;
        $city = $this->city;
        $state = $this->state;
        $phone = $this->phone;
        $email = $this->email;
        $password =  $this->password;
        $type = $this->type;
        
        $sqlCmd = "insert into user (userName,address,city,state,phone,email,password,membertype) values('$name','$address','$city','$state','$phone','$email','$password',$type)";
        $result = $connection -> exec($sqlCmd);
        return $result;
    }
    
    public function updatePassword($connection){
        $email = $this->email;
        $password = $this->password;
        $sqlCmd="update user set password='$password'
                   where email='$email'";
        $result = $connection->exec($sqlCmd);
        return $result;
    }
    
    public function delete($connection){
        $email = $this->email;
        $sqlCmd="delete from user
                   where email='$email'";
        $result = $connection->exec($sqlCmd);
        return $result;
    }
    
    public function getAllUsers($connection){
        $counter=0;
        $query="select*from user";
        foreach ($connection->query($query) as $oneRow){
            $user = new User($oneRow["userId"],
                $oneRow["userName"],
                $oneRow["address"],
                $oneRow["city"],
                $oneRow["state"],
                $oneRow["phone"],
                $oneRow["email"],
                $oneRow["password"],
                $oneRow["membertype"]);
            $listOfUsers[$counter++] = $user;
           
        }
        return  $listOfUsers;
    }
    
    public function getUserByEmail($connection){
        $counter=0;
        $query="select * from user where email= '$this->email';";
        if(is_array($query)){
            foreach ($connection->query($query) as $oneRow){
                $user = new User($oneRow["userId"],
                    $oneRow["userName"],
                    $oneRow["address"],
                    $oneRow["city"],
                    $oneRow["state"],
                    $oneRow["phone"],
                    $oneRow["email"],
                    $oneRow["password"],
                    $oneRow["membertype"]);
                $listOfUsers[$counter++] = $user;
            }
            return $listOfUsers;
        }  
     }
     
     public function Login($connection){
      //   $query = "SELECT * FROM `user` WHERE email = '".$this->email."' and password = '".$this->password."'";
         
         
         $sqlCmd="SELECT * FROM `user` WHERE email= '$this->email' and password='$this->password'";
         $prepQuery=$connection->prepare($sqlCmd);
       //  $prepQuery->bindValue(":email",$this->email, PDO::PARAM_INT);
       //  $prepQuery->bindValue(":password",$this->password, PDO::PARAM_INT);
         $prepQuery->execute();
         $result=$prepQuery->fetchAll();
         $tObj="";
         if(count($result)>0){
             foreach ($result as $oneRec){
                 $tObj=new User($oneRec["userId"],
                     $oneRec["userName"],
                     $oneRec["address"],
                     $oneRec["city"],
                     $oneRec["state"],
                     $oneRec["phone"],
                     $oneRec["email"],
                     $oneRec["password"],
                     $oneRec["membertype"]);
             }
             return $tObj;
         }else {
             return null;
         }
        
     }
    
    public function displayAllUsers($listOfUsers){
        echo self::getHeader();
        foreach ($listOfUsers as $oneUser)
            echo $oneUser;
            echo self::getFooter();
    }
    
}