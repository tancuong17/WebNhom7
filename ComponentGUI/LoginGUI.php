<body class="h-100">
    <div class="container h-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
            <div class="col-lg-5 m-2 border rounded-lg shadow p-3">
                <form method="post" action="">
                    <input class="form-control" type="hidden" name="parameter" value="login">
                    <div class="row">
                        <div class="col-sm-12">
                            <input class="form-control mb-2 pt-4 pb-4" type="text" id="idStudent" name="idStudent" placeholder="Mã sinh viên...">
                            <p id="wrongIdStudent"></p>
                        </div>
                        <div class="col-sm-12">
                            <input class="form-control mb-2 pt-4 pb-4" type="password" id="password" name="password" placeholder="Mật khẩu...">
                            <p id="wrongPassword"></p>
                            <?php
                                if(isset($_SESSION['checkLogin']) && $_SESSION['checkLogin'] == "false")
                                    echo"<p>Tài khoản hoặc mật khẩu không chính xác!</p>"
                            ?>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary mb-2 btn-block btn-lg" id="login" type="submit">Đăng nhập</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary mb-2 btn-lg btn-success btn-block" type="button" id="createAccount">Tạo tài khoản mới</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Tạo tài khoản mới</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="">
                        <input class="form-control mb-2 pt-4 pb-4" type="hidden" name="parameter" value="createAccount">
                        <input class="form-control mb-2 pt-4 pb-4" type="text" name="newIdStudent" id="newIdStudent" placeholder="Mã số sinh viên...">
                        <p id="wrongNewIdStudent"></p>
                        <input class="form-control mb-2 pt-4 pb-4" type="text" name="newNameStudent" id="newNameStudent" placeholder="Họ và tên...">
                        <p id="wrongNewNameStudent"></p>
                        <input class="form-control mb-2 pt-4 pb-4" type="password" name="newPassword" id="newPassword" placeholder="Mật khẩu...">
                        <p id="wrongNewPassword"></p>
                        <button class="btn btn-success btn-block btn-lg" id="createAccountBtn" type="submit">Tạo tài khoản mới</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn bg-danger text-white" data-dismiss="modal" aria-label="Close">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</body>
