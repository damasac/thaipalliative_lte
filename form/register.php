<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
<script language="javascript">
function calAge(o){
     var tmp = o.value.split("-");
     var current = new Date();
     var current_year = current.getFullYear();
     document.getElementById("age").value = current_year - tmp[0];
}
</script>
<?php eb();?>

<?php sb('content_header');?>
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Register</a></li>
  </ol>
<?php eb();?>

<?php sb('content');?>
<?php
include_once "../_connection/db.php";

$res = $mysqli->query("SELECT * FROM palliative_register")or die('[' . $mysqli->error . ']');
$numGroup = $res->num_rows;
$fields = $res->fetch_fields();

//echo "<pre>"; echo $fields[1]->name; echo "</pre>";
$sql = "SELECT *, floor(datediff(curdate(),birth)/365.25) as birthdb FROM palliative_register WHERE ptid = '$_GET[dataid]';";
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
      <span class="info-box-text"><h4>Register Form</h4></span>
      <span class="info-box-text">
        แบบลงทะเบียนผู้ป่วย ศูนย์การุณรักษ์ (Palliative Care Center)
      </span>
    </div>
  </div>

    <div class="box">
    <div class="box-body">

    <form id="frm-register" onsubmit="frm_register(); return false;" action="#">
        <div class="row" style="padding: 25px 25px 25px 25px;">
            
        <div class="form-group col-lg-6">
          <label>HOSPCODE: </label>
          <input type="hidden" id="task" name="task" value="<?php echo $task; ?>" />
          <input type="text" name="<?php $i=2; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-6">
          <label>PID: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>

          <div class="form-group col-lg-4">
          <label>1. HN: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-8">
          <label>2. วันที่ลงทะเบียน: </label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-12">
          <label>3. เลขที่บัตรประจำตัวประชาชน: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
                
        <div class="form-group col-lg-10">
          <label>4. วันเดือนปีเกิด</label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" onchange="calAge(this);">
        </div>
        
        <div class="form-group col-lg-2">
          <label>5. อายุ</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="age" value="<?php echo $dbarr[$i]; ?>">
        </div>      
        
        <div class="form-group col-lg-3">
          <label>6.1 คำนำหน้า</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>
        
        <div class="form-group col-lg-4">
          <label>6.1 ชื่อ</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>
        
        <div class="form-group col-lg-5">
          <label>6.3 นามสกุล</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>

               
        <div class="form-group col-lg-5">
          <div class='showForm'><label>7. เพศ</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>ชาย</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>หญิง</label></div>
          </div>
          </div>

        <div class="form-group col-lg-7">
          <div class='showForm'><label>8. สัญชาติ</label><br>
          <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>ไทย</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name="<?php echo $fields[$i]->name;?>" id=''/></div></div>
        </div>

        <div class="form-group col-lg-5">
          <div class='showForm'><label>9. เชื้อชาติ</label><br>
          <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>ไทย</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='r' id=''/></div></div>
        </div>

        <div  class="form-group col-lg-7">
          <div class='showForm'><label>10. ศาสนา</label><br>
          <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>พุทธ</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>คริสต์</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>อิสลาม</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='r' id=''/></div></div>
        </div>

        <div class="form-group col-lg-12">
          <label>11. </label>
            <div class="row">
              <div class="col-lg-2">
                บ้านเลขที่<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
              <div class="col-lg-2">
                หมู่ที่<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
               <div class="col-lg-3">
                หมู่บ้าน<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
               <div class="col-lg-3">
                ซอย<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
               <div class="col-lg-3">
                ถนน<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
            </div>
        </div>

        <div class="form-group col-lg-12">
            <div class="row">
               <div class="col-lg-3">
                ตำบล<select type="dropdown" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control"></select>
              </div>
               <div class="col-lg-3">
                อำเภอ<select type="dropdown" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control"></select>
              </div>
              <div class="col-lg-3">
                จังหวัด<select type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" readonly></select>
              </div>
              <div class="col-lg-3">
                รหัสไปรษณีย์<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control">
              </div>
            </div>
        </div>

         <div class="form-group col-lg-12">
          <label>12. หมายเลขโทรศัพท์สำหรับติดต่อ</label>
            <div class="row">
              <div class="col-lg-4">
                1.<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              <div class="col-lg-4">
                2.<input type="text" name="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              <div class="col-lg-4">
                3.<input type="text" name="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
              </div>
              </div>
            </div>
      

        <div class="form-group col-lg-12">
          <div class='showForm'><label>13. สถานภาพ</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>โสด</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>แต่งงาน</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>แยก/หย่า</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>หม้าย</label></div>
          </div>
        </div>

      <div class="form-group col-lg-12">
          <div class='showForm'><label>14. สิทธิ์การรักษา</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>บัตรทอง</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>ข้าราชการ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>ประกันสังคม</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>รัฐวิสาหกิจ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='5' ? 'checked' : ''; ?> value='5'>จ่ายเอง</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>15. อาชีพ</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>ข้าราชการ/รัฐวิสาหกิจ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>ค้าขาย</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>ข้าราชการบำนาญ</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>รับจ้าง</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='5' ? 'checked' : ''; ?> value='5'>เกษตรกร</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='6' ? 'checked' : ''; ?> value='6'>นักบวช</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='7' ? 'checked' : ''; ?> value='7'>ไม่ได้ประกอบอาชีพ</label></div>
          </div>
        </div>

        <div  class="form-group col-lg-12">
          <div class='showForm'><label>16. โรคประจำตัว (เลือกได้มากกว่าหนึ่งคำตอบ)</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>เบาหวาน</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>โรคหัวใจ</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='3' ? 'checked' : ''; ?> value='3'>โรคไต</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='4' ? 'checked' : ''; ?> value='4'>ความดันโลหิตสูง</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='5' ? 'checked' : ''; ?> value='5'>อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='r' id=''/></div></div>
        </div>  

        <div  class="form-group col-lg-12">
          <div class='showForm'><label>17. ประวัติการรักษาด้วยแพทย์ทางเลือก/สมุนไพร</label><br>
          <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>ไม่มี</label></div>
          <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>มี</label>&nbsp;&nbsp;
            <input type='text' class='' name='r' id=''/></div></div>
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

  <pre><div id="div-onsave"></div></pre>

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
                    $("#div-onsave").html(returndata);
                },
                error : function(xhr, statusText, error) {
                    System_Notice("Error! Could not retrieve the data.",'danger');     
                }
        });
    }

</script>
<?php eb();?>

<?php $mysqli->close(); ?>
 
<?php render($MasterPage);?>