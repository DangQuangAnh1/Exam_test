<?php
include "control.php";
$conn=conn();
$user="";
session_start();
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
$username="";
$malop="";
$diem="";
$ky="";
$mahp="";
$malop="";
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
            Bảng điểm sinh viên:
        </div>
        <div class="main-box-2">
            <div class="main-box-2-item v3">
            <form action="ql-diem.php" method="POST">
                <div class="select-form">
                    <select name="ky" class="select-1" value="" style="min-width:30%;">
                        <option value="" disabled>Chọn kỳ </option>
                        <option value="">Kỳ</option>
                        <option value='1'>Giữa kỳ</option>
                        <option value='2'>Cuối kỳ</option>
                    </select>
                    <select name="mahp" class="select-1" value="">
                        <option value="" disabled>Chọn học phần </option>
                        <option value="">Học phần</option>
                        <?php
                            $sql = "SELECT * FROM `hocphan`";
                            $result = $conn->query($sql);
                            while($row = mysqli_fetch_object($result)) {
                                echo "
                                <option value='$row->mahp'>$row->tenhp</option>
                                ";
                            }
                        ?>
                    </select>
                    <select name="malop" class="select-1" value="" style="min-width:30%;">
                        <option value="" disabled>Chọn mã lớp </option>
                        <option value="">Mã lớp</option>
                        <?php
                            $sql = "SELECT * FROM `lopthi`";
                            $result = $conn->query($sql);
                            while($row = mysqli_fetch_object($result)) {
                                echo "
                                <option value='$row->malop'>$row->malop</option>
                                ";
                            }
                        ?>
                    </select>
                    <button type="submit" class="search-bt" name="bo-loc"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <form action="ql-diem.php" method="POST">
                <div class="select-form">
                    <input type="text" placeholder="Tên User ...." name="user" style="width:28%;">
                    <button type="submit" class="search-bt" name="search-bt"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <?php
                if(isset($_POST['delete'])){
                    $sql=" DELETE FROM `ketqua` WHERE `user_name` = '".$_POST['user']."' AND `malop`='".$_POST['malop']."' ";
                    if($conn->query($sql) === TRUE) {
                        echo '<script type = "text/javascript">';
                        echo 'alert("Xóa thành công!");';
                        echo '</script>';
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                $sql=" SELECT * FROM `ketqua`,`lopthi`,`hocphan` WHERE `ketqua`.malop = `lopthi`.malop AND `lopthi`.mahp=`hocphan`.mahp " ;
                if(isset($_POST['search-bt'])){
                    if($_POST['user']!=""){
                        $username=$_POST['user'];
                        $sql=" SELECT * FROM `ketqua`,`lopthi`,`hocphan` WHERE `ketqua`.malop = `lopthi`.malop AND `lopthi`.mahp=`hocphan`.mahp AND `ketqua`.user_name LIKE '%$username%' ORDER BY RAND()" ;
                    }
                }
                if(isset($_POST['bo-loc'])){
                    if($_POST['ky']!="" || $_POST['mahp']!="" || $_POST['malop']!=""){
                        $ky=$_POST['ky'];
                        $mahp=$_POST['mahp'];
                        $malop=$_POST['malop'];
                        $sql=" SELECT * FROM `ketqua`,`lopthi`,`hocphan` WHERE `ketqua`.malop = `lopthi`.malop AND `lopthi`.mahp=`hocphan`.mahp AND `lopthi`.ky LIKE '%$ky%' AND `lopthi`.malop LIKE '%$malop%' AND `lopthi`.mahp LIKE '%$mahp%' ORDER BY RAND() " ;
                    }
                }
                $result = $conn->query($sql);
                echo "<table>
                          <tr>
                            <th class='col1'>User name:</th>
                            <th class='col2'>Mã lớp:</th>
                            <th class='col2'>Mã học phần:</th>
                            <th class='col2'>Tên học phần:</th>
                            <th class='col2'>Điểm</th>
                            <th class='col2'>Mã đề</th>
                            <th class='col2'>Kỳ</th>
                            <th></th>
                          </tr>";
                while($row =mysqli_fetch_object($result)){
                    echo "<tr class='myitem'>
                    <td class='col1'>".$row->user_name."</td>
                    <td  class='col2'>".$row->malop."</td>
                    <td class='col1'>".$row->mahp."</td>
                    <td class='col1'>".$row->tenhp."</td>
                    <td  class='col2'>".$row->diem."</td>
                    <td  class='col2'>".$row->made."</td>
                    <td  class='col2'>".$row->ky."</td>
                    <td>
                    <form action='ql-diem.php' method='POST'>
                    <input type='hidden' value='$row->user_name' name='user'>
                    <input type='hidden' value='$row->malop' name='malop'>
                    <input type='submit' value='Delete' class='delete' name='delete'>
                    </form>
                    </td>
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