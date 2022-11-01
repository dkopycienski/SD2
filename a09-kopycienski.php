<?php

    // Add code to display a message and use the REQUIRE command to connect to site_db database. 
    echo "<h1> Assignment 9 - Kopycienski </h1>";
    echo "<p>We first call connect_db.php to connect to site_db.</p>";
    require "connect_db.php";

    // display all the rows/records of the courses table
    $q = "Select * from courses";                 // We put query on $q
    $r = mysqli_query ($dbc, $q);                 // This runs query, using $dbc

    // Loop through each row of returned data
    if ($r) {
        echo "<br>1. Display the courses table";
        echo "<ul>";
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)){
            echo "<li> Row: " . $row[0] . " " . $row[1] . " " .  $row[2] . " " .  $row[3] . " " .  $row[4] . "</li>"; 
        } 
        echo "</ul>";
    }


    // insert a fourth course using only PHP
    echo "<br>2. Adding another course to the table";
    $q = "INSERT INTO courses (recnum, dept, course_num, title) values
	(4, 'CMPT', 330, 'Sys Des')";                 // We put query on $q
    $r = mysqli_query ($dbc, $q);                 // This runs query, using $dbc

    if ($r) {
        echo "<br>3. The insert worked!";
    }else {
        echo "<br>3. Insert unsuccessful";
    }

    // display all the rows/records of the courses table
    $q = "Select * from courses";                 // We put query on $q
    $r = mysqli_query ($dbc, $q);                 // This runs query, using $dbc

    // Loop through each row of returned data
    if ($r) {
        echo "<br>4. Display the UPDATED courses table";
        echo "<ul>";
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)){
            echo "<li> Row: " . $row[0] . " " . $row[1] . " " .  $row[2] . " " .  $row[3] . " " .  $row[4] . "</li>"; 
        } 
        echo "</ul>";
    }


    //update row 1 to set student to your name
    echo "<br>5. Updating a record";
    $q = "UPDATE courses SET student='Daisy Kopy' WHERE recnum=1";  // We put query on $q
    $r = mysqli_query ($dbc, $q);   

    if ($r) {
        echo "<br>6. The update worked!";
    }else {
        echo "<br>6. Update unsuccessful";
    }


     // display all the rows/records of the courses table
     $q = "Select * from courses";                 // We put query on $q
     $r = mysqli_query ($dbc, $q);                 // This runs query, using $dbc
 
     // Loop through each row of returned data
     if ($r) {
         echo "<br>7. Display the UPDATED courses table";
         echo "<ul>";
         while ($row = mysqli_fetch_array($r, MYSQLI_NUM)){
             echo "<li> Row: " . $row[0] . " " . $row[1] . " " .  $row[2] . " " .  $row[3] . " " .  $row[4] . "</li>"; 
         } 
         echo "</ul>";
     }


     // Final code
     echo "<br><p> This is the end of the assignment </p>";
     echo "<br><p><small> (C) D Kopycienski, 2022 </small> </p>";

     


// EOF
?>