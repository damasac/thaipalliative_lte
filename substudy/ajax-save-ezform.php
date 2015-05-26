<?php
session_start();

header("Content-type:text/html; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);

include_once "../_connection/db.php";

if(isset($_POST['ezfrom'])){
    $pid = $_SESSION['tpc_puser_id'];
    $hcode = $_SESSION['tpc_puser_hcode'];
    $datenow =date('Y-m-d H:i:s');
    $ptid_key = $_POST['ptid_key'];
    $formid = $_POST['ezfrom'];
    $sql ="SELECT formname, tablename FROM `formmain` WHERE formid = '$formid';";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $dbarr=$res->fetch_assoc();
    $formname = $dbarr['formname'];
    $formtable = $dbarr['tablename'];
    $sql ="INSERT INTO `tb_substudy` (`formid`, `formname`, `tbname`, `ptid_key`, `dadd`, `pidadd`, `hcode`, `dupdate`, `pidupdate`)
    VALUES ('$formid', '$formname', '$formtable', '$ptid_key', '$datenow', '$pid', '$hcode', '$datenow', '$pid');";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    echo $mysqli->insert_id;
}
?>