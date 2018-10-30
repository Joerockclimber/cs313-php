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


$name = $_POST['climber'];
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO climber (name, password) VALUES (:name , :password )");
$stmt->execute(array(':name' => $name, ':password' => $hash));
header("location:http://afternoon-waters-72858.herokuapp.com/week4/sign_in.php");
exit();

?>