<?php
session_start();
$_SESSION['message'] = '';
$mysqli = mysqli_connect('localhost', 'root', '785623', 'hangman');
	if($mysqli === false){
       $_SESSION['message'] = "Няма връзка с база данни!!!";
	   header("location: Login.php");
	   exit();
    }


		if(isset($_REQUEST['submit']))
		{
			$username = mysqli_real_escape_string($mysqli, $_REQUEST['username']);;
			$password = mysqli_real_escape_string($mysqli, $_REQUEST['password']);;
			
			//заявка
			$query = "SELECT * FROM users WHERE username='$username'";
			$tbl = mysqli_query($mysqli, $query);
			if(mysqli_num_rows($tbl) > 0)
			{
				
				//След като потребителят е верен правим проверка на паролата
				$row = mysqli_fetch_array($tbl);
				$password_hash = $row['password'];
				if(password_verify($password, $password_hash))
				{
					
					$_SESSION['username'] = $username;
					
					
					
					echo "<script>alert('Добре дошъл $username.')</script>";
					echo "<script>window.open('Welcome.php','_self')</script>";
				}else 
				{
					echo "<script>alert('Грешна парола.')</script>";
					echo "<script>window.open('Login.php','_self')</script>";
					
					
				}
			}else
			{
					
					echo "<script>alert('Грешно потребителско име.')</script>";
					echo "<script>window.open('Login.php','_self')</script>";
			}
}