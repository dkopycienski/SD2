<!DOCTYPE html>
<!-- In-Class Practical 
	
	 12/06/2022 DK Original Program
		 
	--> 
    <html lang="en">

    <head>
		<title> Practical - Guess a Number game - D. Kopycienski  </title>
        <meta charset="utf-8">
    </head>

	<!--- ---------------------------------------------------------------------- --->	
    <body>
        <header>
            <h1> Practical - Guess a Number game - D. Kopycienski </h1>
            <h2> Guess a number from 1 to 100! <h2>
        </header>
        <hr>

        <?php 
            session_start();
			include "error_handler.php";
            define("FILE_AUTHOR", "D Kopycienski");

        	
		  #----- Initialization --------------------------------------------
			$guess = $counter = $starting_time = $gameNum = $error_message = ""; 

            # validates the input for userid and outputs an error message if something is wrong
            if (isset($_POST['guess']))   { $guess = $_POST['guess'];}
            if (isset($_POST['counter'])) { $counter = $_POST['counter'];} 
            if (isset($_POST['gameNum'])) { $gameNum = $_POST['gameNum'];}


        #----- Input Validation  ------------------	

            if ($guess == "")   {$error_message = "<p style='color:red'> Please enter a number! </p>";}
            elseif ($guess < 1) {$error_message = "<p style='color:red'> Please enter a number in the range (1-100)! </p>";}
            elseif ($guess > 100) {$error_message = "<p style='color:red'> Please enter a number in the range (1-100)! </p>";}


        #----- FIRST run  --------------------------------------------
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $starting_time = date("h:m:s", time()); 
                setcookie('GameTime', $starting_time);
                $counter = 0;

                $gameNum = rand(1, 100);

            }

        #----- EACH RUN: Increment counter  and reassign time --------------------------------------------
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $starting_time = $_COOKIE['GameTime'];
                $counter++; 

            }

        #----- Display Starting time and counter --------------------------------------------
            echo "<p style='color:blue'> The current game began at $starting_time. <p>";
            echo "<p style='color:blue'> You have made $counter guesses so far <p>";

            //echo "<p style='color:red'> The secret game number is $gameNum <p>";


         #----- If no errors, check guess   ------------------	
		    if ($error_message == "") {

                if ($guess > $gameNum){
                    echo "<p> Your guess of $guess is too high, try again <p>";
                } elseif ($guess < $gameNum){
                    echo "<p> Your guess of $guess is too low, try again <p>";
                } elseif ($guess == $gameNum){
                    echo "<p style='color:green; font-size:30px;'> Good Job!! The number was $gameNum, you guessed correctly! <p>";

                    echo "<form action = '' method = 'POST'>";
                    echo "<br><br> <input type='submit' value='Play Again?' name='submit' style='background-color:green; color:white;'>";
                    echo "</form>";

                    exit; 
                }
            }

            
        #----   Always display the form    
			echo "<form action = '' method = 'POST'>";
            echo "Enter your Guess ";
            echo "<input type='number' max='100' min='1' name='guess' value='$guess' AUTOFOCUS>"; 
            echo "<br><br> <input type='submit' value='Submit!' name='submit' style='background-color:blue; color:white;'>";

            echo "<input type='hidden' name='counter' value='$counter'>";
            echo "<input type='hidden' name='gameNum' value='$gameNum'>";

            echo "</form>";

            if (isset($error_message)) {echo "$error_message";}

        
		#----   display a footer 
			include "footer.php";
            ?>

        </body>

    </html>