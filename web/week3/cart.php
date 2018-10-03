<?php 
$places = $_POST["places"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
    </head>
    <body>
        <ul>
            <?
            foreach ($places as $place)
            {
                $place_clean = htmlspecialchars($place);
                echo "<li><p>$place_clean</p></li>";
            }
            ?>		

        </ul>
    </body>
</html>