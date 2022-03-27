<?php
	if(isset($_POST['login'])){
		require "dbconn.script.php";
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if(empty($email) || empty($password)){
			header("Location: ../index.php?error=emptyFields");
			exit();
		}
		else{
			$sql = "SELECT * FROM users WHERE userEmail = ?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../index.php?error=sqlError");
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				if(!mysqli_stmt_execute($stmt)){
					header("Location: ../index.php?error=sqlError");
					exit();
				}
				else{
					$result = mysqli_stmt_get_result($stmt);
					if($row = mysqli_fetch_assoc($result)){
						$passwordCheck = password_verify($password, $row['userPassword']);
						if($passwordCheck == false){
							header("Location: ../index.php?error=wrongPassword");
							exit();
						}
						else if($passwordCheck == true){
							session_start();
							$_SESSION['userID'] = $row['userID'];
							$_SESSION['username'] = $row['username'];
							$_SESSION['userType'] = $row['userType'];
							header("Location: ../home.php?loginSuccess");
							exit();
						}
						else{
							header("Location: ../index.php?error=wrongPassword");
							exit();
						}
					}
					else{
						header("Location: ../index.php?error=userNotFound");
						exit();
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else{
		header("Location: ../index.php");
		exit();
	}
?>