<?php
	session_start();
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	
	<link rel="shortcut icon" href="img/favicon_io/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="styles/style.css?version=50" >
	<link rel="stylesheet" href="../fontawesome-free-5.13.0-web/css/all.css">
    
	<title>Admin</title> 
</head>

<body>
	<header>
		<div class="logo">
			<a href="index.php">
				<i class="fas fa-tractor fa-4x"></i>
			</a>
		</div>
		
			<?php 
				if(!isset($_SESSION['userID'])){
						echo '  
							<div class="topforms">
								<ul>
									<li><a href="adminLogin.php">Log in</a></li>
								</ul>  
							</div> ';					
				}
				else{
					if($_SESSION['username'] == "admin"){
					echo '

						<div class="topforms"> 
							<form action="scripts/logout.script.php" method="post" class="logout" style="clear: both">
								<input class="btn" type="submit" name="logout" value="Logout">
								<br/>
							</form> 
						</div> ';
					}
					else{
						echo '  
							<div class="topforms">
								<ul>
									<li><a href="adminLogin.php">Log in</a></li>
								</ul>  
							</div> ';
					}
				}
			?>

	</header>