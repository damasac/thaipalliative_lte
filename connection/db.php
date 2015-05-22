<?php

## System Start ############################################################
$mysqli = new mysqli("localhost", "", "", "thaipalliative_lte");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli ->set_charset("utf8");
############################################################################

//$sql = "SELECT * FROM v04cascap.puser WHERE pid='2048'";
//$res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
//$res->fetch_assoc();
//$res->fetch_array();
//$res->num_rows;
?>