<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Motionix Login</title>
	<link rel="stylesheet" href="userdetails.css">
</head>
<body>
	<div class="bodycontainer">
		
		<div class="formcontainer">
			<div class="imageholder">
				<img src="assets\ngan-pham-tower-with-scenery-close-up-v03-small.jpg" >
			</div>
			<div class="form">
				<h1>Motionix</h1>
				<h3>Welcome!</h3>
				<?php if (isset($_SESSION['message'])) { ?>
				<h4 style="color: red;"><?php echo $_SESSION['message']; ?></h4>
				<?php } unset($_SESSION['message']); ?>
				<form action="core/handleForms.php" method="POST">
					<p>
						<label for="username">Username</label>
						<input type="text" name="username">
					</p>
					<p>
						<label for="password">Password</label>
						<input type="password" name="password">
						
					</p>
					<button name="loginUserBtn">Login</button>
				</form>
				
					<h6>Don't have an account? Register <a class="hereBtn" href="register.php">here</a></h6>
			</div>
		

		</div>
	</div>
</body>	
</html>