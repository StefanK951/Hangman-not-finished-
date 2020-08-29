<?php
session_start();
$_SESSION['message'] = '';
//връзка с база данни
$mysqli = mysqli_connect('localhost', 'root', '785623', 'hangman');
		//Проверка за връзка с база данни
		if($mysqli === false){
			   $_SESSION['message'] = "Няма връзка с база данни!!!";
			   header("location: Sign Up.php");
			   exit();
			}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	

	$confirmpassword= mysqli_real_escape_string($mysqli,$_REQUEST['confirmpassword']);
	$password = mysqli_real_escape_string($mysqli,$_REQUEST['password']);



	if ($confirmpassword == $password ){//Проверка за съвпадение на паролите
	////Инициализиране на променливи и присвояване на име на поле
	$firstname = mysqli_real_escape_string($mysqli,$_REQUEST['firstname']);
			if($firstname == '' || empty($firstname)){
				echo "<h1>Полето неможе да бъде празно!</h1>";
				return false;
			}
	$lastname = mysqli_real_escape_string($mysqli,$_REQUEST['lastname']);
			if($lastname == '' || empty($lastname)){
				echo "<h1>Полето неможе да бъде празно!</h1>";
				return false;
			}
	$city = mysqli_real_escape_string($mysqli,$_REQUEST['city']);
			if($city == '' || empty($city)){
				echo "<h1>Полето неможе да бъде празно!</h1>";
				return false;
			}
	$username = mysqli_real_escape_string($mysqli,$_REQUEST['username']);
		//Проверка за съществуващо потребитеско име
			$check_duplicate_username = "SELECT username from users
										WHERE username = '$username'";
			$result = mysqli_query($mysqli, $check_duplicate_username);
			$count = mysqli_num_rows($result);

			if($count > 0){
				$_SESSION['message'] = "Този потребител е вече регистриран!";
				header("location: Sign Up.php");
				return false;

			}

				if($username == '' || empty($username)){
					echo "<h1>Полето неможе да бъде празно!</h1>";
					return false;
				}
	$passwordEN = mysqli_real_escape_string($mysqli, $_REQUEST['password']);
			$password= password_hash($passwordEN, PASSWORD_BCRYPT);//криптиране на паролата
			if($password == '' || empty($password)){
				echo "<h1>Полето неможе да бъде празно!</h1>";
				return false;
			}
	$email = mysqli_real_escape_string($mysqli,$_REQUEST['email']);
		//Проверка за съществуващ имейл

			$check_duplicate_email = "SELECT email from users
										WHERE email = '$email'";
			$result = mysqli_query($mysqli, $check_duplicate_email);
			$count = mysqli_num_rows($result);

			if($count > 0){
				$_SESSION['message'] = "Този имей адрес е вече регистриран!";
				header("location: Sign Up.php");
				return false;
			}

				if($email == '' || empty($email)){
					echo "<h1>Полето неможе да бъде празно!</h1>";
					return false;
				}
				else if (!preg_match("/^[a-zA-Z0-9 ]*$/",$email)) {//защита от забранени символи
					$_SESSION['message'] = "Моля не използвайте забранени символи!";
					header("location: Sign Up.php");
					} 


					$sql = "INSERT INTO users (username,email,password,firstname,lastname,city)
					 VALUES ('$username','$email','$password','$firstname','$lastname','$city')";

					if ($mysqli->query($sql) === true){
						$_SESSION['message']= "Регистрацията е успешна! $username";
						header("Location: Welcome.php");
					} else  {$_SESSION['message'] = "Потребителят не може да се регистрира!";}

	
	}else {
		$_SESSION['message'] = "Паролите не съвпадат!";
		header("location: Sign Up.php");
		}
}else{
	echo "Няма запис!!";
}

?>
