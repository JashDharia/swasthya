CREATE DATABASE swasthya;

CREATE TABLE doctor(
	doctor_id AUTO_INCREMENT PRIMARY KEY,
	fullName VARCHAR(100),
	speciality VARCHAR(100),
	mediaclLicence_url VARCHAR(100),
	consultingCharges INT(100),
	id INT(100),
	loaction VARCHAR(200),
	dp_url VARCHAR(200),
	email VARCHAR(200),
	phone_no INT(10),
	password VARCHAR(255),
	t_and_c VARCHAR(20),
	verified VARCHAR(20)
);
/*to add foreign key id reffers clinic id*/
CREATE TABLE hospital(
	id INT(100),
	clinic_name VARCHAR(200),
	location VARCHAR(200),
	mobile_no INT(10),
	website VARCHAR(200),
	t_and_c VARCHAR(20),
	verified VARCHAR(20),
	PRIMARY KEY (id)
);

CREATE TABLE clinicReviews(
	id INT(100),
	review VARCHAR(200),
	email VARCHAR(200),
	CONSTRAINT clin FOREIGN KEY (id) REFERENCES hospital(id); 
);

CREATE TABLE doctorReviews(
	doctor_id INT(100),
	review VARCHAR(200),
	email VARCHAR(200),
	CONSTRAINT doc FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id); 
);

CREATE TABLE report(
	doctor_id INT(100),
	reason VARCHAR(200),
	reportDate Date(),
	CONSTRAINT doc1 FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id)
);


ALTER TABLE doctor ADD profile_url varchar(255);

ALTER TABLE doctor MODIFY COLUMN doctor_id INT auto_increment

ALTER TABLE doctor ADD show_phone BIT(1), ADD show_email BIT(1), ADD show_location BIT(1);



CREATE TABLE doctor(
	doctor_id int AUTO_INCREMENT PRIMARY KEY,
	fullName VARCHAR(100),
	speciality VARCHAR(100),
	mediaclLicence_url VARCHAR(100),
	consultingCharges INT(100),
	id INT(100),
	loaction VARCHAR(200),
	dp_url VARCHAR(200),
	email VARCHAR(200),
	phone_no INT(10),
	password VARCHAR(255),
	t_and_c VARCHAR(20),
	verified VARCHAR(20),
	profile_url VARCHAR(255)
);



/*////////////only one email per user*/
ALTER TABLE doctor
ADD CONSTRAINT UC_Person UNIQUE (email);

/*billing part starts now!!!!!!!//////////////////////
