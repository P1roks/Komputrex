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

       <script src="init.js"></script>

       <div id="login">
	       <div id="loginbox">
		       <div id="loginContent">
		<?php
			//$email_regex = preg_quote('(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])');

			function addfields($database,...$fields): string{
				$query = "Insert into ". $database ." values(NULL,";
				
				foreach($fields as $field)
					if($field === 'password')
						$query .= "\"" . md5($_POST[$field]) . "\",";
					else if(gettype($field) === 'string')
						$query .= "\"$_POST[$field]\"" . ",";
					else
						$query .= $field . ',';

				$query = rtrim($query,', ');
				$query .= ');';

				return $query;
			}

			$errMsg;
			settype($errMsg,"string");

			if(empty($_POST['ads']) || $_POST['rules'] != 'on')
				$errMsg .=  "Nie zaakceptowałeś regulaminu!\n";
			if(empty($_POST['ads']) ||  $_POST['ads'] != 'on' )	
				$errMsg .= "Nie wyraziłeś zgody na przetwarzanie twoich danych osobowych!\n";
			if(empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
				$errMsg .= "Podany adres email jest niepoprawny!\n";
			if(empty($_POST['password']) || empty($_POST['passwordAgain']) || ($_POST['password'] != $_POST['passwordAgain']))
				$errMsg .= "Podane hasła nie są identyczne!\n";
			if(empty($_POST['name']))
				$errMsg .= "Proszę podać imię!\n";
			if(empty($_POST['surename']))
				$errMsg .= "Proszę podać nazwisko!\n";

			if(!empty($errMsg))
			{
				echo "<div id=\"errors\">" ;
				echo "<h1> BŁĄD </h1>";
				echo nl2br($errMsg) . "</div>";
				return;
			}
			else{
				$personal = empty($_POST['personal']) ? 0 : 1;
				$query = addfields('users','name','surename','email','password',$personal); 

				$servername = "localhost";
				$username = "komputrex";
				$password = "taniej";

				$cursor = mysqli_connect($servername,$username,$password,"Komputrex");
				if($cursor->connect_error){
					die("Błąd w połączeniu: ".$cursor->connect_error);
				}
				try{
					$result = $cursor->query($query);
				}catch(mysqli_sql_exception $e){
					if($e->getCode() === 1062)
						echo "<h1> Na podanym adresie E-mail założone jest już konto";
					else
						echo "Wystąpił nieoczekiwany błąd!";
					return;
				}
				echo "<h1> Konto zostało utworzone pomyślnie!</h1>";
				echo "<a href=\"konto.ph\"> Zaloguj się</button>";
			}
	?>
		       </div>
	       </div>
       </div>
   </div> 
</body>
</html>
