<?php require "includes/header.php" ?>

	<main>
		<div class="content">
			<?php
				if(isset($_SESSION['userID'])){
					if($_SESSION['userType'] == "User"){
						require "includes/home_content.php";
					}
					else{
						require "includes/expert_content.php";
					}
				}
				else{
					header("Location: index.php");
				}
			?>
			
		</div>
	</main>

<?php require "includes/footer.php" ?>

<!--you need another page where you list all your questions and their answers