<?php 
 $connection = mysqli_connect('localhost', 'root', '', 'nye');
 if(!$connection){
    echo "Problem connecting to database";
 }
?>
<?php session_start(); ?>
<?php 

			$_SESSION['email'] = null;
			$_SESSION['lastname'] = null;
			$_SESSION['firstname'] = null;
			$_SESSION['password'] = null;
			$_SESSION['phone'] = null;
			$_SESSION['info'] = null;
			$_SESSION['image'] = null;

			header("Location:login.php");


	?>