<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komputrex</title>
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="login.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
   <div id="main">
	<?php include "./bar.php"; ?>

       <div id="login">
	       <div id="loginbox">
		       <div id="loginContent">
<?php
	include './cartBackend.php';

	$errMsg;
	settype($errMsg,"string");

	if(empty($_POST['email'])) //e|| !preg_match($email_regex,$_POST['email'])	
		$errMsg .= "Podany adres email jest niepoprawny!\n";
	if(empty($_POST['password']))
		$errMsg .= "Nie podałeś hasła!\n";

	if(!empty($errMsg))
	{
		echo "<div id=\"errors\">" ;
		echo "<h1> BŁĄD </h1>";
		echo nl2br($errMsg) . "</div>";
		return;
	}

	$servername = "localhost";
	$username = "komputrex";
	$password = "taniej";

	$cursor = mysqli_connect($servername,$username,$password,"Komputrex");
	if($cursor->connect_error){
		die("Błąd w połączeniu: ".$cursor->connect_error);
	}

	$result = $cursor->query("select ID,Name from users where `Email`='".$_POST['email']."' AND `Password`='".md5($_POST['password'])."';");
	if($result->num_rows === 0){
		echo "<h1>Niepoprawny Login lub Hasło!</h1>";	
		die();
	}	

	if(empty($_POST['remember']))
		$time = time() + 60 * 60;
	else
		$time = time() + 60 * 60 * 24 * 30;
	$user = $result->fetch_assoc();	
	setcookie('logged_user_id',$user['ID'],$time,'/');
	setcookie('logged_user_name',$user['Name'],$time,'/');
	setcookie('time',$time,$time,'/');
	
	$cart = new Cart($user['ID']);
	setcookie('cart_sum',$cart->getCartValue(),$time,'/');
	header("Location:mainPage.php");
?>
		       </div>
	       </div>
       </div>
   </div> 
	<script src="init.js"></script>
</body>
</html>
