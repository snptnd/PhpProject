<?php

require("../classes/dbutils.php");

function leftOuterJoin($leftTable, $rightTable, $leftPK, $rightFK, $index) {
    $sql = "SELECT * ";
    $sql .= "FROM $leftTable ";
    $sql .= "INNER JOIN $rightTable ";
    $sql .= "ON $leftTable.$leftPK = $rightTable.$rightFK ";
    $sql .= "WHERE Department.idDepartment = $index;";
    $db = new DbUtilities;
    $employeeCollection = $db->getDataset($sql);
    return $employeeCollection;
}

function selectDB($table) {
    $sql = "SELECT * ";
    $sql .= "FROM $table;";
    $db = new DbUtilities;
    $employeeCollection = $db->getDataset($sql);
    return $employeeCollection;
}
