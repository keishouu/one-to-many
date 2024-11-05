
<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<?php if (!isset($_SESSION['username'])) {
	header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Animation Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>Hello, <?php echo ($_SESSION['username']); ?>!</h1>
        <form action="core/handleForms.php" method="POST">
            <a style="font-weight:normal;font-size:2vh;" href="userlist.php">View Users</a>
            <button name="logoutBtn">Logout</button>
        </form>
    </div>
    <div class="bodycontainer">
        <h1>Motionix</h1>
        <h3>Add a Company!</h3>
            <form action="core/handleForms.php" method="POST">
                <p>
                    <label for="companyName">Company Name</label> 
                    <input type="text" name="companyName">
                </p>
                <p>
                    <label for="contactInfo">Contact Information</label> 
                    <input type="text" name="contactInfo">
                </p>
                <p>
                    <label for="location">Location</label> 
                    <input type="text" name="location">
                </p>
                <p>
                    <label for="establishedDate">Established Date</label> 
                    <input type="date" name="establishedDate">
                </p>
                <button name="insertCompanyBtn">Submit</button>
            </form>
    </div>
    <div class="imagecontainer">
        <img class="gifbg" src="assets\ngan-pham-lil-ants-anim-test-v06.gif">
        
    </div>

	<?php $getAllCompany = getAllCompany($pdo); ?>
	<?php foreach ($getAllCompany as $row) { ?>
	<div class="companycontainer">
        <div class="companydeets">
            <h3>Company Name: <?php echo $row['company_name']; ?></h3>
            <h3>Contact Information: <?php echo $row['contact_info']; ?></h3>
            <h3>Location: <?php echo $row['location']; ?></h3>
            <h3>Established Date : <?php echo $row['established_date']; ?></h3>
            <h3>Date Added: <?php echo $row['dateAdded']; ?></h3>
        </div>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewprojects.php?company_id=<?php echo $row['company_id']; ?>">View Projects</a>
			<a href="editcompany.php?company_id=<?php echo $row['company_id']; ?>">Edit</a>
			<a href="deletecompany.php?company_id=<?php echo $row['company_id']; ?>">Delete</a>
		</div>
	</div> 
	<?php } ?>
</body>
</html>