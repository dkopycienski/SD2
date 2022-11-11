<!DOCTYPE html>

<!--
    Daisy Kopycienski
    CMPT 221 111
    Professor Tokash

    November 8, 2022

    Week 11 -  
    -->

<html lang="en">
    <head>
        <title>Display Prints Table</title>
        <meta charset="utf-8">      
    </head>


    <body>
        <main>
            <?php

            $FILE_AUTHOR = "Daisy Kopycienski";

            echo "<h1> Class 11a: Prints </h1><h3> $FILE_AUTHOR </h3>";

            ?>

            <section style="padding: 8px;">


            <table border=1>
                <tr>
                    <th class="tableHeader"> ID </th>
                    <th class="tableHeader"> Name </th>
                    <th class="tableHeader"> Artist </th>
                    <th class="tableHeader"> Price (USD) </th>
                </tr>

                <?php
                    require "connect_db.php";
                    require "error_handler.php";


                    // function to call a MYSQL query to display all of prints table as an HTML table 
                    $q = "SELECT * FROM prints";       // We put query on $q
                    $r = mysqli_query ($dbc, $q);                 // This runs query, using $dbc

                        // Loop through each row of returned data
                        if ($r) {
                            while ($row = mysqli_fetch_array($r, MYSQLI_NUM)){
                                echo "<tr class='tableRow'>";
        
                                for($i=0; $i<=3; $i++){
                                    echo "<td> $row[$i] </td>";
                                }
                                echo "</tr>";
                            }
                        }
                    
                        echo "</table>";


                        // Input Form
                    
                    date_default_timezone_set("America/New_York");
                    echo "<br> The Current time is " . date("h:i:sa");
                    echo "<br> The filename is  " . $_SERVER['SCRIPT_NAME'];
                    echo "<br> This HTTP Request Method is " .  $_SERVER['REQUEST_METHOD'];
                    echo "<br>";

                    echo "<form action='' method='POST'>"; 

                    echo "<input type='radio' name='sort' value='id'> ID NUM"; 
                    echo "<input type='radio' name='sort' value='name'> Name "; 
                    echo "<input type='radio' name='sort' value='artist'> Artist "; 
                    echo "<input type='radio' name='sort' value='price'> Price ";

                    echo "<br>";

                    echo "<input type='radio' name='sort_dir' value='ASC'> Ascending"; 
                    echo "<input type='radio' name='sort_dir' value='DESC'> Descending";

                    echo "<br> Sort It! <input type='submit' value='Submit' style='color: white; font-size: 16px; background-color:blue; border-radius: 12px; border: 4px solid dark-blue; padding: 16px;'>";

                    echo "</form>";
                    

                    include "footer.php";

                ?>

            </section>
        <br>
        </main>

    </body>


</html>


