<?php
$server = 'localhost';
$user = 'php';
$passwd = 'mygoal4MIT!';
$dbname = 'room923';

$conn = new mysqli($server, $user, $passwd, $dbname);

if ($conn->connect_error) {
    die('Database Connection Failed: ') . $conn->connect_error;
}
?>