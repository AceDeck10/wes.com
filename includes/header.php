<?php 
	session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="author" content="Austine D. Odhiambo"
	
	<link rel="shortcut icon" href="img/favicon_io/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="styles/style.css?version=51" />
	<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
	<link rel='icon' href='img/favicon_ico/favicon.ico' type='image/x-icon'/>
	
	<title>wes.com</title> 
</head>

<body>
	<header>
		<div class="logo">
			<a href="index.php">
				<img src="img/logo.png" style="width: 50px; height: 50px;">
			</a>
		</div>
		<nav class="topnav">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>

		<?php 
				if(!isset($_SESSION['userID'])){
					echo '  
						<div class="topforms">
							<ul>
								<li style="float: right; margin-top: 2px;"><a href="signup.php">Sign up</a></li>
							</ul>  
						</div> ';						
				}
				else{
					echo '
						<div class="topforms"> 
							<form action="scripts/logout.script.php" method="post" class="logout" style="clear: both">
								<input class="btn" type="submit" name="logout" value="Logout">
								<br/>
							</form> 
						</div> ';
				}
		?>

	</header>