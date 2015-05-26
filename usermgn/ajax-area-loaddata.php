<?php
    include "../_connection/db.php";
    if($_GET["task"]=="hospital"){
    $sql = "SELECT DISTINCT
	`hcode`,
	`name`
FROM
	all_hospital_thai
WHERE
	`provincecode` IN (
		SELECT
			province_id
		FROM
			province_zone
		WHERE
			zone_id = '".$_GET["mophID"]."'
	)";
    $query = $mysqli->query($sql);
    
    while($data = $query->fetch_assoc()){
        $array[] = $data;
    }
    print json_encode($array);
    }
?>