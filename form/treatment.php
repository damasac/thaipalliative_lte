<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Treatment <?php eb();?>

<?php sb('js_and_css_head'); ?>
<link href="../_plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<?php eb();?>

<?php sb('content_header');?>

<?php eb();?>

<?php sb('content');?>
<ol class="breadcrumb">
   <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="#">Treatment</a></li>
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

$res = $mysqli->query("SELECT * FROM palliative_treatment")or die('[' . $mysqli->error . ']');
$numGroup = $res->num_rows;
$fields = $res->fetch_fields();
//echo "<pre>"; echo $fields[1]->name; echo "</pre>";
$sql = "SELECT * FROM palliative_treatment WHERE ptid = '$_GET[dataid]';";
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
      <span class="info-box-text"><h4>Treatment Form</h4></span>
      <span class="info-box-text">
        ข้อมูลการรักษาประคับประคอง ศูนย์การุณรักษ์ (Palliative Care Center)
      </span>
    </div>
  </div>

    <div class="box">
    <div class="box-body">
    
    <form id="frm-treatment" onsubmit="frm_treatment(); return false;">
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
        
        <div class="form-group col-lg-12">
          <h4>ส่วนที่ 1 ข้อมูลการรักษาประคับประคอง</h4>
        </div>
          
        <div class="form-group col-lg-8">
          <label>1. วันที่เข้ารับการรักษาตัว: </label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-8">
          <label>2. วันที่ปรึกษา: </label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
          <label>3. หอผู้ป่วยที่ปรึกษา: </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
                
        <div class="form-group col-lg-8">
          <label>4. วันที่จำหน่ายออก</label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
          <label>5. วันที่ส่งต่อ</label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>      
        
        <div class="form-group col-lg-4">
          <label>เหตุผล</label><br>
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;อาการดีขึ้น</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='2' ? 'checked' : ''; ?> value='2'>เสียชีวิต</label></div>
        </div>

               
     <div class="form-group col-lg-12">
          <label>6. โรงพยาบาลที่ส่งต่อ </label>
            <div class="row">
              <div class="col-lg-8">
                โรงพยาบาล<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
              </div>
              <div class="col-lg-4">
                ตำบล่<select type="dropdown" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control"></select>
              </div>
              <div class="col-lg-4">
                อำเภอ<select type="dropdown" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control"></select>
              </div>
               <div class="col-lg-4">
                จังหวัด<select type="dropdown" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control"></select>
              </div>
            </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>7. แผนกแพทย์ที่ขอปรึกษา</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;อายุ</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='2' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;ออร์โธ</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='3' ? 'checked' : ''; ?> value='3'>&nbsp;&nbsp;สูตินรีเวช</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='4' ? 'checked' : ''; ?> value='4'>&nbsp;&nbsp;กุมารเวชกรรม</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='5' ? 'checked' : ''; ?> value='5'>&nbsp;&nbsp;เวชศาสตร์ฉุกเฉิน</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='6' ? 'checked' : ''; ?> value='6'>&nbsp;&nbsp;ศัลย์</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='7' ? 'checked' : ''; ?> value='7'>&nbsp;&nbsp;โสตฯ</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='8' ? 'checked' : ''; ?> value='8'>&nbsp;&nbsp;OPD</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='9' ? 'checked' : ''; ?> value='9'>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>"/></div></div>
        </div>

        <div class="form-group col-lg-12">
          <label>8. การวินิจฉัยหลัก </label>
          <textarea name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>"><?php echo $dbarr[$i]; ?></textarea>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>9. กลุ่มโรค</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?>" id="" value='1'>&nbsp;&nbsp;Cancer</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='2' ? 'checked' : ''; ?>" id="" value='2'>&nbsp;&nbsp;ESRD</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='3' ? 'checked' : ''; ?>" id="" value='3'>&nbsp;&nbsp;Frailty dementia</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='4' ? 'checked' : ''; ?>" id="" value='4'>&nbsp;&nbsp;End stage lung disease (COPD)</label></div>
        </div>
        </div>
        <div class="form-group col-lg-12">
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='5' ? 'checked' : ''; ?>" id="" value='5'>&nbsp;&nbsp;Neurological disease</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='6' ? 'checked' : ''; ?>" id="" value='6'>&nbsp;&nbsp;End stage heart disease</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='7' ? 'checked' : ''; ?>" id="" value='7'>&nbsp;&nbsp;อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>"/></div>
          </div>
        

        <div class="form-group col-lg-12">
          <h4>ส่วนที่ 2 ประวัติการเจ็บป่วยในปัจจุบัน</h4>
        </div>

        <div class="form-group col-lg-4">
          <label>วันที่/เดือน/ปี (พ.ศ.) </label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
          <label>ประวัติการเจ็บป่วย </label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
         <!--  <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
         <!--  <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
         <!--  <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>

        <div class="form-group col-lg-12">
          <h4>ส่วนที่ 3 ผลการตรวจทางห้องปฏิบัติการ</h4>
        </div>

        <div class="form-group col-lg-4">
          <label>วันที่/เดือน/ปี</label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-4">
          <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?>" id="" value='1'>&nbsp;&nbsp;BUN</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <label>ผลการตรวจ</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?>" id="" value='1'>&nbsp;&nbsp;Cr</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?>" id="" value='1'>Alb</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>


        <div class="form-group col-lg-4">
        <!--   <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?>" id="" value='1'>Ca</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?>" id="" value='1'>&nbsp;&nbsp;Hct</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" >
        </div>
        
        <div class="form-group col-lg-4">
         <!--  <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?>" id="" value='1'>&nbsp;&nbsp;INR</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>

        <div class="form-group col-lg-12">
          <h4>ส่วนที่ 4 Systematic Review</h4>
            <div class="row">
              <div class="col-lg-2">
                PPS<input type="text" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" placeholder="%" >
              </div>
            </div>
        </div>

        <div class="form-group col-lg-6">
          <div class="text-center"><label>General</label></div>
        </div>
        
        <div class="form-group col-lg-6">
           <div class="text-center"><label>SKIN</label></div>
        </div>   

        <div class="form-group col-lg-3">
            <label>1. Fatigue</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>&nbsp;&nbsp;No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>17. Rash</label>
        </div>  

         <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>    

        <div class="form-group col-lg-3">
            <label>2. Sleep problems</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>18. Ulcer/fistula</label>
        </div>  

         <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>  

        <div class="form-group col-lg-3">
             <label>3. Cachexia</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>    

        <div class="form-group col-lg-6">
           <div class="text-center"><label>CNS</label></div>
        </div>   

        <div class="form-group col-lg-3">
            <label>4. Lymphedema</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>19. Headaches</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-6">
           <div class="text-center"><label>GIT</label></div>
        </div>   

        <div class="form-group col-lg-3">
             <label>20. Selzure</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>5. Anorexia</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>21. Limb weakness</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>6. Oral symptoms</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>22. Drowsiness</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>7. Weight loss</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>23. Cognitive impairment</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>8. Dysphagia</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>24. Dellirium</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>9. Nauses</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-6">
           <div class="text-center"><label>OTHERS</label></div>
        </div>   

        <div class="form-group col-lg-3">
            <label>10. Vomitting</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>25. Dyspnea</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>11. Constipation</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>26. Cough</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-3">
            <label>12. Diarrhes</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>27. Pain</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>  

        <div class="form-group col-lg-3">
            <label>13. Ostomy</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-6">
           <label>&nbsp;&nbsp;</label>
        </div>  

        <div class="form-group col-lg-6">
           <div class="text-center"><label>GUS</label></div>
        </div> 

        <div class="form-group col-lg-6">
           <label>&nbsp;&nbsp;</label>
        </div>  

        <div class="form-group col-lg-3">
            <label>14. Urinary prob</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-6">
           <label>&nbsp;&nbsp;</label>
        </div>  

        <div class="form-group col-lg-3">
            <label>15. Gynae prob</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-6">
           <label>&nbsp;&nbsp;</label>
        </div>  

        <div class="form-group col-lg-3">
            <label>16. Catheter</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-6">
           <label>&nbsp;&nbsp;</label>
        </div>  

        <div class="form-group col-lg-12">
          <div class="heading-form"><h4>ส่วนที่ 5 Psychosocial and spiritual assessment</h4></div>
        </div>

        <div class="form-group col-lg-6">
            <div class="text-center"><label>การประเมินด้านจิตสังคม</label></div>
        </div>

        <div class="form-group col-lg-6">
           <div class="text-center"><label>การประเมินด้านจิตวิญญาณ</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>ปัญหาด้านเศรษฐกิจ</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>Hope (false hope)</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>ปัญหาด้านจิตใจ</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>Fear</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>ปัญหาด้านสังคม</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>Unfinished business</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-6">
           <div class="text-center"><label>ความรับรู้และการมีส่วนร่วมในการตัดสินใจ</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>​Connectness</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-2">
          <div class="text-center"><label>&nbsp;&nbsp;</label></div>
        </div>

        <div class="form-group col-lg-2">
          <label>ผู้ป่วย</label>
        </div>

        <div class="form-group col-lg-2">
         <label>ครอบครัว</label>
        </div> 

        <div class="form-group col-lg-3">
            <label>Control helplessness</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-2">
            <label>การรับรู้โรค</label>
        </div>

         <div class="form-group col-lg-2">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;รู้</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>ไม่รู้</label></div>
        </div>

         <div class="form-group col-lg-2">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;รู้</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>ไม่รู้</label></div>
        </div>

         <div class="form-group col-lg-3">
            <label>Religious</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Yes</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>No</label></div>
        </div>

          <div class="form-group col-lg-2">
            <label>การรับรู้พยากรณ์โรค</label>
        </div>

         <div class="form-group col-lg-2">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;รู้</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>ไม่รู้</label></div>
        </div>

         <div class="form-group col-lg-2">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;รู้</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>ไม่รู้</label></div>
        </div>

        <div class="form-group col-lg-6">
          <div class="text-center"><label>&nbsp;&nbsp;</label></div>
        </div>


        <div class="form-group col-lg-2">
            <label>เป้าหมายการรักษา</label>
        </div>

         <div class="form-group col-lg-2">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;รู้</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>ไม่รู้</label></div>
        </div>

         <div class="form-group col-lg-2">
            <div class='radio-inline'><label><input type='radio' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;รู้</label></div>
            <div class='radio-inline'><label><input type='radio' name="<?php echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i]  =='1' ? 'checked' : ''; ?> value='2'>ไม่รู้</label></div>
        </div>

        <div class="form-group col-lg-6">
          <div class="text-center"><label>&nbsp;&nbsp;</label></div>
        </div>

        <div class="form-group col-lg-12">
          <label>แผนผังครอบครัว (Genogram)</label>
          <textarea class="form-control" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>"><?php echo $dbarr[$i]; ?></textarea>
        </div>

        <div class="form-group col-lg-12">
          <div class="heading-form"><h4>ส่วนที่ 6 ข้อมูลการยืมอุปกรณ์การแพทย์</h4></div>
        </div>

        <div class="form-group col-lg-4">
          <label>วันที่/เดือน/ปี</label>
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
          <label>อุปกรณ์การแพทย์</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;เครื่องผลิตออกซิเจน</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <label>รุ่น/No.</label>
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;suringe driver</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;เตียง</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>


        <div class="form-group col-lg-4">
        <!--   <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;ที่นอนลม</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;เครื่องพ่นยา</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
         <!--  <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;ออกซิเจน tank</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>

           <div class="form-group col-lg-4">
        <!--   <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;เครื่องดูดเสมหะ</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;Monkey bar</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>">
        </div>
        
        <div class="form-group col-lg-4">
         <!--  <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="<?php $i++; echo $fields[$i]->name;?>" id="<?php echo $fields[$i]->name;?>" <?php echo $dbarr[$i] =='1' ? 'checked' : ''; ?> value='1'>&nbsp;&nbsp;รถเข็น</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="<?php $i++; echo $fields[$i]->name;?>" value="<?php echo $dbarr[$i]; ?>" class="form-control">
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
                Date<input type="date" name="<?php $i++; echo $fields[$i]->name;?>" class="form-control" id="<?php echo $fields[$i]->name;?>" value="<?php echo date('Y-m-d H:i:s'); ?>">
              </div>
              </div><hr>
            </div>
            
            
            <div class="form-group col-lg-6">
                <button type="submit" class="btn btn-block btn-success btn-lg">Submit</button>
            </div>
            <div class="form-group col-lg-6">
                <button type="reset" class="btn btn-block btn-danger btn-lg">Cancel</button>
            </div>
        
        
   </div> 

    </form>

    </div>
  </div>
    
<?php eb();?>

<?php sb('js_and_css_footer');?>
<script type="text/javascript" src="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.js"></script>
<!-- InputMask -->
<script src="../_plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="../_plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="../_plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<script src="../_plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../_plugins/bootstrap3-dialog/bootstrap-dialog.min.css">
<link rel="stylesheet" href="../_plugins/js-select2/select2.css">
<script type="text/javascript" src="../_plugins/js-select2/select2.js"></script>

<script>
$(document).ready(function(){
  $('input').iCheck({
     checkboxClass: 'icheckbox_minimal-blue',
     radioClass: 'iradio_minimal-blue',
     increaseArea: '20%' // optional
  });
});
</script>
<script>
    function frm_treatment() {
        var ptid = '<?php echo $_GET['dataid']; ?>';
        var datalist=$('#frm-treatment').serialize();

        //$('#div-onsave').html('<br><br><p class="text-center"><img width="50" hight="20" src="../img/ajax-loading.gif"></p><br><br>');
        $.ajax({
                url : "ajax-treatment-save.php?ptid="+ptid,
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