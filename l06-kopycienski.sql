-- L06-Kopycienski.sql   More SQL commands
      --  10/07/2022  DK Original Program

-- CREATE DATABASE IF NOT EXISTS mod6_db ; use a database (if not exists) named "modb_db"


--  Drop the table “commands" if it exists 

DROP TABLE IF EXISTS commands;

--  Create a table called "commands" with the below fields. Verify the operation.
    --  a. recnum – integer, auto incremented from 1, primary record
    --  b. command - can't be blank - maximum of 20 characters
    --  c. updated - this will be a timestamp can't be blank
    --  d. description – maximum of 50 characters 

CREATE TABLE commands (
        recnum INT AUTO_INCREMENT PRIMARY KEY,
        command VARCHAR(20) NOT NULL,
        updated TIMESTAMP NOT NULL,
        description VARCHAR(50)
);

--  Insert a row: recnum=1, command= “CREATE”, description=”Create a new table”,
    --  and for “updated” use the MySQL literal for current timestamp. View all records to
    --  ensure the operation worked. 

INSERT into commands VALUES(
    1, "CREATE", CURRENT_TIMESTAMP(), "Create a new table"  
);

SELECT *
FROM commands;

--   Insert a row: recnum=2, command= “ANOTHER”, description=”This will be deleted”,
    --  and for “updated” use the MySQL literal for current timestamp. View all records to
    --  ensure the operation worked. 

INSERT into commands VALUES(
    2, "ANOTHER", CURRENT_TIMESTAMP(), "This will be deleted"  
);

SELECT *
FROM commands;

--  To delete the last row created, execute the below command. View all records to
    --  ensure this worked.
    --  DELETE FROM commands WHERE command="ANOTHER"; 

DELETE FROM commands 
WHERE command="ANOTHER";

SELECT *
FROM commands;

--  Add a row for the command “DELETE” specifying all required fields. Set the recnum to 2. 

INSERT into commands VALUES(
    2, "DELETE", CURRENT_TIMESTAMP(), "Specify what row with WHERE clause"  
);

--  Add more rows to the table, with valid descriptions:
    --  recnum 3, “Create database”

    INSERT into commands(command, updated, description) VALUES(
    "Create database", CURRENT_TIMESTAMP(), "Makes new database with specified name"  
    );


    --  recnum 4, “Create table” 

    INSERT into commands(command, updated, description) VALUES(
    "Create table", CURRENT_TIMESTAMP(), "Makes new table with specified name in current db"  
    );

    --  recnum 5, “ANOTHER”, desc=”TO BE DELETED”

    INSERT into commands(command, updated, description) VALUES(
    "ANOTHER", CURRENT_TIMESTAMP(), "TO BE DELETED"  
    );

    --  recnum 6 “SELECT”

    INSERT into commands(command, updated, description) VALUES(
    "SELECT", CURRENT_TIMESTAMP(), "Specifies what data you are retrieving from db"  
    );

    --  recnum 7, “EXPLAIN” 

    INSERT into commands(command, updated, description) VALUES(
    "EXPLAIN", CURRENT_TIMESTAMP(), "Column names, datatypes, and details of table"  
    );

--   Deleted the 5th row – use WHERE recnum=5. View all records to ensure this worked. 

DELETE FROM commands 
WHERE recnum = 5; 

SELECT *
FROM commands;

--  To sort the output use the ORDER BY operand. Note that this must be the last
    --  operand in the command. Execute the following two commands and notice what each does.

    SELECT * FROM commands ORDER BY command;
    SELECT * FROM commands ORDER BY command DESC;

--  Add a new column to the table called “type” that can only be “COMMAND”,
    --  “OPERAND” or “NONE”. Set the default value to be “NONE” Verify that the operation
    --  worked – all rows should have the new column set to NONE”. 

ALTER table commands
ADD type ENUM("COMMAND", "OPERAND", "NONE") DEFAULT "NONE";

SELECT *
FROM commands;

--  To update a table we use the UPDATE command. If we don’t use a WHERE operand,
    --  all rows will be updated. Let’s update the type field for all the records using the
    --  below command. Verify the operation.
    --  UPDATE commands SET type="COMMAND"; 

UPDATE commands
SET type="COMMAND";

--  Let’s see what happens if we enter lower case in the field.
    --  UPDATE commands SET type="command";
    --  View the table – does it make a difference?
    --  Note how the description field is lower case, but the ENUM field is upper case. 

UPDATE commands
SET type="command";

SELECT *
FROM commands;

--  Add a new record and let MySQL auto increment the recnum field and use the defalt
    --  value for type. For this we have to specify which columns we’re updating:

 INSERT INTO commands (command, updated, description)
 VALUES("WHERE",CURRENT_TIMESTAMP,"Filter records");

--   Now use the UPDATE command to update this last record (recnum=8?) to change
    --  the “type” to “operand”. Verify operation. 

UPDATE commands
SET type="OPERAND"
WHERE recnum=8;

SELECT *
FROM commands;

--  If we want to specify a datestamp we must enter a string in the format of:
    --  (‘YYYY-MM-DD HH:MM:SS’). Update the first row to set the “updated” column to
    --  ‘2000-01-01 12:00:00’ 

UPDATE commands
SET updated='2000-01-01 12:00:00'
WHERE recnum=1;

SELECT *
FROM commands;

--  We can get fancy with the WHERE cluse, and use other operations besides “=”. Try this:
    --  UPDATE commands SET type="NONE" WHERE recnum % 2 = 0;
    --  What happened? The “%” is a doing modulo operation. 

UPDATE commands 
SET type="NONE" 
WHERE recnum % 2 = 0;

    -- changes even recnums to "NONE"

SELECT *
FROM commands;

--  Delete rows 3 and 4 of the database. Verify the operation.

DELETE FROM commands 
WHERE recnum=3; 

DELETE FROM commands 
WHERE recnum=4; 

SELECT *
FROM commands;

--  Now display the table sorted by command. 

SELECT * FROM commands 
ORDER BY command;

--  To determine the number of rows in a select statement, enter the command:
    --  SELECT COUNT(*) FROM commands;
    --  Note that you can use the WHERE operand to limit what your counting.

SELECT COUNT(*) 
FROM commands;