<?php session_start()?>
<?php
require "layout/header.php"; ?>
<!-- end header -->

<!-- slider area -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="false">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="banner" style="background-image: url('https://cinemaxvp.vn/Media/Film/Background_54bf70e0-382f-4e3f-812f-7cb2216ae450.jpg')"></div>
             
            </div>
            
            <div class="carousel-item ">
              <div class="banner" style="background-image: url('https://cinemaxvp.vn/Media/Film/Background_b8fd54b0-196d-4015-ba7a-6b6f29742a9d.jpg')"></div>
              
            </div>

            <div class="carousel-item ">
              <div class="banner" style="background-image: url('https://cinemaxvp.vn/Media/Film/Background_6b9a52c0-d618-4c9f-b659-ed2c7c636d54.jpg')"></div>
              
            </div>
            <div class="carousel-item ">
              <div class="banner" style="background-image: url('https://cinemaxvp.vn/Media/Film/Background_a1d4a54a-378b-4527-89e6-51f3b2a5490a.png')"></div>
              
            </div>
            <div class="carousel-item ">
              <div class="banner" style="background-image: url('https://cinemaxvp.vn/Media/Film/Background_a066593b-7fb3-4c8b-b574-e44244660519.jpg')"></div>
              
            </div>
            <div class="carousel-item ">
              <div class="banner" style="background-image: url('https://cinemaxvp.vn/Media/Film/Background_91f818f3-39ac-47dd-b1a9-ca1e283ce1fe.jpg')"></div>
              
            </div>
            <div class="carousel-item ">
              <div class="banner" style="background-image: url('https://cinemaxvp.vn/Media/Film/Background_28f0b994-3239-49b1-9b9d-663f89362a2e.jpg')"></div>
              
            </div>

          </div>


          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 

<div class="container">
  <div class="grid">
    <h3 class="container-title">Phim đang chiếu</h3>
    <div style="display: flex;  align-items: center;gap:1rem">
    <?php
           require_once('./database/connectDB.php');
           require_once('./database/dbhelper.php');
           $sql ="SELECT DISTINCT ngaychieu FROM phim";
           $data1 = executeResult($sql);
           $email=$_GET['email'];
           foreach($data1 as $row){
               echo '
               <div class=".current-time" style=" font-size: 1.8rem;
               font-weight: 500;
               background: #fff;
               border-color: #2196f3;
               color: #2196f3;"><button type="submit" name="btn-chonngay"><a href="./index.php?ngaychieu=' . $row['ngaychieu'] . ' &email='.$email.' ">'.$row['ngaychieu'].'</a></button></div>
              ';
           }
    ?><hr>
   </div>
    <div class="p-tabview-panels">
  
  </div>
  <div class="tab-menu">
  <div class="select-box">
    <select class="select" name="thutu" id="">
      <option value="Chọn sắp xếp">Chọn sắp xếp</option>
      <option value="Ngày diễn từ cao đến thấp">Ngày diễn từ cao đến thấp</option>
      <option value="Ngày diễn từ thấp đến cao">Ngày diễn từ thấp đến cao</option>
    </select>
  </div>
  <div class="tab-input-search">
    <input type="search" class="input-search-film" placeholder="Tìm kiếm tên">
  </div>
</div>
<?php
  require_once('./database/connectDB.php');
  require_once('./database/dbhelper.php');


?>

<div class="col-film">
  <?php
  $ngaychieu = $_GET['ngaychieu'];
  $sql ="SELECT * FROM `phim` 
  INNER JOIN phongxem on phim.maphong =phongxem.maphong
  WHERE ngaychieu = '$ngaychieu' ORDER BY ngaychieu = '$ngaychieu' ASC";
  $data =executeResult($sql);
  $email=$_GET['email'];
  foreach($data as $item){
  echo'
  <div class="col-film-page">
    <div class="col-film-1">
      <img class="img-film" src="http://localhost/WEB_FILM/accets/img/' . $item['img'] . ' " alt="">
    </div>
    <div class="col-film-2">
      <div class="row">
      <h3>'.$item['tenphim'].' - '.$item['tenphong'].'</h3>
      </div>
      <ul class="blog-info">
          <li>
          <i _ngcontent-bpw-c105="" class="fa fa-tags"></i>
          '.$item['title'].'
          </li>
          <li>
          '.$item['phut'].' Phút
          </li>
        </ul> 
         <div class="thoi-gian-xem">
        <button style="color= #fff;" class="btn-time" type="submit"><a  href="./layout/datve.php?maphim=' . $item['maphim'] . ' &ngaychieu=' . $item['ngaychieu'] . '&email=' . $email . '&tenphim=' . $item['tenphim'] . '&tenphong=' . $item['tenphong'] . '&gioxem=' . $item['gioxem'] . '">Đặt Vé</a></button>
        </div>
      </div>
    </div>
    </div>  
        ';
         }
        ?>
  
    <hr>
</div>
  </div>
<footer>
  <div class="grid">
    <img style="width: 300px;" src="accets/img/logo.png" alt="">
  </div>
  
</footer>
<script>
    var curDate = new Date();
      
    // Ngày hiện tại
    var curDay = curDate.getDate();
 
    // Tháng hiện tại
    var curMonth = curDate.getMonth() + 1;
      
    // Năm hiện tại
    var curYear = curDate.getFullYear();
 
    // Gán vào thẻ HTML
    document.getElementById('current-time').innerHTML = curDay + "/" + curMonth + "/" + curYear;
</script>
</body>
</html>
