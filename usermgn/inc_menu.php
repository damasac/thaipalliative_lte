<div class="info-box">
  <span class="info-box-icon bg-blue"><i class="fa fa-gears"></i></span>
  <div class="info-box-content">
    <span style="float:right;"><button class="btn btn-info btn-flat" onclick="popup_custom();"><i class="fa fa-plus"></i> เพิ่มผู้ใช้งาน</button></span>
    <span class="info-box-text"><h4>ระบบจัดการผู้ใช้งาน</h4></span>
    <span class="info-box-text">
        <?php if($MenuSetting=="user"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="user" onclick="location.href='index.php'">จัดการสมาชิก</button>
    </span>
  </div><!-- /.info-box-content -->
</div><!-- /.info-box -->