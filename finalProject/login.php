<?php
include("base.php"); 
require("classes/dbutils.php");

$email = $_POST["email"];
$password = $_POST["password"];

$hashPass = md5($password);


$sql = "SELECT userID,email,displayName FROM user WHERE email='$email' AND passW='$hashPass';";
$db = new DbUtilities;
//$db->getDatasetWithParams($sql, "ss", array($email, $hashPass));
//echo($db->getDataset($sql));
$collectionList = $db->getDataset($sql);
if(count($collectionList) > 0){
	foreach($collectionList as &$row){
		$_SESSION["userID"] = $row["userID"];
		$_SESSION["email"] = $row["email"];
		$_SESSION["displayName"] = $row["displayName"];
                echo("VALID");
	}	
	
	// print_r($_SESSION);
	// Change this to redirect to whatever page is the first landing page for the application
}
else{
	$_SESSION["userID"] = "INVALID";
	$_SESSION["email"] = "INVALID";
	$_SESSION["displayName"] = "INVALID";
        echo("INVALID");
	// Authentication failed - redirect to auth failed page
	// You need to update that page
	//header("Location: error.php");
}
?>

