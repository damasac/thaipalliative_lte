<?php
session_start();

header("Content-type:text/html; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);

include_once "../_connection/db.php";


if($_GET['task'] == 'remove'){
?>
    <div class="form-group">
       <div class="row">
            <div class="col-md-6">
            <button type="button" id="btnsubmit" class="btn btn-block btn-success btn-lg"><li class="fa fa-trash-o"></li> Delete record</button>
            </div>
            <div class="col-md-6">
            <button type="button" id="btnclose" class="btn btn-block btn-danger btn-lg"><li class="fa fa-times"></li> Cancel</button>
            </div>
        </div>
    </div>
    
<script>
    $( "#btnsubmit" ).click(function() {
        $.ajax({
            url : "../substudy/ajax-edit-ezform.php?task=ok&tablename="+'<?php echo $_GET['tablename']; ?>'+"&id="+'<?php echo $_GET['id']; ?>',
            type:"POST",
            data : {
            },
            success : function(returndata) {
                dialogPopWindow.close();
                parent.location='?ptid=<?php echo $_GET['ptid']; ?>';
            },
            error : function(xhr, statusText, error) {
                   
            }
        });
    });
    $( "#btnclose" ).click(function() {
        dialogPopWindow.close();
    });
</script>
<?php } else if($_GET['task'] == 'ok'){
$sql = "DELETE FROM ".$_GET['tablename']." WHERE id='".$_GET['id']."';";
$res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
$sql = "DELETE FROM tb_substudy WHERE id='".$_GET['id']."';";
$res = $mysqli->query($sql)or die('[' . $mysqli->error . ']');
}?>