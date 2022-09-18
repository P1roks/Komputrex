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

       <div id="products">
		<?php
			$servername = "localhost";
			$username = "komputrex";
			$password = "taniej";

			$type = $_GET['searchOption'];		
			$search = $_GET['search'];

			$cursor = mysqli_connect($servername,$username,$password,"Komputrex");
			if($type === '%')
				$query = 'select id,image,name,price from products where name like "%'.$search.'%"';
			else
				$query = 'select id,image,name,price from products where name like "%'.$search.'%" and type="'.$type.'"';

			$result=$cursor->query($query);

			if ($result->num_rows === 1) 
				header("location: productPage.php?product_id=".urlencode($result->fetch_assoc()['id']));	
			else if ($result->num_rows > 0) {
			  while($row = $result->fetch_assoc()) {
					echo '
					       <a class="product" href=productPage.php?product_id='.urlencode($row['id']).'>
							<img src="imgs/products/'. $row['image'] .'" alt="product image">
								<h3>'.$row['name'].'</h3>
							<p>'.$row['price'].'</p>
					       </a>';
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
	let currBanner = 0;

	for(let single of test)
	   single.addEventListener('click',(obj) => {
			      currBanner += Number(obj.target.dataset.val);

			      currBanner = ((number) => {
						 return number > 5 ? 0 : number < 0 ? 5 : number;
			      })(currBanner);

			      banner.style.backgroundImage = `url(./imgs/banner/${currBanner}.png`;
		      });	
   </script> 
</body>
</html>
