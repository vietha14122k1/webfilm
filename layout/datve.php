<?php
session_start();
// require_once('database/connectDB.php');
// require_once('database/dbhelper.php');
?>

<?php

//   $conn=mysqli_connect("localhost","root","","web-film");

// $mamon="";

// if(isset($_POST['btn-submit'])){

// 	$mamon=$_POST['mamon'];
//     $sql1='SELECT * FROM mon_hoc WHERE mamon like "%'.$mamon.'%"';
//     $data= 
//     mysqli_query($conn,$sql1);
// }
// else
// {
//     $sql="SELECT * FROM ghexem,phongxem,phim


//     ";
//     $data=mysqli_query($conn,$sql);
//     $mamon="";

// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="http://localhost/WEB_FILM/accets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/WEB_FILM/accets/css/datve.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đặt Vé Xem Phim</title>
   
</head>

<body>
    <form action="datve.php" method="post">
        <div class="form-datve">
            <div class="dialog-header" style="display: flex; justify-content: space-between;">
                <span class="dialog-title " >Chọn vé xem phim</span>
                <div ><?php
                    //     $email = $_GET['email'];
                    //     $sql= "select * from khachhang where email = '$email'";
                    //     $data = executeResult($sql);
                    //     foreach($data as $item){
                    //         echo '<button type="button" >
                    //     <span ><a href="
                    //     ../index.php?email='.$item['email'].'";
                    //     ">x</a></span>
                    // </button>
                            
                    //  ';
                    //     }
                        ?>
                    
                </div>
            </div>
            <br><br><br>
            <div class="dialog-content">
                <dat-ve-guest-modal >
                    <div style="display: flex; gap: 1rem; justify-content: space-around;">
                        <div class="row">
                            <?php
                            $id = $_GET['maphim'];
                            $id1 = $_GET['ngaychieu'];
                            require_once('../database/connectDB.php');
                            require_once('../database/dbhelper.php');
                            $sql = "SELECT * FROM phim
                        INNER JOIN phongxem ON phim.maphong = phongxem.maphong
                        WHERE phim.maphong  ='$id' and ngaychieu='$id1'";
                            $data = executeResult($sql);
                            foreach ($data as $row) {
                                echo '
                            <div style="text-align: center;">
                            <input style="margin: 0px; color: black; border: none; font-weight: 600;" type="button" name="tenphim" value="' . $row['tenphim'] . '" disabled>
                            <input style="margin: 0px; color: black; border: none; font-weight: 600;" type="button" name="tenphong" value="' . $row['tenphong'] . '" disabled>
                            <h5 style="margin: 5px;">Suất chiếu:
                            <input style="margin: 0px; color: black; border: none; font-weight: 600;" type="button" name="ngaychieu" value="' . $row['ngaychieu'] . '" disabled>
                           Giờ xem: <input style="margin: 0px; color: black; border: none; font-weight: 600;" type="button" name="gioxem" value="' . $row['gioxem'] . '" disabled>
                            Giá vé:<input style="margin: 0px; color: black; border: none; font-weight: 600;" type="button" name="giave" value="' . $row['giave'] . '" disabled>
                            
                            </div><hr>';
                            }
                            ?>
                            <br><br>
                            <div class=" col-thongtin" >
                               
                                <div class="">
                                    <div class="form-group" >
                                        <?php
                                        $email=$_GET['email'];
                                        $sql ="SELECT DISTINCT * FROM khachhang where email = '$email'";
                                        $data1 = executeResult($sql);
                                        foreach($data1 as $row){
                                             echo'
                                        <label for="Email" >Thông Tin Khách hàng</label>
                                        <input name="hoten" maxlength="200" placeholder="Enter content..." value="'.$row['hoten'].'" >
                                        <input name="email" type="email" maxlength="200" placeholder="Nhập email khách hàng" value="'.$row['email'].'">
                                        <input name="sdt" maxlength="20" placeholder="Nhập SĐT" value="'.$row['sdt'].'">
                                        <label for="Email" >Ngày Đặt Vé</label>
                                        <input type="date" name="ngaydat" maxlength="20" placeholder="Nhập Ngày Đặt Vé Của Hiện Tại" >
                                        <div class="thoi-gian-xem">
                                        <button type="submit" name="btn-submit" class="btn-datve">Đặt vé</button>
                                        <button style="color= #fff;" class="btn-time" type="submit"><a  href="http://localhost/WEB_FILM/index.php?email=' . $row['email'] . ' ">Trở lại</a></button>
                                        </div>
                                        ';
                                        }
                                       
                                        ?>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <?php
                                        $maphim=$_GET['maphim'];
                                        $ngaychieu =$_GET['ngaychieu'];
                                        $tenphong =$_GET['tenphong'];
                                        $gioxem =$_GET['gioxem'];
                                        $sql ="SELECT DISTINCT * FROM phim,phongxem where gioxem= '$gioxem' and  maphim = '$maphim' and ngaychieu = '$ngaychieu' and tenphong ='$tenphong'";
                                        $data1 = executeResult($sql);
                                        foreach($data1 as $row){
                                             echo'
                                        <label for="Email" >Thông Tin Vé</label>
                                        <input name="tenphim" maxlength="200" placeholder="Enter content..." value="'.$row['tenphim'].'" >
                                        <input name="tenphong" type="text" maxlength="200" placeholder="Nhập email khách hàng" value="'.$row['tenphong'].'">
                                        <input name="gioxem" maxlength="20" placeholder="Nhập SĐT" value="'.$row['gioxem'].'">
                                        <input name="ngaychieu" maxlength="20" placeholder="Nhập SĐT" value="'.$row['ngaychieu'].'">
                                        
                                        ';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group" >
                                          <label for="maghe">Mã Ghế</label>
                                        <select class="title-ghe" name="maghe" id="">
                                        <?php
                                        $sql = "SELECT DISTINCT maghe FROM ghexem";
                                        $data = executeResult($sql);
                                        foreach($data as $row){
                                            echo '
                                            <option value="'.$row['maghe'].'">'.$row['maghe'].'</option> 
                                            ';
                                        }
                                        ?>
                                          </select>
                                         
                                          <label for="tenghe">Số ghế</label>
                                        <select class="title-ghe" name="tenghe" id="">
                                        <?php
                                        $sql = "SELECT tenghe FROM ghexem ";
                                        $data = executeResult($sql);
                                        foreach($data as $row){
                                            echo '
                                            
                                            <option value="'.$row['tenghe'].'">'.$row['tenghe'].'</option>
                                             
                                            '; 
                                        }
                                        ?>
                                          
                                        </select>
                                        <label for="sove">Số Vé</label>
                                        <input name="sove" maxlength="20" placeholder="Nhập Số Vé" >
                                    </div>
                                </div>
                            </div>
                            <!---->
                           
                        </div>
                    </div>
                </dat-ve-guest-modal>
                <br><br>
                
                <?php
                $id=$_GET['email'];
                $tenphim=$_GET['tenphim'];
                
                $ngaychieu=$_GET['ngaychieu'];
                $gioxem=$_GET['gioxem'];
                $count="";
            if(isset($_POST['btn-submit'])){
               $count++;
                $id = $_SESSION['email']=$email;
            $ngaydat=$_POST['ngaydat'];
	        $hoten=$_POST['hoten'];
            $email=$_POST['email'];
            $sdt=$_POST['sdt'];
            $maghe=$_POST['maghe'];
            $tenghe=$_POST['tenghe'];
            $sove=$_POST['sove'];
            $gioxem=$_POST['gioxem'];
            $tenphim=$_POST['tenphim'];
            $tenphong=$_POST['tenphong'];
            $ngaychieu=$_POST['ngaychieu'];
            $sql="INSERT INTO datve VALUES ('$count++','$hoten','$email','$sdt','$ngaydat','$maghe','$tenghe','$sove','$gioxem','$tenphim','$tenphong','$ngaychieu')";
            execute($sql);
            $id=$_POST['email'];
            $id=$email;
            $email =$_GET['email'];
            echo '<script language="javascript">
                alert("Bạn đặt vé thành công!");
                window.location = "thongtinve.php?email='.$id.'";
             </script>';
}
else
{
    $sql="SELECT * FROM ghexem,phongxem,phim
    ";
    $data=executeResult($sql);
    

}
?>
            </div>
        </div>
    </form>
</body>

</html>