<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Follow up <?php eb();?>

<?php sb('js_and_css_head'); ?>

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
    
    <form>
        <div class="row" style="padding: 25px 25px 25px 25px;">

        <div class="form-group col-lg-6">
          <label>HOSPCODE: </label>
          <input type="text" name="<?php $i=1; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-6">
          <label>PID: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>

        <div class="form-group col-lg-12">
          <label>กิจกรรมการดูแล</label>
        </div>
        
        <div class="form-group col-lg-12">
          <div class='showForm'><label>1. กิจกรรมการดูแล (เลือกได้มากกว่า 1 ตัวเลือก)</label><br>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>การจัดการอาการด้วย Morphine</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>Family metting</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <label>การวางแผนดูแลล่วงหน้า</label>
        </div>
        
        <div class="form-group col-lg-12">
          <div class='showForm'><label>2. การพูดคุยเรื่องสถานที่ดูแล</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>รพ.ใกล้บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='3'>รพ.ศรีนครินทร์</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>3. การพูดคุยเรื่องสถานที่เสียชีวิต</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>รพ.ใกล้บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='3'>รพ.ศรีนครินทร์</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>4. การพูดคุยเรื่องการปฏิเสธเครื่องพยุงชีพ</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>รพ.ใกล้บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='3'>รพ.ศรีนครินทร์</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>-> Livings will</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>Document</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>Verbal</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>5. ได้รับการพยุงชีพ (ใส่ ETT) ก่อนปรึกษา</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>6. การถอดถอนเครื่องพยุงชีพ</label><br>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>ETT</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>Intrope</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='3'>ATB</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='4'>Nutrition</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='5'>Hydration</label></div>
          </div>
        </div>

        <div class="form-group col-lg-6">
          <label>7. วันที่เสียชีวิต </label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>สถานที่เสียชีวืต</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>รพ.ใกล้บ้าน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='3'>รพ.ศรีนครินทร์</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>ลักษณะการเสียชีวิต</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>สงบ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>ไม่สงบ</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <label>Problem list</label>
          <textarea name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>"></textarea>
        </div>

        <div class="form-group col-lg-12">
              <label></label>
            <div class="row">
              <div class="col-lg-4">
                Form completed by<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              <div class="col-lg-4">
                รหัสที่ได้จากระบบ<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              <div class="col-lg-4">
                Date<input type="date" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              </div><hr>
        </div>
            
            
            <div class="form-group col-lg-6">
                <button class="btn btn-block btn-success btn-lg">Submit</button>
            </div>
            <div class="form-group col-lg-6">
                <button class="btn btn-block btn-danger btn-lg">Cancel</button>
            </div>

        </div>
        </form>

    </div>
  </div>

<div id="div-onsave"></div>
   
<?php eb();?>

<?php sb('js_and_css_footer');?>
<script>
    function frm_register() {
        var ptid = '<?php echo $_GET['dataid']; ?>';
        var datalist=$('#frm-register').serialize();

        $('#frm-group').hide();
        $('#div-onsave').html('<br><br><p class="text-center"><img width="50" hight="20" src="../img/ajax-loading.gif"></p><br><br>');
        $.ajax({
                url : "ajax-register-save.php?ptid="+ptid,
                type:"POST",
                data : datalist,
                success : function(returndata) {
                    //$("#div-onsave").html(returndata);
                },
                error : function(xhr, statusText, error) {
                    
                }
        });
    }

</script>
<?php eb();?>
 
<?php render($MasterPage);?>