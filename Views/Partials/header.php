<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="http://localhost/FinalProject/Style/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Maple Classified</title>
  </head>
  <body>
  <?php 
      session_start();
      if (!isset($_SESSION["email"])) { ?>
          <header class="bg-light">
              <div class="container">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                      <a class="navbar-brand" href="http://localhost/FinalProject/index.php">Maple Ads</a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      	<span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                      <ul class="navbar navbar-nav justify-content-end">
                      	<li class="nav-item active">
                      		<a class="nav-link" href="#">FR <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                          	<a class="nav-link" href="http://localhost/FinalProject/Views/User/create.php">Register</a>
                          </li>
                          <li class="nav-item">
                          	<a class="nav-link" href="http://localhost/FinalProject/Views/User/login.php">Sign In</a>
                          </li>
                      </ul>
                      </div>
                  </nav>
              </div>
          </header>
          
     <?php  }else{
          if ($_SESSION["type"] == 3) { ?>
          	<header class="bg-light">
  	<div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="http://localhost/FinalProject/front_logged.php">Maple Ads</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item active">
            	<a class="nav-link" href="http://localhost/FinalProject/Views/Ads/retrive.php">My Ads <span class="sr-only">(current)</span></a>
           </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Payments <span class="sr-only">(current)</span></a>
          </li>
          </ul>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
           <li class="nav-item active">
           		<p class='nav-link'><?php echo "Welcome  ".$_SESSION['email']." !" ?> </p>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">FR <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/FinalProject/index.php">Logout</a>
          </li>
        </ul>
        </div>
      </div>
    </nav>
    </div>
    </header>
            
       <?php }else if($_SESSION["type"] == 1){ ?>
       <header class="bg-light">
  	<div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="http://localhost/FinalProject/front_logged.php">Maple Ads</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Ads
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="http://localhost/FinalProject/Views/Ads/retrive.php">Ads</a>
                      <a class="dropdown-item" href="http://localhost/FinalProject/Views/AdType/retrive.php">Type</a>
                      <a class="dropdown-item" href="http://localhost/FinalProject/Views/Category/retrive.php">Category</a>
                </div>
          </li>
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Users
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="http://localhost/FinalProject/Views/User/retrive.php">Users</a>
                </div>
          </li>
        <li class="nav-item active">
            <a class="nav-link" href="#">Payments <span class="sr-only">(current)</span></a>
          </li>
          </ul>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">FR <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <p class="nav-link"><?php echo "Welcome  ".$_SESSION['email']." !" ?></p>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="http://localhost/FinalProject/index.php">Logout</a>
              </li>
        </ul>
        </div>
      </div>
    </nav>
</div>
</header>
        <?php }
      }
  ?>

  
  
  
   