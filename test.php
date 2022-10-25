<?php
    // ARRAYS

    // different way to set array --> $courses = array("SD2", "data comm", "Bio101");


    echo "<h2> Step 1: Arrays </h2>"; 

    $months[] = "January";
    $months[] = "February";
    $months[] = "March";

    echo "<br> 0 - $months[0]";
    echo "<br> 1 - $months[1]";
    echo "<br> 2 - $months[2]";

    $months[6] = "July";
    echo "<br> 6 - $months[6]";

    echo "<h2> Step 2: Using the FOR Statement </h2>"; 
    $friends[] = "Anusha";
    $friends[] = "TJ";
    $friends[] = "Dahlia";

    // echo "<br>" . count($friends);

    for ($i=0; $i<count($friends); $i++){
        echo "<br> " . $i . " - " . $friends[$i];
    }

    // Can call array items by number or name 
    echo "<h2> Step 3: Arrays </h2>"; 

    $months["jan"] = "January";
    $months["feb"] = "February";
    $months["mar"] = "March";

    echo "<br> - " . $months["feb"] . "<br>";

    // An alternate way of setting a named array
    $months= array("apr" => "April");
    

    // SQL Array 
    echo "<br><h2> Step 6: SQL Array </h2>";

    // connect_db connects to site_db; $dbc is used in MYSQLI functions 
    require "connect_db.php";

    $q = "SHOW TABLES";                 // We put query on $q
    $r = mysqli_query ($dbc, $q);       // This runs query, using $dbc

    // Loop through each row of returned data
    if ($r) {
        echo "<br> Query Worked";
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)){
            echo "<br> Table: " . $row[0]; 
        } 
    }


?>