<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scrapping siksha</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    </head>
    <body>
        <script>/*global $*/
        var i = 1;

        function func()
        {
            var x = $("input:text").val();
                $.ajax({
                url: "scrape.php",
                async : true,
                data: {url : x},
                type: 'GET',
                success: function(datastring) {
                    var x = datastring;
                    console.log('request through ajax is done');
                    console.log(x);
                    $("input:text").val(x);
                    if(x != "0") func();
                }
                });
        }
        </script>
        <div id="test1"></div>
            <input id = "name" placeholder = "type url" type = "text" name="url">
            <input type = "button" value = "search" onclick = "func();">
    </body>
</html>