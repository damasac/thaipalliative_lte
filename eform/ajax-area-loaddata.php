<?php
 include_once("../_connection/db_sql.php");
 error_reporting(0);
$task = $_GET["task"];
$mophID = $_GET["mophID"];
$province_id = $_GET["province_id"];
$amphur_id = $_GET["amphur_id"];
if($task=="province"){
    $sql = mysqli_query($con,"SELECT * FROM province_zone WHERE zone_id='".$mophID."' AND province_name!='' ");
    $array = array();
    while($data = mysqli_fetch_assoc($sql)){
        $array[] = $data;
    }
    print json_encode($array);
}
if($task=="amphur"){
    $sql1 = mysqli_query($con,"SELECT `AMPHUR_ID`,`AMPHUR_NAME` FROM `amphur` WHERE `PROVINCE_ID`='".$province_id."' ") or die (mysqli_error());
    $array = array();
    while($data = mysqli_fetch_assoc($sql1)){
        
        $array[] = $data;
    }
   
    print json_encode($array);
}
if($task=="hospital"){
    $sql2 = mysqli_query($con,"SELECT DISTINCT hcode,name FROM all_hospital_thai WHERE provincecode='".$provinceID."' ORDER BY hcode ASC");
    $array = array();
     while($data = mysqli_fetch_assoc($sql2)){
        $array[] = $data;
    }
    print json_encode($array);
}
if($task=="tumbon"){
    
    $sql = mysqli_query($con,"SELECT `DISTRICT_ID`,`DISTRICT_NAME` FROM `district`WHERE `AMPHUR_ID`='".$amphur_id."' ");
    $array = array();
    while($data = mysqli_fetch_assoc($sql)){
        $array[] = $data;
    }
    print json_encode($array);
}
?>