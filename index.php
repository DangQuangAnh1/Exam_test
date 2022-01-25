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
    <title>index</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
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
        <div class="main-header-form hf2">
            <li></li>
            <li>
                <a href="index.php">
                    <span>Trang chủ </span>
                </a>
            </li>
            <li class="loc-hp">
                <div>
                    <a href="">
                        <span> Học phần </span>
                    </a>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class='hp-list'>
                    <form action="" method="POST">
                        <?php
                        $sql = "SELECT * FROM `hocphan`";
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_object($result)) {
                            echo"
                            <div class= 'h-item' >
                                <i class= 'fas fa-chevron-right '></i>
                                <input type='submit' value='".$row->mahp."' name='loc-mhp'>
                            </div>";
                        }
                        ?>
                    </form>
                </div>
            </li>
            <li class="loc-vien">
                <div>
                <a href="">
                    <span> Viện </span>
                </a>
                <i class="fas fa-chevron-down"></i>
                </div>
                <div class='vien-list'>
                    <form action="" method="POST">
                        <?php
                        $sql = "SELECT * FROM `vien`";
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_object($result)) {
                            echo"
                            <div class= 'h-item' >
                                <i class= 'fas fa-chevron-right '></i>
                                <input type='submit' value='".$row->mavien."' name='loc-vien'>
                            </div>";
                        }
                        ?>
                    </form>
                </div>
            </li>
            <li class="loc-hp">
                <div>
                    <a href="">
                        <span> Kỳ </span>
                    </a>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class='hp-list'>
                    <form action="" method="POST">
                        <div class= 'h-item' >
                            <i class= 'fas fa-chevron-right '></i>
                            <input type='submit' value="Thi giữa kỳ" name='loc-tgk'>
                        </div>
                        <div class= 'h-item' >
                            <i class= 'fas fa-chevron-right '></i>
                            <input type='submit' value="Thi cuối kỳ" name='loc-tcc'>
                         </div>   
                    </form>
                </div>
            </li>
            <li></li>
        </div>
    </div>
</header>

<body>
    <div class="body-form bf1">
        <div class="main-header-form hf1" style="color: var(--main-color);">
            Hướng dẫn
        </div>
        <div class="hd">
            <div class="huongdan huongdan1">👉 Sinh viên cần phải <a href="">Đăng nhập</a> để làm bài thi.</div>
            <div class="huongdan">👉 <a href="dangky.php">Đăng ký</a> nếu bạn chưa có tài khoản.</div>
            <div class="huongdan">👉 <a href="testc.php">Làm bài thi thử.</a></div>
            <div class="huongdan">👉 Quý Thầy/Cô hoặc Sinh viên vui lòng chọn Học phần trong danh mục bên trái hoặc sử dụng ô tìm kiếm dưới đây:</div>
            <form action="" method="POST">
                <div class="search-form">
                    <input type="text" placeholder="Tên học phần ...." name="search" class="search">
                    <button type="submit" class="search-bt" name="search-bt"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="body-form-2">
        <div class="menu">
            <div>Navigation</div>
            <div class="menu-main">
                <div class="mmi">
                    <i class="fas fa-chevron-down"></i>
                    <a href="index.php" style="color:var(--main-color);">
                        Home
                    </a>
                </div>
                <div class="menu-main-item">
                    <div class="mmi">HỆ THỐNG HỖ TRỢ KIỂM TRA ĐÁNH GIÁ</div>
                    <div class="mmi" onclick="coub()">
                        <i class="fas fa-chevron-down" id="cou-dow"></i>
                        <i class="fas fa-chevron-right " id="cou-r"></i>
                        <a href="">Courses</a>
                    </div>
                    <div class="menu-main-item" id="courses-form">
                        <div class="mmi" id="giuaky" onclick="gkb()">
                            <i class="fas fa-chevron-down" id="gk-dow"></i>
                            <i class="fas fa-chevron-right" id="gk-r"></i>
                            <div>THI GIỮA KỲ</div>
                        </div>
                        <div class="menu-main-item" id="giuaky-form">
                            <!-- <?php
                                $sql = "SELECT * FROM `vien`";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_object($result)) {
                                    echo"
                                    <div class='mmi' id='gcntt' onclick='gcnttb()'>
                                    <i class='fas fa-chevron-right'></i>
                                    <div>".$row->tenvien."</div>
                                    </div>
                                    ";
                                }
                            ?> -->
                            <div class="mmi" id="gcntt" onclick="gcnttb()">
                                <i class="fas fa-chevron-down" id="gk-dow-i"></i>
                                <i class="fas fa-chevron-right" id="gk-r-i"></i>
                                <div>Danh sách học phần</div>
                            </div>
                            <div id="giuaky-cntt">
                                <?php
                                $sql = "SELECT * FROM `hocphan`";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_object($result)) {
                                    echo"
                                    <form action='index.php' method='POST'>
                                    <div class= 'menu-main-item'>
                                        <div class= 'mmi' >
                                            <i class= 'fas fa-chevron-right '></i>
                                            <input type='hidden' value='".$row->mahp."' name='loc-mhp-1'>
                                            <input type='submit' value='".$row->mahp." - ".$row->tenhp."' name='loc-mhp1'>
                                        </div>
                                    </div>
                                    </form>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mmi" id="cuoiky" onclick="ckb()">
                            <i class="fas fa-chevron-down" id="ck-dow"></i>
                            <i class="fas fa-chevron-right" id="ck-r"></i>
                            <div>THI CUỐI KỲ</div>
                        </div>
                        <div class="menu-main-item" id="cuoiky-form">
                            <div class="mmi" onclick="ccnttb()">
                                <i class="fas fa-chevron-down" id="ck-dow-i"></i>
                                <i class="fas fa-chevron-right" id="ck-r-i"></i>
                                <div>Danh sách học phần</div>
                            </div>
                            <div id="cuoiky-cntt">
                                <?php
                                $sql = "SELECT * FROM `hocphan`";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_object($result)) {
                                    echo"                                    
                                    <form action='index.php' method='POST'>
                                    <div class= 'menu-main-item'>
                                        <div class= 'mmi' >
                                            <i class= 'fas fa-chevron-right '></i>
                                            <input type='hidden' value='".$row->mahp."' name='loc-mhp-2'>
                                            <input type='submit' value='".$row->mahp." - ".$row->tenhp."' name='loc-mhp2'>
                                        </div>
                                    </div>
                                    </form>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt">
        </div>
        <div class="body-main" data-category-id="14">
            <form action="index.php" method="POST">
                <div class="search-form">
                    <input type="text" placeholder="Mã lớp ...." name="search-courses" class="search">
                    <button type="submit" class="search-bt" name="search-c"><i class="fa fa-search"></i></button>
                </div>
            </form>
                <div class ="list-hp">
                    <?php
                        $sql = "SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp= hocphan.mahp";
                        if(isset($_POST['search-c'])){
                            $name=$_POST['search-courses'];
                            $sql ="SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp=hocphan.mahp AND lopthi.malop LIKE '%$name%'";
                        }
                        if(isset($_POST['search-bt'])){
                            $name=$_POST['search'];
                            $sql ="SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp=hocphan.mahp AND hocphan.tenhp LIKE '%$name%'";
                        }
                        if(isset($_POST['loc-mhp'])){
                            $name=$_POST['loc-mhp'];
                            $sql ="SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp=hocphan.mahp AND lopthi.mahp LIKE '%$name%'";
                        }
                        if(isset($_POST['loc-vien'])){
                            $name=$_POST['loc-vien'];
                            $sql ="SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp=hocphan.mahp AND hocphan.mavien LIKE '%$name%'";
                        }
                        if(isset($_POST['loc-mhp1'])){
                            $name=$_POST['loc-mhp-1'];
                            $sql ="SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp=hocphan.mahp AND ky='1' AND lopthi.mahp LIKE '%$name%'";
                        }
                        if(isset($_POST['loc-mhp2'])){
                            $name=$_POST['loc-mhp-2'];
                            $sql ="SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp=hocphan.mahp AND ky='2' AND lopthi.mahp LIKE '%$name%'";
                        }
                        if(isset($_POST['loc-tgk'])){
                            $name=$_POST['loc-tgk'];
                            if($name="Thi giữa kỳ"){
                                $sql ="SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp=hocphan.mahp AND ky='1'";
                            }
                        }
                        if(isset($_POST['loc-tcc'])){
                            $name=$_POST['loc-tcc'];
                            if($name="Thi cuối kỳ"){
                                $sql ="SELECT * FROM `lopthi`,`hocphan` WHERE lopthi.mahp=hocphan.mahp AND ky='2'";
                            }
                        }
                        $result = $conn->query($sql);
                        while($row = mysqli_fetch_object($result)) {
                            echo"
                            <form action='cbthi.php' method='POST'>
                            <div class= 'list-item-hp'>
                                <div class= 'item-hp'>
                                    <i class='fas fa-brain'></i>
                                    <input type='submit' name='cb-thi' value='".$row->mahp." - ".$row->malop." - ".$row->tenhp."'>
                                    <input type='hidden' name='malop' value='".$row->malop."'>
                                </div>
                            </div>
                            </form>";
                        }
                    ?>
                    <div id="page" style="text-align: center;padding: 20px 0px;"></div>
                </div>
        </div>
    </div>
</body>
<script language="javascript" src="main.js"></script>
</html>