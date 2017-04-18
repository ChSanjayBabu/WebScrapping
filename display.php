<?php
    $host = "localhost";
    $user = "sanjay_ch";
    $pass = "3vXt73bGW7mEcGnI";
    
    $conn = mysqli_connect($host,$user,$pass);
    if (!$conn) 
    {
    die('Could not connect: ' . mysql_error());
    }
    $db = mysqli_select_db($conn,'project1');
    $list = mysqli_query($conn,"SELECT * FROM details");
    session_start();
    $_SESSION["clear"] = "";
    session_unset();
    session_destroy();

?>
<!DOCTYPE html>
<html>
    <body>
        <table>
            <tr>
                <th STYLE="Padding: 10px;"><?= "college" ?></th>
                <th STYLE="Padding: 0px;"><?= "laoction" ?></th>
                <th STYLE="padding :10px;"><?= "facilities" ?></th>
                <th STYLE="Padding: 10px;"><?= "reviews" ?></th>
            </tr>
            <?php foreach($list as $detail): ?>
                <tr>
                    <td><?= $detail["college"] ?></td>
                    <td><?= $detail["location"] ?></td>
                    <td><?= $detail["facilities"] ?></td>
                    <td><?= $detail["reviews"] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
            
    </body>
</html>
<?php
    mysqli_close($conn);
?>