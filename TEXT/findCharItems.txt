<?php

session_start();
require("../classes/dbutils.php");

$characterID = $_POST["characterID"];

    $sql = "SELECT * ";
    $sql .= "FROM srp63.item WHERE FK_characterID = '" . $characterID . "';";

    $db = new DbUtilities;
    $charCollection = $db->getDataset($sql);
    $itemData = '"item" : ' . json_encode($charCollection);

    echo('{' . $itemData . '}');

?>

