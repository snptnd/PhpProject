<?php

    require("../classes/dbutils.php");
    
    $FK_placeID = $_POST["FK_placeID"];

    $sql = "SELECT * ";
    $sql .= "FROM srp63.places WHERE placeID = '" . $FK_placeID . "';";
    
    $db = new DbUtilities;
    $placeCollection = $db->getDataset($sql);
    $placeData = '"places" : ' . json_encode($placeCollection);

    echo('{' . $placeData . '}');
    
    
?>

