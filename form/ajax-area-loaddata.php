<?php
    error_reporting(0);
    include "../_connection/db.php";
    $task = $_GET["task"];
    $hcode = $_GET["hcode"];
    $txtSearch = $_GET["txtSearch"];
    $area = $_GET["area"];
    $province = $_GET["province"];
    $tambon = $_GET["tambon"];
   if($task=="getaddress"){
	
	$sql = "SELECT  * FROM `const_district` WHERE `DISTRICT_NAME` LIKE '%".$txtSearch."%'  LIMIT 1,100";
	
	$query = $mysqli->query($sql);
	
	while($data = $query->fetch_assoc()){
	    $sql2 = "SELECT * FROM `const_province` WHERE `PROVINCE_ID` = '".$data["PROVINCE_ID"]."'  ";

	    $query2 = $mysqli->query($sql2);
	    $data2 = $query2->fetch_assoc();
	    //array_push($data2["PROVINCE_NAME"],$data);
	    $data['PROVINCE_NAME']=$data2['PROVINCE_NAME'];
	    
	    $sql2 = "SELECT * FROM `const_amphur` WHERE `AMPHUR_ID` = '".$data["AMPHUR_ID"]."'  ";

	    $query2 = $mysqli->query($sql2);
	    $data2 = $query2->fetch_assoc();
	    //array_push($data2["PROVINCE_NAME"],$data);
	    $data['AMPHUR_NAME']=$data2['AMPHUR_NAME'];
	    
	    $array[] = $data;
	}
	//print_r($array);
	print json_encode($array);
   }
   if($task=="getaddress2"){
	$amphursub = substr($tambon,0,4);
	$provincesub = substr($tambon,0,2);
	$sqlAmphur = "SELECT * FROM const_amphur WHERE AMPHUR_CODE LIKE '%".$amphursub."%'";

	$sqlProvince = "SELECT * FROM const_province WHERE PROVINCE_CODE LIKE '%".$provincesub."%' ";
	$queryAmphur = $mysqli->query($sqlAmphur);
	$queryProvince = $mysqli->query($sqlProvince);
	$dataAmphur = $queryAmphur->fetch_assoc();
	$dataProvince = $queryProvince->fetch_assoc();
	$data["PROVINCE_NAME"] = $dataProvince["PROVINCE_NAME"];
	$data["PROVINCE_CODE"] = $dataProvince["PROVINCE_CODE"];
	$data["AMPHUR_CODE"] = $dataAmphur["AMPHUR_CODE"];
	$data["AMPHUR_NAME"] = $dataAmphur["AMPHUR_NAME"];
	$data["POSTCODE"] = $dataAmphur["POSTCODE"];
	
	$array[] = $data;
	
	print json_encode($array);
   }