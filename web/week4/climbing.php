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
                
                $result = $db->query('SELECT trip.date, trip.location, climb.grade, climb.name FROM trip JOIN climb on trip.trip_id = climb.trip_id ORDER BY trip_id');
                
                var_dump($result);
                
                    
                
                /*foreach ($db->query('SELECT date, location, trip_id FROM trip') as $row)
                {
                    echo 'Trip: ' . $row['location'] . ' Date: ' . $row['date'];
                    echo '<br/>';
                    $trip_id = $row['trip_id'];

                    $stmt = $db->prepare('SELECT name, grade FROM climb where trip_id = :id ');
                    echo 'yes';
                    $stmt->execute(array(':id' => $trip_id));
                    
                    while ($row2 = $stmt->fetchAll(PDO::FETCH_ASSOC))
                    {
                        echo 'Climb: ' . $row2['name'] . ' grade: ' . $row2['grade']; 
                        echo '<br/>';
                    }
                }*/
                ?>
                Climb:
            </div>
        </div>
    </body>
</html>