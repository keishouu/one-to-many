<?php

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertCompanyBtn'])) {

	$query = insertCompany($pdo, $_POST['companyName'], $_POST['contactInfo'], 
		$_POST['location'], $_POST['establishedDate']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editCompanyBtn'])) {
	$query = updateCompany($pdo, $_POST['companyName'], $_POST['contactInfo'], 
		$_POST['location'], $_POST['establishedDate'], $_GET['company_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Edit failed";;
	}

}




if (isset($_POST['deleteCompanyBtn'])) {
	$query = deleteCompany($pdo, $_GET['company_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}




if (isset($_POST['insertNewProjectBtn'])) {
    $query = insertProject($pdo, $_POST['projectName'], $_POST['animationType'], $_GET['company_id'], $_POST['status'], $_POST['startDate'], $_POST['endDate']);

	if ($query) {
		header("Location: ../viewprojects.php?company_id=" .$_GET['company_id']);
	}
	else {
		echo "Insertion failed";
	}
}




if (isset($_POST['editProjectBtn'])) {
	$query = updateProject($pdo, $_POST['projectName'], $_POST['animationType'], $_POST['status'], $_POST['startDate'], $_POST['endDate'], $_GET['project_id']);

	if ($query) {
		header("Location: ../viewprojects.php?company_id=" .$_GET['company_id']);
	}
	else {
		echo "Update failed";
	}

}




if (isset($_POST['deleteProjectBtn'])) {
	$query = deleteProject($pdo, $_GET['project_id']);

	if ($query) {
		header("Location: ../viewprojects.php?company_id=" .$_GET['company_id']);
	}
	else {
		echo "Deletion failed";
	}
}
?>