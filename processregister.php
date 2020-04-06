<?php
	include_once("lib/header.php") ;
	require_once("functions/user.php");
	// print_r($_POST);
	
	//collecting Data
	$errorCount = 0;
	$first_name = $_POST["first_name"]!="" ? $_POST["first_name"]: $errorCount++;
	$last_name = $_POST["last_name"]!="" ? $_POST["last_name"]: $errorCount++;
	$email = $_POST["email"]!="" ? $_POST["email"]: $errorCount++;
	$gender = $_POST["gender"]!="" ? $_POST["gender"]: $errorCount++;
	$password = $_POST["password"]!="" ? $_POST["password"]: $errorCount++;
	$designation = $_POST["designation"]!="" ? $_POST["designation"]: $errorCount++;
	$department = $_POST["department"]!="" ? $_POST["department"]: $errorCount++;
	
	
	$_SESSION['first_name'] = $first_name;
	$_SESSION['last_name'] = $last_name;
	$_SESSION['email'] = $email;
	$_SESSION['gender'] = $gender;
	$_SESSION['password'] = $password;
	$_SESSION['designation'] = $designation;
	$_SESSION['department'] = $department;
	
	if($errorCount > 0){
		
		$session_error = "You have " . $errorCount . "error";
			if($errorCount > 1){
				$session_error .= "s";
			}
			$session_error .= "in your form submission";
			$_SESSION["error"] = $session_error;
		header("Location: register.php");
	}else{
		
		
		$newUserId= ($countAllUsers - 1);
		$userObject = [
			"id" => 1,
			"first_name" => $last_name,
			"email" => $email,
			"password" => password_hash($password, PASSWORD_DEFAULT),
			"gender" => $gender,
			"designation" => $designation,
			"department" => $department
		]; 
		
		//Check if user exist
		$userExists = find_user($email);
		if($userExists){
				 $_SESSION["error"] = "registration failed , user already exist";
				 header("Location: register.php");
				 die();
			 }
		 }
		
		//save to directory or database
				save_user($userObject);
			$_SESSION["message"] = "Registration Sucessful, you can now login!". $first_name;
			header("Location: login.php");
	
	
	
include_once("lib/footer.php") ;?>	