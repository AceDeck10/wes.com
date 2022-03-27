<?php
	session_start();
	session_unset();
	session_destroy();
	require "includes/header.php";
	require "includes/signup_content.php";
	require "includes/footer.php";
 ?>