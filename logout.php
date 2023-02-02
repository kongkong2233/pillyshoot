<?php 
  include 'login_head.php';
?>

<?php
	require_once("tools.php");
	
	session_start_if_none();
	unset($_SESSION["uid"]);
	unset($_SESSION["uname"]);	
		
	goNow(MAIN_PAGE);
?>