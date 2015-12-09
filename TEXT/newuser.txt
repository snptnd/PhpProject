<?php
require("classes/dbutils.php");

    $email = $_POST["email"];
    $password = $_POST["password"];
    $displayName = $_POST["displayName"];
    $sendNews = $_POST["sendNews"];
    $age = $_POST["age"];
    $userID = $_POST["userID"];
    
    $hashPass = md5($password);
    
    $sql = "INSERT INTO user (userID,email,displayName,passW,sendNews,age,timeS) ";
    $sql .= "VALUES (?,?,?,?,?,?, NOW());";
    
    $db = new DbUtilities;
    $db->executeQuery($sql, "sssssi", array($userID, $email, $displayName, $hashPass, $sendNews, $age));
 ?> 