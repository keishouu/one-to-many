<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="overallstyle.css">
	<script src="https://kit.fontawesome.com/cd3bff5ff2.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="header">
		<a href="viewprojects.php?company_id=<?php echo $_GET['company_id']; ?>">
		<i class="fa-solid fa-caret-left"></i> View The Projects</a>
	</div>
	<div class="bodycontainer">
		<?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
		<h1>Are you sure you want to delete this project?</h1>
		<div class="container">
			<h2>Project Name: <?php echo $getProjectByID['project_name'] ?></h2>
			<h2>Animation Type: <?php echo $getProjectByID['animation_type'] ?></h2>
			<h2>Status: <?php echo $getProjectByID['status'] ?></h2>
			<h2>Start Date: <?php echo $getProjectByID['start_date'] ?></h2>
			<h2>End Date: <?php echo $getProjectByID['end_date'] ?></h2>
				
		</div>
		<div class="deleteBtn"">

				<form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&company_id=<?php echo $_GET['company_id']; ?>" method="POST">
					<button class="delBtn" name="deleteProjectBtn">Delete</button>
				</form>			
			</div>
	</div>
</body>
</html>