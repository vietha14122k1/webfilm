<?php
    $conn=mysqli_connect("localhost","root","","web-film");
    if(isset($_POST['delete'])){
        $id=$_POST['email'];
        $sql="DELETE FROM datve WHERE email='$id'";
        mysqli_query($conn,$sql);
        echo 'Xóa thông tin thành công!';
    }
?>