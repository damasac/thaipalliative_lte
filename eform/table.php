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
	$sqlFormMain = "SELECT * FROM formmain WHERE formid='".$_GET["idFormMain"]."' ";
	
	$queryFormMain = mysql_query($sqlFormMain) or die(mysql_error());
	$dataFormMain = mysql_fetch_assoc($queryFormMain);
	$dataFormMain["status_share"];
	if($dataFormMain["status_share"]==1 && $dataFormMain["public_view"]==1){
	    $condition = "";
	}else if($dataFormMain["public_view"]=="0"){
	    $condition = "WHERE useradd='".$_SESSION[SS."SystemSession_Member_ID"]."' ";
	}
	$myMenuKey = "viewTable";
	
	include("inc_menu.php");
        $sqlColumn = "desc `".$dataFormMain["tablename"]."`";
	
        $queryColumn = mysql_query($sqlColumn);
	$numColumn = mysql_num_rows($queryColumn) or die(mysql_error());

	if($numColumn<=6){
	    $truncate = mysql_query("TRUNCATE TABLE `".$dataFormMain["tablename"]."`");
	}
	//----------------------------------------------------------------------------------------------------------------
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
                            <div class="container-fluid">
                                <h2><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;<?php echo $dataFormMain["tablename"] ?></h2>
                                <br>
		    	<div class="table-responsive">
                                <table class="table table-bordered" style="color:black;" border=1>
                                    <thead >
                                        <tr>
                                    <?php
						
	                                while($dataColumn=mysql_fetch_assoc($queryColumn)){
						

	                                    ?>
                                            <?php
                                                if($dataColumn["Key"]=="PRI"){
                                                    $icon = "<i class='fa fa-key'></i>";
                                                }else{
                                                    $icon = "";
                                                }
                                            ?>
                                            <th>
						<h5>
						<?php echo $icon."&nbsp;&nbsp;&nbsp;".$dataColumn["Field"];?>
						</h5>
					    </th>
                                            <?
                                        }
                                    ?>
                                        </tr>
                                    </thead>
				    <tbody>
					
				    
				    <?php
						$sqlSelectData = mysql_query("SELECT * FROM `".$dataFormMain["tablename"]."`".$condition." ORDER BY `id`  ");
						//$i=1;
						//$dataAr = array();
						while($data = mysql_fetch_array($sqlSelectData)){;
						//	    $dataAr[$i][] = $data;
						//$i++;
						//}
						//print_r($dataAr);
						$numField =  sizeof($data)/2-1;
				    ?>
						<tr>
							    
									<?php
									for($i=0;$i<=$numField;$i++){
										    echo  "
										    <td onclick='viewform(".$data["id"].");'>".$data[$i]."
										    </td>
										    ";
									}
									?>
						</tr>
				    <?php } ?>
				    </tbody>
                                </table>
			    </div>
                        </div>
                    </div>
<?php } ?>
<style>
    table thead{
	background-color:#424242;
	color:white;
    }
    table tbody tr:hover{
	cursor: pointer;
	background-color:#EEEEEE;
    }
    table tbody tr:active{
	cursor:pointer;
	background-color:#CCCCCC;
    }
</style>
<script>
    <?php if($dataFormMain["public_edit"]=="1"){?>
    function viewform(id){
	location.href="form.php?idFormMain=<?php echo $_GET["idFormMain"]?>&id="+id;
    }
    <?php }?>
</script>