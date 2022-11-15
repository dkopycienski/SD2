<?php

    define("FILE_AUTHOR", "Daisy Kopycienski");
    require "connect_db.php";
    include "error_handler.php";

    //Error checking
    $error_message = "";

    // Find the id passed by ?id=##
    if (!isset($_GET["id"])){
        echo "<br> No ID passed.";
        DIE;
    } else {
        $id = $_GET["id"];
        echo "<br> ID $id passed. ";

        $q = "UPDATE prints SET price = 0 WHERE id = $id";       // We put query on $q
        $r = mysqli_query ($dbc, $q);                            // This runs query, using $dbc
        echo "<p style='color:green'> Successfully set price for print number $id to 0!";
    }



