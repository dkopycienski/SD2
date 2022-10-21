<!DOCTYPE html>
<!-- A06 PHP Fizz-Buzz Program   -->
<!-- 10-21-22 Daisy Kopycienski   -->
<html lang="en">

<head>
    <title> PHP Fizz-Buzz Program </title>
    <meta charset="utf-8">

    <style>
        .blue {color:blue}
        .red {color:red}
        .tableHeader {color: white; background-color: grey;}
        .tableRow {background-color: lightgreen}
        .fizz {background-color: lightblue}
        .buzz {background-color: lightpink}
    </style>
</head>

<body>

    <header>
        <h1 class="blue"> Assignment 8 - Daisy Kopycienski </h1>
    </header>

    <main>
        <h2 class="red"> This PHP program creates a FIZZ/BUZZ table! </h2>

        <table border=1>
                <tr>
                    <th class="tableHeader"> Number </th>
                    <th class="tableHeader"> Fizz </th>
                    <th class="tableHeader"> Buzz </th>
                </tr>
        

        <?php

            echo "\n";
            for ($i=0; $i<=50; $i++){
                echo "<tr class='tableRow'>";
                echo "<td> $i </td>";

                if($i % 3 == 0){
                    echo "<td class='fizz'> FIZZ </td>";
                }else{
                    echo "<td>  </td>";
                }

                if($i % 5 == 0){
                    echo "<td class='buzz'> BUZZ </td>";
                }else{
                    echo "<td>  </td>";
                }

                echo "</tr>";
            }

        ?>

        </table>

    </main>

    <footer>
        <hr>
        <small>  (C) D Kopycienski, 2022  </small>
    </footer>  

</body>
</html>
