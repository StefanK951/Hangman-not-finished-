<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ВХОД</title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

</head>
	<body>
    	<header>
    	
		<div class="login-wrapp">
		<form class="form" action="log.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="login-box">
				<a  href="index.php" class="btn btn-da"> Начало</a>	
            	<h3>Вход</h3>
                <div class="textbox">
                	<input style="color:black" type="text" placeholder="Потребителско име" name="username" value="" required> 
                    <i class="fa fa-user" aria-hidden="true"></i>               
                    </div>
                    
                <div class="textbox">                	
                    <input style="color:black" type="password" placeholder="Парола" name="password" value="" required>               
                    <i class="fa fa-lock" aria-hidden="true"></i>
                     </div><br>
					 
                   	
                 <input class="btn-login" type="submit" name="submit" value="Вход"> 
				 <a href="Sign Up.php" class="btn btn-ne"> Регистрация</a>
                   
            </div>
		</form>
		<?php $_SESSION['message'] = ''; ?>
		</div>
        </header>
	</body>
</html>