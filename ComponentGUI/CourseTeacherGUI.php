<body>
    <header id="header">
        <img src="../StudentSystem/Images/Logo_IUH.png" alt="Logo" id="logo">
        <div id="iconContainer">
            <?php
                if($_SESSION['typeAccount'] == "Giảng Viên")
                    echo"<a href='?parameter=addCourse'><img src='../StudentSystem/Images/plus-circle.svg' alt='Icon' id='addBtn'></a>";
            ?>
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
                <h4 class="text-center">PHÁT TRIỂN ỨNG DỤNG<br>DHTH15K</h4>
            </div>
            <div class="col-sm-4 bg-info"></div>
        </div>
        <div class="row border ml-1 mr-1 pt-3 pb-3">
            <div class="col-12">
                <h4>MỞ ĐIỂM DANH</h4>
            </div>
        </div>
        <div class="row ml-1 mr-1 pt-3 pb-3 border-bottom border-left border-right">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-6">
                        <p>Thời gian bắt đầu:</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="time" name="">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-6">
                        <p>Thời gian kết thúc:</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="time" name="">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-7">
                        <input class="form-control" type="text" name="" placeholder="Mã điểm danh...">
                    </div>
                    <div class="col-5">
                        <button class="btn btn-primary" type="button">Mở điểm danh</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border ml-1 mr-1 mt-3 pt-3 pb-3">
            <div class="col-12 vh-100 overflow-auto">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>THỐNG KÊ</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row m-1 pt-2 pb-2 border">
                            <div class="col-sm-3">
                                <p>Họ và tên: Nguyễn Hoàng Đức</p>
                            </div>
                            <div class="col-sm-2">
                                <p>Mã số: 19486527</p>
                            </div>
                            <div class="col-sm-2">
                                <p>Số điểm danh: 10</p>
                            </div>
                            <div class="col-sm-2">
                                <p>Số phát biểu: 7</p>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-8">
                                        <select class="form-control" id="sel1">
                                            <option value="https://www.youtube.com/watch?v=P9TkJyKcGBQ">Tham quan công ty FPT</option>
                                            <option value="https://www.youtube.com/watch?v=8Js4JKCOdFw">Tham quan công ty VNPT</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" id="1">Tải về</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row m-1 pt-2 pb-2 border">
                            <div class="col-sm-3">
                                <p>Họ và tên: Nguyễn Công Phượng</p>
                            </div>
                            <div class="col-sm-2">
                                <p>Mã số: 19486527</p>
                            </div>
                            <div class="col-sm-2">
                                <p>Số điểm danh: 10</p>
                            </div>
                            <div class="col-sm-2">
                                <p>Số phát biểu: 7</p>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-8">
                                        <select class="form-control" id="sel2">
                                            <option value="https://www.youtube.com/watch?v=P9TkJyKcGBQ">Tham quan công ty FPT</option>
                                            <option value="https://www.youtube.com/watch?v=8Js4JKCOdFw">Tham quan công ty VNPT</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" id="2">Tải về</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border ml-1 mr-1 mt-3 pt-3 pb-3">
            <div class="col-12">
                <h4>CẤP QUYỀN LỚP TRƯỞNG</h4>
            </div>
        </div>
        <div class="row ml-1 mr-1 pt-3 pb-3 border-bottom border-left border-right">
            <div class="col-sm-10 mb-1 mt-1">
                <div class="row">
                    <div class="col-sm-3">
                        <p>Mã số sinh viên: </p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="">
                    </div>
                </div>
            </div>
            <div class="col-sm-2 mb-1 mt-1">
               <button class="btn btn-block btn-primary" type="button">Cấp quyền</button>
            </div>
        </div>
        <div class="row border ml-1 mr-1 mt-3 pt-3 pb-3">
            <div class="col-12">
                <h4>THÊM BÀI TẬP NGOẠI KHÓA</h4>
            </div>
        </div>
        <div class="row ml-1 mr-1 pt-3 pb-3 border-bottom border-left border-right">
            <div class="col-sm-10 mb-1 mt-1">
                <div class="row">
                    <div class="col-sm-3">
                        <p>Tên bài tập ngoại khóa: </p>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="">
                    </div>
                </div>
            </div>
            <div class="col-sm-2 mb-1 mt-1">
               <button class="btn btn-block btn-primary" type="button">Thêm</button>
            </div>
        </div>
    </div>
    <section class="footer">
        <h5>&copy2022 - All Rights Reserved by Nhom7</h5>
    </section>
</body>