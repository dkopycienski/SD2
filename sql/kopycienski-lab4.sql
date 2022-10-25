 -- This is Lab4 - using the source command 

 USE site_db; 

 CREATE TABLE IF NOT EXISTS MyFriends
 ( FirstName TEXT,
   LastName TEXT);

 
 INSERT INTO MyFriends VALUES ('Sophie', 'Park');
 INSERT INTO MyFriends VALUES ('Anusha', 'Vaidyanathan');
 INSERT INTO MyFriends VALUES ('TJ', 'Barrett');
 INSERT INTO MyFriends VALUES ('Akanksha', 'Sreenivas');

 EXPLAIN MyFriends;

 SELECT * FROM MyFriends;