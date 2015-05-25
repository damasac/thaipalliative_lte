<?php
  require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';
  include "../_connection/db.php";
  $status = $_SESSION["tpc_puser_status"];
  $area = $_SESSION["tpc_puser_area"];
  $site = $_SESSION["tpc_puser_site"];
  $status=1;
?>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" id="username">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="password">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" id="email">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
    <label>ชื่อ</label>
    <input type="text" class="form-control" id="fname">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label>นามสกุล</label>
    <input type="text" class="form-control" id="lname">
</div>
</div>
</div>

<div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label>สถานะ</label>
          <select class="form-control" id="status" name="status">
              <option value="0">- เลือกสถานะ -</option>
              <?php if($status==1){?>
              <option value="1">Super Admin</option>
              <option value="2">Admin Area</option>
              <option value="3">Admin Site</option>
              <?php }if($status==2){?>
              <option value="3">Admin Site</option>
              <?php }?>
              <?php if($status==3){?>
              <option value="3">User Site</option>
              <?php }?>
          </select>
      </div>
    </div>
</div>
<div class="row" id="moreSelect" style="display:none;">
    <div class="col-lg-6">
      <label>เขตบริการ</label>
      <select class="form-control">
        <option value="0">- เลือกเขตบริการสุขภาพ -</option>
        <?php for($i=1;$i<=13;$i++){?>
          <?php echo "<option value='".$i."'>เขตบริการสุขภาพที่ ".$i."</option>";?>
        <?php } ?>
      </select>
    </div>
    <div class="col-lg-6" id="moreSelect2" style="display:none;">
      <label>หน่วยบริการ</label>
      <select class="form-control">
        <option ></option>
      </select>
    </div>
</div>
<?php ?>
<script>
  $("#status").change(function(){
      var status = $(this).val();
      if (status==2) {
        //code
        $("#moreSelect2").hide();
        $("#moreSelect").show();
      }else if (status==3) {
        //code
        $("#moreSelect2").show();
        $("#moreSelect").show();
      }
      else{
        $("#moreSelect2").hide();
        $("#moreSelect").hide();
      }
    });
</script>