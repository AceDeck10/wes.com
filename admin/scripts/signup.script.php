<?php
	//add experts script
	if (isset($_POST['signup'])) {
		require "../../scripts/dbconn.script.php";
		
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$cPassword = $_POST["cPassword"];
		$type = "Expert";
		
		$dPass = "set";
		$dCPass = "set";
		
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);
		
		if (empty($password)){
			$dPass = "";
		}
		if (empty($cPassword)){
			$dCPass = "";
		}
		
		if (empty($username) || empty($email) || empty($password) || empty($cPassword)){
			if(empty($username)){
				header("Location: ../adminHome.php?error=emptyFields&username=".$username."&mail=".$email."&pass=".$dPass."&cPass=".$dCPass);
				exit();
			}
			if(empty($email)){
				header("Location: ../adminHome.php?error=emptyFields&username=".$username."&mail=".$email."&pass=".$dPass."&cPass=".$dCPass);
				exit();
			}
			if (empty($password)){
				header("Location: ../adminHome.php?error=emptyFields&username=".$username."&mail=".$email."&pass=".$dPass."&cPass=".$dCPass);
				exit();
			}
			if (empty($cPassword)){
				header("Location: ../adminHome.php?error=emptyFields&username=".$username."&mail=".$email."&pass=".$dPass."&cPass=".$dCPass);
				exit();
			}
		}
		
		
		else if(!preg_match("/^[a-zA-Z ]*$/",$username) && !filter_var($email, FILTER_VALIDATE_EMAIL) && !$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 && $password !== $cPassword ){
			header("Location: ../adminHome.php?invalidUNameError=invalidusername&invalidEmailError=invalidEmail&invalidPasswordError=invalidPassword&passwordMatchError=$passwordsDoNotMatch");
			exit();
		}
		
		else if(!preg_match("/^[a-zA-Z ]*$/",$username)){
			header("Location: ../adminHome.php?invalidUNameError=invalidusername&email=".$email);
			exit();
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$lastName)){
			header("Location: ../adminHome.php?&username=".$username."&email=".$email);
			exit();
		}
		
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../adminHome.php?invalidEmailError=invalidEmail&username=".$username);
			exit();
		}
		else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
			header("Location: ../adminHome.php?invalidPasswordError=invalidPassword&username=".$username."&email=".$email);
			exit();
		}
		
		else if($password !== $cPassword){
			header("Location: ../adminHome.php?passwordMatchError=$passwordsDoNotMatch&username=".$username."&email=".$email);
			exit();
		}
		else{
			$sql = "SELECT userEmail FROM users WHERE userEmail=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../adminHome.php?error=sqlError");
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location: ../adminHome.php?error=emailTaken");
					exit();
				}
				else{
					$sql = "INSERT INTO users (username, userEmail, userPassword, userType) VALUES (?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)){
						header("Location: ../adminHome.php?error=sqlError");
						exit();
					}
					else{
						$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPassword, $type);
						mysqli_stmt_execute($stmt);
						header("Location: ../adminHome.php?signup=success");
						exit();
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else{
		header("Location: ../adminHome.php");
		exit();
	}
?>