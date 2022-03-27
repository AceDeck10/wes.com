<?php
	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if(empty($email) || empty($password)){
			header("Location: ../adminLogin.php?error=emptyFields");
			exit();
		}
		else{
			if($email !== "admin"){
				header("Location: ../adminLogin.php?error=userNotFound");
				exit();
			}
			else if($password !== "adminPass"){
				header("Location: ../adminLogin.php?error=wrongPassword");
				exit();
			}

			else if($email == "admin" && $password == "adminPass"){
				session_start();
				$_SESSION['userID'] = 1;
				$_SESSION['username'] = $email;
				header("Location: ../adminHome.php?loginSuccess");
				exit();
			}
			else{
				header("Location: ../adminLogin.php?error=errorLoggingIn");
				exit();
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else{
		header("Location: ../adminLogin.php");
		exit();
	}
?>