<!DOCTYPE html>

<!--
    Daisy Kopycienski
    CMPT 221 111
    Professor Tokash

    November 8, 2022

    Week 11 -  Assignment
    -->

<html lang="en">
    <head>
        <title>Add Rows to Prints Table</title>
        <meta charset="utf-8">      
    </head>


    <body>
        <main>
            <?php

            $FILE_AUTHOR = "Daisy Kopycienski";

            echo "<h1> Assignment 11: Add Rows to Prints </h1><h3> $FILE_AUTHOR </h3>";

            require "connect_db.php";
            require "error_handler.php";

            //Error checking
            $error_message = "";
            

            // Check if we have the id input field
            if (ISSET($_POST['id'])) {
                $id = $_POST['id'];
            } else {
                $id = "";
            }
            // Check if we have the name input field
            if (ISSET($_POST['name'])) {
                $name = $_POST['name'];
            } else {
                $name = "";
            }
            // Check if we have the artist input field
            if (ISSET($_POST['artist'])) {
                $artist = $_POST['artist'];
            } else {
                $artist = "";
            }
            // Check if we have the price input field
            if (ISSET($_POST['price'])) {
                $price = $_POST['price'];
            } else {
                $price = "";
            }


                    // call MYSQL query to save all of the IDs into an array ($ids) for input validation
                    $ids = array();
                    $q = "SELECT id FROM prints";  
                    $command = mysqli_query($dbc, $q);
                    while($result = mysqli_fetch_array($command))
                        $ids[] = $result['id'];



                    // Input Validation for Id (must be a number from 1 - 2147483647, cannot be NULL, 
                    // cannot be a string, cannot be negative, must be unique)
                    if (strlen($id) < 1) $error_message = "Enter a valid ID (This field must have a value)";
                    else if ($id < 1 or $id > 2147483647) $error_message = "Enter a valid ID (This number must be between 1 and 2147483647)";
                    else if (!is_numeric($id)) $error_message = "Enter a valid ID (This field must be a number between 1 and 2147483647)";
                    else if (in_array($id, $ids)) $error_message = "Enter a valid ID (This field must be unique, id you entered already exists in db)";

                    // Input Validation for name (must be a string, must contain 0-20 characters, can be NULL)
                    if (strlen($name) > 20) $error_message = "Enter a valid print name (Text must not exceed 20 characters)";

                    // Input Validation for artist (must be a string, must contain 0-20 characters, can be NULL)
                    if (strlen($artist) > 20) $error_message = "Enter a valid artist name (Text must not exceed 20 characters)";

                    // Input Validation for price (must be a decimal number from 0.00 to 9999.99, cannot be negative
                    // maximum 2 decimal places, can be NULL)
                    if($price != ""){
                        if ($price < 0 or $price > 10000.00) $error_message = "Enter a valid price (This field must be a number between 0.00 and 9999.99)";
                        else if (!is_numeric($price)) $error_message = "Enter a valid price (This field must be a decimal number)";
                        else if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $price)) $error_message = "Enter a valid price (Decimal number with decimal point and 2 numbers after (for example, 100.23 or 3.00))";
                    }
        

                    // FORM

                    echo "<form action='' method='POST'>"; 
                    // Text Box ID
                    echo "<br> Enter the ID <input type='text' name='id' value='?'>";
                    // Text Box name
                    echo "<br> Enter the name of the print <input type='text' name='name' value='?'>";
                    // Text box artist
                    echo "<br> Enter the name of the artist <input type='text' name='artist' value='?'>";
                    // Text box price
                    echo "<br> Enter the price <input type='text' name='price' value='?'>";
                    echo "<br> Submit new data <input type='submit' value='Submit' style='color: white; font-size: 16px; background-color:blue; border-radius: 12px; border: 4px solid dark-blue; padding: 16px;'>";
                    echo "</form>";


                    echo "<p style='color:red'> $error_message";


                    // Add validated input into prints table
                    if($error_message == ""){
                        $q = "INSERT INTO prints VALUES ('$id', '$name', '$artist', '$price')";       // We put query on $q
                        $r = mysqli_query ($dbc, $q);                 // This runs query, using $dbc
                        echo "<p style='color:green'> Successfully added data to prints table!";
                    }
                    

                    include "footer.php";

                ?>
        </main>
    </body>
</html>


