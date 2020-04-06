<?php
	include_once("lib/header.php") ;
	require_once("functions/alert.php");
	if(isset($_SESSION["loggedIN"]) && !empty($_SESSION["loggedIN"])){
		//redirect to dashboard
		header("Location: dashboard.php");
	}
	// $_SESSION['TESTING'] = "testing session";
	// print_r($_SESSION);
 ?>
			<p><strong>Welcome, please Register</strong></p>
			<h3>Register Here</h3>
			<p>All Fields are required </p>
			
			<form method="POST" action="processregister.php">
				<p>
					<?php
						print_alert();
					?>
				</p>
				
				<p>
					<label>First Name</label><br />
					<input 
						<?php
							if(isset($_SESSION['first_name'])){
								echo "value=" . $_SESSION['first_name'];
							}
						?>
					type="text" name="first_name" placeholder="First Name"/>
					
				</p>
				<p>
					<label>Last Name</label><br />
					<input 
						<?php
							if(isset($_SESSION['last_name'])){
								echo "value=" . $_SESSION['last_name'];
							}
						?>
					type="text" name="last_name" placeholder="last Name"/>
					
				</p>
				<p>
					<label>E-Mail</label><br />
					<input 
						<?php
							if(isset($_SESSION['email'])){
								echo "value=" . $_SESSION['email'];
							}
						?>
					type="email" name="email" placeholder="Enter your email"/>
					
				</p>
				<p>
					<label>Password</label><br />
					<input type="password" name="password" placeholder="password"/>
					
				</p>
				<p>
					<label>Gender</label><br />
					<select name="gender">
						<option 
							<?php
								if(isset($_SESSION['gender']) && $_SESSION['gender']=='female'){
								echo "Selected";
							}
						?> 
						value="female">Female</option>
						<option
								<?php
								if(isset($_SESSION['gender']) && $_SESSION['gender']=='male'){
								echo "Selected";
							}
						?> 
						value="male">Male</option>
					</select>
				</p>
				<hr />
				<p>
					<label>Designation</label><br />
					<select name="designation">
						<option 
							<?php
								if(isset($_SESSION['designation']) && $_SESSION['designation']=='Medical Team (MT)'){
								echo "Selected";
							}
						?> 
						value="medical Team">Medical Team(MT)</option>
						<option 
							<?php
								if(isset($_SESSION['designation']) && $_SESSION['designation']=='patient'){
								echo "Selected";
							}
						?> 
						value="patient">Patient</option>
					</select>
				</p>
				<p>
					<label>Department<label><br />
					<input <?php
							if(isset($_SESSION['department'])){
								echo "value=" . $_SESSION['department'];
							}
						?> 
						
					type="text" name="department" placeholder="Department"/>
				</p>
				<p>
					<button type="submit" name="register">Register</button>
				</p>
			</form>
<?php include_once("lib/footer.php") ;?>
			
	