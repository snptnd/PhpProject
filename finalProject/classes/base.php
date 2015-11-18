<?php
session_start();
 
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ
$dbname = "srp63"; // the name of the database that you are going to use for this project
$dbuser = "srp63"; // the username that you created, or were given, to access your database
$dbpass = "3669488"; // the password that you created, or were given, to access your database

$link = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("MySQL Error: " . mysql_error());

?>