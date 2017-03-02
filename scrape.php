<?php
    $url = $_POST["url"];
    $html1 = file_get_contents($url);
    preg_match_all('/(?<=blank">)(.*)(?=<\/a>)/',$html,$college);
    $num = preg_match_all('/(?<=href=")(.+)(?=" target)/',$html,$links);
    for($links[1] as $link)
    {
        $html2 = file_get_contents($link);
    }
    
?>