<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> Register <?php eb();?>

<?php sb('js_and_css_head'); ?>
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
<?php include_once "../_connection/db.php"; ?>

   <div class="info-box">
    <span class="info-box-icon btn-foursquare" style="background-color: #3C8DBC;"><i class="fa fa-user-plus"></i></span>
    <div class="info-box-content">
      <span class="info-box-text"><h4>Follow-up Form</h4></span>
      <span class="info-box-text">
        ข้อมูลการรักษาประคับประคอง ศูนย์การุณรักษ์ (Palliative Care Center)
      </span>
    </div>
  </div>

    <div class="box">
    <div class="box-body">
    
    <form>
    <div class="row" style="padding: 25px 25px 25px 25px;">
        <div class="form-group col-lg-6">
          <label>HOSPCODE: </label>
          <input type="text" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-6">
          <label>PID: </label>
          <input type="text" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-12">
          <h4>ส่วนที่ 1 ข้อมูลการรักษาประคับประคอง</h4>
        </div>
          
        <div class="form-group col-lg-8">
          <label>1. วันที่เข้ารับการรักษาตัว: </label>
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
          <label>2. วันที่ปรึกษา: </label>
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <label>3. หอผู้ป่วยที่ปรึกษา: </label>
          <input type="text" name="" class="form-control" id="" value="">
        </div>
                
        <div class="form-group col-lg-8">
          <label>4. วันที่จำหน่ายออก</label>
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
          <label>5. วันที่ส่งต่อ</label>
          <input type="date" name="" class="form-control" id="" value="">
        </div>      
        
        <div class="form-group col-lg-4">
          <label>เหตุผล</label><br>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>อาการดีขึ้น</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>เสียชีวิต</label></div>
        </div>

               
     <div class="form-group col-lg-12">
          <label>6. โรงพยาบาลที่ส่งต่อ </label>
            <div class="row">
              <div class="col-lg-8">
                โรงพยาบาล<input type="text" name="" class="form-control">
              </div>
              <div class="col-lg-4">
                ตำบล่<select type="dropdown" name="" class="form-control"></select>
              </div>
              <div class="col-lg-4">
                อำเภอ<select type="dropdown" name="" class="form-control"></select>
              </div>
               <div class="col-lg-4">
                จังหวัด<select type="dropdown" name="" class="form-control"></select>
              </div>
            </div>
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>7. แผนกแพทย์ที่ขอปรึกษา</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>อายุ</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>ออร์โธ</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='3'>สูตินรีเวช</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='4'>กุมารเวชกรรม</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='5'>เวชศาสตร์ฉุกเฉิน</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='6'>ศัลย์</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='7'>โสตฯ</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='8'>OPD</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='9'>อื่นๆ</label>&nbsp;&nbsp;
            <input type='text' class='' name='r' id=''/></div></div>
        </div>

        <div class="form-group col-lg-12">
          <label>8. การวินิจฉัยหลัก </label>
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-12">
          <div class='showForm'><label>9. กลุ่มโรค</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Cancer</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>ESRD</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='3'>Frailty dementia</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='4'>End stage lung disease (COPD)</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='5'>Neurological disease</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='6'>End stage heart disease</label></div>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='7'>อื่นๆ</label></div>
          </div>
        </div>

        <div class="form-group col-lg-12">
          <h4>ส่วนที่ 2 ประวัติการเจ็บป่วยในปัจจุบัน</h4>
        </div>

        <div class="form-group col-lg-4">
          <label>วันที่/เดือน/ปี (พ.ศ.) </label>
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
          <label>ประวัติการเจ็บป่วย </label>
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
         <!--  <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
         <!--  <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
         <!--  <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี (พ.ศ.) </label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-8">
          <!-- <label>ประวัติการเจ็บป่วย </label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-12">
          <h4>ส่วนที่ 3 ผลการตรวจทางห้องปฏิบัติการ</h4>
        </div>

        <div class="form-group col-lg-4">
          <label>วันที่/เดือน/ปี</label>
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>BUN</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <label>ผลการตรวจ</label>
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Cr</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Alb</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
        <!--   <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Ca</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Hct</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
         <!--  <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>INR</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-12">
          <h4>ส่วนที่ 4 Systematic Review</h4>
            <div class="row">
              <div class="col-lg-2">
                PPS<input type="text" name="" class="form-control" placeholder="%">
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
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>17. Rash</label>
        </div>  

         <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>    

        <div class="form-group col-lg-3">
            <label>2. Sleep problems</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>18. Ulcer/fistula</label>
        </div>  

         <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>  

        <div class="form-group col-lg-3">
             <label>3. Cachexia</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>    

        <div class="form-group col-lg-6">
           <div class="text-center"><label>CNS</label></div>
        </div>   

        <div class="form-group col-lg-3">
            <label>4. Lymphedema</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>19. Headaches</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-6">
           <div class="text-center"><label>GIT</label></div>
        </div>   

        <div class="form-group col-lg-3">
             <label>20. Selzure</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>5. Anorexia</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>21. Limb weakness</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>6. Oral symptoms</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>22. Drowsiness</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>7. Weight loss</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>23. Cognitive impairment</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>8. Dysphagia</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>24. Dellirium</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>9. Nauses</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-6">
           <div class="text-center"><label>OTHERS</label></div>
        </div>   

        <div class="form-group col-lg-3">
            <label>10. Vomitting</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>25. Dyspnea</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>11. Constipation</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>26. Cough</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-3">
            <label>12. Diarrhes</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>
          
        <div class="form-group col-lg-3">
             <label>27. Pain</label>
        </div>  

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>  

        <div class="form-group col-lg-3">
            <label>13. Ostomy</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
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
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-6">
           <label>&nbsp;&nbsp;</label>
        </div>  

        <div class="form-group col-lg-3">
            <label>15. Gynae prob</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-6">
           <label>&nbsp;&nbsp;</label>
        </div>  

        <div class="form-group col-lg-3">
            <label>16. Catheter</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
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
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>Hope (false hope)</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>ปัญหาด้านจิตใจ</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>Fear</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>ปัญหาด้านสังคม</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>Unfinished business</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div> 

        <div class="form-group col-lg-6">
           <div class="text-center"><label>ความรับรู้และการมีส่วนร่วมในการตัดสินใจ</label></div>
        </div> 

        <div class="form-group col-lg-3">
            <label>​Connectness</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
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
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>

        <div class="form-group col-lg-2">
            <label>การรับรู้โรค</label>
        </div>

         <div class="form-group col-lg-2">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>รู้</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>ไม่รู้</label></div>
        </div>

         <div class="form-group col-lg-2">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>รู้</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>ไม่รู้</label></div>
        </div>

         <div class="form-group col-lg-3">
            <label>Religious</label>
        </div>

        <div class="form-group col-lg-3">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Yes</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>No</label></div>
        </div>

          <div class="form-group col-lg-2">
            <label>การรับรู้พยากรณ์โรค</label>
        </div>

         <div class="form-group col-lg-2">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>รู้</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>ไม่รู้</label></div>
        </div>

         <div class="form-group col-lg-2">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>รู้</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>ไม่รู้</label></div>
        </div>

        <div class="form-group col-lg-6">
          <div class="text-center"><label>&nbsp;&nbsp;</label></div>
        </div>


        <div class="form-group col-lg-2">
            <label>เป้าหมายการรักษา</label>
        </div>

         <div class="form-group col-lg-2">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>รู้</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>ไม่รู้</label></div>
        </div>

         <div class="form-group col-lg-2">
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>รู้</label></div>
            <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='2'>ไม่รู้</label></div>
        </div>

        <div class="form-group col-lg-6">
          <div class="text-center"><label>&nbsp;&nbsp;</label></div>
        </div>

        <div class="form-group col-lg-12">
          <label>แผนผังครอบครัว (Genogram)</label>
          <textarea class="form-control"></textarea>
        </div>

        <div class="form-group col-lg-12">
          <div class="heading-form"><h4>ส่วนที่ 6 ข้อมูลการยืมอุปกรณ์การแพทย์</h4></div>
        </div>

        <div class="form-group col-lg-4">
          <label>วันที่/เดือน/ปี</label>
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <label>อุปกรณ์การแพทย์</label><br>
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>เครื่องผลิตออกซิเจน</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <label>รุ่น/No.</label>
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>suringe driver</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>เตียง</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
        <!--   <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>ที่นอนลม</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>เครื่องพ่นยา</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
         <!--  <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>ออกซิเจน tank</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

           <div class="form-group col-lg-4">
        <!--   <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>เครื่องดูดเสมหะ</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
          <!-- <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>Monkey bar</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>


        <div class="form-group col-lg-4">
         <!--  <label>วันที่/เดือน/ปี</label> -->
          <input type="date" name="" class="form-control" id="" value="">
        </div>
        
        <div class="form-group col-lg-4">
         <!--  <label>ผลตรวจทางห้องปฏิบัติการและการตรวจพิเศษ</label><br> -->
          <div class='checkbox-inline'><label><input type='checkbox' name="" id="" value='1'>รถเข็น</label></div>
        </div>
        
        <div class="form-group col-lg-4">
          <!-- <label>ผลการตรวจ</label> -->
          <input type="text" name="" class="form-control" id="" value="">
        </div>

        <div class="form-group col-lg-12">
          <label></label>
            <div class="row">
              <div class="col-lg-4">
                Form completed by<input type="text" name="" class="form-control">
              </div>
              <div class="col-lg-4">
                รหัสที่ได้จากระบบ<input type="text" name="" class="form-control">
              </div>
              <div class="col-lg-4">
                Date<input type="date" name="" class="form-control">
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
   
<?php eb();?>

<?php sb('js_and_css_footer');?>
<?php eb();?>
 
<?php render($MasterPage);?>