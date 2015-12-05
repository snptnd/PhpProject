<?php
if(!isset($_SESSION["userID"]) or $_SESSION["userID"] == null or $_SESSION["userID"] == "" or $_SESSION["userID"] == "INVALID"){
    //No session data
} else{
    //logged in!
    require("../classes/dbutils.php");
    $userID = $_SESSION["userID"];

    $sql = "SELECT * ";
    $sql .= "FROM character WHERE FK_userID = '" . $userID . "';";

    $db = new DbUtilities;
    $charCollection = $db->getDataset($sql);
    $charData = '"character" : ' . json_encode($charCollection);

echo('{' . $charData . '}');
}



?>

