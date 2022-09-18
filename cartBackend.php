<?php
	class Cart{
		public /*readonly*/ int $user_id;
		private $cursor;

		function __construct($id,$servername = 'localhost',$username='komputrex',$password='taniej')
		{
			$this->user_id = $id;
			$this->cursor = mysqli_connect($servername,$username,$password,"Komputrex");
		}
		public function insertProduct(int $product_id,int $quanity): void{
			$check = $this->cursor->query('select * from shopping_cart 
			where user_id='.$this->user_id.' AND product_id='.$product_id);
			
			if($check->num_rows !== 0)
				$this->cursor->query('update shopping_cart set quantity = quantity + '.$quanity.
				' where user_id='.$this->user_id.' AND product_id='.$product_id);
			else
				$this->cursor->query('insert into shopping_cart values
				('.$this->user_id.','.$product_id.','.$quanity.')');	
		}
		private function getProducts(): mysqli_result|bool{
			return $this->cursor->query('select s.product_id,p.image,p.name,p.price,p.lowered_price,s.quantity from shopping_cart s 
			join products p on s.product_id = p.`ID` where s.user_id='.$this->user_id);
		}
		private function genSelect(int $i):string{
			$options = '';

			for($j = 1;$j<=100;++$j)
				if($j !== $i)
					$options .= '<option "value='. $j .'">'. $j . '</option>';

			return $options;
		}
		public function displayProducts(): void{
			$products = $this->getProducts();
			for($i = 1,$row = $products->fetch_assoc();$row;$row=$products->fetch_assoc(),++$i){
				echo "<li><a href=\"./productPage.php?product_id={$row['product_id']}\">
					<img src=\"imgs/products/{$row['image']}\" alt=\"{$row['name']}\">
					<p>{$row['name']}</p></a>
					<select class=\"quanity\" name=\"quantity{$i}\" onchange=\"change(this,{$row['price']})\">
						<option value=\"{$row['quantity']}\">{$row['quantity']}</option>"
						.$this->genSelect($row['quantity']).
					"</select>";
					if(isset($row['lowered_price']))
						echo "<p>".$row['lowered_price']*$row['quantity']."zł</p>";
					else
						echo "<p>".$row['price']*$row['quantity']."zł</p>";
				echo "</li>";
			}
		}
		public function getCartValue():string{
			$result = $this->cursor->query('select SUM(p.price*s.quantity) as sum from shopping_cart s join 
			products p on s.product_id = p.`ID` where s.user_id='.$this->user_id);

			$sum = $result->fetch_assoc()['sum'];
			if(gettype($sum) === "string")
				return $sum;
			else
				return "0.00";
		}
		public function clearCart():void{
			$this->cursor->query('delete from shopping_cart where user_id ='.$this->user_id);
		}
	}
?>
