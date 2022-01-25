<?php
include "control.php";
$conn=conn();
$user="";
session_start();
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
$mahp="";
$tenhp="";
$mavien="";
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
            Danh sách học phần:
        </div>
        <div class="main-box-2">
            <div class="main-box-2-item v1">
                <form action="ql-hp.php" method="POST">
                <div class = "form_group">    
                    <div class="intext">Mã học phần:</div>    
                    <input type = "text" name = "mahp" value = ""/>    
                </div>    
                <div class = "form_group">    
                    <div class="intext">Tên học phần:</div>    
                    <input type = "text" name = "tenhp" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Mã viện:</div>    
                    <input type = "text" name = "mavien" value = ""/>    
                </div>
                <div class = "form_group">    
                    <input type='submit' class="button" name="submit" value='Thêm mới học phần'>    
                </div>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        if($_POST['mahp']!="" || $_POST['tenhp']!=""|| $_POST['mavien']!=""){
                            $mahp=$_POST['mahp'];
                            $tenhp=$_POST['tenhp'];
                            $mavien=$_POST['mavien'];
                            $sql = "SELECT * FROM `vien` WHERE `mavien`='$mavien' ";
                            $result = $conn->query($sql);
                            $row = mysqli_fetch_object($result);
                            if($row){
                                $sql=" INSERT INTO `hocphan`(`mahp`, `tenhp`, `mavien`) VALUES ('$mahp','$tenhp','$mavien') ";
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
                                echo "<br/><center>Mã viện không tồn tại! </center>";
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
            <form action="ql-hp.php" method="POST">
                <div class="select-form">
                    <select name="mavien" class="select-1" value="">
                        <option value="" disabled>Chọn viện </option>
                        <option value="">Tất cả</option>
                        <?php
                            $sql = "SELECT * FROM `vien`";
                            $result = $conn->query($sql);
                            while($row = mysqli_fetch_object($result)) {
                                echo "
                                <option value='$row->mavien'>$row->tenvien</option>
                                ";
                            }
                        ?>
                    </select>
                    <button type="submit" class="search-bt" name="search-bt"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <?php
                if(isset($_POST['delete'])){
                    $sql = " DELETE FROM `hocphan` WHERE `mahp` = '".$_POST['mahp']."' ";
                    if($conn->query($sql) === TRUE) {
                        echo '<script type = "text/javascript">';
                        echo 'alert("Xóa thành công!");';
                        echo '</script>';
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                $sql=" SELECT * FROM `hocphan`,`vien` WHERE `hocphan`.mavien = `vien`.mavien ORDER BY RAND() " ;
                if(isset($_POST['search-bt'])){
                    if($_POST['mavien']!=""){
                        $mavien=$_POST['mavien'];
                        $sql=" SELECT * FROM `hocphan`,`vien` WHERE `hocphan`.mavien = `vien`.mavien AND `hocphan`.mavien LIKE '%$mavien%' ORDER BY RAND()" ;
                    }
                }
                $result = $conn->query($sql);
                echo "<table>
                          <tr>
                            <th class='col1'>Mã học phần</th>
                            <th class='col2'>Tên học phần</th>
                            <th class='col2'>Mã viện</th>
                            <th class='col2'>Tên viện viện</th>
                            <th></th>
                          </tr>";
                while($row =mysqli_fetch_object($result)){
                    echo "<tr class='myitem'>
                    <td class='col1'>".$row->mahp."</td>
                    <td  class='col2'>".$row->tenhp."</td>
                    <td class='col1'>".$row->mavien."</td>
                    <td  class='col2'>".$row->tenvien."</td>
                    <td>
                    <form action='ql-hp.php' method='POST'>
                    <input type='hidden' value='$row->mahp' name='mahp'>
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