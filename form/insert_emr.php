<?php
ob_start();
session_start();

header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

## System Start ############################################################
include_once "../_connection/db.php";
//-----------------------------------------------------------
//echo '<pre>'; print_r($_POST); exit;
if($_GET['task']=='followup'){
    $pid = $_SESSION['tpc_puser_id'];
    $hcode = $_SESSION['tpc_puser_hcode'];
    $datenow =date('Y-m-d H:i:s');
    $ptid_key = $_GET['ptid_key'];
    $sql ="INSERT INTO `tb_emr` (`formid`, `formname`, `tbname`, `ptid_key`, `dadd`, `pidadd`, `hcode`, `dupdate`, `pidupdate`)
    VALUES ('3', 'การติดตามผลการรักษา', 'palliative_followup', '$ptid_key', '$datenow', '$pid', '$hcode', '$datenow', '$pid');";
}else if($_GET['task']=='treatment'){
    $pid = $_SESSION['tpc_puser_id'];
    $hcode = $_SESSION['tpc_puser_hcode'];
    $datenow =date('Y-m-d H:i:s');
    $ptid_key = $_GET['ptid_key'];
    $sql ="INSERT INTO `tb_emr` (`formid`, `formname`, `tbname`, `ptid_key`, `dadd`, `pidadd`, `hcode`, `dupdate`, `pidupdate`)
    VALUES ('2', 'การให้การรักษา', 'palliative_treatment', '$ptid_key', '$datenow', '$pid', '$hcode', '$datenow', '$pid');";
}
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $ptid = $mysqli->insert_id;

    header("Location: ../form/".$_GET['task'].".php?dataid=".$ptid);

?>
