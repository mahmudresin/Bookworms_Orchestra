CREATE TABLE UsersTable (
    Username VARCHAR(20) NOT NULL, 
    Password CHAR(20) NOT NULL, 
    Email VARCHAR(25) NOT NUll, 
    FirstName VARCHAR(20) NOT NULL, 
    SurName VARCHAR(20) NOT NULL, 
    Addressline1 VARCHAR(50) NOT NULL,
    City VARCHAR(20) NOT NULL,
    Mobile INT(12) NOT NULL 
);
CREATE TABLE Reviews (
    Username VARCHAR(20) NOT NULL,
    Book VARCHAR(50) NOT NULL, 
    Author VARCHAR(50) NOT NULL, 
    Review VARCHAR(150) NOT NUll, 
    Stars int(2) NOT NULL
);


CREATE TABLE CHALLENGES (
    username VARCHAR(20) NOT NULL, 
    password CHAR(50) NOT NULL,
    NumberOfBooks INT(2) NOT NULL, 
    Weekly VARCHAR(4) NOT NULL,
    Monthly VARCHAR(4) NOT NULL
);

SELECT c.username, c.NumberOfBooks FROM Challenges c join userstable u ON (c.username = u.username) AND c.Weekly = 'YES' ORDER BY c.NumberOfBooks DESC;


SELECT c.username, c.NumberOfBooks FROM Challenges c join userstable u ON (c.username = u.username) AND c.Monthly  = 'YES' ORDER BY c.NumberOfBooks DESC;

