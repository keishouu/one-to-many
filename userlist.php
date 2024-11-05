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
	<title>Document</title>
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
            width: 80vw;
            height: 80vh;
            margin-top: 10vh;
            padding-left: 2vw;
        }

        .bodycontainer h1 {
            font-size: 5vh;
        }

        .bodycontainer h3 {
            margin-bottom: -1vh;
        }

        li {
            padding: 0.5vh;
        }

        li a{
            text-decoration: none;
            color: #183619;
        }
    </style>
</head>
<body>
    <div class="header"> 
        <a href="index.php"><i class="fa-solid fa-caret-left"></i> Return to Home</a>
        <h1><?php echo ($_SESSION['username']); ?></h1>
    </div>
    <div class="bodycontainer">
	<h3>Users List</h3>
	<ul>
		<?php $getAllUsers = getAllUsers($pdo); ?>
		<?php foreach ($getAllUsers as $row) { ?>
			<li>
				<a href="viewuser.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a>
			</li>
		<?php } ?>
	</ul>
    </div>

	
</body>
</html>