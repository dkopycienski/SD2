<?php
    // ERROR TRAPPING

    set_error_handler("handle_error");

    function handle_error($error_number, $error_string, $error_file, $error_line) {
        echo "<p style='color:red;'>
        ($error_number) $error_string - $error_file : $error_line </p>";
    }

            
#EOF