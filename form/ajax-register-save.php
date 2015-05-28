<?php
session_start();

header("Content-type:text/html; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);

## System Start ############################################################
include_once "../_connection/db.php";
//-----------------------------------------------------------

list($dd,$mm,$yy)=explode("/",$_POST['birth']);
$yy=$yy-543;
$_POST['birth']="$yy-$mm-$dd";
list($dd,$mm,$yy)=explode("/",$_POST['createdate']);
$yy=$yy-543;
$_POST['createdate']="$yy-$mm-$dd";
//echo '<pre>'; print_r($_POST); exit;
if($_POST['task']=='save'){
    
    $pid = $_SESSION['tpc_puser_id'];
    $hcode = $_SESSION['tpc_puser_hcode'];
    $datenow =date('Y-m-d H:i:s');
    $ptid_key = $_POST['ptid_key'];
    $sql ="INSERT INTO `tb_emr` (`formid`, `formname`, `tbname`, `ptid_key`, `dadd`, `pidadd`, `hcode`, `dupdate`, `pidupdate`)
    VALUES ('1', 'ลงทะเบียนผู้ป่วย', 'palliative_register', '$ptid_key', '$datenow', '$pid', '$hcode', '$datenow', '$pid');";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $ptid = $mysqli->insert_id;
    //echo $ptid; exit;

    $_POST['ptid'] = $ptid;
     // INSERT INTO table_name (column1,column2,column3,...) VALUES (value1,value2,value3,...);
    $fields = ''; $values = '';
    foreach($_POST as $key => $val){
        if($key <> 'task'){
            if ($key=='pid') $val=nextpid($_POST[hospcode]);
            $fields .= $key.', ';
            $values .= "'". $mysqli ->real_escape_string($val)."', ";
        }
    }
 
    $fields = substr($fields, 0, -2); // remove back string eg. , 2 string
    $values = substr($values, 0, -2); // remove back string eg. , 2 string
    

    //insert data form
    $sql = "INSERT INTO `palliative_register` (".$fields.") VALUES (".$values.");";
    //echo $sql; exit;
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    //$ptid = $mysqli->insert_id;
    echo $ptid;
    $sql = "UPDATE palliative_register SET ptid_key = ptid WHERE ptid_key = 0 AND ptid ='$ptid'";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $sql = "SELECT ptid_key FROM palliative_register WHERE ptid ='$ptid'";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $pidarr = $res->fetch_assoc();
    $sql = "UPDATE tb_emr SET ptid_key = '$ptid' WHERE id ='$ptid'";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    //$pgroup = $mysqli->insert_id;
} else  if($_POST['task']=='update'){
    $ptid =$_GET['ptid'];
    $values = '';
   
    foreach($_POST as $key => $val){
        if($key<>'task')
            $values .= "$key = '". $mysqli ->real_escape_string($val) ."', ";
    }
    
    $values = substr($values, 0, -2); // remove back string eg. , 2 string
    //insert data form
    $sql = "UPDATE `palliative_register` SET ". $values. " WHERE ptid = '$ptid';";
    //echo $sql;exit;
    echo $ptid;
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
}
function nextpid ($hcode) {
    global $mysqli;
    $sql="SELECT lpad(ifnull(max(pid),0)+1,5,'0') as pid from palliative_register where hospcode='{$hcode}'";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $dbarr = $res->fetch_array();
    return $dbarr['pid'];
}
?>