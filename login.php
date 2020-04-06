<?php   include_once("lib/header.php") ;
		require_once("functions/alert.php");
		if(isset($_SESSION["loggedIN"]) && !empty($_SESSION["loggedIN"])){
		//redirect to dashboard
		header("Location: dashboard.php");
	}
	?>
	<h3>Login</h3>
	<p>
		<?php print_alert();?>
	</p>
			<form action="processlogin.php" method="POST">
				
				<p>
					<label>Email</label><br />
					<input 
						<?php
							if(isset($_SESSION["email"])){
								echo "value= " . $_SESSION["email"];
							}
						?> type="email" name="email" placeholder="email"/>
					
				</p>
				<p>
					<label>Password</label><br />
					<input type="password" name="password" />
				</p>
				<p>
					<button type="submit" name="login">Login</button>
				</p>
				
			</form>
<?php include_once("lib/footer.php") ;?>
			
	