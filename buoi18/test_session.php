<?php
session_start();

if(isset($_POST['login'])){
	$_SESSION['name'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	if($_POST['remember'] == "on" || $_POST['remember'] ==1){
		setcookie('username',"admin",time()+120);
		setcookie('password',"123",time()+120);
	}
	else{
		setcookie('username',"admin",time()-120);
		setcookie('password',"123",time()-120);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="col-md-10">
		<?php

		if(isset($_SESSION['name']) && $_SESSION['password']){

			if($_SESSION['name'] == "admin" && $_SESSION['password']=='123'){
			echo "Chào bạn, ".$_SESSION['name'];
			}
			else{
				header('Location:session.php');
			}
		}
		elseif(isset($_COOKIE['username']) && isset($_COOKIE['password'])){

			if($_COOKIE['username'] == "admin" && $_COOKIE['password']=='123'){
				echo "Chào bạn, ".$_COOKIE['username'];
			}
			else{
				header('Location:session.php');
			}
		}
		else{
			header('Location:session.php');
		}



		?>
		</div>
		<div class="col-md-2">
			<a href="dangxuat.php">Đăng xuất</a>
		</div>
	</div>
</body>
</html>