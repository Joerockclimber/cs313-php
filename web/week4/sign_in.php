<?php
session_start();
?>

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
                        <input type="text" value="Joe Burgess" id="sign_in" name="sign_in">
                        <label for="password">Pass Word</label>
                        <input type="text" placeholder="Password" id="sign_in" name="sign_in">
                        <p>
                            <? if(isset($_SESSION['name'][0])){
                                echo 'wrong password or username';} ?>
                        </p>
                        <input type="submit" value="Confirm" id ="confirm">
                    </form>
                </center>
            </div>
        </div>
    </body>
</html>