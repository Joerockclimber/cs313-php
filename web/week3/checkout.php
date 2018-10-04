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
                <form method="POST" action="results.php">
                    <p>Please answer the following questions:</p>
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
            </div>
        </div>
    </body>
</html>