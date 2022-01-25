<?php 
session_start();
include "control.php";
$conn=conn();
$user="";
$made="1";
$malop="";
$cbthi="";
$diem=0;
$socaudung=0;
$sc=0;
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
if(isset($_SESSION["made"])){
    $made=$_SESSION["made"];
}
if(isset($_SESSION["malop"])){
    $malop=$_SESSION["malop"];
}
if(isset($_SESSION['cb-thi'])){
    $cbthi=$_SESSION['cb-thi'];
}
if(isset($_SESSION['diem'])){
    $diem=$_SESSION['diem'];
}
if(isset($_SESSION['socaudung'])){
    $socaudung=$_SESSION['socaudung'];
}
if(isset($_SESSION['sc'])){
    $sc=$_SESSION['sc'];
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Kết quả</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    </head>
    <header>
        <div class="top-header">
            <?php
            echo "<div style='color:#fff;margin:auto;'>$cbthi</div>";
            ?>
        </div>
    </header>
    <body>
        <div class="body-form" style="margin-top:45px;">
            Kết quả:
        </div>
        <div class="body-form-3" style="width:50%">
            <div style="padding:20px 0px">
                <?php
                echo "Đề số ".$made;
                ?>
            </div>
            <div class="ques-box">
                <?php
                echo "Sinh viên: ".$user."<br><br>";
                echo "Tổng số câu đúng: ".$socaudung."/".$sc."<br><br>";
                echo "Điểm: ".$diem."/100";
                ?>
            </div>
            <div class="ques-box" style="text-align: center;">
                <a href="index.php" style="color:var(--main-color);margin:auto;"><< Về trang chủ</a>
            </div>
        </div>
    </body>
</html>