-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 30, 2020 at 07:07 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `WAD2PROJ` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `WAD2PROJ`;


DROP TABLE IF EXISTS `USERS`;
CREATE TABLE IF NOT EXISTS `USERS` 
(
	email varchar(100) NOT NULL,
	last_Name varchar(255) NOT NULL,
	first_Name varchar(255) DEFAULT NULL, 
	password varchar(255) NOT NULL,
	contact_Num int(8),
	telegram varchar(20) DEFAULT NULL,
	PRIMARY KEY(email)
);


DROP TABLE IF EXISTS `BOOK_LISTING`;
CREATE TABLE IF NOT EXISTS BOOK_LISTING
(
	l_id INT(10) NOT NULL AUTO_INCREMENT,
	owner_email varchar(100) NOT NULL,
	isbn varchar(255),
	book_title varchar(50) NOT NULL,
	item_desc varchar(255),
	author varchar(255),
	availability int(1) default 1,
	
	PRIMARY KEY(l_id),
	FOREIGN KEY (owner_email) REFERENCES Users(email)
);


DROP TABLE IF EXISTS `BOOK_GENRE`;
CREATE TABLE IF NOT EXISTS BOOK_GENRE
(
	l_id INT(10) NOT NULL,
	genre varchar(255) NOT NULL,
	
	PRIMARY KEY(l_id, genre),
	FOREIGN KEY (l_id) REFERENCES BOOK_LISTING(l_id)
);


DROP TABLE IF EXISTS `TRADES`;
CREATE TABLE IF NOT EXISTS TRADES
(
	first_lid INT(10) NOT NULL,
	sec_lid INT(10) NOT NULL, 
	first_email varchar(100) NOT NULL,
	sec_email varchar(100) NOT NULL,
	availability int(1) DEFAULT 1,
	PRIMARY KEY(first_lid, sec_lid, first_email, sec_email),
	FOREIGN KEY (first_lid) REFERENCES BOOK_LISTING(l_id),
	FOREIGN KEY (sec_lid) REFERENCES BOOK_LISTING(l_id),
	FOREIGN KEY (first_email) REFERENCES USERS(email),
	FOREIGN KEY (sec_email) REFERENCES USERS(email)
);




/*10 users*/

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram ) #pdopads8
VALUES ('infinty@yahoo.com', 'Johnny', 'Sins', '5dec21f340305b973b935cef098d7c6f', '9683722','doggy123');

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )  #smu12345
VALUES ('jackandthebean@hotmail.com','Jason', 'Lim', '7919fce5dbfa0b6f068d7368018f2050', '9683731', 'pureBlack');

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )   #plxzl2Aos2
VALUES ('justinbieber@mail.com','Rooster', 'Tan', 'eeb02279ec56ece385d698571931a641', '9552731', 'machina');   

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )   #mlpodsaj21B
VALUES ('coffebean@hotmail.com','Jonathan', 'Lim', 'cb8c1f136b478379538acc8bc08a25a9', '9559131', 'smurocks');  

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )   #wdaoid82aspoOP
VALUES ('unicorn666@gmail.com','Faith', 'Lim', 'b8c9ea8a15b7030814d6a5b36ab09111', '8559131', 'joinGood');  

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )   #Monodsa28S
VALUES ('yomhanks@yahoo.com','Sammy', 'Geeks', '03272fb328e7e8062aa35b8e41a1d9d7', '8779111', 'poeye21');  

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )   #Mondraw12@
VALUES ('coffebeanoe12@hotmail.com','John', 'Ang', '49cef7005e214b6f69261e6f3a0f2056', '9511131', 'rockClimb99');  

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )   #0kdsldad090
VALUES ('googleplot@gmail.com', 'Tomas', 'Ong', '523c8e9e404c596ae42f2c879efd4ee4', '8591327', 'fisheye5');  

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )   #monopoly@912
VALUES ('linkinpakr@gmail.com','Jamus', 'Lim', '70af5d4898ac3a678005e2ae80f26d97', '8237186', 'pewdiecry');  

INSERT INTO USERS ( email, last_Name, first_Name, password, contact_Num, telegram )   #jcokey213io@
VALUES ('ofcourseweA@gmail.com','Sam', 'Wicked', '2e5de6f3ddbb8db5709b2d7581be3259', '8889135', 'soccerLival');  

#Insert Book Listings

#Romance

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("googleplot@gmail.com", "Christmas Ever After", "A wonderful book that walks", "Karen Schaler", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("ofcourseweA@gmail.com", "The Edge of Belonging", "A wonderful book that talks", "Amanda Cox", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("linkinpakr@gmail.com", "Until I Met You", "A wonderful book that cooks", "Tari Faris",  1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("linkinpakr@gmail.com", "A Highlander is Coming to Town", "A wonderful book that skates", "Laura Trentham",  1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("yomhanks@yahoo.com", "Yours to Keep", "A wonderful book that backflips", "Lauren Layne", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("yomhanks@yahoo.com", "Cemetery Boys", "A wonderful book that reads", "Aiden Thomas",  1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("yomhanks@yahoo.com", "A Rogue of One's Own", "A wonderful book that milk", "Evie Dunmore",  1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("unicorn666@gmail.com", "The Other Side of the Sky", "A wonderful book that milk", "Amie Kaufman, Meagan Spooner",  1);


INSERT INTO BOOK_GENRE (l_id, genre) VALUES (1, "Romance");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (2, "Romance");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (3, "Romance");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (4, "Romance");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (5, "Romance");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (6, "Romance");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (7, "Romance");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (8, "Romance");

#History and Biography

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("jackandthebean@hotmail.com", "Agent Sonya: Moscow's Most Daring Wartime Spy", "A wonderful book that shoots", "Ben Macintyre",  1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("yomhanks@yahoo.com", "Down Along with That Devil's Bones: A Reckoning with Monuments, Memory, and the Legacy of White Supremacy", "A wonderful book that kicks", "Connor Towne O'Neill",  1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("googleplot@gmail.com", "Clutter: An Untidy History", "A wonderful book that jogs", "Jennifer Howard ", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("coffebean@hotmail.com", "The Art of Drag", "A wonderful book that kicks", "Jake Hall, Sofie Birkin, HELEN LI, Jasjyot Singh Hans", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("infinty@yahoo.com", "Mad and Bad: Real Heroines of the Regency", "A wonderful book that licks", "Bea Koch",1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("infinty@yahoo.com", "Mill Town: Reckoning with What Remains", "A wonderful book that drives", "Kerri Arsenault", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("justinbieber@mail.com", "Once I Was You: A Memoir of Love and Hate in a Torn America", "A wonderful book that drift", "María Hinojosa", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("justinbieber@mail.com", "JFK: Coming of Age in the American Century, 1917-1956", "A wonderful book that afk", "Fredrik Logevall", 1);


INSERT INTO BOOK_GENRE (l_id, genre) VALUES (9, "History & Biography");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (10, "History & Biography");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (11, "History & Biography");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (12, "History & Biography");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (13, "History & Biography");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (14, "History & Biography");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (15, "History & Biography");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (16, "History & Biography");


#Horror

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("ofcourseweA@gmail.com", "When No One is Watching", "A wonderful book that stalks", "Alyssa Cole", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("ofcourseweA@gmail.com", "Horrid", "A wonderful book that is horrid", "Katrina Leno", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("jackandthebean@hotmail.com", "The Invention of Sound", "A wonderful book that sounds good", "Chuck Palahniuk", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("jackandthebean@hotmail.com", "The Orphan of Cemetery Hill", "A wonderful book that is gone", "Hester Fox", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("jackandthebean@hotmail.com", "The Loop", "A wonderful book that loops", "Jeremy Robert Johnson", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("ofcourseweA@gmail.com", "Even If We Break", "A wonderful book that is gone", "Marieke Nijkamp", 1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("justinbieber@mail.com", "White Fox", "A wonderful book that is fox", "Sara Faring",  1);

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author,  availability) 
VALUES ("justinbieber@mail.com", "None Shall Sleep", "A wonderful book that sleeps", "Ellie Marney",  1);


INSERT INTO BOOK_GENRE (l_id, genre) VALUES (17, "Horror");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (18, "Horror");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (19, "Horror");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (20, "Horror");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (21, "Horror");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (22, "Horror");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (23, "Horror");
INSERT INTO BOOK_GENRE (l_id, genre) VALUES (24, "Horror");


#Business

INSERT INTO BOOK_LISTING (owner_email,book_title,item_desc,author, availability) 
VALUES ("justinbieber@mail.com", "Biz", "A wonderful book that sleeps", "Ellie Marney", 1);


INSERT INTO BOOK_GENRE (l_id, genre) VALUES (25, "Business");


#Trade 
INSERT INTO TRADES(first_lid, sec_lid, first_email, sec_email, availability)
VALUES(11, 12, "googleplot@gmail.com", "ofcourseweA@gmail.com", 1 );
