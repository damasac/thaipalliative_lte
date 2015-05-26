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
    $sql = "INSERT INTO `palliative_treatment` (".$fields.") VALUES (".$values.");";
    //echo $sql; exit;
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    // ptid register
    echo 'save';
   
} else  if($_POST['task']=='update'){
    $ptid =$_GET['ptid'];
    $values = '';
   
    foreach($_POST as $key => $val){
        if($key<>'task' AND $key <> 'ptid')
            $values .= "$key = '". $mysqli ->real_escape_string($val) ."', ";
    }
    
    $values = substr($values, 0, -2); // remove back string eg. , 2 string
    //insert data form
    $sql = "UPDATE `palliative_treatment` SET ". $values. " WHERE ptid = '$ptid';";
    //echo $sql; exit;
    $res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
    echo 'update';
}

?>