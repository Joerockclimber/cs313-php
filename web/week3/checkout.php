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
            <a href="cart.php">Cart</a>
            <a href="checkout.php">Checkout</a>
        </div>
        <div class="wrapper">
            <div class="cart">
                <center>
                    <h3>Please fill out billing information</h3>
                    <form method="POST" action="confirmation.php">
                        <label for="city">City</label>
                        <input type="text" placeholder="City" id="city" name="city">
                        <br />
                        <label for="state">State</label>
                        <input type="text" placeholder="State" id="state" name="state">
                        <br />
                        <label for="address">Address</label>
                        <input type="text" placeholder="Address" id="address" name="address">
                        <br />
                        <label for="zip">Zip</label>
                        <input type="text" placeholder="Zip" id="zip" name="zip">
                        <br />
                        <input type="submit" value="Confirm" id ="confirm">
                    </form>
                </center>
            </div>
        </div>
    </body>
</html>