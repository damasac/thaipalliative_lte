<?php
  require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';
  include "../_connection/db.php";
  $status = $_SESSION["tpc_puser_status"];
  $area = $_SESSION["tpc_puser_area"];
  $site = $_SESSION["tpc_puser_hcode"];
  $status=1;
?>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
    <label>Username</label><code id="valUsername" style="display:none;"></code>
    <input type="text" class="form-control" id="username">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label>Password</label><code id="valPassword" style="display:none;"></code>
    <input type="password" class="form-control" id="password">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group">
    <label>Email</label><code id="valEmail" style="display:none;"></code>
    <input type="email" class="form-control" id="email">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
    <label>ชื่อ</label><code id="valFname" style="display:none;"></code>
    <input type="text" class="form-control" id="fname">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
    <label>นามสกุล</label><code id="valLname" style="display:none;"></code>
    <input type="text" class="form-control" id="lname">
</div>
</div>
</div>

<div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label>สถานะ</label><code id="valStatus" style="display:none;"></code>
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
      <label>เขตบริการ</label><code id="valArea" style="display:none;"></code>
      <select class="form-control" id="mophSelect" name="mophSelect"> 
        <option value="0">- เลือกเขตบริการสุขภาพ -</option>
        <?php for($i=1;$i<=13;$i++){?>
          <?php echo "<option value='".$i."'>เขตบริการสุขภาพที่ ".$i."</option>";?>
        <?php } ?>
      </select>
    </div>
    <div class="col-lg-6" >
      <label>หน่วยบริการ</label><code id="valHospital" style="display:none;"></code>
      <select class="form-control"id="hospitalSelect" name="hospitalSelect" style="display:none;">
        <option ></option>
      </select>
    </div>
</div>
<br>
<div class="row" id="provinceZone" style="display:none;">
  <div class="col-lg-4" >
    <label>จังหวัด</label>
    <select class="form-control" id="provinceSelect" name="provinceSelect">
      <option ></option>
    </select>
  </div>
    <div class="col-lg-4" >
    <label>อำเภอ</label>
    <select class="form-control" id="provinceSelect" name="provinceSelect">
      <option ></option>
    </select>
  </div>
  <div class="col-lg-4" >
    <label>ตำบล</label>
    <select class="form-control" id="provinceSelect" name="provinceSelect">
      <option ></option>
    </select>
  </div>

</div>
<br>
<div class="row">
  <div class="col-lg-12">
      <button class="btn btn-success btn-block" onclick="saveUser();">บันทึก</button>
  </div>
</div>
<link rel="stylesheet" href="../_plugins/js-select2/select2.css">
<script type="text/javascript" src="../_plugins/js-select2/select2.js"></script>
<?php ?>
<script>
  $("#status").change(function(){
      var status = $(this).val();
      if (status==2) {
        //code
        $("#provinceZone").hide();
        $("#hospitalSelect").html("<option value='0'>- เลือกหน่วยบริการ -</option>");
        $("#mophSelect").val(0);
        $("#hospitalSelect").val(0);
        $("#hospitalSelect").show();
        $("#hospitalSelect").attr("disabled","disabled");
        $("#moreSelect").show();
      }else if (status==3) {
        //code
        $("#hospitalSelect").html("<option value='0'>- เลือกหน่วยบริการ -</option>");
        $("#mophSelect").val(0);
        $("#hospitalSelect").val(0);
        $("#hospitalSelect").show();
        $("#hospitalSelect").removeAttr("disabled");
        $("#hospitalSelect").select2();
        $("#moreSelect").show();
      }
      else{
        //code
        $("#provinceZone").hide();
        $("#hospitalSelect").html("<option value='0'>- เลือกหน่วยบริการ -</option>");
        $("#mophSelect").val(0);
        $("#hospitalSelect").val(0);
        $("#hospitalSelect").hide();
        $("#moreSelect").hide();
      }
    });
  $("#mophSelect").on("change",function(){
    $("#hospitalSelect").html("<option value='0'>- เลือกหน่วยบริการ -</option>");
    $("#hospitalSelect").val(0);
    var mophID = $(this).val();
      $.getJSON("ajax-area-loaddata.php?task=hospital&mophID="+mophID+"",function(result){
        $("#hospitalSelect").html("<option value='0'>- เลือกหน่วยบริการ -</option>");
        $.each(result, function(i, field){
              $("#hospitalSelect").append("<option value="+field.hcode+" >"+field.name+"</option>");
        });
        });
    });
  $("#hospitalSelect").on("change",function(){
      var hcode = $("#hospitalSelect").val();
      $("#provinceZone").show();
      $.post("ajax-sql-query.php?task=getProvince&hcode="+hcode,function(data){
          alert(data);
      });
    });
  function saveUser() {
    //code
    var username = $("#username").val();
    var password = $("#password").val();
    var email = $("#email").val();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var status = $("#status").val();
    var area = $("#mophSelect").val();
    var site = $("#hospitalSelect").val();
    if (username=="") {
      $("#valUsername").show();
      $("#valUsername").html("กรุณากรอกชื่อผู้ใช้งาน");
      return ;
    }else{
      $("#valUsername").hide();
    }
    if (password=="") {
      $("#valPassword").show();
      $("#valPassword").html("กรุณากรอกรหัสผ่าน");
      return ;
    }
    else{
      $("#valPassword").hide();
    }
    if (password<6) {
      $("#valPassword").show();
      $("#valPassword").html("กรุณากรอกรหัสผ่าน 6 ตัวขึ้นไป");
      return ;
    }else{
      $("#valPassword").hide();
    }
    if (email=="") {
      $("#valEmail").show();
      $("#valEmail").html("กรุณากรอกอีเมล์");
      return ;
    }else{
      $("#valEmail").hide();
    }
    if (fname=="") {
      $("#valFname").show();
      $("#valFname").html("กรุณากรอกชื่อ");
      return ;
    }else{
      $("#valEmail").hide();
    }
    if (lname=="") {
      $("#valLname").show();
      $("#valLname").html("กรุณากรอกนามสกุล");
      return ;
    }else{
      $("#valEmail").hide();
    }
    if (status==0) {
      $("#valStatus").show();
      $("#valStatus").html("กรุณาระบุสถานะ");
      return ;
    }else{
      $("#valEmail").hide();
    }
    if (status==2 && area==0) {
        //code
         $("#valArea").show();
        $("#valArea").html("กรุณเขตบริการ");
        return ;
    }else{
      $("#valArea").hide();
    }
    if (status==3 && area==0) {
      //code
       $("#valArea").show();
        $("#valArea").html("กรุณเขตบริการ");
        return ;
    }else{
      $("#valArea").hide();
    }
    if (status==3 && hospital==0) {
      //code
       $("#valHospital").show();
        $("#valHospital").html("กรุณาเลือกหน่วยบริการ");
        return ;
    }else{
      $("#valHospital").hide();
    }
    goAjaxSave(username,password,email,fname,lname,status,area,site);
  }
  function goAjaxSave(username,password,email,fname,lname,status,area,site){
      $.ajax({
		    url: "ajax-sql-query.php?task=addUser",
		    type: "post",
		    data: {
                      username:username,
                      password:password,
                      email:email,
                      fname:fname,
                      lname:lname,
                      status:status,
                      area:area,
                      site:site
                      },
		    success: function(data){
			//location.href="index.php?";
		    },
		    error:function(){
			alert("failure");
		    }
		});
  }
</script>