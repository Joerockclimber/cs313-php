<?php 
session_start();
session_unset();
$places = $_POST["places"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
        <link rel="stylesheet" type="text/css" href="cart.css">
    </head>
    <body>
        <div class="navbar">
            <a href="/index.php">Home</a>
            <a href="/assignments.php">Assigments</a>
            <a href="shopping.php">Shopping</a>
            <div id="time"><?php echo date("h:i:sa Y/m/d");?></div>
        </div>
        <div class="wrapper">
            <div class="cart">
                <ul>

                    <?
                    $n = 0;
                    $names = array(0 => 'North Amaerica', 1 => 'South America', 2 => Asia, 3 => 'Europe', 4 => 'Africa', 5 => 'Australia', 6 => 'Antarctica');
                    foreach ($places as $place)
                    {
                        $place_clean = htmlspecialchars($place);
                        if($place_clean != null && $place_clean >= 1){
                            echo "<li><p>$place_clean $names[$n] </p></li>";
                            $_SESSION[$n] = array($names[$n],$place);
                        }
                        $n++;
                    }
                    ?>		

                </ul>
            </div>
        </div>
    </body>
</html>