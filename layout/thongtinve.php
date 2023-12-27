                            
                            <?php
                            $id = $_GET['email'];
                            
                            require_once('../database/connectDB.php');
                            require_once('../database/dbhelper.php');
                            $sql = "SELECT * FROM datve
                        
                        WHERE email  ='$id' ";
                            $data = executeResult($sql);
                            foreach ($data as $row) {
                                echo '
                                <div class="col-md-3 col-xd-6">
                                <fieldset style="min-height: 100px; width: 100%;">
                                    <legend><b>Thông tin vé</b></legend>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div style="text-align: center;" class="">
                                                <h3 style="margin: 0px;">' . $row['tenphim'] . ' - ' . $row['tenphong'] . '</h3>
                                                <h5 style="margin: 5px;">Suất chiếu: ' . $row['ngaychieu'] . ' - '.$row['gioxem'].' </h5>
                                                <h5 style="margin: 5px;">Hàng Ghế: ' . $row['maghe'] . ' - Số Ghế: '.$row['tenghe'].' </h5>
                                                <h5 style="margin: 5px;">Số vé: ' . $row['sove'] . '  </h5>
                                                <h5 style="margin: 5px;">Khách Hàng: ' . $row['hoten'] . ' - 0' . $row['sdt'] . ' </h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <button style="color= #fff;" class="btn-time" type="submit"><a  href="http://localhost/WEB_FILM/index.php?email=' . $row['email'] . ' ">Trở lại</a></button>
                            </div>';
                            }
                            ?>
                          