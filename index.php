<?php
	session_start();
    include("DatabaseControl/ConnectDatabase.php");
    include("DatabaseControl/AccountCotroller.php");
    require("Classes/PHPExcel.php");
?> 
<!DOCTYPE html>
<html class="h-100" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
        if(!isset($_SESSION['checkLogin']))
            echo"Đăng nhập hoặc đăng kí";
        else
            echo"Trang chủ";
    ?>
    </title>
    <link rel="shortcut icon" href="../StudentSystem/Images/icon-iuh.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<style>
    *
    {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #header
    {
        width: 100%;
        height: 5rem;
        padding: 0.5rem;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
        display: flex;
        justify-content: space-between;
        background-color: white;
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.1);
    }
    #iconContainer
    {
        line-height: 4rem;
    }
    #iconContainer img
    {
        padding: 0.2rem;
    }
    #listCourseContainer
    {
        width: 100%;
        margin-top: 6rem;
    }
    #listCourseContainer h2, #listActivityContainer h2
    {
        border-left: 0.5rem solid rgb(10, 6, 24);
    }
    #listCourse
    {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
        gap:1.5rem;
        padding: 2rem 1%;
    }
    .course
    {
        border: rgba(0,0,0,.1) 1px solid;
        border-radius: 10px;
        box-shadow: 0.5rem 0.5rem 0.5rem rgba(0,0,0,.1);
    }
    .course img
    {
        width: 100%;
        border-radius: 10px 10px 0 0;
    }
    .course h5
    {
        padding: 0.3rem 0.5rem;
    }
    .course a
    {
        text-decoration: none;
        padding: 0 0.5rem;
        color: rgb(42, 22, 59);
    }
    .course a:hover
    {
        text-decoration: none;
        padding: 0 0.5rem;
        color: rgb(144, 46, 230);
    }
    .footer
    {
        width: 100%;
        height: 4rem;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 1.5rem 0 0 0;
        text-align: center;
        background-color: rgb(10, 6, 24);
        color: aliceblue;
    }
    @media (max-width:600px){
        #nameUser
        {
            display: none;
        }
    }
</style>
<?php
    if(isset($_SESSION['checkLogin']) && $_SESSION['checkLogin'] == "false")
        include("ComponentGUI/LoginGUI.php");
    else if(isset($_SESSION['checkLogin']) && $_SESSION['checkLogin'] == "true")
    {
        if($_SESSION['typeAccount'] == "Sinh Viên")
        {
            if(isset($_GET['parameter']) && $_GET['parameter'] == "detailCourse")
                include("ComponentGUI/CourseGUI.php");
            else
                include("ComponentGUI/StudentGUI.php");
        }
        else if($_SESSION['typeAccount'] == "Giảng Viên")
        {
            if(isset($_GET['parameter']) && $_GET['parameter'] == "detailCourse")
                include("ComponentGUI/CourseTeacherGUI.php");
            else if(isset($_GET['parameter']) && $_GET['parameter'] == "addCourse")
                include("ComponentGUI/AddCourseGUI.php");
            else
                include("ComponentGUI/TeacherGUI.php");
        }
    }
    else
        include("ComponentGUI/LoginGUI.php");   
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $("#createAccount").click(function (e) { 
            $("#my-modal").modal();
        });
        function checkIdStudent() {
            let regexIdStudent = /^[0-9]{8}$/;
            if($("#idStudent").val() == "")
            {
                $("#wrongIdStudent").html("Mã số sinh viên không được để trống!");
                return false;
            }
            else if(!regexIdStudent.test($("#idStudent").val()))
            {
                $("#wrongIdStudent").html("Mã số sinh viên chỉ chứa kí tự số và có độ dài là 8!");
                return false;
            }
            else
            {
                $("#wrongIdStudent").html("");
                return true;
            }
        }
        function checkNewIdStudent() {
            let regexIdStudent = /^[0-9]{8}$/;
            if($("#newIdStudent").val() == "")
            {
                $("#wrongIdStudent").html("Mã số sinh viên không được để trống!");
                return false;
            }
            else if(!regexIdStudent.test($("#newIdStudent").val()))
            {
                $("#wrongIdStudent").html("Mã số sinh viên chỉ chứa kí tự số và có độ dài là 8!");
                return false;
            }
            else
            {
                $("#wrongIdStudent").html("");
                return true;
            }
        }
        function checkNewIdStudent() {
            let regexIdStudent = /^[0-9]{8}$/;
            if($("#newIdStudent").val() == "")
            {
                $("#wrongNewIdStudent").html("Mã số sinh viên không được để trống!");
                return false;
            }
            else if(!regexIdStudent.test($("#newIdStudent").val()))
            {
                $("#wrongNewIdStudent").html("Mã số sinh viên chỉ chứa kí tự số và có độ dài là 8!");
                return false;
            }
            else
            {
                $("#wrongNewIdStudent").html("");
                return true;
            }
        }
        function checkPassword() {
            let regexPassword = /^[0-9a-zA-Z]{8}$/;
            if($("#password").val() == "")
            {
                $("#wrongPassword").html("Mật khẩu không được để trống!");
                return false;
            }
            else if(!regexPassword.test($("#password").val()))
            {
                $("#wrongPassword").html("Mật khẩu chỉ chứa kí tự số, chữ và có độ dài là 8!");
                return false;
            }
            else
            {
                $("#wrongPassword").html("");
                return true;
            }
        }
        function checkNewPassword() {
            let regexPassword = /^[0-9a-zA-Z]{8}$/;
            if($("#newPassword").val() == "")
            {
                $("#wrongNewPassword").html("Mật khẩu không được để trống!");
                return false;
            }
            else if(!regexPassword.test($("#newPassword").val()))
            {
                $("#wrongNewPassword").html("Mật khẩu chỉ chứa kí tự số, chữ và có độ dài là 8!");
                return false;
            }
            else
            {
                $("#wrongNewPassword").html("");
                return true;
            }
        }
        function checkNameStudent() {
            let regexNameStudent = /^[^0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{1,}$/;
            if($("#newNameStudent").val() == "")
            {
                $("#wrongNewNameStudent").html("Họ và tên không được để trống!");
                return false;
            }
            else if(!regexNameStudent.test($("#newNameStudent").val()))
            {
                $("#wrongNewNameStudent").html("Họ và tên chỉ chứa kí tự chữ!");
                return false;
            }
            else
            {
                $("#wrongNewNameStudent").html("");
                return true;
            }
        }
        $("#idStudent").blur(checkIdStudent);
        $("#newIdStudent").blur(checkNewIdStudent);
        $("#password").blur(checkPassword);
        $("#newPassword").blur(checkNewPassword);
        $("#newNameStudent").blur(checkNameStudent);
        $("#login").click(function (e) { 
            if(checkIdStudent() == false || checkPassword() == false)
                return false;
            else
                return true;
        });
        $("#createAccountBtn").click(function (e) { 
            if(checkNewIdStudent() == false || checkNewPassword() == false || checkNameStudent == false)
                return false;
            else
                return true;
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#notificationBtn").click(function (e) { 
            $("#my-modal").modal();
        });
        $("#userBtn").click(function (e) { 
            $("#my-modal-user").modal();
        });
    });
</script>
<script>
    $(document).ready(function () {
        let soLanPhatBieuBanDau;
        let count = 1;
        $("button").click(function (e) { 
            let idButton = e.target.id;
            let typeButton = e.target.type;
            let check = idButton.substr(0,4);
            if(typeButton == "submit")
            {
                let idInput = idButton.charAt(2);
                $("#" + idInput).prop('disabled', false);
            }
            else
            {
                if("btnt"== check)
                {
                    let idInput = idButton.charAt(4);
                    if(count == 1)
                        soLanPhatBieuBanDau = $("#" + idInput).val();
                    let soPhatBieu =  $("#" + idInput).val();
                    let soLanPhatBieuThem = Number(soPhatBieu) - 1;
                    if(soLanPhatBieuThem > soLanPhatBieuBanDau - 1)
                        $("#" + idInput).val(soLanPhatBieuThem);
                    count = 2;
                }
                else
                {
                    let idInput = idButton.charAt(4);
                    if(count == 1)
                        soLanPhatBieuBanDau = $("#" + idInput).val();
                    let soLanPhatBieu = $("#" + idInput).val();
                    soLanPhatBieu = 1 + Number(soLanPhatBieu);
                    $("#" + idInput).val(soLanPhatBieu);
                    count = 2;
                }
            }
        });
    });
</script>
<?php
    if(isset($_POST['ok']))
    {
        $maGiangVien = $_SESSION['idStudent'];
        $tenLop = $_POST['nameClass'];
        $tenMonHoc = $_POST['nameCourse'];
        $startDay = $_POST['startDay'];
        $endDay = $_POST['endDay'];
        $filename = $_FILES['file']['tmp_name'];
        $objReader = PHPExcel_IOFactory::createReaderForFile($filename);
        $listWorkSheets = $objReader->listWorksheetNames($filename);
        $objReader->setLoadSheetsOnly($tenLop);
        $objExcel = $objReader->load($filename);
        $sheetData = $objExcel->getActiveSheet()->toArray(null, true, true, true);
        $query3 = "Select count(*) from monhoc";
        $queryConnect3 = mysqli_query($connectDB, $query3);
        $arrayResult3 = mysqli_fetch_array($queryConnect3);
        $maMonHoc = $arrayResult3[0] + 1;
        for ($i=2; $i < count($sheetData); $i++) { 
            $maSinhVien = $sheetData[$i]["A"];
            $tenSinhVien = $sheetData[$i]["B"];
            $emailSinhVien = $sheetData[$i]["C"];
            $query1 = "INSERT INTO taikhoan VALUES ('$maSinhVien', '12345678', 'Sinh Viên')";
            $queryConnect1 = mysqli_query($connectDB, $query1);
            $query2 = "INSERT INTO sinhvien VALUES ('$maSinhVien', '$tenSinhVien', '$emailSinhVien')";
            $queryConnect2 = mysqli_query($connectDB, $query2);
           
            $query4 = "INSERT INTO monhoc VALUES ('$maMonHoc', '$tenLop', '$tenMonHoc', '$startDay', '$endDay', '$maGiangVien')";
            $queryConnect4 = mysqli_query($connectDB, $query4);
            $query5 = "INSERT INTO monhoc_sinhvien VALUES ('$maMonHoc', '$maSinhVien')";
            $queryConnect5 = mysqli_query($connectDB, $query5);
            $query6 = "INSERT INTO phatbieu VALUES ('$maMonHoc', '$maSinhVien', 0)";
            $queryConnect6 = mysqli_query($connectDB, $query6);
        }
        echo"<script type='text/javascript'>
                alert('Thêm học phần mới thành công!');
            </script>";
    }
    if(isset($_GET['parameter']) && $_GET['parameter'] == "logout")
    {
        echo"<script type='text/javascript'>
            window.history.back();
        </script>";
    }
    if(isset($_SESSION['detailCourse']) && isset($_GET['parameter']) && $_GET['parameter'] == "detailCourse")
    {
        echo"<script type='text/javascript'>
            window.history.back();
        </script>";
    }
    if(isset($_SESSION['addCourse']) && isset($_GET['parameter']) && $_GET['parameter'] == "addCourse")
    {
        echo"<script type='text/javascript'>
            window.history.back();
        </script>";
    }
    if(isset($_POST['parameter']) && $_POST['parameter'] == "kiemTraDiemDanh")
    {
            $idDiemDanh = $_POST['idDiemDanh'];
            $maDiemDanh = $_POST['maDiemDanh'];
            $query = "SELECT count(*) from diemdanh where maDiemDanh = '$idDiemDanh' and matMaDiemDanh = '$maDiemDanh'";
            $queryConnect=mysqli_query($connectDB, $query);
            $arrayResult = mysqli_fetch_array($queryConnect);
            if($arrayResult[0] == 1)
            {
                $query1 = "UPDATE diemdanh
                            SET trangThai = 'Đã điểm danh'
                            WHERE maDiemDanh = '$idDiemDanh'";
                $queryConnect1 = mysqli_query($connectDB, $query1);
                $_SESSION['ktDiemDanh'] = "true";
            }
            else
            {
                $_SESSION['ktDiemDanh'] = "false";
            }
            echo"<script type='text/javascript'>
            window.history.back();
        </script>";      
    }
    if(isset($_POST['parameter']) && $_POST['parameter'] == "nopBai")
    {
            $idBaiTap = $_POST['idBaiTap'];
            $filename = $_POST['filename'];
            $query1 = "UPDATE baitapngoaikhoa
                        SET trangThaiBaiTap = 'Đã nộp', duongDanBaiTap = '$filename'
                        WHERE maNgoaiKhoa = '$idBaiTap'";
            $queryConnect1 = mysqli_query($connectDB, $query1);
            echo"<script type='text/javascript'>
                window.history.back();
            </script>";
    }
    if(isset($_POST['parameter']) && $_POST['parameter'] == "capNhatPhatBieu")
    {
            $maSinhVien = $_POST['maSinhVien'];
            $soPhatBieu = $_POST['soPhatBieu'];
            $idMonHoc = $_GET['id'];
            $query1 = "UPDATE phatbieu
                        SET soLanPhatBieu = '$soPhatBieu'
                        WHERE maSinhVien = '$maSinhVien' and maMonHoc = '$idMonHoc'";
            $queryConnect1 = mysqli_query($connectDB, $query1);
            echo"<script type='text/javascript'>
                window.history.back();
            </script>";
    }
    if(isset($_SESSION['checkLogin']))
        echo"<script type='text/javascript'>
                if ( window.history.replaceState ) 
                {
                    window.history.replaceState( null, null, window.location.href);
                }
             </script>";
?>
</html>