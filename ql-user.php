<?php
include "control.php";
$conn=conn();
$user="";
session_start();
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
$username="";
$pass="";
$email="";
$role="";
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
        <a href="ql-user.php" class="main-box-1">
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
            Danh sách User:
        </div>
        <div class="main-box-2">
            <div class="main-box-2-item v1">
                <form action="ql-user.php" method="POST">
                <div class = "form_group">    
                    <div class="intext">User name:</div>    
                    <input type = "text" name = "user" value = ""/>    
                </div>    
                <div class = "form_group">    
                    <div class="intext">Password:</div>    
                    <input type = "text" name = "pass" value = ""/>    
                </div> 
                <div class = "form_group">    
                    <div class="intext">Email:</div>    
                    <input type = "text" name = "email" value = ""/>    
                </div> 
                <div class = "form_group">    
                    <div class="intext">Role:</div>    
                    <input type = "text" name = "role" value = ""/>    
                </div> 
                <div class = "form_group">    
                    <input type='submit' class="button" name="submit" value='Thêm User'>    
                </div>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        if($_POST['user']!="" || $_POST['pass']!="" || $_POST['email']!="" || $_POST['role']!=""){
                            $username=$_POST['user'];
                            $pass=$_POST['pass'];
                            $email=$_POST['email'];
                            $role=$_POST['role'];
                            if(preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)){
                                $sql=" INSERT INTO `user`(`user_name`, `password`, `email`, `role`) VALUES ('$username','$pass','$email','$role') ";
                                if($conn->query($sql) === TRUE) {
                                    echo '<script type = "text/javascript">';
                                    echo 'alert("Thêm mới thành công!");';
                                    echo '</script>';
                                }
                                else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                            else{
                                echo "<br/><center>Định dạng email sai! </center>";
                            }
                        }
                        else{
                            echo "<br/><center>Vui lòng nhập đủ thông tin để thêm mới! </center>";
                        }
                    }
                ?>
            </div>
            <div class="main-box-2-item trang">
            </div>
            <div class="main-box-2-item v2">
            <?php
                if(isset($_POST['delete'])){
                    $sql = " DELETE FROM `user` WHERE `user_name` = '".$_POST['user']."' ";
                    if($conn->query($sql) === TRUE) {
                        echo '<script type = "text/javascript">';
                        echo 'alert("Xóa thành công!");';
                        echo '</script>';
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                $sql=" SELECT * FROM `user` WHERE 1 ORDER BY RAND()";
                $result = $conn->query($sql);
                echo "<table>
                          <tr>
                            <th class='col1'>User name</th>
                            <th class='col2'>Password</th>
                            <th class='col2'>Email</th>
                            <th class='col2'>Role</th>
                            <th></th>
                          </tr>";
                while($row =mysqli_fetch_object($result)){
                    echo "<tr class='myitem'>
                    <td class='col1'>".$row->user_name."</td>
                    <td  class='col2'>".$row->password."</td>
                    <td  class='col2'>".$row->email."</td>
                    <td  class='col2'>".$row->role."</td>
                    <form action='ql-user.php' method='POST'>
                    <td>
                    <input type='hidden' value='$row->user_name' name='user'>
                    <input type='submit' value='Delete' class='delete' name='delete'>
                    </td>
                    </form>
                    </tr>";
                  }
                echo "</table>";
            ?>
            <div id="page"></div>
            <script language="javascript" src="smain.js"></script>
            </div>
        </div>
    </div>
</body>
</html>