<?php
require_once 'settings.php';

$mysqli = new mysqli($host, $username, $password, $dbname);
$sql = "SELECT * FROM users";

if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed.
    echo "Sorry, the website is experiencing problems.";

    // Again, do not do this on a public site, but we'll show you how
    // to get the error information
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}



while ($actor = $result->fetch_assoc()) {
echo  $actor['firstname'] . " " . $actor['lastname'] . "<br>";
}


 ?>
