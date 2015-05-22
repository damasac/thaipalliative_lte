<?  if(0) { ?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><? }
header("Content-type: text/html;  charset=utf-8");  
header("Cache-Control: no-cache");
## System Start #######################
include("../_config/config_system.php");
include_once(SYSTEM_DOC_ROOT."system/core-start-ajax.php");
mysql_select_db("eform");
$task = $_GET["task"];
$mophID = $_GET["mophID"];
$province_id = $_GET["province_id"];
$amphur_id = $_GET["amphur_id"];
if($task=="province"){
    $sql = mysql_query("SELECT * FROM province_zone WHERE zone_id='".$mophID."' AND province_name!='' ");
    $array = array();
    while($data = mysql_fetch_assoc($sql)){
        $array[] = $data;
    }
    print json_encode($array);
}
if($task=="amphur"){
    $sql1 = mysql_query("SELECT `AMPHUR_ID`,`AMPHUR_NAME` FROM `amphur` WHERE `PROVINCE_ID`='".$province_id."' ") or die (mysql_error());
    $array = array();
    while($data = mysql_fetch_assoc($sql1)){
        
        $array[] = $data;
    }
   
    print json_encode($array);
}
if($task=="hospital"){
    $sql2 = mysql_query("SELECT DISTINCT hcode,name FROM all_hospital_thai WHERE provincecode='".$provinceID."' ORDER BY hcode ASC");
    $array = array();
     while($data = mysql_fetch_assoc($sql2)){
        $array[] = $data;
    }
    print json_encode($array);
}
if($task=="tumbon"){
    
    $sql = mysql_query("SELECT `DISTRICT_ID`,`DISTRICT_NAME` FROM `district`WHERE `AMPHUR_ID`='".$amphur_id."' ");
    $array = array();
    while($data = mysql_fetch_assoc($sql)){
        $array[] = $data;
    }
    print json_encode($array);
}
?>