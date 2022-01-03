/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ db /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE db;

DROP TABLE IF EXISTS book;
CREATE TABLE `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS challenges;
CREATE TABLE `challenges` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumberOfBooks` int(2) NOT NULL,
  `Weekly` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Monthly` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS reviews;
CREATE TABLE `reviews` (
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Book` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Review` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stars` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS search;
CREATE TABLE `search` (
  `book_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS userstable;
CREATE TABLE `userstable` (
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SurName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Addressline1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO book(book_id,book_title,author,publisher_name) VALUES(15,'Natural Resources','Robin Kerrod','Marshall'),(16,'Encyclopedia Americana','Grolier','Grolier Incorporation'),(17,'Algebra 1','Carolyn Bradshaw, Michael Seals','Prentice Hall, New Jersey'),(18,'The Philippine Daily Inquirer','..','..'),(19,'Science in our World','Brian Knapp','Prentice Hall, Inc'),(20,'Literature','Greg Glowka','Prentice Hall, Inc'),(21,'Lexicon Universal Encyclopedia','Lexicon','Pulication Inc., Lexicon'),(22,'Science and Invention Encyclopedia','Clarke Donald, Dartford Mark','Publisher , Westport Connecticut'),(23,'Integrated Science Textbook ','Merde C. Tan','12536. Araneta Avenue Corner Ma. Clara St., Quezon City'),(24,'Algebra 2','Glencoe McGraw Hill','McGrawhill'),(25,'Wiki at Panitikan ','Lorenza P. Avera','JGM & S Corporation'),(26,'English Expressways TextBook for 4th year','Virginia Bermudez Ed. O. et al','Gregorio Araneta Avenue, Quezon City'),(27,'Asya Pag-usbong Ng Kabihasnan ','Ricardo T. Jose, Ph . D.','Araneta Avenue . Cor. Maria Clara St., Quezon City'),(28,'Literature (the readers choice)','Glencoe McGraw Hill','the McGrawHill Companies Inc'),(29,'Beloved a Novel','Toni Morrison','Alfred A. Knoff, Inc'),(30,'Silver Burdett Engish','Judy Brim','Silver'),(31,'The Corporate Warriors (Six Classic Cases in American Business)','Douglas K. Ramsey','..'),(32,'Introduction to Information System','Cristine Redoblo','Brian INC');

INSERT INTO challenges(username,password,NumberOfBooks,Weekly,Monthly) VALUES('Ramima','Ramima',10,'YES','NO'),('Yeamin ','Mahmudresin',5,'YES','NO'),('Yeamin ','Mahmudresin',5,'YES','NO'),('Yeamin ','Mahmudresin',5,'YES','NO'),('Sazid','Mahmudresin1999',5,'YES','NO'),('Sazid','Mahmudresin1999',5,'YES','NO'),('Sazid','Mahmudresin1999',5,'YES','NO'),('sazidMahmud','12345',1,'NO','YES'),('sazidMahmud','12345',1,'NO','YES'),('razin','razin',41,'YES','NO');

INSERT INTO reviews(Username,Book,Author,Review,Stars) VALUES('Ramima','The Kite Runner','Khaled Hosseini','Great Book indeed',2);

INSERT INTO userstable(Username,Password,Email,FirstName,SurName,Addressline1,City,Mobile) VALUES('Yeamin','Mahmudresin','Email','Yeamin ','Mahmud','Uttara','Dhaka',1723113565),('Ramima ','Ramima','ramima@gmai.com','Ramima','Syeda','Mohammadpur','Dhaka',1845646239);