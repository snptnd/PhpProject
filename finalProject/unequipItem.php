<?php

require("../classes/dbutils.php");

$itemID = $_POST["itemID"];
$isEquipped = $_POST["isEquipped"];

$sql = "UPDATE srp63.item SET isEquipped = ? WHERE itemID = ?;";

$db = new DbUtilities;
$db->executeQuery($sql, "ss", array($isEquipped, $itemID));
?>

