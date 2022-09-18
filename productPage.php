<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komputrex</title>
    <link rel="icon" href="./imgs/icon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="fullProduct.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
   <div id="main">
	<?php include "./bar.php"; ?>

	<form action="cart.php" method="POST" id="fullProduct">
		<input type="radio" name="product_id" value = "<?php echo $_GET['product_id']?>" checked style="display:none;">
		<?php 
			include 'singleProduct.php';
			$product = new singleProduct($_GET['product_id']);
		?>
			<img id="product_img" src="imgs/products/<?php echo $product['image'];?>" alt="<?php echo $product['name']; ?> Image">
		<div id="info">
			<h1><?php echo $product['name']; ?></h1>
			<ul>
			<?php
				foreach($product->getSpecsList(5) as $s){
					echo '<li>'.$s . '</li>';
				}
			?>
			</ul>
		</div>
		<div id="shipping">
			<?php
				if(isset($product['lowered_price']))	
					echo "<h3 class=\"lowered\">{$product['price']}</h3>
					      <h1> {$product['lowered_price']}</h1>";
				else
					echo "<h1>{$product['price']}</h1>";
			?>
			<span>
				<button type="submit">Dodaj do koszyka</button>
				<select id="quantity" name="quantity">
					<?php
						for($i=1; $i<=100; ++$i)
							echo '<option "value='. $i .'">'. $i . '</option>';
					?>
				</select>
			</span>

			<span>
				<img src="imgs/delivery.png" alt="Ikonka dostawy"><p>Dostawa już od 15zl</p>
			</span>

			<span>
				<img src="imgs/piggy-bank.png" alt="Ikonka dostawy"><p>Rata już od xzł</p>
			</span>
		</div>
		</form>
		
		<div id="break"><hr></div>
		
		<div id="desc">
			<?php echo "<p> {$product['description']} </p>"?> 
		</div>
   </div> 

   <script src="init.js"></script>
</body>
</html>
