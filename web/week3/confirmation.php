<?php

session_start();

$city = htmlspecialchars($_POST["city"]);
$state = htmlspecialchars($_POST["state"]);
$adress = htmlspecialchars($_POST["address"]);
$price = 15;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Form Submission Activity</title>
        <link rel="stylesheet" type="text/css" href="cart.css">
    </head>
    <body>
        <div class="navbar">
            <a href="/index.php">Home</a>
            <a href="/assignments.php">Assigments</a>
            <a href="shopping.php">Shopping</a>
            <a href="checkout.php">Checkout</a>
        </div>
        <div class="wrapper">
            <div class="cart">
                <center>
                    <h1>Producted Purchased</h1>
                    <table>
                        <tr>
                            <th>Quantity</th>
                            <th>Map</th>
                            <th>Price</th>
                        </tr>
                        <?php
                        $total = 0;
                        for($n = 0; $n < count($_SESSION['quantity']); $n++)
                        {
                            if($_SESSION["quantity"][$n] != null && $_SESSION["quantity"][$n] >= 1){
                                echo "<tr><td>" . $_SESSION["quantity"][$n] . "</td> <td>" . $_SESSION["countries"][$n] . "</td><td>" . $_SESSION["quantity"][$n] * $price . "$</td></tr>";
                                $total += $_SESSION["quantity"][$n] * $price;
                            }
                        }
                        ?>
                        <tr>Total = $ <?=$total ?> </tr>
                    </table>
                </center>
            </div>
        </div>
    </body>
</html>