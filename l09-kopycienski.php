<?php

# 
//	Daisy Kopycienski
//	CMPT 221 111
//	Professor Tokash
	
//	10/31/22 - Lab 9  PHP Functions


// Header output
$FILE_AUTHOR = "Daisy Kopycienski";

echo "<h1> Lab 9 - PHP Functions </h1><h3> $FILE_AUTHOR </h3>";

// Connect to site_db and output all tables
require "connect_db.php";

//Global vs Local Variables
$fname = "Daisy";


// Step 4,  function to call a MYSQL query to explain the passed table, and echo out all of the returned columns
$q = "SHOW TABLES";                 // We put query on $q
$r = mysqli_query ($dbc, $q);       // This runs query, using $dbc

    // Loop through each row of returned data
    if ($r) {
        echo "<br> <h3> Displaying a list of tables: </h3> <br> ";
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)){
            echo "<br>" . explain_table($row[0]); 
            echo "<br>" .  explain_passed_table($row[0], $dbc); 
            echo "<br>";

        }
    }

// function that echos out table name
function explain_table($table_name){
    echo "Table name is $table_name";
    //echo 'The variable $fname is set to ' . $fname;
}


// function to explain the passed table, and echo out all of the returned columns
function explain_passed_table($table_name, $dbc){
    $q = "EXPLAIN $table_name";                 // We put query on $q
    $r = mysqli_query ($dbc, $q);       // This runs query, using $dbc
    while ($row = mysqli_fetch_array($r, MYSQLI_NUM)){
        echo "<br>" . $row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3]; 
    }
}






?>