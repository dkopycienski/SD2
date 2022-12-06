<!DOCTYPE html>
<!-- Lab 14
	
	 12/02/2022 DK Original Program
		 
	--> 
    <html lang="en">

    <head>
		<title> Lab 14 - More PHP - D. Kopycienski  </title>
        <meta charset="utf-8">

        <style>
                /*       top rig bot lef */
            th {padding: 5px 5px 5px 5px;}
            td {padding: 5px 5px 5px 5px;}

            .password {color:red;}

        </style>
    </head>

	<!--- ---------------------------------------------------------------------- --->	
    <body>
        <header>
            <h1> Lab 14 - More PHP - D. Kopycienski </h1>
        </header>
        <hr>

        <?php 
            session_start();
			
			require "connect_db.php";
			include "error_handler.php";
            define("FILE_AUTHOR", "D Kopycienski");
            define("TESTING", TRUE); 


        #----- Table CSS Altenate shadin in each row --------------------------------------------
        echo "<style>";
            echo "table { background-color: darkseagreen; color: black; border-collapse: collapse; border: 1px solid black;}";
            echo "th {background-color: grey; font-size: 17px; font-weight: bold; border: 1px solid black; border-collapse: collapse;}";
            echo "td  {font-size: 15px; padding-left: 5px; padding-right: 5px; border: 1px solid black; border-collapse: collapse;}";
            echo "tr:nth-child(even) {background-color: silver;}";
        echo "</style>";

        	
		  #----- Initialization --------------------------------------------
			$userid = $password = $balance = $comments = $error_message = $q = $secret = $counter = ""; 

            # validates the input for userid and outputs an error message if something is wrong
            if (isset($_POST['userid']))   { $userid = $_POST['userid'];}
            if (isset($_POST['password'])) { $password = $_POST['password'];} 
            if (isset($_POST['secret'])) { $secret = $_POST['secret'];} 
            if (isset($_POST['balance'])) { $balance = $_POST['balance'];} 
            if (isset($_POST['comments'])) { $comments = $_POST['comments'];} 
            if (isset($_POST['counter'])) { $counter = $_POST['counter'];} 

            //echo "The secret is $secret";
                 
            if ($userid == "")   {$error_message = "<p style='color:red'> The username cannot be blank! </p>";}
            if ($password == "") {$error_message = "<p style='color:red'> The password cannot be blank! </p>";}


        
        #----- First run start counter --------------------------------------------
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $counter = 1;
            }
            #----- Increment counter each run --------------------------------------------
            else {
                $counter++; 

                if ($counter == 5){
                    echo "<br><p style='color:red'> Excessive Attempts!";
                    exit; 
                }
            }


        

		#----- If no errors, insert into the table   ------------------	
		    if ($error_message == "") {
                $q = "INSERT INTO PrintsUsers (user_name, user_password, balance, comments) VALUES( '$userid' , '$password', '$balance', '$comments')";
                if (TESTING) {echo "<br> Query: $q";}
				//$q2=$q;
				$r = mysqli_query($dbc, $q);
				
				if ($r) { echo "<br> Inserted User $userid - $password, with the balance: $balance and comments: $comments";}
                else    { echo "<br> ERROR! Unable to insert into the table";}  	
            }

            
        #----   Always display the form    
            
            echo "<br><br>";
			echo "<form action = '' method = 'POST'>";
            echo "Enter your username ";
            echo "<input type='text' name='userid' maxlength=20>"; 
            echo "<br> Enter your password ";
            echo "<input type='password' name='password' AUTOFOCUS>"; 
            echo "<input type='hidden' name='secret' value='abracadabra'>";
            echo "<br> Enter desired balance ";
            echo "<input type='number' max='20' min='0' step='.01' name='balance' value='0'>"; 
            echo "<br> Enter comments";
            echo "<input type='text' maxlength='30' name='comments' value='$comments'>"; 
            echo "<br><br> <input type='submit' value='Submit!' name='submit' style='background-color:blue; color:white;'>";

            echo "<input type='hidden' name='counter' value='$counter'>";

            echo "</form>";

            if (isset($error_message)) {echo "$error_message";}

        
        #----   Use a FORM for a Hypertext Link

        echo "<br><br>";
        echo "<form action = '//www.marist.edu' method = 'POST'>";
        echo "<input type='submit' value='Go To Marist' style='background-color:blue; color:white;'>"; 

        echo "</form>";
        echo "<br><br>";

		#----   display the table 

			$q="SELECT * FROM printsusers"; 
			$r = mysqli_query ( $dbc , $q );    # this runs query 
	
			echo "<table border=1>";
			echo "<tr><th> User Name </th><th> Password </th><th> Comments </th><th> Balance </th><th> 90% of the Balance </th></tr>";
	
			if ($r) {
				while ($row = mysqli_fetch_array( $r, MYSQLI_NUM)) {
					echo "<tr>";   
					echo "<td>" . $row[0] . "</td><td class='password'>" . $row[1] . "</td><td>" . $row[2] . "</td>";
                    if ($row[3] > 0){
                        echo "<td align='right'>" . "\$" . $row[3] . "</td>";
                        echo "<td align='right'>" . "\$" . $row[3] * .9  . "</td>";
                    }else{
                        echo "<td>" . "</td>";
                        echo "<td>" . "</td>";
                    }		 
				}	   
			}
			else { echo "<br> Error: " . mysqli_error($dbc) ;}


            echo "</table>";
        
            
        

		#----   display a footer 

			include "footer.php";
            ?>

        </body>

    </html>