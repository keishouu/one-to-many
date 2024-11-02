<?php require_once 'core/handleForms.php'; ?>
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
		<a href="index.php"><i class="fa-solid fa-caret-left"></i> Return to Home</a>
	</div>
	<div class="bodycontainer">
	<?php $getCompanyByID = getCompanyByID($pdo, $_GET['company_id']); ?>
	<h1>Edit Company Details</h1>
	<form action="core/handleForms.php?company_id=<?php echo $_GET['company_id']; ?>" method="POST">
		<p>
			<label for="companyName">Company Name</label> 
			<input type="text" name="companyName" value="<?php echo $getCompanyByID['company_name']; ?>">
		</p>
		<p>
			<label for="contactInfo">Contact Information</label> 
			<input type="text" name="contactInfo" value="<?php echo $getCompanyByID['contact_info']; ?>">
		</p>
		<p>
			<label for="location">Location</label> 
			<input type="text" name="location" value="<?php echo $getCompanyByID['location']; ?>">
		</p>
		<p>
			<label for="establishedDate">Established Date</label> 
			<input type="date" name="establishedDate" value="<?php echo $getCompanyByID['established_date']; ?>">
		</p>
		<button name="editCompanyBtn">Submit</button>
	</form>
	</div>
</body>
</html>