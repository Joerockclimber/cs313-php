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


$id = $_POST['climb_id'];
$climb = $_POST['climb'];
$grade = $_POST['grade'];

$stmt = $db->prepare("INSERT INTO climb (climb_id, climb_name, grade) VALUES (:id, :climb, :grade)");
$stmt->execute(array(':id' => $id, ':climb' => $climb, ':grade' => $grade));
header("location:http://afternoon-waters-72858.herokuapp.com/week4/climbing.php");
exit();

?>