<?php
include "control.php";
$conn=conn();
$user="";
session_start();
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
$malop="";
$mahp="";
$gv="";
$start="";
$end="";
$made="";
$ky="";
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
            Danh sách lớp thi:
        </div>
        <div class="main-box-2">
            <div class="main-box-2-item v1">
                <form action="ql-lop.php" method="POST">
                <div class = "form_group">    
                    <div class="intext">Mã lớp thi:</div>    
                    <input type = "text" name = "malop" value = ""/>    
                </div>    
                <div class = "form_group">    
                    <div class="intext">Mã học phần:</div>    
                    <input type = "text" name = "mahp" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Giáo viên:</div>    
                    <input type = "text" name = "gv" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Bắt đầu:</div>    
                    <input type = "date" name = "start" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Kết thúc:</div>    
                    <input type = "date" name = "end" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Mã đề:</div>    
                    <input type = "text" name = "made" value = ""/>    
                </div>
                <div class = "form_group">    
                    <div class="intext">Kỳ:</div>    
                    <input type = "text" name = "ky" value = ""/>    
                </div>
                <div class = "form_group">    
                    <input type='submit' class="button" name="submit" value='Thêm mới lớp thi'>    
                </div>
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        if($_POST['malop']!="" || $_POST['mahp']!=""|| $_POST['gv']!="" || $_POST['start']!="" || $_POST['end']!="" || $_POST['made']!="" || $_POST['ky']!=""){
                            $malop= $_POST['malop'];
                            $mahp= $_POST['mahp'];
                            $gv= $_POST['gv'];
                            $start= $_POST['start'];
                            $end= $_POST['end'];
                            $made= $_POST['made'];
                            $ky= $_POST['ky'];
                            $sql = "SELECT * FROM `hocphan` WHERE `mahp`='$mahp' ";
                            $result = $conn->query($sql);
                            $row = mysqli_fetch_object($result);
                            if($row){
                                $sql=" INSERT INTO `lopthi`(`malop`, `mahp`, `gv`, `start`, `end`, `made`, `ky`) VALUES ('$malop','$mahp','$gv','$start','$end','$made','$ky') ";
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
                                echo "<br/><center>Mã học phần không tồn tại! </center>";
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
            <form action="ql-lop.php" method="POST">
                <div class="select-form">
                    <select name="mahp" class="select-1" value="">
                        <option value="" disabled>Chọn học phần </option>
                        <option value="">Tất cả</option>
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
                    <button type="submit" class="search-bt" name="search-bt"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <?php
                if(isset($_POST['delete'])){
                    $sql = " DELETE FROM `lopthi` WHERE `malop`='".$_POST['malop']."' ";
                    if($conn->query($sql) === TRUE) {
                        echo '<script type = "text/javascript">';
                        echo 'alert("Xóa thành công!");';
                        echo '</script>';
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                $sql=" SELECT * FROM `lopthi` WHERE 1 ORDER BY RAND() " ;
                if(isset($_POST['search-bt'])){
                    if($_POST['mahp']!=""){
                        $mahp=$_POST['mahp'];
                        $sql=" SELECT * FROM `lopthi` WHERE `mahp`='$mahp' ORDER BY RAND() " ;
                    }
                }
                $result = $conn->query($sql);
                echo "<table>
                          <tr>
                            <th class='col1'>Mã lớp</th>
                            <th class='col2'>Mã học phần</th>
                            <th class='col2'>Giáo viên</th>
                            <th class='col2'>Bắt đầu</th>
                            <th class='col2'>Kết thúc</th>
                            <th class='col2'>Mã đề</th>
                            <th class='col2'>Kỳ</th>
                            <th></th>
                          </tr>";
                while($row =mysqli_fetch_object($result)){
                    echo "<tr class='myitem'>
                    <td class='col1'>".$row->malop."</td>
                    <td  class='col2'>".$row->mahp."</td>
                    <td class='col1'>".$row->gv."</td>
                    <td  class='col2'>".$row->start."</td>
                    <td  class='col2'>".$row->end."</td>
                    <td  class='col2'>".$row->made."</td>
                    <td  class='col2'>".$row->ky."</td>
                    <td>
                    <form action='ql-lop.php' method='POST'>
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