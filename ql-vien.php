<?php
include "control.php";
$conn=conn();
$user="";
session_start();
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
$mavien="";
$tenvien="";
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
            Danh sách viện:
        </div>
        <div class="main-box-2">
            <div class="main-box-2-item v1">
                <form action="ql-vien.php" method="POST">
                <div class = "form_group">    
                    <div class="intext">Mã viện:</div>    
                    <input type = "text" name = "mavien" value = ""/>    
                </div>    
                <div class = "form_group">    
                    <div class="intext">Tên viện:</div>    
                    <input type = "text" name = "tenvien" value = ""/>    
                </div> 
                <div class = "form_group">    
                    <input type='submit' class="button" name="submit" value='Thêm mới viện'>    
                </div>
                </form>
            </div>
            <div class="main-box-2-item trang">
            </div>
            <div class="main-box-2-item v2">
            <?php
                if(isset($_POST['delete'])){
                    $sql = " DELETE FROM `vien` WHERE `mavien` = '".$_POST['mavien']."' ";
                    if($conn->query($sql) === TRUE) {
                        echo '<script type = "text/javascript">';
                        echo 'alert("Xóa thành công!");';
                        echo '</script>';
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                if(isset($_POST['submit'])){
                    if($_POST['mavien']!="" || $_POST['tenvien']!=""){
                        $mavien=$_POST['mavien'];
                        $tenvien=$_POST['tenvien'];
                        $sql=" INSERT INTO `vien`(`mavien`, `tenvien`) VALUES ('$mavien','$tenvien') ";
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
                        echo "<br/><center>Vui lòng nhập đủ thông tin để thêm mới! </center>";
                    }
                }
                $sql=" SELECT * FROM `vien` WHERE 1 ORDER BY RAND() ";
                $result = $conn->query($sql);
                echo "<table>
                          <tr>
                            <th class='col1'>Mã viện</th>
                            <th class='col2'>Tên viện</th>
                            <th></th>
                          </tr>";
                while($row =mysqli_fetch_object($result)){
                    echo "<tr class='myitem'>
                    <td class='col1'>".$row->mavien."</td>
                    <td  class='col2'>".$row->tenvien."</td>
                    <td>
                    <form action='ql-vien.php' method='POST'>
                    <input type='hidden' value='$row->mavien' name='mavien'>
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