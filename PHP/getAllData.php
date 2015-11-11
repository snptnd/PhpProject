<?php

require("../classes/dbutils.php");

$stuff = $_POST["sendThis"];

$sql = "SELECT * ";
$sql .= "FROM Applicant;";
//. "WHERE attemptID = '" . $attemptID . "' AND userID = '" . $userID . "';";

$db = new DbUtilities;
$dataCollection = $db->getDataset($sql);

$appData = '"applicant" : ' . json_encode($dataCollection);
