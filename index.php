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
        function func()
        {
            var i = 1;
            var x = $("input:text").val();
            $("#test1").html(x);
            while(i)
            {
                $.ajax({
                url: "scrape.php",
                data: {url : x},
                type: 'GET',
                success: function(datastring) {
                    x = datastring;
                    console.log('request through ajax is done');
                    console.log(x);
                    $("#test1").html(x);
                }
                });
            }
        }
        </script>
        <div id="test1">3</div>
            <input id = "name" placeholder = "type url" type = "text" name="url">
            <input type = "button" value = "search" onclick = "func();">
    </body>
</html>