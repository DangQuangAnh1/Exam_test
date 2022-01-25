<?php
session_start();
include "control.php";
$conn=conn();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
?>
<!DOCTYPE html> 
<html> 
<head> 
    <title>login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head> 
<body> 
<form action='login.php' method='POST'>
    <div class=login-box>
        <div class="login-header">
            HỆ THỐNG HỖ TRỢ KIỂM TRA ĐÁNH GIÁ
        </div>
        <div class="login-form">
            Username :
            <input type='text' name='username'/> 
            Passord : 
            <input type='password' name='password' /> 
            <input type='submit' class="button" name="dangnhap" value='Đăng nhập' />
            Bạn chưa có tài khoản, 
            <a href='dangky.php' title='Đăng ký' style="color:var(--main-color);">Đăng ký</a>
        </div>
        <div class="login-footer">
            <div>Chào mừng Quý Thầy, Cô và các bạn tới Hệ thống Hỗ trợ Kiểm tra, đánh giá của</div>
            <h1>Nhóm 1</h1>
            <div>Quý Thầy, Cô và các bạn nhập tài khoản và mật khẩu đã đăng ký để đăng nhập vào hệ thống.</div>
        </div>        
    </div>
<form>
<?php
    if (isset($_POST['dangnhap'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $sql=" SELECT * FROM `user` WHERE `user_name` = '$username' AND `password` = '$pass' ";
        $result = $conn->query($sql);
        $row  = mysqli_fetch_object($result);
        if($row) {
            $_SESSION["username"] = $row->user_name;
            $_SESSION["password"] = $row->password;
            if($row->role=="admin"){
                header("Location:quanly.php");
            }
            else{
                header("Location:index.php");
            }
        }
        else {
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid Username or Password!");';
            echo 'window.location.href = "login.php" ';
            echo '</script>';
        }
    }
?> 
</body>
<footer>
</footer> 
</html>