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
        $(document).ajaxStart(function() {
        $('#loading').show(); // show the gif image when ajax starts
        }).ajaxStop(function() {
            $('#loading').hide();
            $("#test1").show();// hide the gif image when ajax completes
        });
        function load()
        {
            document.getElementById("name").style.display = "none";
            document.getElementById("butt").style.display = "none"
            scrapping();
        }

        function scrapping()
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
                    if(x != "0") scrapping();
                }
                });
        }
        </script>
        <div id="test1">
            <a href="display.php">show details</a>
        </div>
            <input id = "name" placeholder = "type url" type = "text" name="url">
            <input id = "butt" type = "button" value = "search" onclick = "load();">
        <div id="loading" hidden style="vertical-align:middle; text-align:center">
            <br><br><br><br><br><br> 
            <img id="loading-image" src="https://orig06.deviantart.net/df77/f/2013/094/8/d/loading_logofinal_by_zegerdon-d60eb1v.gif" alt="Loading..." />
        </div>
    </body>
</html>