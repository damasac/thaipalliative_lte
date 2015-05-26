<?php
session_start();

header("Content-type:text/html; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);

## System Start ############################################################
include_once "../_connection/db.php";
//-----------------------------------------------------------
//echo '<pre>'; print_r($_POST); exit;


if($_GET['task']=='myform'){ ?>
<h3><b>My Form<b></h3><hr>
<form>
    <div class="form-group">
    <input type="hidden" id="ptid_key" name="ptid_key" value="<?php echo $_GET['ptid_key']; ?>" />
     <select class="form-control" id="ezfrom" name="ezfrom">
            <option value="0">- เลือก My Form -</option>
<?php
  $sql="select formname, formid from formmain where pid = '".$mysqli->real_escape_string($_GET['uid'])."';";
  $rst=$mysqli->query($sql);
  while($dbarr=$rst->fetch_assoc()) {
?>
    <option value="<?php echo $dbarr['formid']; ?>"><?php echo $dbarr['formname']; ?></option>
<?php
  }
?>
        </select>
    </div>
    <hr>
    <div class="form-group">
       <div class="row">
            <div class="col-md-6">
            <button type="button" id="btnsubmit" class="btn btn-block btn-success btn-lg">เลือก Form</button>
            </div>
            <div class="col-md-6">
            <button type="button" id="btnclose" class="btn btn-block btn-danger btn-lg">Close</button>
            </div>
        </div>
    </div>
  
    
</form>

<script>
    $( "#btnsubmit" ).click(function() {
        var ezfrom = $('#ezfrom').val();
        var ptid_key = $('#ptid_key').val();
        if (ezfrom == '0') {
            alert('กรุณาเลือกฟอร์ม!');
        }else{
             $.ajax({
                url : "../substudy/ajax-save-ezform.php",
                type:"POST",
                data : {
                        ezfrom:ezfrom,
                        ptid_key:ptid_key
                },
                success : function(returndata) {
                    returndata = $.trim(returndata);
                    load_ezform(ezfrom, returndata, ptid_key)
                    dialogPopWindow.close(); 
                },
                error : function(xhr, statusText, error) {
                       
                }
            });
        }
    });
    $( "#btnclose" ).click(function() {
         dialogPopWindow.close(); 
    });
    
    function load_ezform(formid, id, ptid_key) {
        $('#div-ezform').html('<br><br><p class="text-center"><img width="50" hight="20" src="../img/ajax-loading.gif"></p><br><br>');
        $.ajax({
            url : "../substudy/ezform.php?ptid_key="+ptid_key+"&idFormMain="+formid+"&id="+id,
            success : function(returndata) {
                $("#div-ezform").html(returndata);
                $('html,body').animate({scrollTop: $("a[name='ezform']").offset().top},'slow');
            },
            error : function(xhr, statusText, error) {
                //
            }
        });
       
    }
</script>

<?php }else if($_GET['task']=='public'){
  
}

?>
