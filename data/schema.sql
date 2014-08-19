CREATE DATABASE iris;

USE iris;

DROP TABLE IF EXISTS user_feedbacks;
DROP TABLE IF EXISTS feedbacks;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS questions;


CREATE TABLE users (
id INT (11) NOT NULL AUTO_INCREMENT,
username VARCHAR (50) NOT NULL,
password VARCHAR (32) NOT NULL,
email_address VARCHAR (200) NOT NULL UNIQUE,
first_name VARCHAR (150) NULL,
last_name VARCHAR (150) NULL,
middle_name VARCHAR (150) NULL,
birthdate DATE NULL,
address VARCHAR (255) NULL,
image_url VARCHAR (255) NULL,
caps VARCHAR(255) NULL,
is_posted INT (1) NOT NULL DEFAULT 0,
date_added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
last_login DATE NOT NULL,
PRIMARY KEY (id)
);


CREATE TABLE questions (
id INT (11) NOT NULL AUTO_INCREMENT,
question BLOB NOT NULL,
date_added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
date_posted DATE NOT NULL,
PRIMARY KEY (id)
);


CREATE TABLE user_feedbacks (
id INT (11) NOT NULL AUTO_INCREMENT,
user_id INT (11) NOT NULL,
date_added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
INDEX ind_user (user_id),
    FOREIGN KEY (user_id) 
        REFERENCES users(id)
        ON UPDATE NO ACTION ON DELETE CASCADE,
PRIMARY KEY (id)
);


CREATE TABLE feedbacks (
id INT (11) NOT NULL AUTO_INCREMENT,
question_id INT (11) NOT NULL,
answer INT(1) NOT NULL,
date_added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
INDEX ind_question (question_id),
    FOREIGN KEY (question_id) 
        REFERENCES questions(id)
        ON UPDATE NO ACTION,
PRIMARY KEY (id)
);

INSERT INTO `iris`.`users` (`id`, `username`, `password`, `email_address`, `first_name`, `last_name`, `middle_name`, `birthdate`, `address`, `image_url`, `caps`, `is_posted`, `date_added`, `last_login`) VALUES (NULL, 'chalauron', MD5('chacha'), 'charlene.lauron@seer-technologies.com', 'Charlene', 'Lauron', 'Z', '1987-05-19', 'Malate, Manila', NULL, 'Dev', '0', CURRENT_TIMESTAMP, '2014-08-19');