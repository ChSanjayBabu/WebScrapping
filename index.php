<?php
    
    $host = "localhost";
    $user = "sanjay_ch";
    $pass = "3vXt73bGW7mEcGnI";
    
    $conn = mysqli_connect($host,$user,$pass);
    if (!$conn) {
    die('Could not connect: ' . mysql_error());
    }
    $db = mysqli_select_db($conn,'project1');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scrapping siksha</title>
    </head>
    <body>
        <form action="scrape.php" method="post">
            <input type="text" name="url" placeholder="enter city url">
            <br>
            <input type="submit" value="search">
        </form>
    </body>
</html>