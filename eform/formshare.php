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
	$myMenuKey = "share";
	include("inc_menu2.php");
	//----------------------------------------------------------------------------------------------------------------
        ?>
	<script type="text/javascript" src="<?php echo SYSTEM_WEBPATH_ROOT?>/lib/bootstrap/bootstrap.js"></script>
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
                             <h1>Form Share</h1>
                             <br>
			    <?php
				//mysql_select_db("eform") or die(mysql_error());
				$sqlForm = mysql_query("SELECT MAX(formid) AS id FROM formmain") or die(mysql_error());
				$numberRow = mysql_num_rows($sqlForm);
				$dataRow = mysql_fetch_assoc($sqlForm);
				$idEform =  $dataRow["id"]+1;
			    ?>
			    <div class="row">
				     <div class="col-lg-3 pull-right">
					 <button class="btn btn-success btn-lg btn-block" onclick="showEform('<?php echo $idEform;?>');"><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Create E-Form</button>
				     </div>
				 </div>
				<br>
			   </div>
			    <?php if($numberRow==0){
				
				}else{?>
				<table class="table table-bordered">
				    <thead>
					<tr>
					    <th>ลำดับ</th>
					    <th>ชื่อตาราง</th>
					    <th>สร้างโดย</th>
					    <th>วันที่สร้าง</th>
					    <th>จัดการ</th>
					</tr>
				    </thead>
				    <tbody>
					<?php
					$i = 1;
					
					$sqlForm2 = "SELECT * FROM formmain  WHERE `status_share`='1' ";
					
					$queryForm2 = mysql_query($sqlForm2);
					while($dataForm = mysql_fetch_assoc($queryForm2)){
					?>
					<tr id="<?php echo $dataForm["formid"];?>">
					    <td><?php echo $i;?></td>
					    <td><?php echo $dataForm["formname"];?></td>
					    <td><?php echo $dataForm["createdate"];?></td>
					    <td><?php
						$sqlUser = "SELECT * FROM v04cascap.`puser` WHERE pid='".$dataForm["pid"]."' ";
MYSQL_QUERY("SET character_set_results = 'latin1', character_set_client = 'latin1', character_set_connection = 'latin1', character_set_database = 'latin1', character_set_server = 'latin1'") or die(mysql_error());
						$queryUser = mysql_query($sqlUser);
						$dataUser = mysql_fetch_assoc($queryUser);
echo tis620_to_utf8($dataUser["name"]." ".$dataUser["surname"]);
					    ?></td>
					    <td>
						<button class='btn btn-primary btn-xs'
							onclick="location.href='form.php?task=public&idFormMain=<?php echo $dataForm["formid"]?>'">
						<i class="fa fa-eye"></i>  ดูฟอร์ม</button>
						<button
							class='btn btn-primary btn-xs'
							onclick="popup_custom('<?php echo $dataForm["formid"]?>','ตั้งค่าการแชร์')"> 
							<i class="fa fa-share-alt"></i>   แชร์
							</button>
					    </td>
					</tr>
					<?php $i++;
					} ?>
				    </tbody>
				</table>
			    <?php } ?>
                        </div>
                    </div>
	<!---###############################################################################--->
	<script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/bootstrap3-dialog/bootstrap-dialog.min.css">
	<!---###############################################################################--->

<script>
function popup_custom(id,title) {

	dialogPopWindow = BootstrapDialog.show({
		title: title,
		cssClass: 'popup-dialog',
		draggable: true,
		message: $('<div></div>').load("ajax-share-data.php?id="+id, function(data){
			//runSomeScript();
		}),
		onshown: function(dialogRef){ 
			//runSomeScript();
			//alert(action);
		},
		onhidden: function(dialogRef){ 
			//alert('onhidden');
		}
	});
}
	function deleteEform(id,dbname) {
	    $("#delBar").slideDown();
	    $("#delConfrim").click(function(){
		    $.ajax({
			url: "ajax-createform-loaddata.php?task=delDatabase",
			type: "post",
			data: {id:id,dbname:dbname},
			success: function(data){
			    $("#delBar").slideUp();
			    $("#"+id+"").remove();
			},
			error:function(){
			    alert("failure");
			}
		    });
		});
	    $("#exitDel").click(function(){
		$("#delBar").slideUp();
		});
	}
        function showEform(id){
	    $.ajax({
		    url: "ajax-createform-loaddata.php?task=createForm",
		    type: "post",
		    data: {id:id},
		    success: function(data){
			location.href="eform.php?idFormMain="+data+"";
		    },
		    error:function(){
			alert("failure");
		    }
		});
        }
</script>
<?php
}
?>