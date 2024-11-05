<?php  

require_once 'dbConfig.php';

function insertNewUser($pdo, $username, $first_name, $last_name, $birthdate, $address, $email, $password) {

	$checkUserSql = "SELECT * FROM user_details WHERE username = ?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);

	if ($checkUserSqlStmt->rowCount() == 0) {
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user_details (username, first_name, last_name, birthdate, address, email ,password) VALUES(?,?,?,?,?,?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $first_name, $last_name, $birthdate, $address, $email, $hashedPassword]);

		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted";
			return true;
		}

		else {
			$_SESSION['message'] = "An error occured from the query";
		}

	}
	else {
		$_SESSION['message'] = "User already exists";
	}

	
}



function loginUser($pdo, $username, $password) {
    $sql = "SELECT * FROM user_details WHERE username=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]); 

    if ($stmt->rowCount() == 1) {
        $userInfoRow = $stmt->fetch();
        $passwordFromDB = $userInfoRow['password'];

        if (password_verify($password, $passwordFromDB)) {
			$_SESSION['username'] = $userInfoRow['username'];
			$_SESSION['message'] = "Login successful!";
			return true;
		} else {
			$_SESSION['message'] = "Wrong Password!";
		}
    } else {
        $_SESSION['message'] = "Username not found! Register First!";
    }
}

function getAllUsers($pdo) {
	$sql = "SELECT * FROM user_details";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}

}


function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM user_details WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function insertCompany($pdo, $company_name, $contact_info, $location, 
	$established_date) {

	$sql = "INSERT INTO AnimationCompany (company_name, contact_info, location, 
		established_date) VALUES(?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$company_name, $contact_info, $location, 
		$established_date]);

	if ($executeQuery) {
		return true;
	}
}



function updateCompany($pdo, $company_name, $contact_info, $location, 
	$established_date, $company_id) {

	$sql = "UPDATE AnimationCompany
				SET company_name = ?,
					contact_info = ?,
					location = ?,
					established_date = ?
				WHERE company_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$company_name, $contact_info, $location, 
		$established_date, $company_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteCompany($pdo, $company_id) {
	$deleteCompanyProj = "DELETE FROM AnimationProjects WHERE company_id = ?";
	$deleteStmt = $pdo->prepare($deleteCompanyProj);
	$executeDeleteQuery = $deleteStmt->execute([$company_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM AnimationCompany WHERE company_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$company_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllCompany($pdo) {
	$sql = "SELECT * FROM AnimationCompany";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getCompanyByID($pdo, $company_id) {
	$sql = "SELECT * FROM AnimationCompany WHERE company_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$company_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getProjectsByCompany($pdo, $company_id) {
	
	$sql = "SELECT 
				AnimationProjects.project_id AS project_id,
				AnimationProjects.project_name AS project_name,
				AnimationProjects.animation_type AS animation_type,
				AnimationProjects.company_id AS company_id,
                AnimationProjects.status AS status,
                AnimationProjects.start_date AS start_date,
                AnimationProjects.end_date AS end_date,
				AnimationProjects.updated_by AS updated_by,
				CONCAT(AnimationCompany.company_id,' ',AnimationCompany.company_id) AS company
			FROM AnimationProjects
			JOIN AnimationCompany ON AnimationProjects.company_id = AnimationCompany.company_id
			WHERE AnimationProjects.company_id = ? 
			GROUP BY AnimationProjects.project_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$company_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertProject($pdo, $project_name, $animation_type, $company_id, $status, $start_date, $end_date, $username) {
	$sql = "INSERT INTO AnimationProjects (project_name, animation_type, company_id, status, start_date, end_date, updated_by) VALUES (?,?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $animation_type, $company_id, $status, $start_date, $end_date, $username]);
	if ($executeQuery) {
		return true;
	}

}

function getProjectByID($pdo, $project_id) {
    $sql = "SELECT 
                AnimationProjects.project_id AS project_id,
                AnimationProjects.project_name AS project_name,
                AnimationProjects.animation_type AS animation_type,
                AnimationProjects.status AS status,
                AnimationProjects.start_date AS start_date,
                AnimationProjects.end_date AS end_date,
                AnimationCompany.company_name AS company_name 
            FROM AnimationProjects
            JOIN AnimationCompany ON AnimationProjects.company_id = AnimationCompany.company_id
            WHERE AnimationProjects.project_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$project_id]);
    if ($executeQuery) {
        return $stmt->fetch(); 
    }
    return null;
}



function updateProject($pdo, $project_name, $animation_type, $status, $start_date, $end_date, $username, $project_id) {
    $sql = "UPDATE AnimationProjects
            SET project_name = ?,
                animation_type = ?,
                status = ?,
                start_date = ?,
                end_date = ?,
                updated_by = ?
            WHERE project_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$project_name, $animation_type, $status, $start_date, $end_date, $username, $project_id]);

    if ($executeQuery) {
        return true;
    }
}



function deleteProject($pdo, $project_id) {
	$sql = "DELETE FROM AnimationProjects WHERE project_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return true;
	}
}

function getAllInfoByCompanyID($pdo, $company_id) {
	$sql = "SELECT company_id, company_name, contact_info, location, established_date 
			FROM AnimationCompany 
            WHERE company_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$company_id]);

	if ($executeQuery) {
		return $stmt->fetch();  
	}
	return null; 
}

function logoutUser() {
    session_unset(); // Clear all session variables
    session_destroy(); // Destroy the session
    header("Location: ../login.php"); // Redirect to login page
    exit;
}

?>