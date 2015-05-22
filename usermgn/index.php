<?php require_once '../theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> User Setting <?php eb();?>

<?php sb('js_and_css_head'); ?>
<style>
    body { font-size: 140%; }
</style>
<?php eb();?>
<?php sb('content');?>
<?php include "../connection/db.php"; ?>
<?php
    $MenuSetting = "user";
    include_once("menu_user.php");
?>
<div class="box">
<div class="box-header">
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
<script>
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
<script src="../plugins/dataTables/jquery.dataTables.min.js"></script>
<script src="../plugins/dataTables/dataTables.bootstrap.min.js"></script>
<link href="../plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"></script>
<?php eb();?>
 
<?php render($MasterPage);?>