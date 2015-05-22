<?php  if(0) { ?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><?php } 
$System_LayoutUse="layout_easy.html";
$System_AjaxFileAction="ajax-eform-loaddata.php";
$System_ShowAjaxIFrame=0;
$myMenuKey="E Form";

include_once("../_config/config_system.php");
include_once(SYSTEM_DOC_ROOT."system/core-start-ajax.php");
if($SystemSession_Member_ID>0) { 
    	//----------------------------------------------------------------------------------------------------------------
	include_once(SYSTEM_DOC_ROOT."system/core-start.php");
	include_once(SYSTEM_DOC_ROOT."system/core-body.php");
	include_once("function/function_eform.php");
	
	$sqlFormMain = "SELECT * FROM formmain WHERE formid='".$_GET["idFormMain"]."'";
	$queryFormMain = mysql_query($sqlFormMain) or die(mysql_error());
	$dataFormMain = mysql_fetch_assoc($queryFormMain);
	$myMenuKey = "showForm";
	include("inc_menu.php");
	
	$useradd = $_SESSION[SS."SystemSession_Member_ID"];

	?>
    <script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js-select2/select2.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js-select2/select2.css">
	<script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js/jquery.datetimepicker.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js/jquery.datetimepicker.css">
	<script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/bootstrap3-dialog/bootstrap-dialog.min.css">
    	<link rel="stylesheet" href="style/style.css">
        <div class="panel panel-default">
            <div class="panel-body" style="height: auto;">
		<span style="float:right"><a href="table.php?task=public&idFormMain=<?php echo $_GET["idFormMain"]?>" class="btn btn-primary" style="color:white;">ดูตารางข้อมูล</a></span>
                <p style="font-size:36px;color:black;"><?php echo $dataFormMain["formname"];?></p>
                <p style="font-size:16px;"><?php echo $dataFormMain["formdesc"];?></p>
		
                <hr style="border:1px #AAAAAA solid">
                <div id="form" style="height:auto;">
                    <?php
		    if($_POST["id"]==""){$id=$_GET["id"];}
		    if($_GET["id"]==""){$id=$_POST["id"];}
		    if($id==""){
			//ถ้าไม่มีค่า id ส่งมาจะทำการสุ่มเลข
			srand(make_seed());
			$randval = rand();
			$id = $randval;
		    }
		    ?>
			<form action="insertdata.php" method="post" class="form-horizontal" >
			<?php 
		            $selectField = "SELECT * FROM formfield WHERE formid='".$dataFormMain["formid"]."' ORDER BY forder ";
                            $queryField = mysql_query($selectField) or die(mysql_error());
                            while($dataField = mysql_fetch_assoc($queryField)){
				if($id!=""){
				    $sql = "SELECT * FROM `".$dataFormMain["tablename"]."` WHERE id='".$id."' ";
				    $query = mysql_query($sql) or die(mysql_error());
				    $datavalue = mysql_fetch_assoc($query);
				    
				    $value = $dataField["fieldvalue"];
				    $value =  $datavalue[$value];
				    
				    if($dataField["fieldtype"]=="dbthailand"){
					    $value_province =  $datavalue[$dataField["fieldvalue"]."_province"];
					    $value_amphur = $datavalue[$dataField["fieldvalue"]."_amphur"];
					    $value_tumbon = $datavalue[$dataField["fieldvalue"]."_tumbon"];
				    }
				    echo "<div class='showForm'>";
				    echo formgenForUpdate($i,$dataField,$value,$value_province,$value_amphur,$value_tumbon);
				    echo "</div>";
				}else{
				    echo "<div class='showForm'>";
				    echo formgenForUpdate($i,$dataField);
				    echo "</div>";
				}
                        ?>
		<br>
		        <?php }  ?>
			<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
			<input type="hidden" name="useradd" id="useradd" value="<?php echo $useradd;?>">
			<input type="hidden" name="tablename" id="tablename" value="<?php echo $dataFormMain["tablename"];?>">
			<input type="hidden" name="formid" id="formid" value="<?php echo $dataFormMain["formid"];?>">
			<input type="submit" class="btn btn-primary" value="ส่งข้อมูล" >
                    </form>
		
                </div>
            </div>
            
        </div>

<?php
}
?>
<?php

?>

<script>
	$("select[data-attr]").select2();  
	jQuery('input[data-attr=date]').datetimepicker({
		scrollInput:false,
		timepicker:false,
		lang:'th',
		format:'Y-m-d',
	      });
    	jQuery('input[data-attr=time]').datetimepicker({
		scrollInput:false,
		datepicker:false,
		lang:'th',
		format:'H:i'
	      });
    	jQuery('input[data-attr=datetime]').datetimepicker({
		scrollInput:false,
		lang:'th',
		format:'Y-m-d H:i'
	      });
</script>