<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> User Setting <?php eb();?>

<?php sb('js_and_css_head'); ?>
<style>
    body { font-size: 140%; }
</style>
<?php eb();?>
<?php sb('content_header');?>
        <br>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
<?php eb();?>
<?php sb('content');?>
<?php include "../_connection/db.php"; ?>
<?php
    $MenuSetting = "user";
    include_once("inc_menu.php");
?>
<div class="box">
<div class="box-header">
    
  <?php  //echo "<pre>"; print_r($_SESSION);?>
<div class="box-title">จัดการสมาชิก</div><br>

<table id="userTable" class="table table-striped table-bordered" cellspacing="0">
        <thead>
            <tr>
                <th>ชื่อผู้ใช้</th>
                <th>อีเมลล์</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ชื่อโรงพยาบาล</th>
                <th>วันที่สร้าง</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Admin</td>
                <td>skaball69@gmail.com</td>
                <td>ภานุพงศ์</td>
                <td>ศรีศุภเดชะ</td>
                <td>โรงพยาบาลขอนแก่นราม</td>
                <td>22-May-15</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
<?php eb();?>
<?php sb('js_and_css_footer');?>
<script type="text/javascript" src="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
<link rel="stylesheet" href="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.css">
<script>
    function popup_custom() {

	dialogPopWindow = BootstrapDialog.show({
		title: "เพิ่มผู้ใช้งาน",
		cssClass: 'popup-dialog',
                closable: true,
                closeByBackdrop: false,
                closeByKeyboard: false,
		size:'size-wide',
		draggable: false,
		message: $('<div></div>').load("form_adduser.php?id=", function(data){
		}),
		onshown: function(dialogRef){ 
		},
		onhidden: function(dialogRef){ 
		}
		
	});
}
    $(document).ready(function() {
        $('#userTable').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": false,
          "bInfo": false,
          "bAutoWidth": true
            });
    } );
</script>
<script src="../_plugins/dataTables/jquery.dataTables.min.js"></script>
<script src="../_plugins/dataTables/dataTables.bootstrap.min.js"></script>
<link href="../_plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"></script>
<?php eb();?>
 
<?php render($MasterPage);?>