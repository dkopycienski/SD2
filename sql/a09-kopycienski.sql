# 
#	Daisy Kopycienski
#	CMPT 221 111
#	Professor Tokash
#	
#	10/25/22 - Assignment 9  Using PHP to Display and Update MySql 

# In MYSQL, create a table named COURSES in the site_db database, with the following fields
    # a. recnum which is an integer and is automatically incremented
    # b. dept which is 4 characters
    # c. course_num which is a 3 digit integer
    # d. title which can be 20 characters
    # e. student which is 10 chars and can be null 

create table if not exists courses
	(	recnum				INT AUTO_INCREMENT PRIMARY KEY,
		dept				CHAR(4),
		course_num 			INT(3),
		title		        VARCHAR(20),
		student			    CHAR(10)
	);


# Add three courses into the table
insert into courses (recnum, dept, course_num, title) values
	(1, "CMPT", 221, "Soft Dev II"),
	(2, "CMPT", 416, "Intro to Cyber"),
	(3, "CMPT", 307, "Internetworking");