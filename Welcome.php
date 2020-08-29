<?php
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome</title>
<link rel="stylesheet" href="welcome.css">
<link rel="stylesheet" href="style.css">
</head>
	<body>
    	<header>
				<li><a style="border:2px solid red; color:white" href="logout.php">ИЗХОД</a></li>
            </ul>
		</div>
		<div class="alert alert-success"><?= $_SESSION['message'] ?></div>			
								

	<?php
		$mysqli = mysqli_connect('localhost', 'root', '785623', 'hangman');
	if($mysqli === false){
       $_SESSION['message'] = "Няма връзка с база данни!!!";
	   header("location: Login.php");
	   exit();
    }
	
	$sql = "SELECT word,description FROM words ORDER BY RAND()LIMIT 1;";
							$result = $mysqli->query($sql) or die($mysqli->error); //$result е обект на mysqli_result
	?>						
								<div id="rand-word">
								<span style="font-size:20px;" >Вашата дума е:.</span>
								
								<?php
								$row = $result->fetch_assoc();
								$word=$row['word'];
								$newword=$word;
								$l= strlen($word);
								for($f=1; $f<($l-1);$f++)
								{
									$newword[$f]="-";
								}								
									echo "<div class='wordlist' style='font-size:30px;'><br><span>$newword</span><br><br><br>";										
									echo "<p style='font-size:20px;'>Описание</p><div class='description'><br><span>$row[description]</span><br>";
									"</div>"
	
						
	?>

	
	
</body>
</html>

