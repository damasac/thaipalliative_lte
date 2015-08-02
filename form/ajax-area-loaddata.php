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
        $q =  $_GET["q"];
	$sql = "SELECT  * FROM `const_district` WHERE `DISTRICT_NAME` LIKE '%".$q."%'  LIMIT 0,100";
	$query = $mysqli->query($sql);
        $i=0;
        $json='';
	while($data = $query->fetch_assoc()){
            $district = substr($data["DISTRICT_CODE"],0,4);
            $amphur = "SELECT * FROM `const_amphur` WHERE AMPHUR_CODE = '".$district."' ";
            $queryAmphur = $mysqli->query($amphur);
            $dataAmphur = $queryAmphur->fetch_assoc();
            $province = substr($dataAmphur["AMPHUR_CODE"],0,2);
            $sqlProvince = "SELECT * FROM const_province WHERE PROVINCE_CODE = '".$province."' ";
            $queryProvicne = $mysqli->query($sqlProvince);
            $dataProvince = $queryProvicne->fetch_assoc();
            $json["items"][$i] = ['id'=>$data['DISTRICT_CODE'],
                        'text'=>"ต. ".$data["DISTRICT_NAME"]." : อ. ".$dataAmphur["AMPHUR_NAME"]." : จ. ".$dataProvince["PROVINCE_NAME"]];
            $i++;
	}

	print json_encode($json);
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