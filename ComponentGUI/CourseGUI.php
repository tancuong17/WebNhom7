<body>
    <header id="header">
        <img src="../StudentSystem/Images/Logo_IUH.png" alt="Logo" id="logo">
        <div id="iconContainer">
            <img src="../StudentSystem/Images/bell.svg" alt="Icon" id="notificationBtn">
            <span></span>
            <img src="../StudentSystem/Images/user.svg" alt="Icon" id="userBtn">
            <span id="nameUser"><?php echo $_SESSION['nameStudent']?></span>
            <a href="?parameter=logout"><img src="../StudentSystem/Images/log-out.svg" alt="Icon"></a>
        </div>
    </header>
    <div class="container-fluid mt-5 pt-5 h-auto">
        <div class="row m-1 pt-3 pb-3">
            <div class="col-sm-4 bg-info"></div>
            <div class="col-sm-4">
                <h4 class="text-center">
                    <?php
                        $id = $_GET['id'];
                        $query = "SELECT tenMonHoc, tenLopHoc from monhoc where maMonHoc = '$id'";
                        $queryConnect=mysqli_query($connectDB, $query);
                        $arrayResult = mysqli_fetch_array($queryConnect);
                        echo"$arrayResult[0]<br>$arrayResult[1]"
                    ?></h4>
            </div>
            <div class="col-sm-4 bg-info"></div>
        </div>
        <div class="row border ml-1 mr-1 pt-3 pb-3">
            <div class="col-12">
                <h4>ĐIỂM DANH</h4>
            </div>
        </div>
        <?php
            $id = $_GET['id'];
            $idStudent = $_SESSION['idStudent'];
            $query = "SELECT * from diemdanh where maMonHoc = '$id' and maSinhVien = '$idStudent'";
            $queryConnect=mysqli_query($connectDB, $query);
            while($arrayResult = mysqli_fetch_array($queryConnect))
            {
                $idDiemDanh = $arrayResult['maDiemDanh'];
                $thoiGian = date_create($arrayResult['ngayDiemDanh']);
                $thoiGianDiemDanh = date_create($arrayResult['thoiGianDiemDanh']);
                $thoiGianformat = date_format($thoiGian,"d/m/Y");
                $thoiGianDiemDanhformat = date_format($thoiGianDiemDanh,"H:i");
                $thoiGianformat2 = date_format($thoiGian,"H:i");
                $trangthai = $arrayResult['trangThai'];
                echo"<form action='' method='POST'>
                        <input class='form-control' type='hidden' name='parameter' value='kiemTraDiemDanh'>
                        <input class='form-control' type='hidden' name='idDiemDanh' value='$idDiemDanh'>
                        <div class='row ml-1 mr-1 pt-3 pb-3 border-bottom border-left border-right'>
                            <div class='col-sm-3'>
                                <p>Thời gian: $thoiGianformat($thoiGianformat2 - $thoiGianDiemDanhformat)</p>
                            </div>
                            <div class='col-sm-3'>
                                <p>Trạng thái: $trangthai</p>
                            </div>
                            <div class='col-sm-6'>
                                <div class='row'>";
                if($trangthai == "Chưa điểm danh")
                {
                    echo"
                        <div class='col-6'>
                            <input class='form-control' type='text' placeholder='Mã điểm danh....' name='maDiemDanh'>";
                    if(isset($_SESSION['ktDiemDanh']) && $_SESSION['ktDiemDanh'] == "false")
                        echo"Mã điểm danh không chính xác!";
                        echo"</div>
                        <div class='col-6'>
                            <button class='btn btn-primary' type='submit'>Điểm danh</button>
                        </div>
                    ";
                }
                else
                    echo"
                        <div class='col-6'>
                            
                        </div>
                        <div class='col-6'>
                            
                        </div>
                    ";
                echo"    
                                </div>
                            </div>
                        </div>
                    </form>";
            }
        ?>
        <div class="row border ml-1 mr-1 mt-3 pt-3 pb-3">
            <div class="col-12">
                <h4>BÀI TẬP NGOẠI KHÓA</h4>
            </div>
        </div>
        <?php
            $id = $_GET['id']; 
            $idStudent = $_SESSION['idStudent'];
            $query = "SELECT * from baitapngoaikhoa where maMonHoc = '$id' and maSinhVien = '$idStudent'";
            $queryConnect=mysqli_query($connectDB, $query);
            while($arrayResult = mysqli_fetch_array($queryConnect))
            {
                $idBaiTap = $arrayResult['maNgoaiKhoa'];
                $tenBaiTap = $arrayResult['tenNgoaiKhoa'];
                $trangthai = $arrayResult['trangThaiBaiTap'];
                echo"
                <form action='' method='POST'>
                    <input class='form-control' type='hidden' name='parameter' value='nopBai'>
                    <input class='form-control' type='hidden' name='idBaiTap' value='$idBaiTap'>
                    <div class='row ml-1 mr-1 pt-3 pb-3 border-bottom border-left border-right'>
                        <div class='col-sm-3'>
                            <p>Tên ngoại khóa: $tenBaiTap</p>
                        </div>
                        <div class='col-sm-3'>
                            <p>Trạng thái: $trangthai</p>
                        </div>
                        <div class='col-sm-6'>
                            <div class='row'>";
                if($trangthai == "Chưa nộp")
                    echo"
                        <div class='col-7'>
                            <input class='form-control' type='text' name='filename' placeholder='Đường dẫn bài tập...'>
                        </div>
                        <div class='col-5'>
                            <button class='btn btn-primary' type='submit'>Nộp bài</button>
                        </div>
                        ";
                else
                    echo"
                        <div class='col-7'>
                            
                        </div>
                        <div class='col-5'>
                            
                        </div>
                    ";
                echo"
                            </div>
                        </div>
                    </div>
                    </form>";
            }
        ?>
        <?php
            $id = $_GET['id'];
            $idStudent = $_SESSION['idStudent'];
            $query = "SELECT count(*) from loptruong where maMonHoc = '$id' and maSinhVien = '$idStudent'";
            $queryConnect=mysqli_query($connectDB, $query);
            $arrayResult = mysqli_fetch_array($queryConnect);
            if($arrayResult[0] == 1)
            {
                $query1 = "SELECT * 
                FROM phatbieu INNER JOIN sinhvien ON phatbieu.maSinhVien = sinhvien.maSinhVien where maMonHoc = '$id'";
                $queryConnect1 = mysqli_query($connectDB, $query1);
                echo" <div class='row border ml-1 mr-1 mt-3 pt-3 pb-3'>
                        <div class='col-12'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <h4>CẬP NHẬT PHÁT BIỂU</h4>
                                </div>
                            </div>
                            <div class='row'>
                            <div class='col-12 vh-100 overflow-auto'>";
                while($arrayResult1 = mysqli_fetch_array($queryConnect1))
                {
                    $tenSinhVien = $arrayResult1['hoTenSinhVien'];
                    $maSinhVien = $arrayResult1['maSinhVien'];
                    $soPhatBieu = $arrayResult1['soLanPhatBieu'];
                    $count = 1;
                    echo"
                    <form action='' method='POST'>
                                <input class='form-control' type='hidden' name='parameter' value='capNhatPhatBieu'>
                                <input class='form-control' type='hidden' name='maSinhVien' value='$maSinhVien'>
                                <div class='row m-1 pt-3 pb-3 border'>
                                    <div class='col-md-2 pt-1'>
                                        <p>Họ và tên: $tenSinhVien</p>
                                    </div>
                                    <div class='col-md-3 pt-1'>
                                        <p>Mã số sinh viên: $maSinhVien</p>
                                    </div>
                                    <div class='col-md-4 pt-1'>
                                        <div class='row'>
                                            <div class='col-md-4'>
                                                <span>Số phát biểu: </span>
                                            </div>
                                            <div class='col-2'>
                                                <button class='btn btn-primary pl-3 pr-3' type='button' id='btnt$count'>-</button>
                                            </div>
                                            <div class='col-4'>
                                                <input class='form-control' type='text' name='soPhatBieu' id='$count' disabled value='$soPhatBieu'>
                                            </div>
                                            <div class='col-2'>
                                                <button class='btn btn-primary' type='button' id='btnc$count'>+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-3 pt-1'>
                                        <button class='btn btn-block btn-primary' type='submit' id='cn$count'>Cập nhật</button>
                                    </div>
                                </div>
                                </form>
                        ";
                    $count = $count + 1;
                }
                  echo"      
                    </div>
                </div>
                </div>
                </div>";
                
            }
        ?>
    <section class="footer">
        <h5>&copy2022 - All Rights Reserved by Nhom7</h5>
    </section>
</body>