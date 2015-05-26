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
<div class="row" id="moreSelect">
    <div class="col-lg-12" >
      <label>โรงพยาบาล</label><code id="valHospital" ></code>
      <select class="form-control" id="hospitalSelect" name="hospitalSelect">
        <option value="0">- ค้นหาจากชื่อโรงพยาบาล หรือ รหัสโรงพยาบาล -</option>
      </select>
    </div>
</div>
<br>
<div class="row" id="provinceZone" >
  <div class="col-lg-4" >
    <label>จังหวัด</label>
    <input type="text" class="form-control" id="provinceSelect" name="provinceSelect" readonly>
  </div>
    <div class="col-lg-4" >
    <label>อำเภอ</label>
    <input type="text" class="form-control" id="provinceSelect" name="provinceSelect" readonly>
  </div>
  <div class="col-lg-4" >
    <label>ตำบล</label>
    <input type="text" class="form-control" id="provinceSelect" name="provinceSelect" readonly>
  </div>

</div>
<div class="row">
  <div class="col-lg-12">
    <label>เขตบริการ</label>
    <input type="text" class="form-control" id="provinceSelect" name="provinceSelect" readonly>
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
  $("#hospitalSelect").select2();
  $(".select2-input").attr("id","textSearch");
  $("#status").change(function(){
      var status = $(this).val();

    });
  $(function(){
      $(".select2-input").attr("id","textSearch");
      $("#textSearch").on('keyup', function(e){
          if (e.keyCode>3) {
            var txtSearch = $(this).val();
                  $.getJSON("ajax-area-loaddata.php?task=hospital&txtSearch="+txtSearch+"",function(result){
                    console.log(result);
                  $("#hospitalSelect").html("<option value='0'>- ค้นหาจากชื่อโรงพยาบาล หรือ รหัสโรงพยาบาล -</option>");
                  $.each(result, function(i, field){
                        $("#hospitalSelect").append("<option value="+field.hcode+" >"+field.hcode+" : "+field.name+"</option>");
                  });
                  });
            }
        });
    });
  $("#hospitalSelect").on("change",function(){
      var hcode = $(this).val();
                  $.getJSON("ajax-area-loaddata.php?task=getdetailaddress&hcode="+hcode+"",function(result){
                    console.log(result);
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
    var province = $("#provinceSelect").val();
    var amphur = $("#amphurSelect").val();
    var district = $("#tambonSelect").val();
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
    if (status==3 && site==0) {
      //code
       $("#valHospital").show();
        $("#valHospital").html("กรุณาเลือกหน่วยบริการ");
        return ;
    }else{
      $("#valHospital").hide();
    }
    goAjaxSave(username,password,email,fname,lname,status,area,site,province,amphur,district);
  }
  function goAjaxSave(username,password,email,fname,lname,status,area,site,province,amphur,district){
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
                      site:site,
                      province:province,
                      amphur:amphur,
                      district:district
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