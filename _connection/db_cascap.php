<?php
/** Connect database CASCAP -> Not security :'( */
$mysqli_cascap = new mysqli("", "", "", "v04cascap");
if ($mysqli_cascap->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli_cascap->connect_errno . ") " . $mysqli->connect_error;
}
//$mysqli_cascap ->set_charset("utf8");
?>
