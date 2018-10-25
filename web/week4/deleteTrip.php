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
$id2 = $_GET['id'];

$stmt = $db->prepare('DELETE FROM climb WHERE trip_id = :id');
$stmt->execute(array(':id' => $id)); 

$stmt2 = $db->prepare('DELETE FROM trip WHERE trip_id = :id');
$stmt2->execute(array(':id' => $id2));

?>