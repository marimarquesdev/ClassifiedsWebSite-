<?php
include 'Views/Partials/header.php';

if(isset($_SESSION["email"])){
    unset($_SESSION["email"]);
}
?>
<div class="container">
	<?php include 'Views/home.php';?>
</div>
<?php include 'Views/Partials/footer.php'; ?>
