<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Motionix Registration</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="imageholder">
				<img src="assets\ngan-pham-03-2-resize.jpg" >
		</div>
    <div class="bodycontainer">
        <div class="formcontainer">
        <h1>Motionix</h1>
        <h3>Welcome to Motionix! Register here.</h3>
        <?php if (isset($_SESSION['message'])) { ?>
            <h3 style="color: red;"><?php echo $_SESSION['message']; ?></h3>
        <?php } unset($_SESSION['message']); ?>
        <form action="core/handleForms.php" method="POST">
            <div class="wholeform">
                <div class="formone">
                    <p>
                        <label for="username">Username</label>
                        <input type="text" name="username">
                    </p>
                    <p>
                        <label for="password">Password</label>
                        <input type="password" name="password">
                    </p>
                </div>
                <div class="formtwo">
                    <p>
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name">
                    </p>
                    <p>
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name">
                    </p>
                    <p>
                        <label for="birthdate">Birthdate</label>
                        <input type="date" name="birthdate">
                    </p>
                    <p>
                        <label for="address">Address</label>
                        <input type="text" name="address">
                    </p>
                    <p>
                        <label for="email">Email</label>
                        <input type="text" name="email">
                    </p>
                </div>
            </div>
            <div class="formbtn">
                <button name="registerUserBtn">Submit</button>
            </div>
        </form>
        <h6>Already have an Account? Sign in <a class="hereBtn" href="login.php">here</a></h6>
        </div>
    </div>
</body>
</html>