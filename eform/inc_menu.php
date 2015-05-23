<div class="info-box">
  <span class="info-box-icon bg-blue"><i class="fa fa-file-o"></i></span>
  <div class="info-box-content">
    <span class="info-box-text"><h4>ระบบจัดการผู้ใช้งาน</h4></span>
    <?php if($MenuType=="MenuMain"){?>
    <span class="info-box-text">
        <?php if($MenuSetting=="listeform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="user" onclick="location.href='index.php'">จัดการสมาชิก</button>
        <?php if($MenuSetting=="shareform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="department" onclick="location.href=''">รายละเอียดหน่วยงาน</button>
    </span>
    <?php }else if($MenuType=="MenuEform"){?>
    <span class="info-box-text">
        <?php if($MenuSetting=="listeform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="user" onclick="location.href='index.php'">จัดการฟอร์ม</button>
        <?php if($MenuSetting=="shareform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="department" onclick="location.href=''">ตัวอย่างฟอร์ม</button>
        <?php if($MenuSetting=="shareform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="department" onclick="location.href=''">ตารางข้อมูล</button>
    </span>
    <?php }?>
  </div><!-- /.info-box-content -->
</div><!-- /.info-box -->