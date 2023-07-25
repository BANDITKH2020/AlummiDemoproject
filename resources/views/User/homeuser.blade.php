<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข่าวประชาสัมพันธ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        .outset {border-style: outset;}
        .textmenu {
            color: #000;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="col-12">
        <div class="col-12 outset" style="background-color: #EFF4FF">
            <div class="col-12">
                <div class="col-12 row">
                    <div class="col-1">
                        <img src="{{ asset('images/logo-rmutt-icon.jpg') }}" style="width: 150px; height: 150px;padding: 10px">
                    </div>
                    <div class="col-5" style="padding: 20px">
                        <h2>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</h2>
                        <hr class="mt-3" style="border: 1px solid #000">
                        <h2>Computer Engineering Alummi</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-2 mt-5" style="border: 2px solid #1400FF;margin-left:30px;border-radius:10px">
            <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;">
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h3>เมนู</h3>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/User/homeuser" class="textmenu"><h5>หน้าหลัก</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/studentlist" class="textmenu"><h5>รายชื่อนักศึกษา</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/graduatehouse" class="textmenu"><h5>ทำเนียบบัณฑิต</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/awardannounce" class="textmenu"><h5>รางวัลประกาศ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="๒" class="textmenu"><h5>แบบสอบถาม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/accountsetting" class="textmenu"><h5>ตั้งค่าโปรไฟล์</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/contacthistory" class="textmenu"><h5>ประวัติการติดต่อ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('welcome') }}" class="textmenu"><h5>ออกจากระบบ</h5></a>
            </div>
            <div class="col-12 mt-5" style="border: 2px solid #576CBC;border-radius:10px;background-color: #EFF4FF">
                <h3 class="text-center">ติดต่อภาควิชา</h3>
            </div>
        </div>
    </div>

</body>
</html>
