<?php
session_start();
 require "./header.php";
   require_once('../database/connectDB.php');
   require_once('../database/dbhelper.php');
     ?>

     <div class="grid">
      <div class="container">
      <div class="container-search">
          <form action="" method="post">
          <input type="text" name="email" class="input-seach">
          <button name="btnSearch" class="button-seach">Tìm Kiếm</button>
          </form>
        </div>
      </div>
      <div class="container-table">
        <table class="table" border="1" cellpadding="15">
        <thead>  <tr>
          <th>STT</th>
				  <th>Họ Tên</th>
				  <th>Email</th>
				  <th>SĐT</th>
				  <th>Ngày Đặt</th>
        <th>Hàng Ghế</th>
				<th>Tên Ghế</th>
				<th>Số Vé</th>
				<th>Giờ Xem</th>
        <th>Tên Phim,</th>
				<th>Tên Phòng</th>
				<th>Ngày Chiếu</th>
				<th></th>
				<th></th>
        </tr></thead>
          <tbody>
          <?php   $conn=mysqli_connect("localhost","root","","web-film");

$email="";

if(isset($_POST['btnSearch'])){
    $email=$_POST['email'];
    $sql1='SELECT * FROM datve WHERE email like "%'.$email.'%" or hoten like "%'.$email.'%" or sdt like "%'.$email.'%" or ngaydat like "%'.$email.'%" or tenphong like "%'.$email.'%"';
    $data= 
    mysqli_query($conn,$sql1);
}
else
{
    $sql="Select * From datve";
    $data=
    mysqli_query($conn,$sql);
    $email="";

}?>
				<?php
        $count=""; 
				foreach ($data as $row) {
          $count++;
				 	echo '<tr>
           <td>'.$count.'</td>
		   			<td>'.$row['mave'].'</td>
					<td>'.$row['hoten'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['sdt'].'</td>
					<td>'.$row['ngaydat'].'</td>
          <td>'.$row['maghe'].'</td>
					<td>'.$row['tenghe'].'</td>
					<td>'.$row['sove'].'</td>
					<td>'.$row['gioxem'].'</td>
          <td>'.$row['tenphim'].'</td>
					<td>'.$row['tenphong'].'</td>
					<td>'.$row['ngaychieu'].'</td>
					<td><button class="btn-warning" name="edit" onClick=
					\'window.open("suave.php?id='.$row['email'].'","_seft")\'>Edit</button></td>
					<td><button class="btn-danger" name="delete" onClick="deleteve('.$row['email'].')">Delete</button></td>
					</tr>';
				 } 

				?>
				<script type="text/javascript">
					function deleteve(id){
					option=confirm('Bạn có chắc chắn xóa không?');
			            if(!option){
			                return;
			            }
			            $.post('deletevephim.php',{
			                'email':id
			            }, function(data){
			                alert(data)
			                location.reload()
			            })
					}
				</script>


			  </tbody>
        </table>
      </div>
     </div>
</body>
</html>