CREATE DATABASE swasthya;

CREATE TABLE doctor(
	doctor_id INT AUTO_INCREMENT PRIMARY KEY,
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
ALTER TABLE hospital ADD password varchar(255);

CREATE TABLE clinicReviews(
	id INT(100),
	review VARCHAR(200),
	email VARCHAR(200),
	charges VARCHAR(20),
	CONSTRAINT clin FOREIGN KEY (id) REFERENCES hospital(id); 
);

CREATE TABLE users(
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	fullName VARCHAR(100),
	age INT(5),
	loaction VARCHAR(200),
	dp_url VARCHAR(200),
	email VARCHAR(200),
	phone_no INT(10),
	password VARCHAR(255),
	t_and_c VARCHAR(20)
);

CREATE TABLE trainers(
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	fullName VARCHAR(100),
	age INT(5),
	loaction VARCHAR(200),
	dp_url VARCHAR(200),
	email VARCHAR(200),
	phone_no INT(10),
	password VARCHAR(255),
	t_and_c VARCHAR(20)
);

CREATE TABLE gyms(
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	fullName VARCHAR(100),
	age INT(5),
	loaction VARCHAR(200),
	dp_url VARCHAR(200),
	email VARCHAR(200),
	phone_no INT(10),
	password VARCHAR(255),
	t_and_c VARCHAR(20)
);

CREATE TABLE timeTable(
	id INT AUTO_INCREMENT PRIMARY KEY,
	doctor_id INT(100),
	clinic_name VARCHAR(255),
	address VARCHAR(255),
	time_start INT(10),
	days VARCHAR(10),
	profile_url VARCHAR(255),
	CONSTRAINT doc2 FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id)
);

CREATE TABLE doctorReviews(
	doctor_id INT(100),
	review VARCHAR(200),
	email VARCHAR(200),
	CONSTRAINT doc FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id); 
);

ALTER TABLE doctorReviews ADD user_id

CREATE TABLE posts(
	doctor_id INT(100),
	profile_url VARCHAR(255),
	url VARCHAR(255),
	CONSTRAINT docss FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id)
);

CREATE TABLE report(
	doctor_id INT(100),
	reason VARCHAR(200),
	reportDate Date,
	CONSTRAINT doc1 FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id)
);

CREATE TABLE patients(
	doctor_id INT(100),
	user_id INT(100),
	doctor_url VARCHAR(255),
	user_url VARCHAR(255),
	visit_date Date,
	book_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT docs FOREIGN KEY (doctor_id) REFERENCES doctor(doctor_id),
	CONSTRAINT pats FOREIGN KEY (user_id) REFERENCES users(user_id)
);

ALTER TABLE doctor ADD reg_date DATE DEFAULT GETDATE();
ALTER TABLE doctor ADD reg_time TIME DEFAULT CURRENT_TIMESTAMP;
/*reg_time based on server location*/
ALTER TABLE doctor ADD profile_url varchar(255);

ALTER TABLE gyms ADD profile_url varchar(255);

ALTER TABLE hospital ADD profile_url varchar(255);

ALTER TABLE trainers ADD profile_url varchar(255);

ALTER TABLE users ADD profile_url varchar(255);

ALTER TABLE timeTable ADD profile_url varchar(255);

ALTER TABLE timeTable ADD start_time TIME(0);
ALTER TABLE timeTable ADD end_time TIME(0);

ALTER TABLE doctor MODIFY COLUMN doctor_id INT auto_increment

ALTER TABLE doctor ADD show_phone BIT(1), ADD show_email BIT(1), ADD show_location BIT(1);

ALTER TABLE doctor ADD type INT(2);

ALTER TABLE timeTable ADD charges varchar(20);

ALTER TABLE doctor ADD description varchar(255);

ALTER TABLE doctor ADD qualification1 VARCHAR(100),ADD qualification2 VARCHAR(100),ADD qualification3 VARCHAR(100), ADD medicalCouncil VARCHAR(100), ADD languages VARCHAR(255), ADD yearReg VARCHAR(20), ADD regNo VARCHAR(50);

CREATE TABLE notifications(
	profile_url VARCHAR(255),
	notification VARCHAR(255),
	link VARCHAR(255),
	date_in DATE,
	seen_unseen VARCHAR(10) DEFAULT "no"
);
ALTER TABLE notifications ADD doctor_id VARCHAR(255);

ALTER TABLE notifications ADD id INT(200);

ALTER TABLE notifications ADD appointment_time time;


CREATE TABLE appointments(
    profile_url VARCHAR(255),
    doctor_id VARCHAR(255),
    appointment_time time,
	app_date DATE,
	confimed VARCHAR(20) DEFAULT "no",	
	clinic_id INT(100),
	booking_date DATE
);
ALTER TABLE appointments ADD booking_date DATE;
ALTER TABLE appointments ADD slot VARCHAR(100);
ALTER TABLE appointments ADD id INT AUTO_INCREMENT PRIMARY KEY;
/*////////////only one email per user*/

/*//end of code for db////////////////////////*/
/*//////////////billing part starts now!!!!!!!//////////////////////*/
CREATE TABLE timeDate (
    doctor_id INT,
    ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE timeTable;

INSERT INTO doctor(fullName, 
	speciality, 
	consultingCharges, 
	loaction, 
	email, 
	phone_no, 
	password, 
	t_and_c , 
	profile_url)VALUES('jaden','$speciality','0','location','furtadojaden','1234','1234','set','abcd');

INSERT INTO notifications(id,doctor_id,profile_url,notification,date_in,seen_unseen) VALUES();

CREATE TABLE notification(
	id INT AUTO_INCREMENT PRIMARY KEY,
	profile_url VARCHAR(255),
	notif_name VARCHAR(50),
	notif_date date,
	notif_time time,
	status VARCHAR(10)
);

ALTER TABLE notification ADD clinic_id INT(100);

ALTER TABLE ADD a_date_time DATETIME;

ALTER TABLE appointments ADD a_date_time DATETIME;
ALTER TABLE appointments ADD date_time DATETIME DEFAULT CURRENT_TIMESTAMP;