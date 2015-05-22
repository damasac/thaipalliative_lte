<?Php
    $con = mysqli_connect("localhost","root","","thaipalliative") or die(mysql_error());
    mysqli_select_db($con,"thaipalliative") or die(mysql_error());
    mysqli_query($con,"SET NAMES UTF8")
?>