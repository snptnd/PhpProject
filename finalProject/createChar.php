<?php

session_start();
require("../classes/dbutils.php");

$userID = $_SESSION["userID"];
$guid = $_POST["guid"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$agility = $_POST["agility"];
$strength = $_POST["strength"];
$intellect = $_POST["intellect"];
$wisdom = $_POST["wisdom"];
$HP = $_POST["HP"];
$MP = $_POST["MP"];
$stamina = $_POST["stamina"];
$will = $_POST["will"];

$sql = "INSERT INTO srp63.character";
$sql .= "(characterID,FK_placeID,FK_userID,name,gender,agility,strength,";
$sql .= "intellect,wisdom,maxHP,curHP,maxMP,curMP,maxStamina,curStamina,";
$sql .= "maxWill,curWill,experience,level) ";
$sql .= "VALUES (?,'55a4ccfd-5c33-4ddc-9445-1a4af176099b',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,1);";

$db = new DbUtilities;
$db->executeQuery($sql, "ssssiiiiiiiiiiii", array($guid, $userID, $name, $gender,
    $agility, $strength, $intellect, $wisdom, $HP, $HP, $MP, $MP, $stamina,
    $stamina, $will, $will));
?>

