<?php

require("../classes/dbutils.php");

$placeID = $_POST["placeID"];


$sql = "SELECT * FROM point WHERE FK_placeID = '$placeID';";

$db = new DbUtilities;
$pointCollection = $db->getDataset($sql);
$pointData = '"point" : ' . json_encode($pointCollection);

echo('{' . $pointData . '}');
 

?>

