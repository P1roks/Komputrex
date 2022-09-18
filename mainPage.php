<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komputrex</title>
    <link rel="icon" href="./imgs/icon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="bar.css">
    <link rel="stylesheet" href="banner.css" media="all">
    <link rel="stylesheet" href="products.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
   <div id="main">
	<?php include "./bar.php"; ?>

       <div id="banner">
		<div class="content">
			<div class="arrow" data-val=-1>&lt;</div>
			<div class="arrow" data-val=1>&gt;</div>
		</div>
       </div>

       <div id="products">
		<?php
			$servername = "localhost";
			$username = "komputrex";
			$password = "taniej";

			$cursor = mysqli_connect($servername,$username,$password,"Komputrex");
			$result = $cursor->query("select id,image,name,price,lowered_price from products");

			if ($result->num_rows > 0) {
			  while($row = $result->fetch_assoc()) {
					echo "
					       <a class=\"product\" href=\"productPage.php?product_id=".urlencode($row['id'])."\">
							<img src=\"./imgs/products/{$row['image']}\" alt=\"{$row['name']}\">
								<h3>{$row['name']}</h3>";

							if (isset($row['lowered_price']))
								echo "  <p class=\"lowered\">{$row['price']}zł</p> 
									<p>{$row['lowered_price']}</p>";
							else
								echo "<p>{$row['price']}zł</p>";
							echo "</a>";
			  }
			} else {
				echo "0 results";
			}
		?>
       </div>
   </div> 

   <script src="init.js"></script>

   <script>
	let test = document.querySelectorAll('#banner .content .arrow');
	let banner = document.querySelector('#banner .content');
	let currBanner = 1;

	for(let single of test)
	   single.addEventListener('click',(obj) => {
			      currBanner += Number(obj.target.dataset.val);

			      currBanner = ((number) => {
						 return number > 4 ? 1 : number < 1 ? 4 : number;
			      })(currBanner);

			      banner.style.backgroundImage = `url(./imgs/banner/${currBanner}.png`;
		      });	
   </script> 
</body>
</html>
