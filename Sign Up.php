<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>РЕГИСТРАЦИЯ</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="reg.css">

</head>
	<body>
    	<header>
    	<!--SIGN UP FORM!-->
		
		
	<div class="sign-wrapp">
		
		<form class="form" action="register.php" method="POST" enctype="multipart/form-data" autocomplete="off">
		
            <div class="signup-box">
					
			<div class="alert alert-error"><?=$_SESSION['message']?></div>
			<a href="index.php" class="btn btn-da"> Начало</a>	
            	<h4>Регистрация</h4>
                <div class="textbox-signup">
                	<input type="text" placeholder="Име" name="firstname" value="" required>                
                </div>
                <div class="textbox-signup">
                    <input type="text" placeholder="Фамилия" name="lastname" value="" required>                
                </div>
				<div class="textbox-signup">
                    <input type="text" placeholder="Град" name="city" value="" required>                
                </div>
                <div class="textbox-signup">
                    <input type="text" placeholder="Потребителско име" name="username" value="" required>                
                </div>
                <div class="textbox-signup">
                    <input type="password" placeholder="Парола" name="password" value="" required>                
                </div>
				<div class="textbox-signup">
                    <input type="password" placeholder="Повторете паролата" name="confirmpassword" value="" required>               
                </div>
				<div class="textbox-signup">
                    <input type="email" placeholder="E-mail" name="email" value="" required> 
                </div>
				<input class="btn-signup" type="submit" name="register" value="Регистрация"><!--Бутон за регистрация!-->
               <a href="Login.php" class="btn btn-da"> Вход</a>
            </div>
				
            </div>
		</form>
		<?php $_SESSION['message'] = ''; ?>
	</div>

        </header>
	</body>
</html>