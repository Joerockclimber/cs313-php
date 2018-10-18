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
            <a href="../index.php">Home</a>
            <a href="../assignments.php">Assigments</a>
            <div id="time"><?php echo date("h:i:sa Y/m/d");?></div>
        </div>
        <div class="wrapper">
            <div>
                <?
                foreach ($db->query('SELECT name FROM climber') as $row)
                {
                    echo 'Climber: ' . $row['name'];
                    echo '<br/>';
                }
                ?>

                <?  

                foreach ($db->query('SELECT date, location, trip_id FROM trip') as $row)
                {
                    echo 'Trip: ' . $row['location'] . ' Date: ' . $row['date'];
                    echo '<br/>';
                    $trip_id = $row['trip_id'];
                    echo "trip_id:" . $trip_id;
                    $stmt = $db->prepare('SELECT climb_name, grade FROM climb WHERE trip_id = :id');

                    $pdoResult = $stmt->execute(array(':id' => $trip_id));
                    echo '<br/>' . $stmt->errorCode() . '<br/>' ;
                    echo '<br/>' . $stmt->errorInfo() . '<br/>';
                    $stmt->debugDumpParams();
                    while ($row2 = $stmt->fetchAll(PDO::FETCH_ASSOC))
                    {
                        echo $row2;
                        echo 'Climb: ' . $row2['climb_name'] . ' grade: ' . $row2['grade']; 
                        echo '<br/>';
                    }

                }
                ?>
            </div>
        </div>
    </body>
</html>