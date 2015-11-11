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
$WorkExperience = $_POST["workExpSE"];
$Appearance = $_POST["appearanceSE"];
$Education = $_POST["educationSE"];
$Enthusiasm = $_POST["enthusiasmSE"];
$whyWork = $_POST["whyWork"];
$strengths = $_POST["majorStrengths"];
$language = $_POST["languages"];
$other = $_POST["other"];


$sql = "INSERT INTO Applicant (fName,lName,dateSubmitted,workExpSE,appearanceSE,educationSE,enthusiasmSE,whyWork,majorStrengths,languages,other) ";
$sql .= "VALUES (?,?,?,?,?,?,?,?,?,?,?);";



$db = new DbUtilities;
$db->executeQuery($sql, "sssssssssss", array($firstName, $lastName, $dateSubmitted, $WorkExperience, $Appearance, $Education, $Enthusiasm, $whyWork, $strengths, $language, $other));
//}
