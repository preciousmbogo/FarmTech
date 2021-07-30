<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "feed_nutritive_value";

$connection = mysqli_connect($host,$user,$pass,$dbName);

if (!isset($connection)){
    die("Connection error");
}
