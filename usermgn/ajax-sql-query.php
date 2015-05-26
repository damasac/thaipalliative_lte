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
    $province = $_POST["province"];
    $amphur = $_POST["amphur"];
    $district = $_POST["district"];
    $hcode = $_GET["hcode"];
    $date = date("Y-m-d H:i:s");
    //echo $password."<br>".$date;
    if($task=="addUser"){
        $sql = "INSERT INTO
        `puser`
        (`username`,`password`,`email`,`fname`,`lname`,`status`,`area`,`hcode`,`district`,`amphur`,`province`,`createdate`)
        VALUES(
            '".$username."',
            '".$password."',
            '".$email."',
            '".$fname."',
            '".$lname."',
            '".$status."'
            '".$area."',
            '".$site."',
            '".$district."',
            '".$amphur."',
            '".$province."',
            '".$date."'
        );
        ";
        echo $sql;
        $mysqli->query($sql) or die(mysqli_error($mysqli));
    }
?>