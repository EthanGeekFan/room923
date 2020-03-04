<?php
$login = false;

session_start();

$_SESSION['login'] = false;

header('refresh: 0; url=/')
?>