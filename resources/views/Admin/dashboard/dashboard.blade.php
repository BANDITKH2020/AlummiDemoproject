<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
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
    </style>
  <div class="col-12">
    <div class="col-12 outset" style="background-color: #EFF4FF;">
      <div class="col-12">
        <div class="col-12 row">
          <div class="col-1">
            <img src="{{ asset('images/logo-rmutt-icon.jpg') }}" style="width: 140px; height: 140px;padding: 10px;">
          </div>
          <div class="col-4" style="padding: 15px; ;">
            <h2>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</h2>
            <hr class="mt-1" style="border: 1px solid #000">
            <h2>Computer Engineering Alummi</h2>
          </div>
        </div>
        <hr class="mt-1" style="border: 2px solid #000">
      </div>
    </div>
    
    <div class="col-2 mt-5" style="border: 2px solid #000;margin-left:80px;border-radius:10px;background-color: #EFF4FF ">
            <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;background-color: #EFF4FF">
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h4>{{ Auth::user()->firstname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/admin/home" class="textmenu"><h5>หน้าหลัก</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('manage') }}" class="textmenu"><h5>การจัดการบัญชีผู้ใช้</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('status') }}" class="textmenu"><h5>ปรับสภาพนักศึกษา</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('news') }}" class="textmenu"><h5>จัดการข่าวสาร</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('activitys') }}" class="textmenu"><h5>จัดการกิจกรรม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('reward') }}" class="textmenu"><h5>จัดการรางวัลประกาศ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('viewtoken') }}" class="textmenu"><h5>จัดการโค้ด</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('links') }}" class="textmenu"><h5>จัดการแบบสอบถาม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('graduate') }}" class="textmenu"><h5>จัดการทำเนียบบัณทิต</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('massege') }}" class="textmenu"><h5>รายการข้อความ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('dashboard') }}" class="textmenu"><h5>แดชบอร์ด</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">ออกจากระบบ</button>
              </form>
            </div>
            <div  class="col-10 mt-3" style="display: flex; justify-content: center; align-items: center;">
              <a href="/register/Admin" class="re-admin" title="เพิ่มผู้ดูแลระบบ"style="margin-right: 5px;">
                  <iconify-icon icon="ri:admin-fill"></iconify-icon>
              </a>
              <a href="/register/teacher" class="re-teacher" title="เพิ่มอาจารย์"style="margin-left: 5px;">
                  <iconify-icon icon="subway:admin-1"></iconify-icon>
              </a>
            </div>


            <hr class="mt-1" style="border: 2px solid #000">
            <a href="{{ route('contact') }}" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
        </div>
  </div>

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
        .re-admin iconify-icon {
            font-size: 29px;
            color: black; /* สีตั้งต้นของไอคอน */
        }
        .re-teacher iconify-icon {
            font-size: 24px;
            color: black; /* สีตั้งต้นของไอคอน */
        }
    </style>
 
 
    <div class="container"  style="position: absolute; left: 500px; top: 180px;">
    <div class="col-12 mt-5">
            <div class="col-12 row text-left mt-5" style="margin-left:20px">
                <h3>ข้อมูลระบบ</h3>
                <hr class="mt-1" style="border: 1px solid #000">

                <div class="col-12 row" style="border: 1px solid #000;border-radius:10px;background-color: #F6F9FF;margin-left:5px">
                    <div class="col-3 mt-4">
                        <div class="col-12 ml-4 mt-4 text-center" style="border: 1px solid #000;border-radius:10px;background-color: #ffffff;">
                            <h5 class="mt-3">จำนวนผู้เข้าใช้งานระบบ (ยอดรวม)</h5>
                            <h1 style="color: #FF8A00">{{$user}} คน</h1>
                        </div>
                        <div class="col-12 ml-4 mt-4 text-center" style="border: 1px solid #000;border-radius:10px;background-color: #ffffff;">
                            <h5 class="mt-3">จำนวนผู้ที่จบในปี 2565 (ล่าสุด)</h5>
                            <h1 style="color: #1400FF">{{$educational_status}} คน</h1>
                        </div>
                        <div class="col-12 ml-4 mt-4 text-center" style="border: 1px solid #000;border-radius:10px;background-color: #ffffff;">
                            <h5 class="mt-3">จำนวนผู้ที่ไม่เข้าใช้งานระบบ <br>(ปีปัจจุบัน)</h5>
                            <h1 style="color: #FF0000">{{$inactiveUserCount}} คน</h1>
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
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['01'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['02'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['03'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['04'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['05'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['06'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['07'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['08'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['09'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['10'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['11'] ?? '0' }}</h5>
                                    <h5 style="margin-right: 10px">{{ $monthlyCounts['12'] ?? '0' }}</h5>
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
                                    <h5 style="margin-right: 10px">{{ $percentageOne ?? '0' }}%</h5>
                                    <h5 class="mt-3" style="margin-right: 10px">{{ $percentageTwo ?? '0' }}%</h5>
                                    <h5 class="mt-3" style="margin-right: 10px">{{ $percentageThree ?? '0' }}%</h5>
                                    <h5 class="mt-3" style="margin-right: 10px">{{ $percentageFour ?? '0' }}%</h5>
                                    <h5 class="mt-3" style="margin-right: 10px">{{ $percentageOthers ?? '0' }}%</h5>
                                </div>
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
