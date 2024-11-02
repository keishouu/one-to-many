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
    end_date date
);


