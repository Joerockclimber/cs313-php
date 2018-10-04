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
                    <label for="name">Name</label>
                    <input type="text" placeholder="Name" id="name" name="name">
                    <br />
                    <label for="email">Email</label>
                    <input type="text" placeholder="Email Address" id="email" name="email">
                    <br />
                    <input type="submit" value="Submit Answers">
                </form>
            </div>
        </div>
    </body>
</html>