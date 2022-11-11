<!DOCTYPE html>

<!--
    Daisy Kopycienski
    CMPT 221 111
    Professor Tokash

    November 11, 2022

    Week 11 -  Lab
    -->

<html lang="en">
    <head>
        <title>Creating a Log-in Page</title>
        <meta charset="utf-8">      
    </head>


    <body>
        <main>
            <?php
                session_start();

                $FILE_AUTHOR = "Daisy Kopycienski";

                echo "<h1> Creating a Log-in Page </h1><h3> $FILE_AUTHOR </h3>";

                require "connect_db.php";
                include "error_handler.php";
                //Error checking
                $error_message = "";

                //Initialize Variables
                // Check if we have the username input field
                if (ISSET($_POST['username'])) {
                    $username = $_POST['username'];
                } else {
                    $username = "";
                }
                // Check if we have the password input field
                if (ISSET($_POST['password'])) {
                    $password = $_POST['password'];
                } else {
                    $password = "";
                }
                // Check Session Login Status
                if(isset($_SESSION['login_status'])){
                    $login_status = $_SESSION['login_status'];
                }else{
                    $login_status = "NOT LOGGED IN";
                }echo "<br> " . $login_status;

                if ($_SERVER['REQUEST_METHOD'] == "POST"){
                    //Validate
                    if (strlen($username) < 1) $error_message = "Enter a valid username (This field can not be blank)";
                    else if (strlen($password) < 1) $error_message = "Enter a valid password (This field can not be blank)";
                    else if (strlen($username) > 20) $error_message = "Enter a valid user name (Text must not exceed 20 characters)";
                    else if (strlen($password) > 20) $error_message = "Enter a valid password (Text must not exceed 20 characters)";
                    else if (!preg_match('/^[A-Za-z0-9_~\-!@#\$%\^&\*\(\)]+$/',$username)) $error_message = "Enter a valid username (Only letters, numbers, and some special characters allowed (~, !, @, #, $, %, ^, &, *, (, ), _, - )";
                    else if (!preg_match('/^[A-Za-z0-9_~\-!@#\$%\^&\*\(\)]+$/',$password)) $error_message = "Enter a valid password (Only letters, numbers, and some special characters allowed (~, !, @, #, $, %, ^, &, *, (, ), _, - )";
                    else echo "<br>Input Valid! Checking authentication...";

                    if (empty($error_message)){
                        //Check if Username and Password Combo exists in Table
                        $q = "SELECT * FROM PrintsUsers WHERE user_name='$username' and user_password='$password'";       // We put query on $q
                        $r = mysqli_query ($dbc, $q);                 // This runs query, using $dbc

                        if ($r){
                            if (mysqli_num_rows($r) == 0) {
                            $error_message = "Invalid user name/passwordcombination.";
                            }else{
                                echo "Credentials look good! Logging in...";
                            }
                        } 
                    }
                }
                


                // FIRST LOAD
                // Only run action code on the 1st load
                if($_SERVER['REQUEST_METHOD'] == "GET" or !empty($error_message)){

                    // FORM
                    $current_file = $_SERVER['SCRIPT_NAME'];
                    echo "<form action='$current_file' method='POST'>"; 
                    // Text Box Username
                    echo "<br> Enter your username <input type='text' name='username'>";
                    // Text Box Password
                    echo "<br> Enter your password <input type='text' name='password'>";
                    echo "<br> Log In<input type='submit' value='Submit' style='color: white; font-size: 16px; background-color:blue; border-radius: 12px; border: 4px solid dark-blue; padding: 16px;'>";
                    echo "</form>";
                    // END FORM

                }  

                // SUCCESSIVE LOADS
                // Action Handler: All validations passed!
                if ($_SERVER['REQUEST_METHOD'] == "POST" and empty($error_message)){
                    echo "<br><p style='color:green'> User $username successfully logged in!";
                    $_SESSION["login_status"] = "LOGGED IN"; 
                    echo "<br>";
                }
                
                echo "<p style='color:red'> $error_message";
                include "footer.php";
            ?>
        </main>
    </body>
</html>