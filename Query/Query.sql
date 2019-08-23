CREATE DATABASE newsappsystem;

CREATE TABLE post_news (
	post_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	post_topic VARCHAR(100) NOT NULL,
	post_author VARCHAR(100) NOT NULL,
	post_summary TEXT NOT NULL,
	post_article TEXT NOT NULL,
	post_cat VARCHAR(150) NOT NULL,
	post_date DATE,
	post_time TIME
	);


CREATE TABLE subscribers(
	sub_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	sub_name VARCHAR (100) NOT NULL,
	sub_email VARCHAR(150) NOT NULL,
	sub_cat VARCHAR(50) NOT NULL,
	sub_date DATE,
	sub_time TIME
	);

CREATE TABLE admin(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(30) NOT NULL,
	name VARCHAR(50) NOT NULL,
	password VARCHAR(30) NOT NULL
	);

CREATE TABLE identifier(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT(30) NOT NULL,
	cat_id INT(30) NOT NULL
	);
