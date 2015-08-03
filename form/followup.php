<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Follow up <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link href="../_plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<?php eb();?>

<?php sb('content_header');?>
<?php eb();?>

<?php sb('content');?>
<ol class="breadcrumb">
   <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="#">Follow-up Form</a></li>
</ol>
<?php
include_once "../_connection/db.php";
//หาข้อมูลใน register
$sql = "SELECT ptid_key, hcode FROM tb_emr WHERE id = '$_GET[dataid]';";
$res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
$dbarr_reg = $res->fetch_array();

$sql = "SELECT ptid, hospcode, pid FROM palliative_register WHERE ptid_key = '$dbarr_reg[ptid_key]' AND hospcode = '$dbarr_reg[hcode]';";
$res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
$dbarr_reg = $res->fetch_array();

$res = $mysqli->query("SELECT * FROM palliative_followup")or die('[' . $mysqli->error . ']');
$numGroup = $res->num_rows;
$fields = $res->fetch_fields();
//echo "<pre>"; echo $fields[1]->name; echo "</pre>";
$sql = "SELECT * FROM palliative_followup WHERE ptid = '$_GET[dataid]';";
$res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
$dbarr = $res->fetch_array();

//echo "<pre>".$sql; print_r($dbarr); echo "</pre>";
if($dbarr['ptid']){
    $task = 'update';
}else {
    $task = 'save';
}
?>

   <div class="info-box">
    <span class="info-box-icon btn-foursquare" style="background-color: #3C8DBC;"><i class="fa fa-user-plus"></i></span>
    <div class="info-box-content">
      <span class="info-box-text"><h4>Follow-up Form</h4></span>
      <span class="info-box-text">
        ติดตามและสรุปการดูแลผู้ป่วย ศูนย์การุณรักษ์ (Palliative Care Center)
      </span>
    </div>
  </div>

    <div class="box">
    <div class="box-body">

    <form id="frm-followup" onsubmit="frm_followup(); return false;">
        <div class="row" style="padding: 25px 25px 25px 25px;">

        <div class="form-group col-lg-6">
          <label>HOSPCODE: </label>
          <input type="hidden" id="task" name="task" value="<?php echo $task; ?>" />
          <input type="hidden"name="ptid" value="<?php echo $_GET['dataid']; ?>" />
          <input type="text" readonly class="form-control" value="<?php echo $dbarr_reg['hospcode']; ?>">
        </div>

        <div class="form-group col-lg-6">
          <label>PID: </label>
          <input type="text" readonly class="form-control" value="<?php echo $dbarr_reg['pid']; ?>">
        </div>

<!--        <div class="form-group col-lg-12">
            <label><h5>กิจกรรมการดูแล</h5></label><hr>
        </div>-->

        <div class="form-group col-lg-12">
          <div class='showForm'><label>1. กิจกรรมการดูแล (เลือกได้มากกว่า 1 ตัวเลือก)</label><br>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i=1; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;การจัดการอาการด้วย Morphine</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;Family metting</label></div>
          </div>
        </div>

<!--        <div class="form-group col-lg-12">
          <label>การวางแผนดูแลล่วงหน้า</label>
        </div>-->

        <div class="form-group col-lg-12">
          <div class='showForm'><label>2. การพูดคุยเรื่องสถานที่ดูแล</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;รพ.ใกล้บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;รพ.ศรีนครินทร์</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>3. การพูดคุยเรื่องสถานที่เสียชีวิต</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;รพ.ใกล้บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;รพ.ศรีนครินทร์</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>4. การพูดคุยเรื่องการปฏิเสธเครื่องพยุงชีพ</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;รพ.ใกล้บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;รพ.ศรีนครินทร์</label></div>
          </div>
        </div>
            <div class='col-lg-3'></div>
        <div class="form-group col-lg-6">
          <div class='showForm'><label>-> Livings will</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Document</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;Verbal</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>5. ได้รับการพยุงชีพ (ใส่ ETT) ก่อนปรึกษา</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;No</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>6. การถอดถอนเครื่องพยุงชีพ</label><br>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;ETT</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;Intrope</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;ATB</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>&nbsp;&nbsp;Nutrition</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='5' ? 'checked' : ''; ?> value='5'>&nbsp;&nbsp;Hydration</label></div>
          </div>
        </div>

        <div class="form-group col-lg-6">
          <label>7. วันที่เสียชีวิต </label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>สถานที่เสียชีวืต</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;รพ.ใกล้บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;รพ.ศรีนครินทร์</label></div>
          </div>
        </div>
        
        <div class="form-group col-lg-12">
          <div class='showForm'><label>ลักษณะการเสียชีวิต</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;สงบ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;ไม่สงบ</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <label>Problem list</label>
          <textarea name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>"><?php echo $dbarr[$i]; ?></textarea>
        </div>

        <div class="form-group col-lg-12">
              <label></label>
            <div class="row">
              <div class="col-lg-6">
                Form completed by<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $_SESSION["tpc_puser_username"]; ?>" class="form-control" readonly>
              </div>
              <!--<div class="col-lg-4">-->
                <!--รหัสที่ได้จากระบบ-->
                <input type="hidden" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              <!--</div>-->
              <div class="col-lg-6">
                Date<input type="date" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo date('Y-m-d H:i:s'); ?>" class="form-control">
              </div>
              </div><hr>
        </div>

            <?php if($dbarr_reg['hospcode'] == $_SESSION['tpc_puser_hcode']) { ?>
            <div class="form-group col-lg-6">
                <button type="submit" class="btn btn-block btn-success btn-lg">Submit</button>
            </div>
            <div class="form-group col-lg-6">
                <button type="reset" class="btn btn-block btn-danger btn-lg">Cancel</button>
            </div>
            <?php } ?>

        </div>
        </form>

    </div>
  </div>


<?php eb();?>

<?php sb('js_and_css_footer');?>
<script type="text/javascript" src="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
<link rel="stylesheet" href="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.css">
<script src="../_plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
      $('input').iCheck({
     checkboxClass: 'icheckbox_minimal-blue',
     radioClass: 'iradio_minimal-blue',
     increaseArea: '20%' // optional
  });
    function frm_followup() {
        var ptid = '<?php echo $_GET['dataid']; ?>';
        var datalist=$('#frm-followup').serialize();

        //$('#div-onsave').html('<br><br><p class="text-center"><img width="50" hight="20" src="../img/ajax-loading.gif"></p><br><br>');
        $.ajax({
                url : "ajax-followup-save.php?ptid="+ptid,
                type:"POST",
                data : datalist,
                success : function(returndata) {
                     if ($.trim(returndata)=='save' || $.trim(returndata)=='update') {
                        popup_save('<?php echo $dbarr_reg['ptid']; ?>');
                    }
                },
                error : function(xhr, statusText, error) {

                }
        });
    }

function popup_save(ptid) {

	dialogPopWindow = BootstrapDialog.show({
		title: 'ผลการทำงาน',
		cssClass: 'popup-dialog',
		size:'size-wide',
		draggable: false,
		message: '<hr><h1 class="text-center"><b<span class="fa fa-check-circle"></span> บันทึกข้อมูลเรียบร้อย</b></h1><div class="form-group"><hr><div class="col-md-12"><a role="button" href="../emr/?ptid='+ptid+'" class="btn btn-lg btn-primary btn-block"><li class="fa fa-book"></li> ไปที่หน้า EMR</a></div></div>&nbsp;',
		onshown: function(dialogRef){
            $("#ezfrom").select2();
            //(".select2-input").attr("id","ezfrom");
		},
		onhidden: function(dialogRef){
			//alert('onhidden');
		}
	});
}

</script>
<?php eb();?>

<?php render($MasterPage);?>
