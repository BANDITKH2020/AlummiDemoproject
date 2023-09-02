<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <style>
        body {
                font-family:'THSarabunNew';
              }
        a:link {
                color: black;
                background-color: transparent;
                text-decoration: none;
              }

        h5:hover{
            /* color: #05FF2D; */
        }
        .vertical-line {
            border-left: 1px solid #000;
            height: 440px;
            text-align: right
        }
        .vertical-line2 {
            border-left: 1px solid #000;
            height: 180px;
            text-align: right
        }
        .custom-card {
            width: 100%; /* ให้การ์ดเต็มความกว้างของ column */
            max-width: 300px; /* ขนาดสูงสุดของการ์ด */
            margin-bottom: 10px;
        }
    </style>
  <div class="col-12">
    <div class="col-12 outset" style="background-color: #EFF4FF;">
      <div class="col-12">
        <div class="col-12 row">
          <div class="col-1">
            <img src="{{ asset('images/logo-rmutt-icon.jpg') }}" style="width: 140px; height: 140px;padding: 10px;">
          </div>
          <div class="col-4" style="padding: 15px;">
            <h2>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</h2>
            <hr class="mt-1" style="border: 1px solid #000">
            <h2>Computer Engineering Alummi</h2>
          </div>
        </div>
        <hr class="mt-1" style="border: 2px solid #000">
      </div>
    </div>

    <div class="col-12 row">
        <div class="col-2 mt-5" style="border: 2px solid #000;margin-left:20px;border-radius:10px;">
            <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;">
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                {{-- <h3></h3>{{ Auth::user()->firstname }}</h3> --}}
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/users/homeuser" class="textmenu"><h5>หน้าหลัก</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('studentslist') }}" class="textmenu"><h5>รายชื่อนักศึกษา</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="#" class="textmenu"><h5>ทำเนียบบัณฑิต</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="#" class="textmenu"><h5>รางวัลประกาศ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="#" class="textmenu"><h5>แบบสอบถาม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('dashboard') }}" class="textmenu"><h5>ข้อมูลระบบ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('accountsettinguser') }}" class="textmenu"><h5>ตั้งค่าบัญชี</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="" class="textmenu"><h5>ประวัติการติดต่อ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">ออกจากระบบ</button>
              </form>
            </div>
            <hr class="mt-5" style="border: 2px solid #000">

            <a class="text-center" onclick="openContactModal()" style="color: black;text-decoration: none;cursor: pointer;"><h3>ติดต่อภาควิชา</h3></a>
        </div>

        <div class="col-8 mt-5">
            <div class="col-12 row text-left mt-5" style="margin-left:20px">
                <h3>ข้อมูลระบบ</h3>
                <hr class="mt-1" style="border: 1px solid #000">

                <div class="col-12 row" style="border: 1px solid #000;border-radius:10px;background-color: #F6F9FF;margin-left:5px">
                    <div class="col-3 mt-4">
                        <div class="col-12 ml-4 mt-4 text-center" style="border: 1px solid #000;border-radius:10px;background-color: #ffffff;">
                            <h5 class="mt-3">จำนวนผู้เข้าใช้งานระบบ (ยอดรวม)</h5>
                            <h1 style="color: #FF8A00">999 คน</h1>
                        </div>
                        <div class="col-12 ml-4 mt-4 text-center" style="border: 1px solid #000;border-radius:10px;background-color: #ffffff;">
                            <h5 class="mt-3">จำนวนผู้ที่จบในปี 2565 (ล่าสุด)</h5>
                            <h1 style="color: #1400FF">100 คน</h1>
                        </div>
                        <div class="col-12 ml-4 mt-4 text-center" style="border: 1px solid #000;border-radius:10px;background-color: #ffffff;">
                            <h5 class="mt-3">จำนวนผู้ที่ไม่เข้าใช้งานระบบ <br>(ปีปัจจุบัน)</h5>
                            <h1 style="color: #FF0000">50 คน</h1>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="col-12 ml-4 mt-4" style="border: 1px solid #000;border-radius:10px;background-color: #ffffff;">
                            <h5 class="mt-3 text-center">ผู้เข้าใช้งานระบบ (ปี 2566)</h5>
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="text-center">เดือน</h5>
                                    <hr>
                                    <h5 class="text-left" style="margin-left:10px">มกราคม</h5>
                                    <h5 class="text-left" style="margin-left:10px">กุมภาพันธ์</h5>
                                    <h5 class="text-left" style="margin-left:10px">มีนาคม</h5>
                                    <h5 class="text-left" style="margin-left:10px">เมษายน</h5>
                                    <h5 class="text-left" style="margin-left:10px">พฤษภาคม</h5>
                                    <h5 class="text-left" style="margin-left:10px">มิถุนายน</h5>
                                    <h5 class="text-left" style="margin-left:10px">กรกฏาคม</h5>
                                    <h5 class="text-left" style="margin-left:10px">สิงหาคม</h5>
                                    <h5 class="text-left" style="margin-left:10px">กันยายน</h5>
                                    <h5 class="text-left" style="margin-left:10px">ตุลาคม</h5>
                                    <h5 class="text-left" style="margin-left:10px">พฤศจิกายน</h5>
                                    <h5 class="text-left" style="margin-left:10px">ธันวาคม</h5>
                                </div>
                                <div class="col-6 vertical-line text-right">
                                    <h5 class="text-center">จำนวน (คน)</h5>
                                    <hr>
                                    <h5 style="margin-right: 10px">1</h5>
                                    <h5 style="margin-right: 10px">2</h5>
                                    <h5 style="margin-right: 10px">3</h5>
                                    <h5 style="margin-right: 10px">4</h5>
                                    <h5 style="margin-right: 10px">5</h5>
                                    <h5 style="margin-right: 10px">6</h5>
                                    <h5 style="margin-right: 10px">7</h5>
                                    <h5 style="margin-right: 10px">8</h5>
                                    <h5 style="margin-right: 10px">9</h5>
                                    <h5 style="margin-right: 10px">10</h5>
                                    <h5 style="margin-right: 10px">11</h5>
                                    <h5 style="margin-right: 10px">12</h5>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 ml-4 mt-4">
                        </div>
                    </div>
                    <div class="col-4" style="margin-top:70px">
                        <div class="col-12 ml-4 mt-5" style="border: 1px solid #000;border-radius:10px;background-color: #ffffff;">
                            <h5 class="mt-3 text-center">ผู้เข้าใช้งานระบบ (ปี 2566)</h5>
                            <div class="row">
                                <div class="col-8 mt-4">
                                    <h5 class="text-left" style="margin-left:10px">งานพบปะสังสรรค์ประจำปี</h5>
                                    <h5 class="text-left mt-3" style="margin-left:10px">อบรมให้ความรู้วิชาการ</h5>
                                    <h5 class="text-left mt-3" style="margin-left:10px">แข่งกีฬาศิษย์เก่าสัมพันธ์</h5>
                                    <h5 class="text-left mt-3" style="margin-left:10px">กิจกรรมศิษย์เก่าสัมพันธ์</h5>
                                    <h5 class="text-left mt-3" style="margin-left:10px">อื่นๆ</h5>
                                </div>
                                <div class="col-4 vertical-line2 text-right mt-4">
                                    <h5 style="margin-right: 10px">1 %</h5>
                                    <h5 class="mt-3" style="margin-right: 10px">2 %</h5>
                                    <h5 class="mt-3" style="margin-right: 10px">3 %</h5>
                                    <h5 class="mt-3" style="margin-right: 10px">4 %</h5>
                                    <h5 class="mt-3" style="margin-right: 10px">5 %</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>

