
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


$id = $_POST['climber_id'];
$location = $_POST['location'];
$date = $_POST['date'];

$stmt = $db->prepare("INSERT INTO trip (climber_id, location, date) VALUES (:id, :location, :date)");
$stmt->execute(array(':id' => $id, ':location' => $location, ':date' => $date));
header("location:http://afternoon-waters-72858.herokuapp.com/week4/climbing.php");
exit();

?>









