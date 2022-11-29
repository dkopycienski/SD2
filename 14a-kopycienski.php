<!DOCTYPE html>
<!-- Class 14 Prep File   
	
	 11/29/2022 DK Original Program
		 
	--> 
    <html lang="en">

    <head>
		<title> Class 14A - in Class Work - D. Kopycienski  </title>
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
            <h1> Class 14A - in Class Work - D. Kopycienski! </h1>
        </header>
        <hr>

        <?php 

            session_start();
			
			require "connect_db.php";
			include "error_handler.php";
            define("FILE_AUTHOR", "D Kopycienski");
            define("TESTING", TRUE); 

				
		  #----- Initialization --------------------------------------------
			$userid = $password = $balance = $comments = $error_message = $q = ""; 

            # validates the input for userid and outputs an error message if something is wrong
            if (isset($_POST['userid']))   { $userid = $_POST['userid'];}
            if (isset($_POST['password'])) { $password = $_POST['password'];} 
            if (isset($_POST['balance'])) { $balance = $_POST['balance'];} 
            if (isset($_POST['comments'])) { $comments = $_POST['comments'];} 

            echo "<br> The balance is $balance"; 
                
            if ($userid == "")   {$error_message = "<p style='color:red'> The username cannot be blank! </p>";}
            if ($password == "") {$error_message = "<p style='color:red'> The password cannot be blank! </p>";}
            if ($balance == "") {$error_message = "<p style='color:red'> The balance cannot be blank! </p>";}
            if ($comments == "") {$error_message = "<p style='color:red'> The comment box cannot be blank! </p>";}
            if (!string_check($comments)) {$error_message = "<p style='color:red'> The comments can only contain letters and numbers! </p>";}
    

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
            echo "<br> Enter desired balance ";
            echo "<input type='number' max='10' min='5' step='.5' name='balance' value='$balance'>"; 
            echo "<br> Enter comments";
            echo "<input type='text' maxlength='30' name='comments' value='$comments'>"; 
            echo "<br><br> <input type='submit' value='Submit!' name='submit' style='background-color:blue; color:white;'>";
            echo "</form>";

            if (isset($error_message)) {echo "$error_message";}

            

		#----   display the table 

			$q="SELECT * FROM printsusers"; 
			$r = mysqli_query ( $dbc , $q );    # this runs query 
	
			echo "<table border=1>";
			echo "<tr><th> User Name </th><th> Password </th><th> Comments </th><th> Balance </th></tr>";
	
			if ($r) {
				while ($row = mysqli_fetch_array( $r, MYSQLI_NUM)) {
					echo "<tr>";   
					echo "<td>" . $row[0] . "</td><td class='password'>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . "\$" . $row[3] . "</td>";
					echo "</tr>";   		 
				}	   
			}
			else { echo "<br> Error: " . mysqli_error($dbc) ;}


        #----   this checks strings for alphanum & others (Could make this an include file)

            function string_check($this_string){
                if (ctype_alnum($this_string)){
                    return TRUE;
                }
                else {
                    return FALSE;
                }
            }
            
        

		#----   display a footer 

			include "footer.php";
            ?>

        </body>

    </html>