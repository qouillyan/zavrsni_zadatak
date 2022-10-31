<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql123";
$db = "blog";

try {
    $connection = new PDO("mysql:host=$dbhost;dbname=$db", $dbuser, $dbpass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

?>