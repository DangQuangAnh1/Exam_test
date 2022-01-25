<?php
include "control.php";
$conn=conn();
$user="";
session_start();
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
$made="";
$cauhoi="";
$a="";
$b="";
$c="";
$d="";
$da="";
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
    <div class="nhapmade" id="formmmd">
        <form action="ql-exam.php" method="POST">
            <div class = "form_group">    
                    <button id="anformmade" onclick="anformmade()"><i class="fas fa-times"></i></button>
            </div>
            <div class = "form_group">    
                <div class="intext">Mã đề:</div>    
                <input type = "text" name = "made" value = ""/>    
            </div>
            <div class = "form_group">    
                <div class="intext">Thời gian (phút):</div>    
                <input type = "text" name = "thoigian" value = ""/>    
            </div>
            <div class = "form_group">    
                <div class="intext">Số câu:</div>    
                <input type = "text" name = "socau" value = ""/>    
            </div>
            <div class = "form_group">    
                <input type='submit' class="button" name="themmade" value='Thêm Mã đề'>    
            </div>
        </form>
        <?php
            if(isset($_POST['themmade'])){
                if($_POST['made']!="" || $_POST['thoigian']!=""|| $_POST['socau']!=""){
                    $made=$_POST['made'];
                    $thoigian=$_POST['thoigian'];
                    $socau=$_POST['socau'];
                    $sql=" INSERT INTO `dethi`(`made`, `thoigian`, `socau`) VALUES ('$made','$thoigian','$socau') ";
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
                        echo '<script type = "text/javascript">';
                        echo 'alert("Nhập đủ thông tin để thê mã đề!");';
                        echo '</script>';
                    }
                }
        ?>
    </div>
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
            Danh sách câu hỏi:
            <button id="showformmade" onclick="hienformmade()" style=""><i class="fas fa-plus"></i></button>
        </div>
        <div class="main-box-2">
            <div class="main-box-2-item v1">  
                <form action="ql-exam.php" method="POST">
                <div class = "form_group">    
                    <div class="intext">Mã đề:</div>    
                    <input type = "text" name = "made" value = ""/>    
                </div>    
                <div class = "form_group">    
                    <div class="intext">Câu hỏi:</div>    
                    <input type = "text" name = "cauhoi" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Đáp án A:</div>    
                    <input type = "text" name = "a" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Đáp án B:</div>    
                    <input type = "text" name = "b" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Đáp án C:</div>    
                    <input type = "text" name = "c" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Đáp án D:</div>    
                    <input type = "text" name = "d" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Đáp án đúng:</div>    
                    <input type = "text" name = "da" value = ""/>    
                </div>
                <div class = "form_group">    
                    <input type='submit' class="button" name="submit" value='Thêm câu hỏi'>    
                </div>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        if($_POST['made']!="" || $_POST['cauhoi']!=""|| $_POST['a']!="" || $_POST['b']!="" || $_POST['c']!="" || $_POST['d']!="" || $_POST['da']!=""){
                            $made=$_POST['made'];
                            $cauhoi=$_POST['cauhoi'];
                            $a=$_POST['a'];
                            $b=$_POST['b'];
                            $c=$_POST['c'];
                            $d=$_POST['d'];
                            $da=$_POST['da'];
                            $sql=" INSERT INTO `cauhoi`(`made`, `cauhoi`, `a`, `b`, `c`, `d`, `ketqua`) VALUES ('$made','$cauhoi','$a','$b','$c','$d','$da') ";
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
                ?>
            </div>
            <div class="main-box-2-item trang">
            </div>
            <div class="main-box-2-item v3">
            <form action="ql-exam.php" method="POST">
                <div class="select-form">
                    <select name="made" class="select-1" value="" style="min-width:50%">
                        <option value="" disabled>Chọn mã đề</option>
                        <option value="">Tất cả</option>
                        <?php
                            $sql = "SELECT * FROM `dethi`";
                            $result = $conn->query($sql);
                            while($row = mysqli_fetch_object($result)) {
                                echo "
                                <option value='$row->made'>$row->made</option>
                                ";
                            }
                        ?>
                    </select>
                    <button type="submit" class="search-bt" name="search-bt"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <?php
                if(isset($_POST['delete'])){
                    $sql = " DELETE FROM `cauhoi` WHERE `id` = '".$_POST['id']."' ";
                    if($conn->query($sql) === TRUE) {
                        echo '<script type = "text/javascript">';
                        echo 'alert("Xóa thành công!");';
                        echo '</script>';
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                $sql=" SELECT * FROM `cauhoi` WHERE 1 ORDER BY RAND() " ;
                if(isset($_POST['search-bt'])){
                    if($_POST['made']!=""){
                        $made=$_POST['made'];
                        $sql=" SELECT * FROM `cauhoi` WHERE `made` = '$made' ORDER BY RAND() " ;
                    }
                }
                $result = $conn->query($sql);
                echo "<table>
                          <tr>
                            <th class='col1'>Mã đề</th>
                            <th class='col1' style='min-widthtr:150px;'>Câu hỏi</th>
                            <th class='col1'>A</th>
                            <th class='col1'>B</th>
                            <th class='col1'>C</th>
                            <th class='col1'>D</th>
                            <th class='col1'>Đáp án</th>
                            <th></th>
                          </tr>";
                while($row =mysqli_fetch_object($result)){
                    echo "<tr class='myitem'>
                    <td class='col1'>".$row->made."</td>
                    <td  class='col1' style='min-widthr:150px;'>".$row->cauhoi."</td>
                    <td class='col1'>".$row->a."</td>
                    <td  class='col1'>".$row->b."</td>
                    <td  class='col1'>".$row->c."</td>
                    <td  class='col1'>".$row->d."</td>
                    <td  class='col1'>".$row->ketqua."</td>
                    <td>
                    <form action='ql-exam.php' method='POST'>
                    <input type='hidden' value='$row->id' name='id'>
                    <input type='submit' value='Delete' class='delete' name='delete'>
                    </form>
                    </td>
                    </tr>";
                  }
                echo "</table>";
            ?>
            <div id="page"></div>
            </div>
        </div>
    </div>
</body>
<script language="javascript" src="smain.js"></script>
</html>