<?php

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$major = htmlspecialchars($_POST["major"]);
$places = $_POST["places"];
$comments = htmlspecialchars($_POST["comments"]);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Submission Results</title>
</head>

<body>
	<h1>Submission Results</h1>

	<p>Your name is: <?=$name ?></p>
	<p>Your email is: <a href="mailto:<?=$email ?>"><?=$email ?></a></p>
	<p>Your major is: <?=$major ?></p>
	<p>You have been to the following places:</p>
	<ul>

<?
foreach ($places as $place)
{
	$place_clean = htmlspecialchars($place);
	echo "<li><p>$place_clean</p></li>";
}
?>		

	</ul>

	<p>Comments: <?=$comments?></p>

</body>


</html>