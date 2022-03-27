<?php require "header.php" ?>

	<main>
		<div class="content">
			<?php 
				if(isset($_SESSION['userID'])){
					if($_SESSION['username'] == "admin"){
						require "content/adminHome.content.php";
					}
				}
				else{
					echo "<p>You are logged out</p>";
				}
			?>
		</div>
	</main>

<?php require "footer.php" ?>