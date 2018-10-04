<?php 
session_start();
$places = $_POST["places"];

if($places){
    $_SESSION['quantity'] = $places;
    $_SESSION['countries'] = array('North Amaerica', 'South America', 'Asia', 'Europe', 'Africa', 'Australia', 'Antarctica');
}
print_r($_SESSION);
print_r($_SESSION['quantity']);
echo count($_SESSION['quantity']);
$price = 15;
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
                    for($n = 0; $n < count($_SESSION['quantity']); $n++)
                    {
                        if($_SESSION["quantity"][$n] != null && $_SESSION["quantity"][$n] >= 1){
                            echo "<tr><td>" . $_SESSION["quantity"][$n] . "</td> <td>" . $_SESSION["countries"][$n] . "</td><td>" . $_SESSION["quantity"][$n] * $price . "$</td><td><button type=\"button\" onclick=\"removeFromCart($n)\">Delete</button></td></tr>";
                        }
                    }
                    ?>		
                </table>
            </div>
        </div>
    </body>
    <script>
        function removeFromCart(index){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            xhttp.open("GET", "removeFromCart.php?index=" + index, true);
            xhttp.send();
        }
    </script>
</html>