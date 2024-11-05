<?php

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['registerUserBtn'])) {

	$username = $_POST['username'];
	$first_name = $_POST['first_name']; 
	$last_name = $_POST['last_name'];
	$birthdate = $_POST['birthdate'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($birthdate) && !empty($address) && !empty($email) && !empty($password)) {

		$insertQuery = insertNewUser($pdo, $username, $first_name, $last_name, $birthdate, $address, $email, $password);

		if ($insertQuery) {
			header("Location: ../login.php");
		}
		else {
			header("Location: ../register.php");
		}
	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for registration!";

		header("Location: ../login.php");
	}

}




if (isset($_POST['loginUserBtn'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($username) && !empty($password)) {

		$loginQuery = loginUser($pdo, $username, $password);
	
		if ($loginQuery) {
			header("Location: ../index.php");
		}
		else {
			header("Location: ../login.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure the input fields 
		are not empty for the login!";
		header("Location: ../login.php");
	}
 
}



if (isset($_POST['logoutBtn'])) {
	logoutUser();
}



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
    if (isset($_SESSION['username'])) { // Check if the session has a username
        $username = $_SESSION['username'];
        $query = insertProject($pdo, $_POST['projectName'], $_POST['animationType'], $_GET['company_id'], $_POST['status'], $_POST['startDate'], $_POST['endDate'], $username);

        if ($query) {
            header("Location: ../viewprojects.php?company_id=" . $_GET['company_id']);
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Error: Username not set in session.";
    }
}




if (isset($_POST['editProjectBtn'])) {
    $username = $_SESSION['username'];
    $query = updateProject($pdo, $_POST['projectName'], $_POST['animationType'], $_POST['status'], $_POST['startDate'], $_POST['endDate'], $username, $_GET['project_id']);

    if ($query) {
        header("Location: ../viewprojects.php?company_id=" . $_GET['company_id']);
    } else {
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