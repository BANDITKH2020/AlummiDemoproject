<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration - Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title" style="text-align:center; ">Computer Engineering</h1>
                </div>
                <div class="card-body" style="background-color:#76ade3;"><br>
                    <h2 align="center" style="color:white; ">เข้าสู่ระบบ</h2>
                    
                    <p style="background-image: url({{url('images/color1.png')}});"><br><br><br><br><br>
                </div>
                <img class="position-absolute top-50 start-50 translate-middle" src="{{ asset('images/teamwork.png') }}" style="width: 200px; height: 200px;  margin-right: 180px">
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <br><br><br><br><br><br><br>
                        <div class="d-grid gap-4 col-6 mx-auto">
                                <a  class="btn btn-outline-dark" href="/users/googleauth" role="button" style="text-transform:none"  >
                                    <img width="20px" style="margin-bottom:3px; margin-right:3px; text-align:center; "alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                    Login with Google
                                </a>
                        </div><br>
                        <p style="text-align:center; ">หากยังไม่ลงทะเบียนกรุณา <a href="{{ route('register') }}">ลงทะเบียน</a></p>
                        <br><br><br>
                    </div>
                
            </div>
        </div>
    </div>
</body>
</html>
