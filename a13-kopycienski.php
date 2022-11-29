
<!DOCTYPE html>

<!-- Class 13  on Security 
    11/21/2022 DK Original Program

    Note: connect_db.php connects to site_db; u=mike; p=easysteps
	--> 

    <html lang="en">

        <head>
            <title> Class 13A - Kopycienski - Security! </title>
            <meta charset="utf-8">
        </head>

        <body>
            <header>
                <h1> Class 13A - Daisy Kopycienski  - Security! </h1>
            </header>
            <hr>

            <?php 
            // Note: connect_db.php connects to site_db; u=mike; p=easysteps

            session_start();
			
			require "connect_db.php";
			include "error_handler.php";
            define("FILE_AUTHOR", "D Kopycienski");

			$userid = $password = $error_message = ""; 

            # validates the input for userid and outputs an error message if something is wrong
            if (isset($_POST['userid']))   { $userid = $_POST['userid'];}
            if (isset($_POST['password'])) { $password = $_POST['password'];} 
                
            if ($userid == "") { $error_message = "<p style='color:red'> The username cannot be blank! </p>";}
            if ($password == "") {$error_message = "<p style='color:red'> The password cannot be blank! </p>";}
                    

            # runs the query if the userid and password are set, sets r to false otherwise
            if ($error_message == "") {
                $q = "INSERT INTO class13 VALUES( '$userid' , '$password')";
                $r = mysqli_query($dbc, $q);
				
				if ($r) { echo "<br> Inserted User " . htmlspecialchars($userid) . " - $password";
                          echo "<br> The hash for $password is " . sha1($password);}  	
                else    { echo "<br> ERROR!";}  	
            }

            
            
            # outputs the form if the page is loaded for the first time or when there is an error message and the user has not logged in yet
            if (($_SERVER["REQUEST_METHOD"] == "GET") || (isset($error_message)))  {
                echo "<br><br>";
				echo "<form action = '' method = 'POST'>";
                echo "Enter your username ";
                echo "<input type='text' name='userid' maxlength=20 size=20>"; 
                echo "<br> Enter your password ";
                echo "<input type='password' name='password'>"; 
                echo "<br><br> <input type='submit' value='Submit!' name='submit' style='background-color:blue; color:white;'>";
                echo "</form>";

                if (isset($error_message)) {
                    echo "$error_message";
                }

            }

            # outputs a successful login message when logging in initially
            if (($_SERVER["REQUEST_METHOD"] == "POST") && (!(isset($error_message)))) {
                $_SESSION['login_status'] = "LOGGED IN";
                echo "<br> User $userid successfully logged in!";

            # outputs a successful still logged in message when closing the tab and reopening it, checks if the active_user variable is set because if it didnt, the logged in message would display on the first page load
            } else if (($_SERVER["REQUEST_METHOD"] == "GET") && (!(isset($error_message))) && (isset($_SESSION['active_user']))) {
                $_SESSION['login_status'] = "LOGGED IN";
                echo "<br> User " . $_SESSION['active_user'] . " is still succesfully logged in!";
            }

            include "footer.php";

            ?>

        </body>

    </html>