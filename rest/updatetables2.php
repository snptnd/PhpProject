<?php

/*
  if (isset($_POST["table"])) {
  //$levelAccess = $_POST["levelAccess"];
  //$userID = $_POST["userID"];
  //$attemptID = $_POST["attemptID"];
  //require("../classes/dbutils.php");
  } else {
  //$userID = $_SESSION["drupalUserID"];
  //$attemptID = $_SESSION["gameAttemptID"];
  //$levelAccess = "level1.php";
  }

  function insertData($table) {
  $sql = "INSERT INTO $table (userID,attemptID,levelAccess) ";
  $sql .= "VALUES (?,?,?);";

  $db = new DbUtilities;
  $db->executeQuery($sql, "sss", array($userID, $attemptID, $levelAccess));
  } */
//if (isset($_POST["firstName"])){

require "../classes/dbutils.php";

$firstName = $_POST["fName"];
$lastName = $_POST["lName"];
$dateSubmitted = $_POST["dateSubmitted"];
$Happiness = $_POST["happinessSE"];
$Appearance = $_POST["appearanceSE"];
$Education = $_POST["educationSE"];
$Enthusiasm = $_POST["enthusiasmSE"];
$whyDate = $_POST["whyDate"];
$greatGF = $_POST["greatGF"];
$phone = $_POST["phone"];

echo("stuff");

$sql = "INSERT INTO GFapplicants (fName,lName,dateSubmitted,happiness,appearance,education,enthusiasm,whyDate,greatGF,phone) ";
$sql .= "VALUES (?,?,?,?,?,?,?,?,?,?);";



$db = new DbUtilities;
$db->executeQuery($sql, "ssssssssss", array($firstName, $lastName, $dateSubmitted, $Happiness, $Appearance, $Education, $Enthusiasm, $whyDate, $greatGF, $phone));
//}
