 <?php 
	
	session_start();
	require_once("functions/alert.php");
	require_once("functions/redirect.php");
	require_once("functions/token.php");
	require_once("functions/email.php");
	//collecting data
	$errorCount = 0;
	
	$email = $_POST["email"]!="" ? $_POST["email"]: $errorCount++;
	$_SESSION['email'] = $email;
	
	if($errorCount > 0){
		
		$session_error = "You have " . $errorCount . "error";
			if($errorCount > 1){
				
				$session_error .= "s";
			}
				
			$session_error .= "in your form submission";
			set_alert("error", $session_error);
			
		header("Location: forgotPassword.php");
	}else{
		$allUsers = scandir("db/users/");
		$countAllUsers = count($allUsers);
		 for($counter = 0; $counter < $countAllUsers; $counter++){
			 $currentUser = $allUsers[$counter];
			 
			 if($currentUser == $email.".json"){
					//send email and redirect to forget password page
					
					$token = generate_token();
							
					
					$subject= "Password Reset Link";
					$message =  " a password reset has been initiated from your account , if you did not
					 initiate this reset, please ignore this message, otherwise, visit: localhost/SNG/reset.php?token=".$token;
					
					file_put_contents("db/tokens/".$email . ".json",json_encode(["token" => $token]));
					
						send_mail($subject, $message, $email);
				 die();
			 }
		 }
		 set_alert("error", "Email not registered with us ERR:".$email );
			redirect_to("forgotPassword.php");
	}
	
 
 ?>