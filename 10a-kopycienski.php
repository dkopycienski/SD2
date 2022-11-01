<!DOCTYPE html>
<!-- 10a-Kopycienski.php
    10/31/22 DK Original Program
--> 

<html lang="en">


    <head>
        <title> My First Form - Version 1</title>
        <meta charset="utf-8">

    </head>

    <body>
        <header>
            <h1> Class 10a - My first HTML/PHP Form  </h1>
        </header>
        <hr>

        <?php

            $dow = date("l");
            $today = date("m.d.y");
            date_default_timezone_set("America/New_York");

            echo "<br> <i> The current date is $dow, $today </i>";
            echo "<br> <i> The current time is " . date("h:i:sa") . "</i>";

            // Display input from form below (fname)
            echo "<br><br> The input text field 'fname' is set to " . $_POST['fname'];
            // Display input from form below (lname)
            echo "<br><br> The input text field 'lname' is set to " . $_POST['lname'];
            // Display input from form below (email)
            echo "<br><br> The input email field 'email' is set to " . $_POST['email'];
            // Display input from form below (password)
            echo "<br><br> The input password field 'password' is set to " . $_POST['password'];
            // Display input from form below (date)
            echo "<br><br> The input date field 'date' is set to " . $_POST['date'];
            // Display input from form below (gender)
            echo "<br><br> The input gender field 'gender' is set to " . $_POST['gender'];


            // Form to process different sort options

            echo "<form action='' method='POST'>"; 
            // Text Box fname
            echo "<br> Enter your first name <input type='text' name='fname' value='?'>";
            // Text Box lname
            echo "<br> Enter your last name <input type='text' name='lname' value='?'>";
            // Text box email
            echo "<br> Enter your email <input type='email' name='email'>";
            // Text box password
            echo "<br> Enter your password <input type='password' name='password'>";
            // Text box date
            echo "<br> Enter a date <input type='date' name='date'>";

            // Selection Box Gender
            echo "<form action='' method='POST'>"; 
            echo "<br> Select your gender <select name='gender'>";
            echo "      <option value='M'> Male </option>";
            echo "      <option value='F'> Female </option>";
            echo "      <option value='X'> Non-Binary </option>";
            echo "</select>";


            // BUTTON
            echo "<form action='' method='POST'>"; 
            echo "<br><input type='submit' value='SUBMIT' style='color: white; background-color:blue; border-radius: 12px; border: 4px solid #4CAF50; padding: 14px 40px;'>"; 
            echo "</form>";

        
       ?>

        <main>
<?php

    include "footer.php";

?>

        </main>
    </body>

</html>


