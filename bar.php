<div id="Bar">
            <span id="logo">
                <a href="mainPage.php"><img src="imgs/default-monochrome.svg" alt="Logo firmy" width="90%" height="100%"></a>
            </span>

	    <form action="search.php" id="search">
                <input type="search" name="search" id="search" placeholder="Wyszukaj">
                <span id="select">
                    <select name="searchOption" id="searchOption">
                        <option value="%">Dowolna</option>
                        <option value="pc">Komputery</option>
                        <option value="part">Częsci Komputerowe</option>
                        <option value="peri">Peryferia</option>
                    </select>
                </span>

                <span id="glass">
                    <button type="submit"><img src="imgs/search.svg" alt="Obrazek lupy" ></button>
                </span>

            </form>

            <span id="account" class="side-icons">
		<?php
			if(empty($_COOKIE['logged_user_name']))
				echo '<a href="konto.php">';
			else
				echo "<a href='dashboard.php?user_id=".urlencode($_COOKIE['logged_user_id'])."'>";
		?>
                    <img src="imgs/user.png" alt="Konto">
		    <p>
			<?php
				if(empty($_COOKIE['logged_user_name']))
					echo "Konto";
				else
					echo $_COOKIE['logged_user_name'];
			?>
		    </p>
                </a>
            </span>

	    <span id="theme" class="side-icons">
		<input id="essa" type="checkbox">
		<label for="essa">
		<img src="imgs/light.png" alt="Motyw">
		<p>Motyw</p></label>
	    </span>

	    <span id="cart" class="side-icons">
                <a href="cart.php">
			<img src="imgs/shopping-cart.png" alt="Zakupy">
			<p><?php 
				echo isset($_COOKIE['cart_sum']) ? $_COOKIE['cart_sum'] : "0.00"; 
			?>zł</p>
                </a>
	    </span>
	    <span id="burger" class="side-icons">
		<input id="burg" type="checkbox">
		<label for="burg"><img src="imgs/menu.png" alt="Motyw"></label>
	    </span>
</div>
		<ul id="menuBurg">
			<li>
		<?php
			if(empty($_COOKIE['logged_user_name']))
				echo '<a href="konto.php">';
			else
				echo "<a href='dashboard.php?user_id=".urlencode($_COOKIE['logged_user_id'])."'>";

                    		echo '<img src="imgs/user.png" alt="Konto">';
				if(empty($_COOKIE['logged_user_name']))
					echo "Konto";
				else
					echo $_COOKIE['logged_user_name'];
		?>
			</a></li>
			<li><label for="essa">
				<img src="imgs/light.png" alt="Motyw">
				<p>Motyw</p>
			</label></li>
			<li><a href="cart.php">
				<img src="imgs/shopping-cart.png" alt="Zakupy">
				<?php echo isset($_COOKIE['cart_sum']) ? $_COOKIE['cart_sum'] : "0.00"; ?>zł
			</a></li>
		</ul>
