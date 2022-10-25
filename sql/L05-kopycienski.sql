-- L05-Kopycienski.sql   Inserting Records into SQL tables 
      --  09/30/2022  DK Original Program

-- CREATE DATABASE IF NOT EXISTS site_db ; use a database (if not exists) named "mod5_db"

CREATE database if not exists mod5_db;
use mod5_db;

--  Drop the table “mycds" if it exists 

DROP table if exists mycds; 

-- Create a table called "mycds" to catalog a cd collection. The table needs the following fields:Artist - can't be blank - maximum of 20 characters, CD Name - can't be blank - maximum of 20 characters, Date Acquired, Genre - and have defined list of five possible 

CREATE table mycds (
    artist VARCHAR(20) NOT NULL,
    cd_name VARCHAR(20) NOT NULL,
    date_acquired DATE,
    genre ENUM("HipHop", "Pop", "Rock", "Classical", "Dance"),
    rating ENUM("5", "4", "3", "2", "1")
);

--  Explain the table – verify the operation 

EXPLAIN mycds;

-- Insert five (5) valid cd entries into your table. Use five different INSERT commands.
    -- (Note: you must enter the date in the correct format and in quotes.) 

INSERT into mycds (artist, cd_name, date_acquired, genre, rating)
VALUES ("The Beatles", "Abbey Road", "2020-01-02", "Rock", "5"); 

INSERT into mycds (artist, cd_name, date_acquired, genre, rating)
VALUES ("The Beatles", "Revolver", "2021-05-17", "Rock", "4"); 

INSERT into mycds (artist, cd_name, date_acquired, genre, rating)
VALUES ("The Beatles", "Rubber Soul", "2022-01-24", "Rock", "3"); 

INSERT into mycds (artist, cd_name, date_acquired, genre, rating)
VALUES ("The Beatles", "Beatles for Sale", "2019-01-18", "Rock", "4"); 

INSERT into mycds (artist, cd_name, date_acquired, genre, rating)
VALUES ("The Beatles", "Yellow Submarine", "2022-01-08", "Rock", "5"); 


-- Display all records in the table – ensure this worked! 

SELECT * FROM mycds;


-- Add a column named price which will be a value from $0.00 to $999.99

ALTER table mycds 
ADD price decimal(5,2) CHECK (price > 0.00 AND price < 999.99);


-- Insert another CD that was acquired on 9/01/2021, for a price of $9.99.

INSERT into mycds (artist, cd_name, date_acquired, genre, rating, price)
VALUES ("The Beatles", "Help!", "2021-09-01", "Rock", "5", 9.99); 


-- Display all records in the table 

SELECT * FROM mycds;

-- Insert a new entry - the artist is "Testing", the cd name is "1", the date acquired is CURDATE(), and the genre and price are NULL 

INSERT into mycds (artist, cd_name, date_acquired, genre, rating)
VALUES ("Testing", "1", CURDATE(), NULL , NULL); 


-- Display all records in the table - and examine what the operation did! 

SELECT * FROM mycds;

-- Add a column named ID, which is a number from 1 to 9,999 automatically created when we insert data into the table. This needs to be defined as the PRIMARY KEY! 

ALTER table mycds 
ADD ID int PRIMARY KEY AUTO_INCREMENT;


-- Add another CD, with CURDATE, and a price of $15.99. Specify NULL for the new ID field (this null field will be reset to an auto incremented number!) 

INSERT into mycds (artist, cd_name, date_acquired, genre, price, id)
VALUES ("The Beatles", "A Hard Day's Night", CURDATE(), "Rock" , 15.99, NULL); 

--  Let’s add another column for “my rating” which can be a number from 1 to 4 or “N/A”, with a DEFAULT value of “N/A” 

ALTER table mycds
ADD my_rating ENUM("1", "2", "3", "4", "N/A") DEFAULT "N/A";

-- Display all records in the table – and examine what the operation did!

SELECT * FROM mycds;

-- Add a another CD, with any date, a price of $11.99. Specify NULL for the ID field, and give it a rating of 1 to 4.  

INSERT into mycds (artist, cd_name, date_acquired, genre, price, id, my_rating)
VALUES ("The Beatles", "Let It Be", CURDATE(), "Rock" , 11.99, NULL, "3"); 

-- We often want to have a timestamp of when a row was created or updated. Add another column named “updated” and set attribute to TIMESTAMP. 

ALTER table mycds
ADD updated TIMESTAMP;

-- Add another CD, for the new column specify “CURRENT_TIMESTAMP. 

INSERT into mycds (artist, cd_name, date_acquired, genre, price, id, my_rating, updated)
VALUES ("The Beatles", "The Beatles", CURDATE(), "Rock" , 13.99, NULL, "3", CURRENT_TIMESTAMP); 

-- Display all records in the table – and examine what the operation did! 

SELECT * FROM mycds;

-- Display table ordered by artist

SELECT * FROM mycds 
ORDER BY artist;