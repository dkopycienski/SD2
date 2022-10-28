<?php

// connect_db connects to site_db; $dbc is used in MYSQLI functions 
    require "connect_db.php";

    $q = "SHOW TABLES";                 // We put query on $q
    $r = mysqli_query ($dbc, $q);       // This runs query, using $dbc

    // Loop through each row of returned data
    if ($r) {
        echo "<br> Query Worked";
    }

?>