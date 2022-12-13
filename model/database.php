<?php

$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "farhanx";


$connection = mysqli_connect($hostname, $username, $password,$databasename);

if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
?>