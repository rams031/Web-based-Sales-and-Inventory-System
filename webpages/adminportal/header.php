
<!-- Dito yung Header natin -->
<?php 
session_start(); 
$branchid = $_SESSION['branchid'];
include '../database/dbsql.php';
include '../phpaction/userbased.php';

if ($_SESSION['userid'] == '' && $_SESSION['name'] == '' && $_SESSION['lastname'] == '' && $_SESSION['usertype'] == '')
{
    header("Location: ../index.php");
    echo '<script>alert("Make sure to login before access")</script>';
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../headlinks.php" ?>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation" >
    <?php include "topnavigation.php" ?>
    </nav>
