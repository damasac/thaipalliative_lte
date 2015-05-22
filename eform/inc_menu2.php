<?php  if(0) { ?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><?php } ?>
<div class="row" style=" padding-top:5px; padding-left:15px; padding-right:20px;padding-bottom:5px;">
<!-------------------------------------------------------->
<?php //echo $myMenuKey."<br>".$myState;?>
<? if($myMenuKey=="my") { $myState="success";  } else { $myState="primary"; } ?>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padding-2">
<button type="submit" class="btn btn-<?php echo $myState; ?> btn-block btn-flat btn-menu2" onclick="location.href='index.php'">
<i class="fa fa-user"></i> <br class="br-menu2"> <small>ฟอร์มของฉัน</small></button>
</div>
<? if($myMenuKey=="share") { $myState="success";  } else { $myState="primary"; } ?>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 padding-2">
<button type="submit" class="btn btn-<?php echo $myState; ?> btn-block btn-flat btn-menu2" onclick=" location.href='formshare.php'" >
<i class="fa fa-users"></i> <br class="br-menu2"> <small>ฟอร์มที่แชร์</small></button>
</div>
<!-------------------------------------------------------->

<!-------------------------------------------------------->
</div>