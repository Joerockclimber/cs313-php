<?php

try
{
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
    echo 'Error!: ' . $ex->getMessage();
    die();
} 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Main Page</title>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="assignments.php">Assigments</a>
            <div id="time"><?php echo date("h:i:sa Y/m/d");?></div>
        </div>
        <div class="wrapper">
            <div>
                <?
                foreach ($db->query('SELECT name FROM climber where name "Joe Burgess"') as $row)
                {
                    echo 'Climber: ' . $row['name'];
                    echo '<br/>';
                }
                ?>
                Trip:
                Climb:
            </div>
        </div>
    </body>
</html>