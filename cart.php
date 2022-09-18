<?php
	if(empty($_COOKIE['logged_user_id']))
		header("Location: konto.php");
?>

<?php
	include './cartBackend.php';
	$cart = new Cart($_COOKIE['logged_user_id']);	

	if(isset($_POST['product_id'])){
		$cart->insertProduct($_POST['product_id'],$_POST['quantity']);
		setcookie('cart_sum',$cart->getCartValue(),$_COOKIE['time'],'/');
		header("location: ./cart.php");
	}
?>

<?php
	if(isset($_POST['clear'])){
		$cart->clearCart();
		setcookie('cart_sum','0.00',$_COOKIE['time'],'/');
		header("location: ./cart.php");
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
    <link rel="stylesheet" href="cart.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
   <div id="main">
	<?php include "./bar.php"; ?>
	<div id="cartWindow">
		<div id="cartlist">
			<span>
				<h1>Koszyk</h1>
				<form action="cart.php" method="POST">
					<img src="./imgs/trash.png" alt="Kosz">
					<button type="submit" name='clear' value="clear">Wyczyść</button>
				</form>
			</span>
			<ul>
				<?php
					$cart->displayProducts();
				?>
				<li style="justify-content: center;"><hr></li>
				<li><p style="width: 87%;">Do zapłaty: </p><p><?php echo $_COOKIE['cart_sum']?>zł</p></li>
			</ul>
		</div>
		<div id="buy">
			<span style="visibility: hidden;"><h1>Placeholder</h1></span>
			<button type="submit">Kup</button>
		</div>
	</div>
   </div>

	<script src="init.js"></script>
	<script>
		function change(obj,price){
			document.querySelector("select[name="+ obj.name + "] + p").innerHTML = obj.value * price + "zł";
		}
	</script>
</body>
</html>
