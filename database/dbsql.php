<?php
session_start(); 

$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = "ajfstore_database";
$conn = mysqli_connect($dbServername,$dbUsername ,$dbPassword,$dbName);

include 'query.php';
?>
