<?php require_once '../theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link href="<?php echo 'http://',$_SERVER['SERVER_NAME'],'/',APP_WEBROOT;?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php eb();?>

<?php include "../connection/db_sql.php"; ?>
<?php sb('content_header');?>
         <button class="btn btn-primary">Hello</button>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
<?php eb();?>

<?php sb('content');?>
	<script type="text/javascript" src="<?php echo SYSTEM_WEBPATH_ROOT?>/lib/bootstrap/bootstrap.js"></script>
    	<script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js-select2/select2.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js-select2/select2.css">
	<script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js/jquery.datetimepicker.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js/jquery.datetimepicker.css">
	<link rel="stylesheet" href="style/style.css">
                    <div class="panel panel-default">
                        <div class="panel-body" style="height: auto;">
                            <div class="container-fluid">
                             <h1>My E-Form</h1>
                             <br>
			    <?php
				$sqlForm = mysqli_query($con,"SELECT MAX(formid) AS id FROM formmain") or die(mysqli_error());
				$numberRow = mysqli_num_rows($sqlForm);
				$dataRow = mysqli_fetch_assoc($sqlForm);
				if($dataRow["id"]==""){
				    $idEform = 1;
				}else{
				    $idEform =  $dataRow["id"];
				}
			    ?>
			    <div class="row">
				     <div class="col-lg-3 pull-right">
					 <button class="btn btn-success btn-lg btn-block" onclick="showEform('<?php echo $idEform;?>');"><i class="fa fa-database"></i>&nbsp;&nbsp;&nbsp;Create E-Form</button>
				     </div>
				 </div>
				<br>
			   </div>
			    <p class="bg-danger" id="delBar" style="display:none;color:black;">คำเตือน&nbsp;&nbsp;ถ้าลบฟอร์มฐานข้อมูลแล้วคำถามต่างๆจะถูกลบไปด้วย ยืนยัน ?
				<span style="float:right;">
				<button class="btn btn-warning" id="delConfrim">ลบ</button>
				<button class="btn btn-primary" id="exitDel">ยกเลิก</button>
				</span>
			    </p>
			    <?php if($numberRow==0){
				
				}else{?>
				<table class="table table-bordered">
				    <thead>
					<tr>
					    <th>ลำดับ</th>
					    <th>ชื่อตาราง</th>
					    <th>ชื่อฐานข้อมูล</th>
				             <th>สถานะ</th>
					    <th>จัดการ</th>
					   
					</tr>
				    </thead>
				    <tbody>
					<?php
					$i = 1;
					
					$sqlForm2 = "SELECT * FROM formmain ";
					
					$queryForm2 = mysqli_query($con,$sqlForm2);
					while($dataForm = mysqli_fetch_assoc($queryForm2)){
					?>
					<tr id="<?php echo $dataForm["formid"];?>">
					    <td><?php echo $i;?></td>
					    <td><?php echo $dataForm["formname"];?></td>
					    <td><?php echo $dataForm["tablename"];?></td>
					    <td>
						<?php
							    if($dataForm["status_share"]==1)
							    {echo "<button class='btn btn-success btn-xs' disabled='disabled'>public</button>";}
							    else if($dataForm["status_share"]==0)
							    {echo "<button class='btn btn-danger btn-xs' disabled='disabled'>private</button>";}
						?>
					    </td>
					    <td>
						
						<button
							class='btn btn-warning btn-xs'
							onclick="location.href='eform.php?idFormMain=<?php echo $dataForm["formid"]?>'">
							<i class="fa fa-pencil" ></i>  แก้ไข
							</button>
						<button
							class='btn btn-danger btn-xs'
							onclick="deleteEform('<?php echo $dataForm["formid"]?>','<?php echo $dataForm["tablename"];?>');">
							<i class="fa fa-trash"></i>  ลบ
							</button>
						<button
							class='btn btn-primary btn-xs'
							onclick="popup_custom('<?php echo $dataForm["formid"]?>','ตั้งค่าการแชร์')">
							<i class="fa fa-share-alt"></i>  แชร์
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
		    <!-- Large modal -->

	<!---###############################################################################--->
	<script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/bootstrap3-dialog/bootstrap-dialog.min.css">
	<!---###############################################################################--->

<script>
function popup_custom(id,title) {

	dialogPopWindow = BootstrapDialog.show({
		title: title,
		cssClass: 'popup-dialog',
		size:'size-wide',
		draggable: false,
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
			//alert(data);
			//console.log(data);
			location.href="eform.php?idFormMain="+data+"";
		    },
		    error:function(){
			alert("failure");
		    }
		});
        }
</script>
<?php eb();?>
<?php sb('js_and_css_footer');?>
<script>

</script>
<script src="../plugins/dataTables/jquery.dataTables.min.js"></script>
<script src="../plugins/dataTables/dataTables.bootstrap.min.js"></script>
<link href="../plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"></script>
<?php eb();?>
 
<?php render($MasterPage);?>