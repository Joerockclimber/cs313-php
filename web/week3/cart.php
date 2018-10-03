<?php 
session_start();
session_unset();
$places = $_POST["places"];
print_r ($_POST);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
    </head>
    <body>
        <ul>
            
            <?
            $n = 0;
            $names = array(0 => 'North Amaerica', 1 => 'South America', 2 => Asia, 3 => 'Europe', 4 => 'Africa', 5 => 'Australia', 6 => 'Antarctica');
            foreach ($places as $place)
            {
                $place_clean = htmlspecialchars($place);
                if($place_clean != null && $place_clean >= 1){
                echo "<li><p>$place_clean $names[$n] </p></li>";
                $_SESSION[$n] = array(names[$n],$place);
                }
                $n++;
                print_r($_SESSION);
            }
            ?>		

        </ul>
    </body>
</html>