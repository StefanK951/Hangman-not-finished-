<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hangman</title>
<link rel="stylesheet" href="style.css"></link>
</head>
<body>
	<header>
	<div class="logo">
			<img  src="icon.png" >
			<p class="logo-text">Hangman</p>
	</div>
		<div class="home-text" style="font-family:Verdana;">
		  <p class="question">Имаш ли регистрация?</p>
            	<div class="button">
                	<a href="Login.php" class="btn btn-da"> ДА</a>
                    <a href="Sign Up.php" class="btn btn-ne"> НЕ</a>
             </div>  
	</header>

</body>
</html>
