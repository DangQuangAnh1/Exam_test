<?php
session_start();
include "control.php";
$conn=conn();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["email"]);
?>
<!DOCTYPE html> 
<html> 
<head> 
    <title>reign</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head> 
<body> 
<form action='dangky.php' method='POST'>
    <div class=login-box>
        <div class="login-header">
            HỆ THỐNG HỖ TRỢ KIỂM TRA ĐÁNH GIÁ
        </div>
        <div class="login-form">
            Username :
            <input type='text' name='username'/> 
            Passord : 
            <input type='password' name='password' />
            Email"
            <input type='text' name='email' /> 
            Bạn đã có tài khoản, 
            <a href='login.php' title='Đăng nhập' style="color:var(--main-color);">Đăng nhập</a>
            <input type='submit' class="button" name="dangky" value='Đăng ký' />
        </div>
        <div class="login-footer">
            <div>Chào mừng Quý Thầy, Cô và các bạn tới Hệ thống Hỗ trợ Kiểm tra, đánh giá của</div>
            <h1>Nhóm 1</h1>
            <div>Quý Thầy, Cô và các bạn vui lòng đăng ký để sử dụng hệ thống.</div>
        </div>        
    </div>
<form>
<?php
    if (isset($_POST['dangky'])){
        if ($_POST['username']!="" && $_POST['password']!="" && $_POST['email']!="") {
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $email=$_POST['email'];
            $sql=" SELECT * FROM `user` WHERE `user_name` = '$username'";
            $result = $conn->query($sql);
            $row  = mysqli_fetch_object($result);
            if($row){
                echo '<script type = "text/javascript">';
                echo 'alert("Tài khoản này đã được tạo!");';
                echo 'window.location.href = "dangky.php" ';
                echo '</script>';
            }
            else{
                if(TRUE){
                    $sql = "INSERT INTO `user`(`user_name`, `password`, `email`) VALUES ('$username','$pass','$email')";
                    if($conn->query($sql) === TRUE) {
                        $_SESSION["username"] = $username;
                        $_SESSION["password"] = $pass;
                        $_SESSION["email"] = $email;
                        echo '<script type = "text/javascript">';
                        echo 'alert("Đăng ký thành công!");';
                        echo 'window.location.href = "index.php" ';
                        echo '</script>';
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else{

                }
            }
        }
    }
?> 
</body>
<footer>
</footer> 
</html>