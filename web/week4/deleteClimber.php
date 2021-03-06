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


$id = $_GET['id'];

//get trip_id for climbers
$stmt = $db->prepare('SELECT trip_id FROM climber JOIN trip USING(climber_id) WHERE climber_id = :id');
$stmt->execute(array(':id' => $id));
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $trip){
    //delete climbs for each trip
    $stmt2 = $db->prepare('DELETE FROM climb WHERE trip_id = :id');
    $stmt2->execute(array(':id' => $trip['trip_id']));
    //delete the trip it's self
    $stmt3 = $db->prepare('DELETE FROM trip WHERE trip_id = :id');
    $stmt3->execute(array(':id' => $trip['trip_id']));
}
    //delete the climber
    $stmt4 = $db->prepare('DELETE FROM climber WHERE climber_id = :id');
    $stmt4->execute(array(':id' => $id));
?>