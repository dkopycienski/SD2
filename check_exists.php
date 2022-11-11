<?php

    $FILE_AUTHOR = "Daisy Kopycienski";

    echo "<h1> Check if input is already in table</h1><h3> $FILE_AUTHOR </h3>";

    require "connect_db.php";
    require "error_handler.php";

    //Error checking
    $error_message = "";


    // Set up and run query
    $q = "SELECT * FROM prints";       // We put query on $q
    $r = mysqli_query ($dbc, $q);                // This runs query, using $dbc

        // Loop through each row of returned data
        if ($r) {
            $row_count=$r->num_rows;

            if($row_count != 0){
                $error_message = "this entry already exists!";
            }
            
        } else {
            echo "<br> Error : " . mysqli_error($dbc);
        }