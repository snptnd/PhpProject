<?php
session_start();
require("../classes/dbutils.php");

$userID = $_SESSION["userID"];
$guid = $_POST["guid"];
$content = $_POST["content"];
$threadID = $_POST["threadID"];

$sql = "INSERT INTO post (postID,FK_userID,FK_threadID,content,timeS) ";
$sql .= "VALUES (?,?,?,?,NOW());";

$db = new DbUtilities;
$db->executeQuery($sql, "ssss", array($guid, $userID, $threadID, $content));

$sql = "INSERT INTO post (postID,FK_userID,FK_threadID,content,timeS) ";
$sql .= "VALUES ($guid,$userID,$threadID,$content,NOW());";

echo $sql;