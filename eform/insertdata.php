<?php

include_once("../_config/config_system.php");
include_once(SYSTEM_DOC_ROOT."system/core-start-ajax.php");
if($SystemSession_Member_ID>0) {
    $tablename = $_POST["tablename"];
    $useradd = $_SESSION[SS."SystemSession_Member_ID"];
    $task = $_POST["task"];
    $id = $_POST["id"];
    $dadd = date("Y-m-d H:i:s");
    $sqlInsert = "INSERT INTO `".$tablename."`(id,rstat,useradd,dadd) VALUES('".$id."','0','".$useradd."','".$dadd."')";
    mysql_query($sqlInsert);
    mysql_query("UPDATE `".$tablename."` SET `rstat`='2' WHERE `id`='".$id."' ") or die(mysql_error());
    foreach ($_POST as $key => $value){
        if(is_array($value)){
            for($i=0;$i<sizeof($value);$i++){
               $sqlUpdateCheckbox = "UPDATE `".$tablename."` SET `".$value[$i]."`='1' WHERE `id`='".$id."' ";
               mysql_query($sqlUpdateCheckbox);
            }
        }
        $sqlUpdateField = "UPDATE `".$tablename."` SET `".$key."`='".$value."' WHERE `id`='".$id."'";
        mysql_query($sqlUpdateField)."<br>";
    }
} ?>
<script>
    <?php //ห้ามลบ Redirect by vut
    if($_GET['Redirect']){ ?>
        location.href = "../<?php echo base64_decode($_GET["Redirect"]);?>";
    <?php } else {  ?>
        location.href = "table.php?idFormMain=<?php echo $_POST["formid"];?>";
    <?php } ?>
</script>
