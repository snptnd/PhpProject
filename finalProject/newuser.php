<?php
//require("classes/dbutils.php");
if( isset($_POST["email"]) )
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sendNews = $_POST["sendNews"];
    $age = $_POST["age"];
    $userID = $_POST["userID"];
    
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO user (userID,email,passW,sendNews,age,timeS) ";
    $sql .= "VALUES (?,?,?,?, NOW());";

    $db = new DbUtilities;
    $db->executeQuery($sql, "ssssi", array($userID, $email, $hashPass, $sendNews, $age));

}

 ?> 