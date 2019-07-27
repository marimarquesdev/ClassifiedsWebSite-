<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/FinalProject/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Models/User.class.php';

if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $email = $_POST['email'];
    $passwd = $_POST['password'];
    try {
        $connection = new PDO("mysql:host=$hostname;dbname=$dbname",$username,"$password");
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($passwd);  
        $oneUser = $user->Login($connection);
        echo  $oneUser;
          if ($oneUser != null) {
            session_start();
            // Storing session data
            $_SESSION["email"] = $oneUser->getEmail();
            $_SESSION["userId"] = $oneUser->getUserId();
            $_SESSION["type"] = $oneUser->getType();
           echo "email ".$_SESSION["email"];
           echo "id ".$_SESSION["userId"];
           echo "type ". $_SESSION["type"];
            header("Location: http://localhost/FinalProject/front_logged.php"); 
        }else{
            echo "<p class='text-danger text-center'>Invalid User or Password!</p>";
        }
       
    } catch (Exception $pdoEx) {
        echo $pdoEx->getMessage();
    }
}
?>

<div class="container">
	<h1 class=text-center>Sign In</h1>
	 <div style="width: 60%; margin:25px auto;">
    <form action="#" method="POST">
        <div class="form-group">
        <input class="form-control" type="text" name="email" placeholder="Email">
        </div>
        <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
         <div class="form-group">
        <button class="btn btn-primary btn-block" type="Submit">Login</button>
        </div>
    </form>
     <a href="http://localhost/FinalProject/index.php">Go Back</a>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/FinalProject/Views/Partials/footer.php';?>