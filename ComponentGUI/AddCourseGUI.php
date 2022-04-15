<body>
    <header id="header">
        <img src="../StudentSystem/Images/Logo_IUH.png" alt="Logo" id="logo">
        <div id="iconContainer">
            <a href="?parameter=addCourse"><img src="../StudentSystem/Images/plus-circle.svg" alt="Icon" id="addBtn"></a>
            <img src="../StudentSystem/Images/bell.svg" alt="Icon" id="notificationBtn">
            <span></span>
            <img src="../StudentSystem/Images/user.svg" alt="Icon" id="userBtn">
            <span id="nameUser"><?php echo $_SESSION['nameStudent']?></span>
            <a href="?parameter=logout"><img src="../StudentSystem/Images/log-out.svg" alt="Icon" id="logOutBtn"></a>
        </div>
    </header>
    <div class="container-fluid mt-5 pt-5 vh-100">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="row border ml-1 mr-1 mt-3 pt-3 pb-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>THÊM HỌC PHẦN</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p>Nhập tên học phần:</p>
                        </div>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nameCourse">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p>Nhập tên lớp học phần:</p>
                        </div>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nameClass">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p>Ngày bắt đầu:</p>
                        </div>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" name="startDay">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p>Ngày kết thúc:</p>
                        </div>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" name="endDay">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p>Danh sách sinh viên:</p>
                        </div>
                        <div class="col-sm-10">
                            <input class="form-control pb-5" type="file" name="file">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <button class="btn btn-block btn-lg btn-primary" type="submit" name="ok">Hoàn thành</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <section class="footer">
        <h5>&copy2022 - All Rights Reserved by Nhom7</h5>
    </section>
</body>