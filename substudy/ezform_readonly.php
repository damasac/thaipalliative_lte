<?php
session_start();

header("Content-type:text/html; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);

include_once "../_connection/db_sql.php";
$useradd = $_SESSION["tpc_puser_id"];
$idForm = $_GET["idFormMain"];

include_once("../eform/function/function_eform.php");	
	
$sqlFormMain = "SELECT * FROM formmain WHERE formid='".$_GET["idFormMain"]."'";
$queryFormMain = mysqli_query($con,$sqlFormMain) or die(mysqli_error());
$dataFormMain = mysqli_fetch_assoc($queryFormMain);
	
	//----------------------------------------------------------------------------------------------------------------
        ?>

		<div class="panel panel-default">
            <div class="panel-body" style="height: auto;">
		<div class="pull-right">
			<a target="_blank" href="../eform/table2.php?task=public&idFormMain=<?php echo $_GET["idFormMain"]?>" class="btn btn-success" style="color:white;"><li class="fa fa-eye"></li> ดูตารางข้อมูล</a>
			<a href="?ptid=<?php echo $_GET['ptid_key']; ?>" class="btn btn-danger" style="color:white;"><li class="fa fa-times"></li> Close</a>
		</div>  
		        <p style="font-size:36px;color:black;"><?php echo $dataFormMain["formname"];?></p>
                <p style="font-size:16px;"><?php echo $dataFormMain["formdesc"];?></p>
		
                <hr style="border:1px #AAAAAA solid">
                <div id="form" style="height:auto;">
                    <?php

		    $id = $_REQUEST["id"];	
		    if($id==""){
			srand(make_seed());
			$randval = rand();
			$id = $randval;
		    }
		    ?>
			<form action="../eform/insertdata.php?Redirect=<?php echo base64_encode("emr/?ptid=".$_GET['ptid_key']); ?>" method="post" class="form-horizontal" >
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
				    echo formgenForUpdate($con,$i,$dataField,$value,$value_province,$value_amphur,$value_tumbon);
				    echo "</div>";
				}else{
				    echo "<div class='showForm'>";
				    echo formgenForUpdate($con,$i,$dataField);
				    echo "</div>";
				}
				$i++;
                        ?>
		<br>
		        <?php }  ?>

                    </form>
		
                </div>
            </div>
            
        </div>



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