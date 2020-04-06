<?php
	include_once("lib/header.php") ;
	if(!$_SESSION["loggedIN"] && !isset($_SESSION["email"])){
		header("Location: login.php");
	}
	 echo "from Medical Team, stay safe";
	 include_once("lib/footer.php") ;
?>