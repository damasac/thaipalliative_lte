<?php  if(0) { ?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><?php } 
$System_LayoutUse="layout_easy.html";
$System_AjaxFileAction="ajax-eform-loaddata.php";
$System_ShowAjaxIFrame=0;
$myMenuKey="E Form";
include_once("../_config/config_system.php");
include_once(SYSTEM_DOC_ROOT."system/core-start-ajax.php");
if($SystemSession_Member_ID>0) { 
    	//----------------------------------------------------------------------------------------------------------------
	include_once(SYSTEM_DOC_ROOT."system/core-start.php");
	include_once("function/function_eform.php");
	    $sql = "SELECT * FROM `formmain` WHERE `formid`='".$_GET["id"]."'";
	    
	    $query = mysql_query($sql);
	    $data = mysql_fetch_assoc($query);
        ?>
    	<script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js-select2/select2.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js-select2/select2.css">
	<script type="text/javascript" src="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js/jquery.datetimepicker.js"></script>
	<link rel="stylesheet" href="<? echo SYSTEM_WEBPATH_ROOT; ?>/lib/js/jquery.datetimepicker.css">
	<link rel="stylesheet" href="style/style.css">
				    <h1><i class="fa fa-cog"></i> ตั้งค่าการแชร์</h1>
				    <div class="row" style="height: 334px;color:black;">
						<br>
						<div class="col-lg-2">
							    
							    <label>Status</label>
							    <br>
							    <label>
							      <input type="radio" id="status_share" name="status_share" value="1" onclick="checkShare();"
							    <?php if($data["status_share"]=="1"){echo "checked";}?>
							    > Public
							    </label>
							    <br>
							    <label>
							      <input type="radio" id="status_share" name="status_share" value="0" onclick="checkShare();"
							    <?php if($data["status_share"]=="0"){echo "checked";}?>
							    > Private
							    </label>
							  
						</div>
						<div class="col-lg-8" style="height: 310px;padding:10px;background-color:#eee;border-radius:4px;width:80%;" id="panel" >
							   
							    <label>Add data to specific patient</label><br>
							    <label>
							      <input type="radio" id="add_to_patient" name="add_to_patient" value="1"
							    checked> Yes 
							    </label>
							    <br>
							    <label>View</label><br>
							    <label>
							      <input type="radio" id="view_share" name="view_share" value="1"
							    <?php if($data["public_view"]=="1"){echo "checked";}?>
								     onclick="viewShare();"> Yes
							    </label>
							    <br>
							    <label>
							      <input type="radio" id="view_share" name="view_share" value="0"
							    <?php if($data["public_view"]=="0"){echo "checked";}?>
								     onclick="viewShare();"> No
							    </label>
							    <div id="show_panel" style="display:none;">
									<label>Edit/Update</label><br>
									<label>
									  <input type="radio" id="edit_share" name="edit_share" value="1"
									<?php if($data["public_edit"]=="1"){echo "checked";}?>
									> Yes
									</label>
									<br>
									<label>
									  <input type="radio" id="edit_share" name="edit_share" value="0"
									<?php if($data["public_edit"]=="0"){echo "checked";}?>
									> No
									</label><br>
									<label>Delete Data</label><br>
									<label>
									  <input type="radio" id="delete_share" name="delete_share" value="1"
									<?php if($data["public_delete"]=="1"){echo "checked";}?>
									> Yes
									</label>
									<br>
									<label>
									  <input type="radio" id="delete_share" name="delete_share" value="0"
									<?php if($data["public_delete"]=="0"){echo "checked";}?>
									> No
									</label>
							    </div>
							</div>
						
				    </div>
				    
                            </div>
			    <div class="row">
						<div class="col-lg-12">
				    <button class="btn btn-primary" onclick="saveShare(<?php echo $_GET["id"]; ?>);">Save</button>
						</div>
			
		    
<script>
	    $(document).ready(function(){
			var public_view = $("#view_share:checked").val();
				    if (public_view==1) {
						//code
						$("#show_panel").show();
				    }
			var status_share = $("#status_share:checked").val();
				    if (status_share==1) {
						//code
				    $("#panel").show();
				    }else{
						$("#panel").hide();
				    }
			
			});
	    function saveShare(id) {
			//code
			var status_share = $("#status_share:checked").val();
			if (status_share=="0") {
				    
				    var add_to_patient="5";
				    var view_share="5";
				    var edit_share="5";
				    var delete_share="5";
			}else{
			var add_to_patient = $("#add_to_patient:checked").val();
			var view_share = $("#view_share:checked").val();
			var edit_share = $("#edit_share:checked").val();
			var delete_share = $("#edit_share:checked").val();
			}
			$.ajax({
			url: "ajax-createform-loaddata.php?task=shareform",
			type: "post",
			data: {id:id,
				    status_share:status_share,
				    add_to_patient:add_to_patient,
				    view_share:view_share,
				    edit_share:edit_share,
				    delete_share:delete_share
				    },
			success: function(data){
				    location.href="formshare.php";
			},
			error:function(){
			    alert("failure");
			}
		    });

	    }
	    function viewShare(){
			var view_share = $("#view_share:checked").val();
			if (view_share=="1") {
				    //code
				    $("#add_to_patient").prop("checked",true);
				    $("#show_panel").fadeIn();
			}else{
				    $("#show_panel").fadeOut();
			}
	    }
	    function checkShare() {
			//code
			var status_share = $('#status_share:checked').val();
			if (status_share=="1") {
				    
				    $("#panel").fadeIn();
			
			}else{
				    
				    $("#panel").fadeOut();
				    
			}
			//alert($(this).val());
	    }
	
</script>
<?php
}
?>