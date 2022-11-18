<!DOCTYPE html>

<!--
    Daisy Kopycienski
    CMPT 221 111
    Professor Tokash

    November 18, 2022

    Week 12 -  Lab Cookies
    -->

<html lang="en">
    <head>
        <title>Lab 12: Cookies! Daisy Kopycienski</title>
        <meta charset="utf-8">      
    </head>


    <body>
        <main>
            <?php
                // starts session, holds session variables until the user closes the browser
                // holds information about a single user and are available to all pages in an application
                session_start();

                echo "<h1> Lab 12: Cookies! Daisy Kopycienski </h1>";

                //Error checking
                $error_message = "";

                //Initialize Variables
                // Check if we have the name input field
                if (ISSET($_POST['cookie_name'])) {
                    $cookie_name = $_POST['cookie_name'];
                } else {
                    $cookie_name = "";
                }
                // Check if we have the value input field
                if (ISSET($_POST['cookie_value'])) {
                    $cookie_value = $_POST['cookie_value'];
                } else {
                    $cookie_value = "";
                }

                // Get the passed Cookie type (Set or delete) from radio buttons
                if (isset($_POST['cookie_type'])) {
                    $cookie_type = $_POST['cookie_type'];
                } else {
                    $cookie_type = "";
                } 
        

                // if form submitted with post method
                if ($_SERVER['REQUEST_METHOD'] == "POST"){
                    //Validate
                    if (strlen($cookie_name) < 1) $error_message = "Enter a valid cookie name (This field can not be blank)";
                    elseif (strlen($cookie_value) < 1) $error_message = "Enter a valid cookie value (This field can not be blank)";
                    elseif (strlen($cookie_name) > 20) $error_message = "Enter a valid cookie name (Text must not exceed 20 characters)";
                    elseif (strlen($cookie_value) > 20) $error_message = "Enter a valid cookie value (Text must not exceed 20 characters)";
                    elseif (empty($cookie_type)) $error_message = "Enter an option (set or delete)";
                    else echo "<br>Input Valid! Adding or deleting cookie... <br> ";

                    // Once input it valid
                    if (empty($error_message)){
                        // Set cookie
                        if ($cookie_type == 'set'){
                            setcookie($cookie_name,$cookie_value);
                            echo "successfully set cookie: $cookie_name to value: $cookie_value";
                        }
                        // Delete Cookie
                        elseif($cookie_type == 'delete'){
                            setcookie($cookie_name, "", time() - 3600);
                            echo "successfully deleted cookie: $cookie_name";
                        }
                        // Something went wrong
                        else{
                            echo "Problem setting or deleting cookie try again";
                        }
                    } 
                }
    
                // Display input form 
                    // FORM
                    echo "<br>";
                    echo "<form action='' method='POST'>"; 
                    // Text Box Cookie name
                    echo "<br> Enter name of cookie <input type='text' name='cookie_name'>";
                    // Text Box Cookie Value
                    echo "<br> Enter value of cookie <input type='text' name='cookie_value'>";
                    echo "<br>";
                    echo "<br>";
                    // Sort Cookie type buttons
                    echo "<input type='radio' name='cookie_type' value='set' checked> SET"; 
                    echo "<input type='radio' name='cookie_type' value='delete'> DELETE ";
                    // Submit add or delete cookie name and value
                    echo "<input type='submit' value='Submit' style='color: white; font-size: 16px; background-color:blue; border-radius: 12px; border: 4px solid dark-blue; padding: 16px;'>";
                    echo "</form>";
                    // END FORM

            
                // Display error message
                echo "<p style='color:red'> $error_message";
            ?>

        <!-- Count how many cookies and display count -->
        <?php
            $count = count($_COOKIE);
            echo "<p> There are currently $count cookies in set";
        ?>

            <!-- Display cookies as an HTML table with headers Name and Value -->
            <table border=1>
                <tr>
                    <!-- Table columns for t4_products table-->
                    <th class="tableHeader"> Cookie Name </th>
                    <th class="tableHeader"> Cookie Value </th>
            
                </tr>
                <?php

                // iterates through Cookies and displays each as a row on the table
                foreach ($_COOKIE as $key=>$val) {
                    # $key will be set to the cookie name
                    # $val will be set to the cookie value }
                    echo "<tr class='tableRow'>";
                    echo "<td> $key </td>";
                    echo "<td> $val </td>";
                    echo "</tr>";
                }

                echo "</table>";
                ?>
            
        </main>
    </body>
</html>