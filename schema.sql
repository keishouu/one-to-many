CREATE TABLE AnimationCompany (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    company_name varchar(255),
    contact_info varchar(255),
    location varchar(255),
    established_date date,
    dateAdded timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE AnimationProjects (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_name varchar(255),
    animation_type varchar(255),
    company_id INT,
    status varchar(20),
    start_date date,
    end_date date,
    updated_by varchar(50),
    last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by VARCHAR(255)
);

CREATE  TABLE user_details (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    birthdate VARCHAR(50),
    address VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

