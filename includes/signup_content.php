<main>
		<div class="content">
			<h2 align="center">Sign up</h2>
			<div class=signup-form>
				<form action="scripts/signup.script.php" method="post">
					
					<label>Username: *</label>
					<span class="error"> 
						<?php 
							if(isset($_GET['username'])){
								$user = $_GET['username'];
								if($user == ""){
									$uNameError = "First Name required";
									echo $uNameError; 
								}
								else{
									$uNameError = "";
									echo $uNameError; 
								}
							}
							else if(isset($_GET['invalidFNameError'])){
								$invalidUNameError = "Invalid first name";
								echo $invalidUNameError;
							}
						?>
					</span>
					<br/>
					<input type="text" name="username" placeholder="Enter username">
					<br/><hr>
					
					<label>Email *:</label>
					<span class="error"> 
					<?php 
						if(isset($_GET['mail'])){
							$mail = $_GET['mail'];
							if($mail == ""){
								$emailerror = "Email required";
								echo $emailerror; 
							}
							else{
								$emailerror = "";
								echo $emailerror; 
							}
						}
						else if(isset($_GET['invalidEmailError'])){
							$invalidEmailError = "Invalid Email format";
							echo $invalidEmailError;
						}
						else if(isset($_GET['error'])){
							$takenEmailError = $_GET['error'];
							if($takenEmailError == "emailTaken"){
								$emailerror = "Email is already taken";
								echo $emailerror;
							}
							else{
								$emailerror = "";
								echo $emailerror; 
							}
						}
					?>
					</span>
					<br/>
					<input type="text" name="email" placeholder="Enter Email">
					<br/><hr>
					
					<label>Password: *</label>
					<span class="error"> 
					<?php 
						if(isset($_GET['pass'])){
							$pass = $_GET['pass'];
							if($pass == ""){
								$passError = "Password required";
								echo $passError; 
							}
							else{
								$passError = "";
								echo $passError; 
							}
						}
						else if(isset($_GET['invalidPasswordError'])){
							$invalidPasswordError = "Password must be more than 8 characters long and must contain uppercase, numerical and special characters";
							echo $invalidPasswordError;
						}
					?>
					</span>
					<br/>
					<input type="password" name="password" placeholder="Enter password">
					<br/><hr>
					
					<label>Repeat Password: *</label>
					<span class="error"> 
					<?php 
					if(isset($_GET['cPass'])){
						$cPass = $_GET['cPass'];
						if($cPass == ""){
							$cPassError = "Repeat password required";
							echo $cPassError; 
						}
						else{
							$cPassError = "";
							echo $cPassError; 
						}
					}
					else if(isset($_GET['passwordMatchError'])){
						$passwordMatchError = "Passwords do not match";
						echo $passwordMatchError;
					}
					?>
					</span>
					<br/>
					<input type="password" name="cPassword" placeholder="Repeat password">
					<br/><hr>
					<input class="btn" type="submit" name="signup" value="Sign Up">
					<br/>
				</form>
			</div>
		</div>
	</main>