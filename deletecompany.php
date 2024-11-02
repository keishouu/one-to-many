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
		<a href="index.php"><i class="fa-solid fa-caret-left"></i> Return to Home</a>
	</div>
	<div class="bodycontainer">
		<h1>Are you sure you want to delete this company?</h1>
		<?php $getCompanyByID = getCompanyByID($pdo, $_GET['company_id']); ?>
		<div class="container">
			<h2>Company Name: <?php echo $getCompanyByID['company_name']; ?></h2>
			<h2>Contact Information: <?php echo $getCompanyByID['contact_info']; ?></h2>
			<h2>Location: <?php echo $getCompanyByID['location']; ?></h2>
			<h2>Established Date: <?php echo $getCompanyByID['established_date']; ?></h2>
			<h2>Date Added: <?php echo $getCompanyByID['dateAdded']; ?></h2>
		</div>
			<div class="deleteBtn">
				<form action="core/handleForms.php?company_id=<?php echo $_GET['company_id']; ?>" method="POST">
					<button class="delBtn" name="deleteCompanyBtn">Delete</button>
				</form>			
			</div>	

	</div>
</body>
</html>