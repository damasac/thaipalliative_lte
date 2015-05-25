<div class="info-box">
  <span class="info-box-icon bg-blue"><i class="fa fa-file-o"></i></span>
  <div class="info-box-content">
    <span class="info-box-text"><h4>EZ Form</h4></span>
    
    <?php if($MenuType=="MenuMain"){?>
    <span class="info-box-text">
        <?php if($MenuSetting=="listeform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="user" onclick="location.href='index.php'">รายการฟอร์ม</button>
        <?php if($MenuSetting=="shareform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="department" onclick="location.href=''">ฟอร์มส่วนรวม</button>
    </span>
    <?php }else if($MenuType=="MenuEform"){?>
    <span class="info-box-text">
        <?php if($MenuSetting=="listeform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="user" onclick="location.href='index.php'">รายการฟอร์ม</button>
        <?php if($MenuSetting=="manageform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="user" onclick="location.href='eform.php?idFormMain=<?php echo $idForm; ?>'">จัดการฟอร์ม</button>
        <?php if($MenuSetting=="viewform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="department" onclick="location.href='form.php?idFormMain=<?php echo $idForm; ?>&id=20'">ตัวอย่างฟอร์ม</button>
        <?php if($MenuSetting=="dataform"){ $menuKey="success";}else{$menuKey="default";}?>
        <button class='btn btn-<?php echo $menuKey;?>' id="department" onclick="location.href='table2.php?idFormMain=<?php echo $idForm; ?>'">ตารางข้อมูล</button>
    </span>
    <?php }?>
  </div><!-- /.info-box-content -->
</div><!-- /.info-box -->