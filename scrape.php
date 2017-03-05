<?php
    $host = "localhost";
    $user = "sanjay_ch";
    $pass = "3vXt73bGW7mEcGnI";
    
                                  $conn = mysqli_connect($host,$user,$pass);
    if (!$conn) {
    die('Could not connect: ' . mysql_error());
    }
    $db = mysqli_select_db($conn,'project1');
    $url = $_POST["url"];
    $html = file_get_contents($url);
    preg_match_all('/(?<=blank">)(.*)<\/a>\n<p>\| (.*)<\/p><\/h2>/',$html,$coll_add);
    var_dump($coll_add_revw);
    preg_match_all('/facility-icons|(?<=<h3>).*(?=<\/h3>\n<p>)|(?<=<span><b>)(.*)(?=<\/b>)/',$html,$faclties_rev);
    
    $faclty_text = null;
    $i = 0;
    $count = 0;
    $num = 0;
    foreach ($faclties[0] as $faclty)
    {
        if ($faclty != 'facility-icons')
        {
            if(!is_numeric($faclty))
            {
                $faclty_text = $faclty_text.($faclty.',');
            }
            
        }
        else if($faclty_text != null)
        {
            $faclty_text = rtrim($faclty_text,",");
            mysqli_query($conn,"INSERT INTO project1  (college, location, facilities)
                VALUES ('{$coll_add[1][$i]}', '{$coll_add[2][$i]}', '{$faclty_text}')");
            $i++;
            
            $faclty_text = null;
        }
        $count++;
    }

?>