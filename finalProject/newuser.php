<?php
require("classes/dbutils.php");
if( isset($_POST["email"]) )
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sendNews = $_POST["sendNews"];
    $age = $_POST["age"];
    
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO user (email,password,sendNews,age,timeStamp) ";
    $sql .= "VALUES (?,?,?, NOW());";

    $db = new DbUtilities;
    $db->executeQuery($sql, "sssi", array($email, $hashPass, $sendNews, $age));

}

 ?> 