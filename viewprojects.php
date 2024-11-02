<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="viewerstyle.css">
	<script src="https://kit.fontawesome.com/cd3bff5ff2.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="header">
		<a href="index.php"><i class="fa-solid fa-caret-left"></i> Return to Home</a>
	</div>
	<div class="bodycontainer">
		<?php $getAllInfoByCompanyID = getAllInfoByCompanyID($pdo, $_GET['company_id']); ?>
		<h1><?php echo $getAllInfoByCompanyID['company_name']; ?></h1>
		<h3>Add New Project!</h3>
		<div class="formcontainer">
			<form action="core/handleForms.php?company_id=<?php echo $_GET['company_id']; ?>" method="POST">
				<p>
					<label for="firstName">Project Name</label> 
					<input type="text" name="projectName">
				</p>
				<p>
					<label for="animationType">Animation Type</label> 
					<input type="text" name="animationType">
				</p>
				<p>
					<label for="status">Status</label> 
					<input type="text" name="status">
				</p>
				<p>
					<label for="startDate">Start Date</label> 
					<input type="date" name="startDate">
				</p>
				<p>
					<label for="endDate">End Date</label> 
					<input type="date" name="endDate">
				</p>

				<button name="insertNewProjectBtn">Submit</button>
			</form>
		</div>
	</div>

	<table>
	  <tr>
	    <th>Project ID</th>
	    <th>Project Name</th>
	    <th>Animation Type</th>
        <th>Status</th>
        <th>Start Date</th>
        <th>End Date</th>
		<th></th>
	  </tr>
	  <?php $getProjectsByCompany = getProjectsByCompany($pdo, $_GET['company_id']); ?>
	  <?php foreach ($getProjectsByCompany as $row) { ?>
	  <tr>
	  	<td><?php echo $row['project_id']; ?></td>	  	
	  	<td><?php echo $row['project_name']; ?></td>	  	
	  	<td><?php echo $row['animation_type']; ?></td>	  	
        <td><?php echo $row['status']; ?></td>
    	<td><?php echo $row['start_date']; ?></td>
        <td><?php echo $row['end_date']; ?></td>	  	
	  	<td class="btns">
	  		<a class="tableBtn" href="editproject.php?project_id=<?php echo $row['project_id']; ?>&company_id=<?php echo $_GET['company_id']; ?>">Edit</a>

	  		<a class="tableBtn" href="deleteproject.php?project_id=<?php echo $row['project_id']; ?>&company_id=<?php echo $_GET['company_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>