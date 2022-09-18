<?php
function delCookies(){
	foreach($_COOKIE as $key => $_){
		unset($_COOKIE[$key]);
		setcookie($key,'',time() - 3600,'/');
	}
}
	if(isset($_POST['accAction'])){
		if($_POST['accAction'] === 'unLogin')
			delCookies();
		else if($_POST['accAction'] === 'remove'){
			$user_id = $_GET['user_id'];
			$cursor = mysqli_connect('localhost','komputrex','taniej',"Komputrex");

			if ($cursor->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}
			
			$cursor->query("delete from shopping_cart where user_id = {$user_id}");
			$cursor->query("delete from users where ID = {$user_id}");
			delCookies();
		}
		
		header("Location: ./mainPage.php");
	}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komputrex</title>
    <link rel="icon" href="./imgs/icon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="login.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
	#dashboard{
		display:flex;
		align-items: center;
		justify-content: center;
		gap:10%;
		height: 100%;
	}
	#dashboard button{
		background-color: red;
		color:var(--leading-color-alt);
		padding:1%;
		border-radius:20px;
		font-size:500%;
	}
	#dashboard button:hover{
		filter: brightness(80%);
		cursor:pointer;
	}
	@media(max-width:777px){
		:root{
			font-size: 14px;
		}
		#dashboard{
			flex-flow: column wrap;
		}
	}
    </style>
</head>
<body>
   <div id="main">
	<?php include "./bar.php"; ?>
		<form action="./dashboard.php?user_id=<?php echo $_GET['user_id']; ?>" method="post" id="dashboard">
			<button type="submit" value="unLogin" name="accAction">Wyloguj się</button>
			<button type="submit" value="remove" name="accAction">Usuń Konto</button>
		</form>
   </div>

	<script src="init.js"></script>
</body>
</html>
