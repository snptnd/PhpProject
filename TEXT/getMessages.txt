<?php

require("../classes/dbutils.php");

$eventID = $_POST["eventID"];

$sql = "SELECT * FROM message WHERE FK_eventID = '" . $eventID . "';";

$db = new DbUtilities;
$messCollection = $db->getDataset($sql);
$messData = '"message" : ' . json_encode($messCollection);

echo('{' . $messData . '}');
?>