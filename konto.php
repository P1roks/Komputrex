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
			       <div>
				       <input id="existingAcc" type="radio" name="acctype" onclick="changeAccount(this,'newAcc')" checked>
				       <label for="existingAcc"><h2>Istniejące Konto</h2></label>

				       <input id="newAcc" type="radio" name="acctype" onclick="changeAccount(this,'existingAcc')">
				       <label for="newAcc"><h2>Nowe Konto</h2></label>
				</div>

			       <form action="existingAcc.php" method="POST" id="existingAcc">
				       <input class="email" type="text" name="email" placeholder="E-mail"> 
				       <input class="password" type="password" name="password" placeholder="Hasło">

				       <span>
						<input id="remember" type="checkbox" name="remember">
						<label for="remember">Zapamiętaj mnie</label>
				       </span>
					

				       <button type="submit">Zaloguj się</button>
				</form>

			       <form action="newAcc.php" method="POST" id="newAcc">
				       <span>
						<input id="name" type="text" name="name" placeholder="Imię">
						<input id="surename" type="text" name="surename" placeholder="Nazwisko">
				       </span>
				 
				       <span>
					       <input class="password" type="password" name="password" placeholder="Hasło">
					       <input id="passwordAgain" type="password" name="passwordAgain" placeholder="Powtórz Hasło">
				       </span>
					       <input class="class" type="text" name="email" placeholder="E-mail"> 
				       <span class="check">
					       <input id="rules" type="checkbox" name="rules"> 
					      <label for="rules">Zapoznałem/am się z <a href="reg.html">regulaminem</a> i akceptuję go</label>
				       </span>

				       <span class="check">
						<input id="ads" type="checkbox" name="ads">
						<label for="ads">Zgadzam się na przetwarzanie moich danych osobowych</label>
				       </span>

				       <span class="check">
						<input id="personal" type="checkbox" name="personal">
						<label for="personal">Zgadzam się na otrzymawnie spersonifikowanych reklam</label>
				       </span>
					

				       <button type="submit">Załóż Konto</button>
				       <span class="check">
					       <div style="display:inline; color:red;">*</div> - Pola wymagane
				       </span>
			       </form>
		       </div>
	       </div>
       </div>
   </div> 

	<script src="init.js"></script>
	<script>
	function changeAccount(visible,invisible){
			document.querySelector("form#" + visible.id).style.display = "flex";
			document.querySelector("form#" + invisible).style.display = "none";
	}
	(() => {
		setTimeout(() => {
			let newacc = document.getElementById('newAcc')
			if(newacc.checked)
				changeAccount(newacc,'existingAcc');
		},20);
	})();
	</script>
</body>
</html>
