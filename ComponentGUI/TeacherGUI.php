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
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-12 pt-5 pl-4 pr-4 pb-5">
                <div class="row border-left border-top border-right">
                    <div class="col-sm-12">
                        <h4 class="pt-3 pb-3">DANH SÁCH HỌC PHẦN</h4>
                    </div>
                </div>
                <div class="row border">
                    <?php
                        include("DatabaseControl/CourseController.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
    <section class="footer">
        <h5>&copy2022 - All Rights Reserved by Nhom7</h5>
    </section>
    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Thông báo</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-2">
                            <img class="img-fluid" src="../WebNhom7/message-square.svg" alt="Image">
                        </div>
                        <div class="col-10 p-0">
                            <p>Bạn vừa nộp bài tập ngoại khóa: Tham quan bảo tàng Quang Trung</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div id="my-modal-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Thông tin sinh viên</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <img class="img-fluid mx-auto d-block rounded-circle" src="../WebNhom7/user.png" alt="User">
                        </div>
                        <div class="col-9">
                            <h5>Họ và tên: Nguyễn Công Phượng</h5>
                            <p>Mã số sinh viên: 19456875</p>
                            <form method="get" action="">
                                <input class="form-control" type="hidden" name="parameter" value="changePassword">
                                <button class="btn btn-primary" type="submit">Đổi mật khẩu</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="get" action="">
                        <input class="form-control" type="hidden" name="parameter" value="logout">
                        <button class="btn btn-danger">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>