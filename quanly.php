<?php
include "control.php";
$conn=conn();
$user="";
session_start();
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Quan ly</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="zmain.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<header>

</header>
<body>
    <div class="box-1">
        <a href="quanly.php" class="top-box-1">
            <div class="admin">
                <i class="fas fa-laugh-wink"></i>
                <span class="">ADMIN</span>
            </div>
        </a>
        <a href="ql-vien.php" class="main-box-1">
            <div class="main-box-item">
                <i class="fas fa-door-open"></i>
                <span class="">Viện</span>
            </div>
        </a>
        <a href="ql-hp.php" class="main-box-1">
            <div class="main-box-item">
                <i class="fas fa-torah"></i>
                <span class="">Học phần</span>
            </div>
        </a>
        <a href="ql-lop.php" class="main-box-1">
            <div class="main-box-item">
                <i class="fas fa-book-open"></i>
                <span class="">Lớp thi</span>
            </div>
        </a>
        <a href="ql-user.php" class="main-box-1">
            <div class="main-box-item">
                <i class="fas fa-address-book"></i>
                <span class="">User</span>
            </div>
        </a>
        <a href="ql-diem.php" class="main-box-1">
            <div class="main-box-item">
                <i class="fas fa-sort-numeric-up-alt"></i>
                <span class="">Điểm thi</span>
            </div>
        </a>
        <a href="ql-exam.php" class="main-box-1">
            <div class="main-box-item">
                <i class="fas fa-edit"></i>
                <span class="">Câu hỏi</span>
            </div>
        </a>
    </div>
    <div class="box-2">
        <div class="top-box-2">
            <?php
                echo"
                <div class='kt'>
                    <h2>HỆ THỐNG QUẢN LÝ HỖ TRỢ KIỂM GIA VÀ ĐÁNH GIÁ</h2>
                </div>
                <div class='user-name-header unh1'>
                    ".$user."
                </div>
                <div class='user-avt-header'>
                    <a href='quanly.php'>
                        <img src='f2.png' alt=''>
                    </a>
                    <div class='avt-list'>
                        <i class='fas fa-sign-in-alt'></i>
                        <a href='login.php'>
                                Đăng xuất
                        </a>
                    </div>
                </div>
                <div class='user-name-header'></div>
                ";
            ?>
        </div>
        <div class="title-box-2">
            Dashboard
        </div>
        <div class="main-box-2" style="flex-wrap:wrap;">
            <div class= count-box>
                <div class="count-form">
                    <div style="width:10%">
                    </div>
                    <div class="count-form-1">
                        <div style="color:black;font-size:13px;">Số Lượt nộp bài:</div>
                        <div class="cf1">
                            <?php
                                $count=0;
                                $sql=" SELECT * FROM `ketqua` WHERE 1 ";
                                $result = $conn->query($sql);
                                while($row  = mysqli_fetch_object($result)){
                                    $count++;
                                }
                                echo $count;
                            ?>
                        </div>
                    </div>
                    <div class="count-form-2">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    <div style="width:10%">
                    </div>
                </div>
            </div>
            <div class= count-box>
                <div class="count-form">
                    <div style="width:10%">
                    </div>
                    <div class="count-form-1">
                        <div style="color:var(--main-color);font-size:13px;">Tổng số viện:</div>
                        <div class="cf1">
                            <?php
                                $count=0;
                                $sql=" SELECT * FROM `vien` WHERE 1 ";
                                $result = $conn->query($sql);
                                while($row  = mysqli_fetch_object($result)){
                                    $count++;
                                }
                                echo $count;
                            ?>
                        </div>
                    </div>
                    <div class="count-form-2">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    <div style="width:10%">
                    </div>
                </div>
            </div>
            <div class= count-box>
                <div class="count-form">
                <div style="width:10%">
                    </div>
                    <div class="count-form-1">
                        <div style="color:red;font-size:13px;">Tổng số học phần:</div>
                        <div class="cf1">
                            <?php
                                $count=0;
                                $sql=" SELECT * FROM `hocphan` WHERE 1 ";
                                $result = $conn->query($sql);
                                while($row  = mysqli_fetch_object($result)){
                                    $count++;
                                }
                                echo $count;
                            ?>
                        </div>
                    </div>
                    <div class="count-form-2">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    <div style="width:10%">
                    </div>
                </div>
            </div>
            <div class= count-box>
                <div class="count-form">
                <div style="width:10%">
                    </div>
                    <div class="count-form-1">
                        <div style="color:purple;font-size:13px;">Tổng số lớp thi:</div>
                        <div class="cf1">
                            <?php
                                $count=0;
                                $sql=" SELECT * FROM `lopthi` WHERE 1 ";
                                $result = $conn->query($sql);
                                while($row  = mysqli_fetch_object($result)){
                                    $count++;
                                }
                                echo $count;
                            ?>
                        </div>
                    </div>
                    <div class="count-form-2">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    <div style="width:10%">
                    </div>
                </div>   
            </div>
            <div class= count-box>
                <div class="count-form">
                <div style="width:10%">
                    </div>
                    <div class="count-form-1">
                        <div style="color:orange;font-size:12px;">Tổng số sinh viên:</div>
                        <div class="cf1">
                            <?php
                                $count=0;
                                $sql=" SELECT * FROM `user` WHERE 1 ";
                                $result = $conn->query($sql);
                                while($row  = mysqli_fetch_object($result)){
                                    $count++;
                                }
                                echo $count;
                            ?>
                        </div>
                    </div>
                    <div class="count-form-2">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    <div style="width:10%">
                    </div>
                </div>   
            </div>
            <div class= count-box>
                <div class="count-form">
                <div style="width:10%">
                    </div>
                    <div class="count-form-1">
                        <div style="color:green;font-size:12px;">Tổng số câu hỏi:</div>
                        <div class="cf1">
                            <?php
                                $count=0;
                                $sql=" SELECT * FROM `cauhoi` WHERE 1 ";
                                $result = $conn->query($sql);
                                while($row  = mysqli_fetch_object($result)){
                                    $count++;
                                }
                                echo $count;
                            ?>
                        </div>
                    </div>
                    <div class="count-form-2">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                    <div style="width:10%">
                    </div>
                </div>   
            </div>
        </div>
    </div>
</body>
</html>