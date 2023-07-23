<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration - Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                   
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form  class="row g-1" action="{{ route('register') }}" method="POST">
                        @csrf
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
                            <input type="text" class="form-control" id="student_grp">
                        </div>
                        <div class="col-md-6">
                            <label for="graduatesem" class="form-label">กลุ่มปีการศึกษา</label>
                            <input type="text" class="form-control" id="graduatesem">
                        </div>
                        <div class="my-3">
                            <label for="Token_id" class="form-label">กรอกโค้ดที่ได้จากอาจารย์</label>
                            <input type="text" name="Token_id" class="form-control" id="Token_id" placeholder="" required>
                        </div>
                        <hr size="3" width="50%"  color="black">
                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                        </div>
                        <div class="mb-3">
                                <a class="btn btn-outline-dark" href="/users/googleauth" role="button" style="text-transform:none"  align="center">
                                <img width="20px" style="margin-bottom:3px; margin-right:5px; text-align:center; "alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                Login with Google
                                </a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
