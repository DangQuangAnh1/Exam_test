<?php 
session_start();
include "control.php";
$conn=conn();
$user="";

if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
else{
    echo '<script type = "text/javascript">';
    echo 'alert("Phải đăng nhập để thi!");';
    echo 'window.location.href = "index.php" ';
    echo '</script>';
}
if(isset($_POST['cb-thi'])){
    $_SESSION['cb-thi']=$_POST['cb-thi'];
    // $malop=substr($_POST['cb-thi'], 9, 6);
    // $_SESSION['malop']=$malop;
    $malop=$_POST['malop'];
    $_SESSION['malop']=$malop;
    
}

$sql=" SELECT * FROM `ketqua` WHERE `user_name` = '$user' AND `malop`='$malop' ";
$result = $conn->query($sql);
$row  = mysqli_fetch_object($result);
if($row){
    echo '<script type = "text/javascript">';
    echo 'alert("Bạn đã thi bài thi này trước đó!");';
    echo 'window.location.href = "index.php" ';
    echo '</script>';
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Chuẩn bị thi</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    </head>
<header>
    <div class="top-header">
        <div class="top-header-form">
        </div>
        <div class="top-header-form">
            <div class="top-header-box">
                <li>
                    <i class="fas fa-comments"></i>
                    <a href="">Phản hồi</a>
                </li>
                <?php
                if(isset($_SESSION["username"])){
                echo"
                <div class='yes-login'>
                    <div class='user-name-header'>
                        ".$user."
                    </div>
                    <div class='user-avt-header'>
                        <a href=''>
                            <img src='f2.png' alt=''>
                        </a>
                        <div class='avt-list'>
                            <i class='fas fa-sign-in-alt'></i>
                            <a href='login.php'>
                                Đăng xuất
                            </a>
                        </div>
                    </div>
                </div>";
                }
                else{
                    echo"
                    <div class='no-login'>
                    <li>
                        <i class='fas fa-user-plus'></i>
                        <a href='dangky.php' class='dk'>
                            Đăng ký
                        </a>
                    </li>
                    <li>
                        <i class='fas fa-sign-in-alt'></i>
                        <a href='login.php'>
                            Đăng nhập
                        </a>
                    </li>
                </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="main-header">
        <div class="main-header-form hf1">
            <div>
                HỆ THỐNG KIỂM TRA VÀ ĐÁNH GIÁ
            </div>
        </div>
    </div>
</header>
<body>
    <form action='baithi.php' method='POST'>
        <div class=login-box style="margin-top: 145px;">
            <div class="login-header">
                <?php
                    $sql=" SELECT * FROM `lopthi` WHERE `malop` = '".$_SESSION['malop']."' ";
                    $result = $conn->query($sql);
                    $row  = mysqli_fetch_object($result);
                    if($row){
                        echo $_SESSION['cb-thi'];
                        $malop=$row->malop;
                        $mahp=$row->mahp;
                        $gv=$row->gv;
                        $start=$row->start;
                        $end=$row->end;
                        $ky=$row->ky;
                        $made=$row->made;
                        $_SESSION['made']=$made;
                    }
                ?>
            </div>
            <div class="login-form">
                <div class="info-bt">Enrolment options</div>
                <div class="info-bt">
                    Teacher:
                    <?php echo $gv; ?>
                </div>
                <div class="info-bt">
                    Thời gian bắt đầu: 
                    <?php
                    $startt=new DateTime($start);
                    echo (date_format($startt,"h:i:s")."");
                    echo (", Ngày: ".date_format($startt,"d"));
                    echo (", tháng: ".date_format($startt,"m"));
                    echo (", năm: ".date_format($startt,"y"));
                    ?>
                </div>
                <div class="info-bt">
                    Thời gian kết thúc: 
                    <?php
                    $endt= new DateTime($end);
                    echo (date_format($endt,"h:i:s")."");
                    echo (", Ngày: ".date_format($endt,"d"));
                    echo (", tháng: ".date_format($endt,"m"));
                    echo (", năm: ".date_format($endt,"y"));
                    ?>
                </div>
                <div class="info-bt">
                    Thời gian còn lại:
                    <?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        date_default_timezone_get();
                        $today = new DateTime(date('Y-m-d H:i:s'));
                        $interval = $today->diff($endt);
                        echo $interval->y . " years, " . $interval->m . " months, " . $interval->d . " days, ";
                        echo $interval->h . " o'clock, " . $interval->i . " minutes, " . $interval->s . " seconds ";
                    ?>
                </div>
                <div class="info-bt" style="color:red;">
                    <?php
                        $t=date_format($today,"Y-m-d H:i:s");
                        $timelimit = strtotime($end) - strtotime($t);
                        $_SESSION['timelimit']=$timelimit;
                        $timestart = strtotime($t) - strtotime($start);
                        if($timelimit<0){
                            echo "Đã hết thời gian làm bài!";
                        }
                        if($timestart<0){
                            echo "Chưa đến thời gian làm bài!";
                        }
                    ?>
                </div>
                <input type='submit' class="button" name="start-bt" value='Bắt đầu làm bài'
                <?php
                if($timelimit<0 || $timestart<0){
                    echo "disabled";
                }
                ?>
                >
            </div>
            <div class="login-footer">
                <a href="index.php" style="color:var(--main-color);"><< Quay lại trang trước</a>
            </div>
        </div>
    <form>
</body>
</html>