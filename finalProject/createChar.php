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

$item1ID = $_POST["item1ID"];
$item2ID = $_POST["item2ID"];
$item3ID = $_POST["item3ID"];
$item4ID = $_POST["item4ID"];
$item5ID = $_POST["item5ID"];

$sql = "INSERT INTO srp63.character";
$sql .= "(characterID,FK_placeID,FK_userID,name,gender,agility,strength,";
$sql .= "intellect,wisdom,maxHP,curHP,maxMP,curMP,maxStamina,curStamina,";
$sql .= "maxWill,curWill,experience,level) ";
$sql .= "VALUES (?,'55a4ccfd-5c33-4ddc-9445-1a4af176099b',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,1);";

$db1 = new DbUtilities;
$db1->executeQuery($sql, "ssssiiiiiiiiiiii", array($guid, $userID, $name, $gender,
    $agility, $strength, $intellect, $wisdom, $HP, $HP, $MP, $MP, $stamina,
    $stamina, $will, $will));



$sql1 = "INSERT INTO srp63.item (itemID, FK_characterID, type, itemName, ";
$sql1 .= "defence, weight, durability, isEquipped, equipSlot) VALUES ";
$sql1 .= "(?,?,?,?,?,?,?,?,?);";

$db2 = new DbUtilities;
$db2->executeQuery($sql1, "ssssiiiss", array($item1ID, $guid, "clothing", "Peasant Clothes",
    1, 2, 100, "true", "body"));

echo($item1ID . "," . $userID . "," . "clothing" . "," . "Peasant Clothes" . "," . 1 . "," . 2 . "," . 100 . "," . "true" . "," . "body");



$sql2 = "INSERT INTO srp63.item (itemID, FK_characterID, type, itemName, ";
$sql2 .= "defence, weight, durability, isEquipped, equipSlot) VALUES ";
$sql2 .= "(?,?,?,?,?,?,?,?,?);";

$db3 = new DbUtilities;
$db3->executeQuery($sql2, "ssssiiiss", array($item2ID, $guid, "clothing", "Simple Shoes",
    0, 1, 100, "true", "body"));

?>

