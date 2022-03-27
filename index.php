<?php 
		session_start();
		session_unset();
		session_destroy();
		require "includes/header.php";
		require "includes/login_content.php";
		require "includes/footer.php";
?>