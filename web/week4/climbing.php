<?php
session_start();

if(!isset($_SESSION['name'][0])){
    $_SESSION['name'][0] = $_POST['sign_in'];
}

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

$stmt = $db->prepare('SELECT name, climber_id FROM climber WHERE name = :name');

$stmt->execute(array(':name' => $_SESSION['name'][0]));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if( $result['name'] == FALSE) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'sign_in.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
$_SESSION['climber_id'] = $result['climber_id']; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Main Page</title>
        <link rel="stylesheet" type="text/css" href="climbing.css">
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
                echo 'Trip: ' . $row['location'] . ' Date: ' . $row['date'] . "<button type=\"button\" onclick=\"deleteTrip(" . $row['trip_id'] . ")\">Delete</button>";
                echo '<br/>';
                $trip_id = $row['trip_id'];
                $stmt = $db->prepare('SELECT climb_name, grade, climb_id FROM climb WHERE trip_id = :id');

                $stmt->execute(array(':id' => $trip_id));
                /*echo '<br/>' . $stmt->errorCode() . '<br/>' ;
                    echo '<br/>' . $stmt->errorInfo() . '<br/>';
                    $stmt->debugDumpParams();*/
                while ($row2 = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo "Climb: " . $row2['climb_name'] . " Grade: " . $row2['grade'] . "<button type=\"button\" onclick=\"deleteEntry(" . $row2['climb_id'] . ")\">Delete</button>"; 
                    echo '<br/>';
                }

                echo "<form method='POST' action='addClimb.php'>";
                echo    "<label for='climb'>Climb name:</label>";
                echo        "<input type='text' placeholder='Climb Name' id='climb' name='climb'>";
                echo        "<br />";
                echo        "<label for='grade'>Grade</label>";
                echo            "<input type='text' id='grade' name='grade' placeholder='V#' maxlength = '2'>";
                echo            "<br />";
                echo            "<input type='hidden' id='trip_id' name='trip_id' value=" . $row['trip_id'] . ">";
                echo            "<input type='submit' value='Confirm' id ='confirm'>";
                echo            "</form>";
                echo '</div>';
            }
            ?>

            <div>       
                <form method="POST" action="addTrip.php">
                    <label for="location">Location</label>
                    <input type="text" placeholder="Location" id="location" name="location">
                    <br />
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date">
                    <br />
                    <input type="hidden" id="climberId" name="climber_id" value="<?echo $_SESSION['climber_id'];?>">
                    <input type="submit" value="Confirm" id ="confirm">
                </form>
            </div>
        </div>
    </body>

    <script>
        function deleteEntry(id){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            //+ '&from=' + from
            xhttp.open("GET", "delete.php?id=" + id, true);
            xhttp.send();
        }

        function deleteTrip(id){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location.reload();
                }
            };
            //+ '&from=' + from
            xhttp.open("GET", "deleteTrip.php?id=" + id, true);
            xhttp.send();
        }
    </script>

</html>