<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </head>
    <body class="container">
        <div class="col-lg-12 row">
            <div class="col-lg-12 row">
                <div class="col-lg-12 mt-3">
                    <div class="d-flex align-items-center justify-content-between" style="padding: 0px 15px;">
                        <div class="col-lg-4 align-items-center justify-content-end">
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button type="submit" class="btn btn-primary" onclick="window.location.href='{{ route('register') }}'">สมัครสมาชิก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'">เข้าสู่ระบบ</button>
    </body>
</html>
