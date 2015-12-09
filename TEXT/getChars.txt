<?php

require("../classes/dbutils.php");

$userID = $_SESSION["userID"];


$sql = "SELECT characterID,FK_placeID,name,experience,level ";
$sql .= "FROM character WHERE FK_userID = '" . $userID . "';";

$db = new DbUtilities;
$charCollection = $db->getDataset($sql);
$charData = json_encode($charCollection);

echo('{' . $charData . '}');
