<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
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
		<h1>Edit Project</h1>
		<?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
		<form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>
		&company_id=<?php echo $_GET['company_id']; ?>" method="POST">
			<p>
				<label for="projectName">Project Name</label> 
				<input type="text" name="projectName" 
				value="<?php echo $getProjectByID['project_name']; ?>">
			</p>
			<p>
				<label for="animationType">Animation Type</label> 
				<input type="text" name="animationType" 
				value="<?php echo $getProjectByID['animation_type']; ?>">
			</p>
			<p>
				<label for="status">Status</label> 
				<input type="text" name="status" 
				value="<?php echo $getProjectByID['status']; ?>">
			</p>
			<p>
				<label for="startDate">Start Date</label> 
				<input type="date" name="startDate" 
				value="<?php echo $getProjectByID['start_date']; ?>">
			</p>
			<p>
				<label for="endDate">End Date</label> 
				<input type="date" name="endDate" 
				value="<?php echo $getProjectByID['end_date']; ?>">
			</p>
			<button name="editProjectBtn">Submit</button>
		</form>
	</div>
</body>
</html>