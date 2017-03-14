<?php
    session_start();
    $host = "localhost";
    $user = "sanjay_ch";
    $pass = "3vXt73bGW7mEcGnI";
    
    $conn = mysqli_connect($host,$user,$pass);
    if (!$conn) 
    {
    die('Could not connect: ' . mysql_error());
    }
    $db = mysqli_select_db($conn,'project1');
    $url = $_GET["url"];
    $html = file_get_contents($url);
    preg_match_all('/(?<=blank">)(.*)<\/a>\n<p>\| (.*)<\/p><\/h2>/',$html,$coll_add);
    preg_match_all('/facility-icons|(?<=<h3>).*(?=<\/h3>\n<p>)|(?<=<span><b>).*(?=<\/b>)/'
        ,$html,$faclties_revw);
    $faclty_text = null;
    $i = 0;
    $count = 0;
    foreach ($faclties_revw[0] as $faclty)
    {
        if ($faclty != 'facility-icons')
        {
            if(!is_numeric($faclty))
            {
                $faclty_text = $faclty_text.($faclty.', ');
            }
            
        }
        else if($faclty_text != null)
        {
            if(is_numeric($faclties_revw[0][($count)-1]))
            {
                $num = $faclties_revw[0][($count)-1];
            }
            else
            {
                $num = 0;
            }
            $faclty_text = rtrim($faclty_text,", ");
            mysqli_query($conn,"INSERT IGNORE INTO details (college, location, facilities, reviews)
                VALUES ('{$coll_add[1][$i]}', '{$coll_add[2][$i]}', '{$faclty_text}', '{$num}')");
            $i++;
            
            $faclty_text = null;
        }
        $count++;
    }
        preg_match_all('/class="next/',$html,$page);
        if($page[0][0] === 'class="next' )
        {
            preg_match_all('/(?<=class="next).*href = (.*)><i/',$html,$Url);
            echo $Url[1][0];
        }
        else
        {
            echo "0";
        }

?>