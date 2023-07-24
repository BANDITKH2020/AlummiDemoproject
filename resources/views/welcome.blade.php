<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <style>
            body {
                background-color: #EFF4FF;
            }
        </style>
    </head>
    <body class="container">
        <div class="col-lg-12 row">
            <div class="col-lg-12 row">
                <div class="col-lg-12 row mt-5">
                    <div class="d-flex align-items-center justify-content-between" style="padding: 0px 15px;">
                        <div class="col-lg-8 align-items-center justify-content-start">
                            <h2 style="color:#FFD53F">Rajamangala University of</h2>
                            <h2 style="margin-left:200px;color:#FFD53F">Technology Thanyaburi</h2>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button class="btn btn-primary" onclick="window.location.href='{{ route('register') }}'">ลงทะเบียน</button>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button class="btn btn-primary" onclick="window.location.href='{{ route('pressrelease') }}'">หน้าข่าว</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5"></div>
                <div class="col-lg-12 mt-5"></div>
                <div class="col-lg-8 row mt-5">
                    <div class="col-lg-8">
                        <h1 style="color:#FFD53F">ยินดีต้อนรับ</h1>
                        <h1 style="color:#FFD53F">ศิษย์เก่าทุกท่านกลับเข้าสู่รั้ว</h1>
                        <h1 style="color:#FFD53F">ราชมงคลธัญบุรี</h1>
                        <h1 style="color:#FFD53F">คณะวิศวกรรมคอมพิวเตอร์</h1>
                        <button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('login') }}'">เข้าสู่ระบบ ></button>
                    </div>
                </div>
                <div class="col-lg-4 row">
                    <div class="d-flex align-items-center flex-column">
                        <img src="{{ asset('images/1.jpg') }}" style="width: 300px; height: 300px;margin-right: 180px">
                    </div>
                    <div class="d-flex align-items-center flex-column">
                        <img src="{{ asset('images/2.jpg') }}" style="width: 300px; height: 300px;margin-left: 180px">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
