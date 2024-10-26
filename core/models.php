<?php  

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



function updateCompany($pdo, $contact_info, $location, 
	$established_date, $company_id) {

	$sql = "UPDATE AnimationCompany
				SET contact_info = ?,
					location = ?,
					established_date = ?, 
				WHERE company_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$contact_info, $location, 
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





function getAnimationProjectsByWebDev($pdo, $company_id) {
	
	$sql = "SELECT 
				AnimationProjects.project_id AS project_id,
				AnimationProjects.project_name AS project_name,
				AnimationProjects.animation_type AS animation_type,
				AnimationProjects.company_id AS company_id,
                AnimationProjects.status AS status,
                AnimationProjects.start_date AS start_date,
                AnimationProjects.end_date AS end_date,
				CONCAT(AnimationCompany.contact_info,' ',AnimationCompany.location) AS project_owner
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


function insertProject($pdo, $project_name, $animation_type, $company_id, $status, $start_date, $end_date) {
	$sql = "INSERT INTO AnimationProjects (project_name, animation_type, company_id, status, start_date, end_date) VALUES (?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $animation_type, $company_id, $status, $start_date, $end_date]);
	if ($executeQuery) {
		return true;
	}

}

function getProjectByID($pdo, $project_id) {
	$sql = "SELECT 
				AnimationProjects.project_id AS project_id,
				AnimationProjects.project_name AS project_name,
				AnimationProjects.animation_type AS animation_type,
				AnimationProjects.company_id AS company_id,
                AnimationProjects.status AS status,
                AnimationProjects.start_date AS start_date,
                AnimationProjects.end_date AS end_date,
			FROM AnimationProjects
			JOIN AnimationCompany ON AnimationProjects.company_id = AnimationCompany.company_id
			WHERE AnimationProjects.project_id  = ? 
			GROUP BY AnimationProjects.project_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateProject($pdo, $project_name, $animation_type, $company_id, $status, $start_date, $end_date, $project_id) {
	$sql = "UPDATE AnimationProjects
			SET project_name = ?,
				animation_type = ?,
                company_id = ?,
                status = ?,
                start_date = ?,
                end_date = ?
			WHERE project_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $animation_type, $company_id, $status, $start_date, $end_date, $project_id]);

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




?>