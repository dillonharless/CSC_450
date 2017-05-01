<?php
require_once ('../reg_conn.php'); //requires the regular connection for not https.
session_start(); //session starts
//This will destroy the session and will display a log out message. 
		if (isset($_SESSION['firstName'])){
			$firstname = $_SESSION['firstName'];
			$_SESSION = array();
			session_destroy(); //destroys the session.
			setcookie('PHPSESSID', '', time()-3600, '/'); //sets the time of the cookie.
			$message = "You are now logged out, $firstname";
			$message2 = "See you next time";
		} else {
			$message = 'You have reached this page in error';
			$message2 = 'Please use the menu at the right';
		}
		require 'includes/Header.php';
		?>
		<style>
		body {
			padding-top: 200px;
			padding-bottom: 40px;
			background-color: #e6e6e6;
		}
		</style>
		<main>
		<?php

		echo '<h2>'.$message.'</h2>';
		echo '<h3>'.$message2.'</h3>';
		?>

	</main>
	<?php // Include the footer and quit the script:
	include ('./includes/Footer.php');
	?>
