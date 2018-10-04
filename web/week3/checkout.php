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
            <a href="Checkout">Checkout</a>
        </div>
        <div class="wrapper">
            <div class="cart">
                <center>
                    <h5>Please fill out billing information</h5>
                    <form method="POST" action="results.php">
                        <label for="city">Name</label>
                        <input type="text" placeholder="City" id="city" name="city">
                        <br />
                        <label for="state">Email</label>
                        <input type="text" placeholder="State" id="state" name="state">
                        <br />
                        <label for="adress">Adress</label>
                        <input type="text" placeholder="Adress" id="adress" name="adress">
                        <br />
                        <input type="submit" value="Confirm" id ="confirm">
                    </form>
                </center>
            </div>
        </div>
    </body>
</html>