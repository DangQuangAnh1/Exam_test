<?php 
session_start();
include "control.php";
$conn=conn();
$user="";
$made="1";
$malop="";
if(isset($_SESSION["username"])){
    $user=$_SESSION["username"];
}
$_SESSION["made"]=1;
$_SESSION["cb-thi"]="Test";
$_SESSION["malop"]="Test";
$diem=0;
$socau=0;
$socaudung=0;
unset($_SESSION['diem']);
unset($_SESSION['socaudung']);
unset($_SESSION['sc']);
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Bài thi thử</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    </head>
    <header>
        <div class="top-header">
            <div style='color:#fff;margin:auto;'>Test</div>
        </div>
    </header>
    <body>
        <div class="body-form" style="margin-top:45px;">
            <?php
            $thoigian=999;
            $socau=10;
            echo "<div style='margin:auto;'>Thời gian: ".$thoigian." phút</div>";
            ?>
            <br>
            <span>Thời gian còn lại: 
            <i class="far fa-clock" style="color:var(--main-color);"></i>
            </span>
            <span id="demo"></span>

        <script>
        // Set the date we're counting down to
        <?php
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            date_default_timezone_get();
            $today = new DateTime(date('Y-m-d H:i:s'));
            $t=date_format($today,"Y-m-d H:i:s");
            $newdate = strtotime ( $thoigian.'minutes' , strtotime($t)) ;
            $newdate = date ('Y-m-d H:i:s',$newdate);
            echo " var countDownDate = new Date(\"$newdate\").getTime(); ";
            ?>
            // var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();
                
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
                
            // Time calculations for days, hours, minutes and seconds
            //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
            // Output the result in an element with id="demo"
            // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            // + minutes + "m " + seconds + "s ";
            document.getElementById("demo").innerHTML = hours + "h "
            + minutes + "m " + seconds + "s ";    
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
                <?php
                    echo 'alert("Hết giờ, tự động nộp bài!");';
                    echo 'window.location.href = "ketqua.php" ';
                ?>
            }
            }, 1000);
            </script>
        </div>
        <div class="body-form-3">
            <form action="testc.php" method="POST">
            <?php
                $sql=" SELECT * FROM `cauhoi` WHERE `made`='1' ORDER BY RAND() LIMIT 10 ";
                $result = $conn->query($sql);
                $index=1;
                echo "<div style='padding:10px;'>Mark your answer on your answer sheet:</div>";
                while($row=mysqli_fetch_object($result)){
                    echo"
                    <div class='ques-box'>
                    <fieldset id='group".$index."'>
                    <p><div class='indam'>Quession ".$index." :</div>".$row->cauhoi."</p>
                    <input type='radio' name='group".$index."' value='a'>
                    <label>A. ".$row->a."</label>
                    <br>
                    <input type='radio' name='group".$index."' value='b'>
                    <label>A. ".$row->b."</label>
                    <br>
                    <input type='radio' name='group".$index."' value='c'>
                    <label>A. ".$row->c."</label>
                    <br>
                    <input type='radio' name='group".$index."' value='d'>
                    <label>A. ".$row->d."</label>
                    </fieldset>
                    <input type='hidden' name='answer".$index."' value='".$row->ketqua."'>
                    </div>
                    ";
                    $index++;
                }        
            ?>
            <div style="text-align: center;">
                <input type="submit" name="submittest" value="SUBMIT" class="button">
            </div>
            </form>
        </div>
        <div>
            <?php
                if(isset($_POST['submittest'])){
                    for($i=1;$i<$index;$i++){
                        $da="group".$i;
                        $kq="answer".$i;
                        if(isset($_POST[$da])&& $_POST[$da]==$_POST[$kq]){
                            $socaudung++;
                            $diem+=100/($index-1);
                        }
                    }
                    $_SESSION['diem']=$diem;
                    $_SESSION['socaudung']=$socaudung;
                    $_SESSION['sc']=$index-1;
                    echo '<script type = "text/javascript">';
                    echo 'alert("Nộp bài thành công!");';
                    echo 'window.location.href = "ketqua.php" ';
                    echo '</script>';
                }
            ?>
        </div>
    </body>
</html>