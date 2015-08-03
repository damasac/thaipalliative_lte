<?php require_once '../_theme/util.inc.php'; $MasterPage = 'page_main.php';?>

<?php sb('title');?> สวัสดีครับ <?php eb();?>

<?php sb('js_and_css_head'); ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" 
        type="text/javascript"></script>

<?php eb();?>

<?php sb('content_header');?>
<?php eb();?>

<?php sb('content');?>
<?php include_once "_connection/db.php"; ?>
        <!-- Content Header (Page header) -->
        <!-- Main content -->

          <!-- Your Page Content Here -->
            <div id="map" style='height: 800px;'></div>
          <!--</div>-->
<?php eb();?>


<?php sb('js_and_css_footer');?>
<script type='text/javascript'>
var map;
function initialize() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: -34.397, lng: 150.644}
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
<script type="text/javascript">  
$(function(){  
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว  
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api  
    // v=3.2&sensor=false&language=th&callback=initialize  
    //  v เวอร์ชัน่ 3.2  
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false  
    //  language ภาษา th ,en เป็นต้น  
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize    
    $("<script/>", {  
      "type": "text/javascript",  
      src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize&libraries=places"  
    }).appendTo("body");      
});  
</script>  
<?php eb();?>

<?php render($MasterPage);?>
