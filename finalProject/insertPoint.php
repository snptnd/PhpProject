<?php

require("../classes/dbutils.php");

$guid = $_POST["guid"];



/*
$sql = "INSERT INTO srp63.message ";
$sql .= "(messageID,FK_eventID,messageOrder,message) ";
$sql .= "VALUES ('$guid','event4',1,\"It's Maria's House. Though small, it is well kept. ";
$sql .= "Potted flowers dot each windowsil and there is a garden to the side.";
$sql .= " The house, made of wood, is tucked away on the edge of the village.\");";
*/
/*
$sql = "INSERT INTO srp63.point ";
$sql .= "(pointID,FK_eventID,FK_placeID,imgFileName,xCoord,yCoord,pointName) ";
$sql .= "VALUES ('$guid','event4','55a4ccfd-5c33-4ddc-9445-1a4af176099b','place.png',6,3,\"Maria's House\");";
/*

//$sql = "UPDATE point SET xCoord=20,yCoord=24 WHERE pointID='41b33073-557d-f70a-f9d0-7b56c7ae82b2';";

/*
$sql = "INSERT INTO srp63.event ";
$sql .= "(eventID,eventName) ";
$sql .= "VALUES ('event4',\"MariaHouse1\");";
*/

//$sql = "ALTER TABLE point modify FK_eventID varchar(36) NULL;";

//$sql = "";

//$sql = "ALTER TABLE point MODIFY FK_placeID VARCHAR(36);";

$servername = "localhost";
$username = "srp63";
$password = "3669488";
$dbname = "srp63";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();



/*
//$sql = "SELECT * FROM message;";
//$sql = "DESCRIBE message;";

$db = new DbUtilities;
$tblCollection = $db->getDataset($sql);
$tblData = '"point" : ' . json_encode($tblCollection);

echo('{' . $tblData . '}');
 */
 