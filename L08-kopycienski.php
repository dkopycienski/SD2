<!DOCTYPE html>
<!-- LAB 07A Our first PHP file   -->
<!-- 10-21-22 Daisy Kopycienski   -->
<html lang="en">

<head>
    <title> My First PHP File </title>
    <meta charset="utf-8">
</head>

<body>

    <header>
        <h1> My First HTML File </h1>
    </header>

    <main>
        <?php
            echo "<p> Hello world!";
            echo "<p> this text was dynamically created by PHP ";

            echo "<br>";
            include "connect_db.php";

        ?>

    </main>

    <footer>
        <small>  (C) D Kopycienski, 2022  </small>
    </footer>  
</body>
</html>

