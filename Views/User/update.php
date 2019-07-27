<?php
include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/User.class.php';

if(!empty($_POST["email"])&& !empty($_POST["passwd"])){
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    try {
        $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($passwd);
        $result=$user->updatePassword($connection);
        if ($result == true) {
            echo "<p class='text-success text-center'>The user with the email $email was updated successfully!</p> <br/>";
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
            <label for="exampleFormControlTextarea1">Email</label>
            <input type="text" class="form-control" name="email">
  		</div>
  		<div class="form-group">
            <label for="exampleFormControlTextarea1">Password</label>
             <input type="password" class="form-control" name="passwd">
  		</div>
  		<div class="form-group">
        	<button class="btn btn-primary btn-block" type="Submit">Edit</button>
        </div>
	</form>
	 <a href="http://localhost/FinalProject/Views/User/retrive.php">Go Back</a>
 </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>