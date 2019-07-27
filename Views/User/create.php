<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/User.class.php';
    
    if(!empty($_POST["email"])&& !empty($_POST["password"])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $passwd = $_POST['password'];
        $type = 3;
        
        try {
            $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
            $user = new User();
            $user->setName($name);
            $user->setAddress($address);
            $user->setCity($city);
            $user->setState($state);
            $user->setPhone($phone);
            $user->setEmail($email);
            $user->setPassword($passwd);
            $user->setType($type);
            
            $result = $user->create($connection);
            if ($result == true) {
                echo "<p class='text-success text-center'>User added successfully!</p> <br/>";
                session_start();
                // Storing session data
                $_SESSION["email"] = $email;
                $_SESSION["type"] = $type;
                header("Location: http://localhost/FinalProject/front_logged.php");
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
	<h1 class=text-center>Register</h1>
	 <div style="width: 40%; margin:25px auto;">
    <form action="#" method="POST">
        <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="Name">
        </div>
        <div class="form-group">
        <input class="form-control" type="text" name="address" placeholder="Address">
        </div>
        <div class="form-group">
        <input class="form-control" type="text" name="city" placeholder="City">
        </div>
        <div class="form-group">
        <input class="form-control" type="text" name="state" placeholder="State">
        </div>
        <div class="form-group">
        <input class="form-control" type="text" name="phone" placeholder="Phone">
        </div>
        <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
        <input class="form-control" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Password"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
        </div>
        <div class="form-group">
        <input class="form-control" type="password" name="pwdConf" placeholder="Re-type password">
        </div>
        <div class="form-group">
        <button class="btn btn-primary btn-block" type="Submit">Submit!</button>
        </div>
    </form>
     <a href="http://localhost/FinalProject/index.php">Go Back</a>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>