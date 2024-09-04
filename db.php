<?php
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "mike";

$con = new mysqli($host, $dbuser, $dbpassword, $dbname);

if ($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}
?>