<?php error_reporting(0); ?>
<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link rel="stylesheet" href="../_plugins/js-select2/select2.css">

<link rel="stylesheet" href="../_plugins/js/jquery.datetimepicker.css">
<link rel="stylesheet" href="style/style.css">
<?php eb();?>
<?php include "../_connection/db_sql.php"; ?>
<?php sb('content_header');?>
<?php

$idForm = $_GET["idFormMain"];
$MenuType="MenuEform";
$MenuSetting="viewform";
include("inc_menu.php");
include_once("function/function_eform.php");	
?>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Examples</a></li>
  <li class="active">Blank page</li>
</ol>
<?php eb();?>

<?php sb('content');?>
<?php
	
	
	$sqlFormMain = "SELECT * FROM formmain WHERE formid='".$_GET["idFormMain"]."'";
	$queryFormMain = mysqli_query($con,$sqlFormMain) or die(mysqli_error());
	$dataFormMain = mysqli_fetch_assoc($queryFormMain);

	//$useradd = $_SESSION[SS."SystemSession_Member_ID"];

	?>

    	<link rel="stylesheet" href="style/style.css">
        <div class="panel panel-default">
            <div class="panel-body" style="height: auto;">
		<span style="float:right"><a href="table.php?task=public&idFormMain=<?php echo $_GET["idFormMain"]?>" class="btn btn-primary" style="color:white;">ดูตารางข้อมูล</a></span>
                <p style="font-size:36px;color:black;"><?php echo $dataFormMain["formname"];?></p>
                <p style="font-size:16px;"><?php echo $dataFormMain["formdesc"];?></p>
		
                <hr style="border:1px #AAAAAA solid">
                <div id="form" style="height:auto;">
                    <?php
		    $id = $_GET["id"];	
		    if($id==""){
			srand(make_seed());
			$randval = rand();
			$id = $randval;
		    }
		    //echo $id;
		    ?>
			<form action="insertdata.php" method="post" class="form-horizontal" >
			<?php 
		            $selectField = "SELECT * FROM formfield WHERE formid='".$dataFormMain["formid"]."' ORDER BY forder ";
                            $queryField = mysqli_query($con,$selectField) or die(mysqli_error());
			    $i=1;
                            while($dataField = mysqli_fetch_assoc($queryField)){
				if($id!=""){
				    $sql = "SELECT * FROM `".$dataFormMain["tablename"]."` WHERE id='".$id."' ";
				    $query = mysqli_query($con,$sql) or die(mysqli_error());
				    $datavalue = mysqli_fetch_assoc($query);
				    
				    $value = $dataField["fieldvalue"];
				    $value =  $datavalue[$value];
				    $value_province = "";
				    $value_amphur = "";
				    $value_tumbon = "";
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
				$i++;
                        ?>
		<br>
		        <?php }  ?>
			<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
			<!--<input type="hidden" name="useradd" id="useradd" value="<?php //echo $useradd;?>">-->
			<input type="hidden" name="tablename" id="tablename" value="<?php echo $dataFormMain["tablename"];?>">
			<input type="hidden" name="formid" id="formid" value="<?php echo $dataFormMain["formid"];?>">
			<input type="submit" class="btn btn-primary" value="ส่งข้อมูล" >
                    </form>
		
                </div>
            </div>
            
        </div>




<?php eb();?>
<?php sb('js_and_css_footer');?>


<script src="../_plugins/dataTables/jquery.dataTables.min.js"></script>
<script src="../_plugins/dataTables/dataTables.bootstrap.min.js"></script>
<link href="../_plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"></script>
<script type="text/javascript" src="../_plugins/js/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="../_plugins/js-select2/select2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script language="javascript" src="script/scriptGoogleForm.js"></script>
<script>
        $("select[data-attr]").select2();  
	$('input[data-attr=date]').datetimepicker({
		timepicker:false
	      });
    	$('input[data-attr=time]').datetimepicker({
		datepicker:false
	      });
    	$('input[data-attr=datetime]').datetimepicker({

	      });
</script>

<?php eb();?>
 
<?php render($MasterPage);?>