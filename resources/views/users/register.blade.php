<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ลงทะเบียน</title>
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <style>
        body {
                margin: auto;
                font-family:'TH Niramit AS';
                overflow: auto;
                background: linear-gradient(315deg, rgb(146, 143, 146) 3%, rgb(150, 162, 173) 38%, rgb(149, 167, 165) 68%, rgb(173, 162, 162) 98%);
                animation: gradient 15s ease infinite;
                background-size: 100% 100%;
                background-attachment: fixed;
                font-weight: bold;
            }
            @keyframes gradient {
                0% {
                    background-position: 0% 0%;
                }
                50% {
                    background-position: 100% 100%;
                }
                100% {
                    background-position: 0% 0%;
                }
            }

            .modal-confirm {
                color: #434e65;
                width: 525px;
            }
            .modal-confirm .modal-content {
                padding: 20px;
                font-size: 16px;
                border-radius: 5px;
                border: none;
            }
            .modal-confirm .modal-header {
                background: #47c9a2;
                border-bottom: none;
                position: relative;
                text-align: center;
                margin: -20px -20px 0;
                border-radius: 5px 5px 0 0;
                padding: 35px;
            }
            .modal-confirm h4 {
                text-align: center;
                font-size: 36px;
                margin: 10px 0;
            }
            .modal-confirm .form-control, .modal-confirm .btn {
                min-height: 40px;
                border-radius: 3px;
            }
            .modal-confirm .close {
                position: absolute;
                top: 15px;
                right: 15px;
                color: #fff;
                text-shadow: none;
                opacity: 0.5;
            }
            .modal-confirm .close:hover {
                opacity: 0.8;
            }
            .modal-confirm .icon-box {
                color: #fff;
                width: 95px;
                height: 95px;
                display: inline-block;
                border-radius: 50%;
                z-index: 9;
                border: 5px solid #fff;
                padding: 15px;
                text-align: center;
            }
            .modal-confirm .icon-box i {
                font-size: 64px;
                margin: -4px 0 0 -4px;
            }
            .modal-confirm.modal-dialog {
                margin-top: 80px;
            }
            .modal-confirm .btn, .modal-confirm .btn:active {
                color: #fff;
                border-radius: 4px;
                background: #eeb711 !important;
                text-decoration: none;
                transition: all 0.4s;
                line-height: normal;
                border-radius: 30px;
                margin-top: 10px;
                padding: 6px 20px;
                border: none;
            }
            .modal-confirm .btn:hover, .modal-confirm .btn:focus {
                background: #eda645 !important;
                outline: none;
            }
            .modal-confirm .btn span {
                margin: 1px 3px 0;
                float: left;
            }
            .modal-confirm .btn i {
                margin-left: 1px;
                font-size: 20px;
                float: right;
            }
            .trigger-btn {
                display: inline-block;
                margin: 100px auto;
            }
    </style>
    <div class="row justify-content-center" style="margin-top:50px">
        <div class="col-lg-8">
                <div class="card" style="border-radius:30px;">
                    <div class="card-body" >
                        <div class="col-lg-12">
                            <div class="col-lg-12 row">
                                <div class="col-lg-6 mt-3">
                                    <img src="{{ asset('images/student.jpg') }}" style="width: 500px; height:600px;border-radius: 10px;margin-left:30px;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                    <form action="{{ route('inputgoogle') }}" method="post" enctype="multipart/form-data" >
                                        {{ csrf_field() }}
                                            <p style="text-align:center;font-size: 30px;">ลงทะเบียนศิษย์เก่า</p>
                                            <div class="col-lg-12 row">
                                                <div class="col-lg-12 mt-3">
                                                    <label for="firstname" class="form-label"style="font-size: 24px;">ชื่อ</label>
                                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="" style="font-size: 24px;"required>
                                                </div>
                                                <div class="col-lg-12 mt-3">
                                                    <label for="lastname" class="form-label"style="font-size: 24px;">นามสกุล</label>
                                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="" style="font-size: 24px;"required>
                                                </div>
                                                <div class="col-lg-6 mt-3">
                                                    <label for="student_id" class="form-label"style="font-size: 24px;">รหัสนักศึกษา</label>
                                                    <input type="text" name="student_id" class="form-control" id="student_id" maxlength="13" minlength="13" style="font-size: 24px;"required>
                                                </div>
                                                <div class="col-lg-6 mt-3">
                                                    <label for="student_grp" class="form-label"style="font-size: 24px;">กลุ่มนักศึกษา</label>
                                                    <input type="text " placeholder="่เช่น 63346CPE" name="student_grp" class="form-control" id="student_grp" style="font-size: 24px;"required>
                                                </div>
                                                <div class="col-lg-12 mt-3">
                                                    <label for="token_id" class="form-label"style="font-size: 24px;">รหัสเชิญให้สมัครสมาชิก</label>
                                                    <input type="text" name="token_id" class="form-control" id="token_id"style="font-size: 24px;" required>
                                                </div>
                                                <div class="col-lg-12 mt-3">
                                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                                                </div>
                                                <div class="d-grid gap-2 col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary"role="button" style="text-transform:none;font-size: 24px;color:white" id="googleLoginButton">
                                                        <img width="30px" style="margin-right:3px; text-align:center;background-color:white;"alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                                            <b>Login with Google</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <script>
            // Get the input element
            const student_id = document.getElementById('student_id');

            // Add an event listener to check for special characters
            student_id.addEventListener('input', function() {
                const inputValue = this.value;
                const specialCharacters = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\|/-]/; // Define your list of special characters

                if (specialCharacters.test(inputValue)) {
                    // If the input contains special characters, display an error message or take appropriate action
                    alert('กรุณากรอกข้อมูลที่ไม่มีเครื่องหมายพิเศษ');
                    // You can also clear the input field or prevent form submission here
                    this.value = ''; // Clear the input field
                }
            });
        </script>
        <style>
            
        .my-swal-title {
            font-size: 24px; /* ปรับขนาดตามที่คุณต้องการ */
            font-weight: bold; /* กำหนดความหนาของตัวอักษร (ถ้าต้องการ) */
        }
        </style>
        @if(Session::has('alert'))
        <script>
            swal({
                title: "{{ Session::get('alert') }}",
                icon: "success",
                customClass: {
                    title: "my-swal-title" // กำหนดคลาสใหม่สำหรับข้อความหัวเรื่อง
                }
            });

            // แสดงการแจ้งเตือน (alert) ด้วย JavaScript โดยใช้ค่าจาก Controller
            var msg = "{{ $msg ?? '' }}"; // กำหนดค่า msg จาก Controller
            if (msg) {
                alert(msg);
            }
        </script>
        @endif
        @if(Session::has('error'))
        <script>
            swal({
                title: "{{ Session::get('error') }}",
                icon: "error",
                customClass: {
                    title: "my-swal-title" // กำหนดคลาสใหม่สำหรับข้อความหัวเรื่อง
                }
            });

            // แสดงการแจ้งเตือน (error) ด้วย JavaScript โดยใช้ค่าจาก Controller
            var msg = "{{ $msg ?? '' }}"; // กำหนดค่า msg จาก Controller
            if (msg) {
                alert(msg);
            }
        </script>
        @endif 
    </div>
</body>
</html>



