<?php
    error_reporting(0);
    include "../_connection/db.php";
    $task = $_GET["task"];
    $username = $_POST["username"];
    $password = sha1(md5($_POST["password"]));
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $status = $_POST["status"];
    $area = $_POST["area"];
    $site = $_POST["site"];
    $hcode = $_GET["hcode"];
    $date = date("Y-m-d H:i:s");
    //echo $password."<br>".$date;
    if($task=="addUser"){
        $sql = "INSERT INTO `puser`(username,password,email,fname,lname,status,area,site,createdate)
        VALUES(
            '".$username."',
            '".$password."',
            '".$email."',
            '".$fname."',
            '".$lname."',
            '".$status."'
            '".$area."',
            '".$site."',
            '".$date."'
        );
        ";
        $mysqli->query($sql) or die(mysqli_error($mysqli));
    }
    if($task=="getProvince"){
        $sql = "SELECT province,tambon,amphur FROM all_hospital_thai WHERE hcode='".$hcode."'";
        $query = $mysqli->query($sql) or die(mysqli_error($mysqli));
        $data = $query->fetch_assoc();
        print_r($data);
    }
?>