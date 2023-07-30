<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ลงทะเบียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        body {
                margin: auto;
                font-family:'THSarabunNew';
                overflow: auto;
                background: linear-gradient(315deg, rgb(146, 143, 146) 3%, rgb(150, 162, 173) 38%, rgb(149, 167, 165) 68%, rgb(173, 162, 162) 98%);
                animation: gradient 15s ease infinite;
                background-size: 400% 400%;
                background-attachment: fixed;
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
    </style>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-6 float-md-start mb-3 ms-md-3"><br><br>
                            <img src="{{ asset('images/student.jpg') }}" style="width: 300px; height: 400px;margin-right: 180px; border-radius: 8px;">
                        </div>
                        <form  class="row g-1" id="userRegisterForm" {{ route('register') }} method="POST">
                            @csrf
                            <h3 align="center">ลงทะเบียนศิษย์เก่า</h3>
                            <div class="mb-2">
                                <label for="firstname" class="form-label">ชื่อ</label>
                                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="" required>
                            </div>
                            <div class="mb-2">
                                <label for="lastname" class="form-label">นามสกุล</label>
                                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="student_grp" class="form-label">รหัสนักศึกษา</label>
                                <input type="text" name="student_grp" class="form-control" id="student_grp" required>
                            </div>
                            <div class="col-md-6">
                                <label for="graduatesem" class="form-label">กลุ่มปีการศึกษา</label>
                                <input type="text" name="graduatesem" class="form-control" id="graduatesem" required>
                            </div>
                            <div class="my-3">
                                <label for="Token_id" class="form-label">กรอกโค้ดที่ได้จากอาจารย์</label>
                                <input type="text" name="Token_id" class="form-control" id="Token_id" placeholder="">
                            </div>
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                            </div>
                            <hr size="3" width="50%"  color="black">
                            {{-- <div class="mb-3">
                                <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                            </div> --}}
                            {{-- <div class="d-grid gap-2 col-12 mx-auto">
                                <button style="border-radius:10px;padding:5px;background-color:white">
                                    <img width="20px" style="margin-bottom:3px; margin-right:10px; text-align:center; "alt="Google sign-in"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                    Login with Google
                                </button>
                            </div> --}}
                        </form>
                    </div>
                </div>
        </div>
    </div>
</body>

<div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registrationModalLabel">ลงทะเบียนสำเร็จ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>ขอบคุณสำหรับการลงทะเบียนเสร็จสิ้นแล้ว!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>
</html>

<script>
    $(document).ready(function() {
        console.log('do',document);
        @if(isset($success) && $success)
            $('#registrationModal').modal('show');
            setTimeout(function() {
                window.location.href = "{{ route('homeuser') }}";
            }, 1000);
        @endif
    });
</script>

