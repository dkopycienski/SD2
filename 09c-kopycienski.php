<?php

// connect_db connects to site_db; $dbc is used in MYSQLI functions 
    require "connect_db.php";


    // Set up and run our query 
    $q = "SELECT * FROM prints";                 // We put query on $q
    $r = mysqli_query ($dbc, $q);       // This runs query, using $dbc

    // Loop through each row of returned data
    if ($r) {
        echo "<br> Query Worked";
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
            echo "<td>" . $row["id"] . " " . $row["artist"] . " " . 
                          $row["print"] . " " . $row["price"] . "</td>"; 
        }
    } else {
        echo "<br> Error: " . mysqli_error($dbc); 
    }


    $cars = array (
        array("Volvo", 22, 18),
        array("BMW", 15,13),
        array("Saab", 5, 2),
        array("Land Rover", 17, 15)
    );

    echo "<br>" . $cars[0][0] . ": In stock: " . $cars[0][1] . 
        " Sold: " . $cars[0][2]; 


    // Step 2 Functions
    echo "<h3> Step 2: Functions </h3>";

    echo "<br> The sum of 5 and 6 is " . sum_numbers(5,6);

    // This function sums two numbers
    function sum_numbers($num1, $num2) {
        $sum = $num1 + $num2;
        return $sum;
    }

    // Step 3:  Breaking out of Loop
    echo "<h3> Step 3:  Breaking out of Loop </h3>";

    for ($x = 0; $x < 10; $x++){
        if ($x == 4) {break;}
        echo $x . " ";
    }

    // Step 4:  Continue
    echo "<h3> Step 4:  Continue </h3>";

    for ($x = 0; $x < 10; $x++){
        if ($x == 4) {continue;}
        echo $x . " ";
    }


?>