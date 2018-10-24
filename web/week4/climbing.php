<?php
session_start();

$_SESSION['name'][0] = $_POST['sign_in'];
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

$stmt = $db->prepare('SELECT name FROM climber WHERE name = :name');

$stmt->execute(array(':name' => $_SESSION['name'][0]));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if( result['name'] = NULL) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'sign_in.php';
    header("Location: http://$host$uri/$extra");
    exit();
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
            <?
            $stmt = $db->prepare('SELECT name FROM climber WHERE name = :name');

            $stmt->execute(array(':name' => $_SESSION['name'][0]));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '<a>Climber: ' . $result['name'] . '</a>';
            ?>
            <div id="time"><?php echo date("h:i:sa Y/m/d");?></div>
        </div>
        <div class="wrapper">
            <?  
            $stmt = $db->prepare('SELECT date, location, trip_id FROM trip WHERE climber_id = (SELECT climber_id FROM climber WHERE name = :name)');
            $stmt->execute(array(':name' => $_SESSION['name'][0]));

            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
                echo '<div>';
                echo 'Trip: ' . $row['location'] . ' Date: ' . $row['date'];
                echo '<br/>';
                $trip_id = $row['trip_id'];
                $stmt = $db->prepare('SELECT climb_name, grade FROM climb WHERE trip_id = :id');

                $stmt->execute(array(':id' => $trip_id));
                /*echo '<br/>' . $stmt->errorCode() . '<br/>' ;
                    echo '<br/>' . $stmt->errorInfo() . '<br/>';
                    $stmt->debugDumpParams();*/
                while ($row2 = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo 'Climb: ' . $row2['climb_name'] . ' Grade: ' . $row2['grade']; 
                    echo '<br/>';
                }
                echo '</div>';
                echo $_SESSION['name'][0];
            }
            ?>
        </div>
    </body>
</html>