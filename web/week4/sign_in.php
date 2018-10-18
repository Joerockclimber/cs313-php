<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Main Page</title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
        <div class="navbar">
            <a href="../index.php">Home</a>
            <a href="../assignments.php">Assigments</a>
            <div id="time"><?php echo date("h:i:sa Y/m/d");?></div>
        </div>
        <div class="sign_in">
            <div>
                <center>
                    <form method="POST" action="climbing.php">
                        <label for="sign_in">Sign in</label>
                        <input type="text" placeholder="Joe Burgess" id="sign_in" name="sign_in">
                        <input type="submit" value="Confirm" id ="confirm">
                    </form>
                </center>
            </div>
        </div>
    </body>
</html>