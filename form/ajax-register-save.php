<?php
session_start();

header("Content-type:text/html; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);

## System Start ############################################################
include_once "../_connection/db.php";
//-----------------------------------------------------------
//echo '<pre>'; print_r($_POST); exit;
if($_POST['task']=='save'){
    
    $pid = $_SESSION['tpc_puser_id'];
    $hcode = $_SESSION['tpc_puser_id'];
    $datenow =date('Y-m-d H:i:s');
    $ptid_key = $_POST['ptid_key'];
    $sql ="INSERT INTO `tb_emr` (`formid`, `formname`, `tbname`, `ptid_key`, `dadd`, `pidadd`, `hcode`, `dupdate`, `pidupdate`)
    VALUES ('3', 'ลงทะเบียนผู้ป่วย', 'palliative_register', '$ptid_key', '$datenow', '$pid', '$hcode', '$datenow', '$pid');";
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    $ptid = $mysqli->insert_id;
    //echo $ptid; exit;
    $_POST['ptid'] = $ptid;
     // INSERT INTO table_name (column1,column2,column3,...) VALUES (value1,value2,value3,...);
    $fields = ''; $values = '';
    foreach($_POST as $key => $val){
        if($key <> 'task'){
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
    $sql = "UPDATE v05cascap.tbl_followup_group SET ". $values. " WHERE pgroup = '$ptid';";
    echo $sql; exit;
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
}
?>
    <div id="divfrm-followup-tab2">
        <div class="text-center">
            <hr>
            <h1><b<span class="fa fa-check-circle"></span> บันทึกข้อมูลเรียบร้อย</b></h1>
            <div class="form-group">
                <hr>
                <div class="col-md-6"><button type="button" onclick="loadForm('<?php echo $pgroup; ?>');" class="btn btn-lg btn-success btn-block" id="createreport">ดูข้อมูลที่บันทึก</button></div>
                <div class="col-md-6"><button type="button" onclick='location.href="?tab=admin&task=followup-group-manager"; return false;' class="btn btn-lg btn-primary btn-block">รายการกลุ่มทั้งหมด</button></div>
            </div>
        </div>
    </div>
