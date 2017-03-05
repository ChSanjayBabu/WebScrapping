
<!DOCTYPE html>
<html>
    <head>
        <title>Scrapping siksha</title>

    </head>

    <body>
        <script>
        function func()
        {
            var x =  document.getElementsByName("url")[0].value;
            document.getElementById("test1").innerHTML = x;

        }
        </script>

        <p id="test1">   .</p>
        <form onsubmit = "func(); return false" >
            <input placeholder = "type url" type = "text" name="url">
            <input type = "submit" value ="search">
        </form>
    </body>
</html>
