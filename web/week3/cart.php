<?php 
session_start();
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
                <form method="post">
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
                                $_SESSION[$n] = array($names[$n],$place);
                                echo "<tr><td>" . $_SESSION[$n][0] . "</td> <td>" . $SESSIOM[$n][1] . "</td>" . "<td>" . $_SESSION[$n][0] * 15.00 . "$</td><td><input name=\"#$n\" type=\"submit\" value=\"Submit\"></td></tr>";
                            }
                            $n++;
                        }
                        print_r($_POST);
                        if(isset($_POST['submit']))
                        {

                        } 
                        ?>		

                    </table>
                </form>
            </div>
        </div>
    </body>
</html>