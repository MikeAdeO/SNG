<?php
	// print_r($_POST);
include_once("lib/header.php") ;
	
	$errorCount = 0;
	$email = $_POST["email"] != "" ? $_POST["email"] : $errorCount++;
	$password =  $_POST["password"] !="" ? $_POST["password"] : $errorCount;
	
	$_SESSION["email"] = $email;
	
	if($errorCount > 0){
		$session_error = "You have " . $errorCount . "error";
			if($errorCount > 1){
				$session_error .= "s";
			}
			$session_error .= "in your form submission";
			$_SESSION["error"] = $session_error;
		header("Location: Login.php");
	}else{
		$allUsers = scandir("db/users/");
		
		
		$countAllUsers = count($allUsers);
		
		for($counter= 0; $counter < $countAllUsers ; $counter++){
			$currentUser = $allUsers[$counter];
			
				if($currentUser = $email. ".json"){
					$userString = file_get_contents("db/users/".$currentUser);
					$userObject = json_decode($userString);
					$passwordFromDB = $userObject->password;
					 
					 $passwordFromUser = password_verify($password,$passwordFromDB );
						if($passwordFromDB == $passwordFromUser){
							
							//redirect to dashboard
							$_SESSION["loggedIN"]= $userObject-> email;
							$_SESSION["email"]= $userObject-> email;
							$_SESSION["full_name"] = $userObject -> first_name . " " . $userObject->last_name;	
							$_SESSION["role"]= $userObject-> designation;
							if($userObject->designation == "patient"){
								header("Location:patients.php");
							}else{
								header("Location: medicalTeam.php");}

							die();
						}
					
					
				}
		}
		$_SESSION["error"] = "invalid email or password";
		header("Location: login.php");
		die();
	}
  include_once("lib/footer.php") ;?>	