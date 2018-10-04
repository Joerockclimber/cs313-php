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
                <center><h1>Cart</h1></center>
                <table>
                    <tr>
                        <th>Quantity</th>
                        <th>Map</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    <?php
                    $n = 0;
                    $names = array(0 => 'North Amaerica', 1 => 'South America', 2 => Asia, 3 => 'Europe', 4 => 'Africa', 5 => 'Australia', 6 => 'Antarctica');
                    foreach ($places as $place)
                    {
                        $place_clean = htmlspecialchars($place);
                        if($place_clean != null && $place_clean >= 1){
                            echo "<tr><td>$place_clean</td> <td>$names[$n]</td>" . "<td>" . $place_clean * 15.00 . '$</td><td><input name="#'$n '"type="submit" value="Submit"></td></tr>';

                            $_SESSION[$n] = array($names[$n],$place);
                        }
                        $n++;
                    }

                    if(isset($_POST['submit']))
                    {
                        
                    } 
                    ?>
                    ?>		

                </table>
            </div>
        </div>
    </body>
</html>