<?php require "header.php" ?>

	<main>
		<div class="content">
			<h2 align="center">Log in</h2>
			<div class=login-form>
				<form action="scripts/login.script.php" method="post">
					<label>Email: *</label>
					<br/>
					<input type="text" name="email" placeholder="Enter Email">
					<br/><hr>
					<label>Password: *</label>
					<br/>
					<input type="password" name="password" placeholder="Enter password">
					<br/><hr>
					<span class="error">
						<?php
							if(isset($_GET['error'])){
									$error = $_GET['error'];
									if($error == "userNotFound"){
										$loginError = "User not found";
										echo $loginError; 
									}
									else if($error == "wrongPassword"){
										$loginError = "Password is incorrect";
										echo $loginError; 
									}
									else if($error == "emptyFields"){
										$loginError = "Please fill in both fields";
										echo $loginError; 
									}
									else {
										$loginError = "";
										echo $loginError; 
									}
								}
						?>
					</span>
					<p align="center"><input class="btn" type="submit" name="login" value="Login"></p>
					<p align="center"><a href="#">Forgort password</a></p>
					<p align="center"><a href="signup.php">No account? sign up here!</a></p>
				</form>
			</div>
		</div>
	</main>

<?php require "footer.php" ?>