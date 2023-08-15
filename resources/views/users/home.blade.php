<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
            color: #05FF2D;
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

    <div class="col-2 mt-5" style="border: 2px solid #000;margin-left:20px;border-radius:10px;">
            <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;">
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h3></h3>{{ Auth::user()->firstname }}</h3>
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
                <a href="{{ route('accountsettinguser') }}" class="textmenu"><h5>ตั้งค่าบัญชี</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="#" class="textmenu"><h5>ประวัติการติดต่อ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">ออกจากระบบ</button>
              </form>
            </div>
            <hr class="mt-5" style="border: 2px solid #000">

            <a href="" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
        </div>
  </div>
  <style>
    .custom-card {
        width: 100%; /* ให้การ์ดเต็มความกว้างของ column */
        max-width: 300px; /* ขนาดสูงสุดของการ์ด */
        margin-bottom: 10px;
    }
  </style>
 
 
  <div class="container"  style="position: absolute; left: 500px; top: 180px;">
    <div class="col-md-12">
      <h2 class="text-center">ข่าวประชาสัมพันธ์</h2>
    </div>
    <hr class="mt-1" style="border: 1px solid #000">
    <form action="" method="GET" >
    <label class="form-label" style="position: absolute;left:750px;top: 65px;">
      <select name="searchdata" class="form-select" >
        <option value="all">ทั้งหมด</option>
        <option value="" >ข่าว</option>
        <option value="">กิจกรรม</option>
      </select>
      <div class="col-mb-2">
        <input type="text" class="form-control" name="search" placeholder="ค้นหา" style="position:relative;left:250px;top:-37px" required/> 
        <button type="submit"  class="btn btn-outline-primary" style="position: absolute;left:475px;top:1px;">Search</button>
      </div>
    </label>            
    </form>
    <br>
    <div class="row">
        @foreach ($newsandactivity as $row)
        <div class="col-md-3">
            <div class="card mt-5 custom-card">
            <img src="{{ asset($row->title_image) }}" class="img-fluid rounded-start" style="width: 300px; height: 200px;">
                <div class='card-body'>
                    <h5 class="card-title font-weight-bold">{{ $row->title_name }}</h5>
                    <p class="card-text">
                    {{ Str::limit($row->cotent, 50) }}
                    </p>
                    <p class="card-text">วันที่อัพเดต
                    {{$row->created_at->format('d-m-Y')}}
                    </p>
                    @if ($row->cotent_type) <!-- ตรวจสอบว่า event_date ไม่ว่างเปล่า -->
                      @if ($row->cotent_type == 2) <!-- ตรวจสอบว่า event_date เป็น 1 -->
                        <p class="card-text">วันที่จัดกิจกรรม: 
                        {{ Carbon\Carbon::parse($row->event_date)->format('d-m-Y') }}
                        </p>
                        @else
                        <p class="card-text">วันที่จัดกิจกรรม: ไม่มี</p>
                      @endif
                    @endif
                    <div class="d-flex justify-content-center">
                      <button type="button" href="" class="btn btn-primary btn-lg">รายละเอียด</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{ $newsandactivity->links() }}
      </div>
    </div>
  </div>



</body>
</html>
