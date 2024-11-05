<?php 
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Details</title>
	<script src="https://kit.fontawesome.com/cd3bff5ff2.js" crossorigin="anonymous"></script>
	<style>
		body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #eaeaea;
            padding-bottom: 5vh;
            padding-top: 2vh;
            display: flex;
            justify-content: center;
        }

        .header {
            background-color: #2c622e;
            padding: 1vh 1vw;
            display: flex;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            width: 98%;
        }

        .header h1 {
            font-size: 3vh;
            color: white;
            padding: 0;
            margin-right: 2vw;
        }

        .header a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: 0.5s;
            background-color: transparent;
            padding: 2vh;
            font-size: 3vh;
            border-radius: 25px;
            transition: 0.5s;
        }

        .header a:hover {
            background-color: #183619;
        }

        .bodycontainer {
            color: #2c622e;
            background-color: rgba(255, 255, 255, 0.4);
            box-shadow: 8px 8px 5px #b1b1b1b2;
            border-radius: 25px;
            width: 70vw;
            height: 70vh;
            margin-top: 10vh;
			padding: 5vh 5vw;
			
        }

        .bodycontainer h1 {
            font-size: 5vh;
        }

	</style>
</head>
<body>
<div class="header"> 
        <a href="index.php"><i class="fa-solid fa-caret-left"></i> Return to Home</a>
    </div>
	<div class="bodycontainer">
		<?php $getUserByID = getUserByID($pdo, $_GET['user_id']); ?>
		<h1>Username: <?php echo $getUserByID['username']; ?></h1>
		<h1>First Name: <?php echo $getUserByID['first_name']; ?></h1>
		<h1>Last Name: <?php echo $getUserByID['last_name']; ?></h1>
		<h1>Birthdate: <?php echo $getUserByID['birthdate']; ?></h1>
		<h1>Address: <?php echo $getUserByID['address']; ?></h1>
		<h1>Email: <?php echo $getUserByID['email']; ?></h1>
		<h1>Date Joined: <?php echo $getUserByID['date_added']; ?></h1>
	</div>
</body>
</html>