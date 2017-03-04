<?php
    $url = $_POST["url"];
    $html1 = file_get_contents($url);
    preg_match_all('/(?<=blank">)(.*)<\/a>\n<p>\| (.*)</p></h2>/',$html,$college);
?>