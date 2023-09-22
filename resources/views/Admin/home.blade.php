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
                font-family:'TH Niramit AS';
              }
        a:link {
                color: black;
                background-color: transparent;
                text-decoration: none;
              }
              h3{
                font-weight: bold;
            }
            h2{
                font-weight: bold;
            }
    </style>
  
    <div class="col-12 outset" style="background-color: #EFF4FF;">
      <div class="col-12">
        <div class="col-12 row">
            <div class="col-1">
            <img src="{{ asset('images/logo-rmutt-icon.jpg') }}" style="height: 100px;padding: 0px;margin:0px;" align="right">
            </div>
            <div  class="col-11">
              <h2  style="font-weight:bold; padding: 30px 0;margin:0px;">เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</h2>
            </div>
        </div>
        <hr class="mt-1" style="border: 2px solid #000">
      </div>
    </div>
    
    <div class="col-2 mt-5" style="border: 2px solid #000;margin-left:80px;border-radius:10px;background-color: #EFF4FF ">
            <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;background-color: #FFFFFF">
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h4 style=" font-weight: bold;">{{ Auth::user()->firstname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/admin/home" class="textmenu"><h3 >หน้าข่าวประชาสัมพันธ์</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('status') }}" class="textmenu"><h3>ปรับสถานะภาพนักศึกษา</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('massege') }}" class="textmenu"><h3>รายการข้อความ</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('dashboard') }}" class="textmenu"><h3>แดชบอร์ด</h3></a>
            </div>
            <div class="col-8 mt-1"style="margin-left:50px">
              <hr style="border: 1px solid #000">
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('manage') }}" class="textmenu"><h3>จัดการบัญชีผู้ใช้</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('news') }}" class="textmenu"><h3>จัดการข่าวสาร</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('activitys') }}" class="textmenu"><h3>จัดการกิจกรรม</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('reward') }}" class="textmenu"><h3>จัดการรางวัลประกาศ</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('viewtoken') }}" class="textmenu"><h3>จัดการโค้ด</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('links') }}" class="textmenu"><h3>จัดการแบบสอบถาม</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('graduate') }}" class="textmenu"><h3>จัดการทำเนียบบัณทิต</h3></a>
            </div>
            
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" style="font-size: 24px;">ออกจากระบบ</button>
              </form>
            </div>
            <hr class="mt-3" style="border: 2px solid #000">
            <a href="{{ route('contact') }}" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
        </div>
      </div>

  <style>
    .custom-card {
        width: 100%; /* ให้การ์ดเต็มความกว้างของ column */
        max-width: 300px; /* ขนาดสูงสุดของการ์ด */
        margin-bottom: 10px;
        font-size: 20px;
    }
  </style>
 
 
  <div class="container"  style="position: absolute; left: 500px; top: 180px;">
    <div class="col-md-12">
      <h2 class="text-center">ข่าวประชาสัมพันธ์</h2>
    </div>
    <hr class="mt-1" style="border: 1px solid #000">
    <form action="" method="GET" >
    <label class="form-label" style="position: absolute;left:750px;top: 65px;">
      <div class="col-mb-2">
        <input type="text" class="form-control" name="search" placeholder="ค้นหา" style="font-size: 20px;position:relative;left:260px;top:1px" /> 
        <button type="submit"  class="btn btn-primary" style="font-size: 20px; position: absolute;left:455px;top:1px;">ค้นหา</button>
      </div>
    </label>            
    </form>
    <br>
    <div class="row">
      @foreach ($newsandactivity as $row)
          @php
              $thaiMonths = [
                  1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                  4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                  7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                  10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
              ];
              $createdDate = \Carbon\Carbon::parse($row->created_at);
              $eventDate = $row->cotent_type == 2 ? \Carbon\Carbon::parse($row->event_date) : null;
          @endphp
          <div class="col-md-3">
              <div class="card mt-5 custom-card">
                  <img src="{{ asset($row->title_image) }}" class="img-fluid rounded-start" style="width: 300px; height: 200px;">
                  <div class='card-body'>
                      <h3 class="card-title font-weight-bold" style="font-weight:bold; ">{{ Str::limit($row->title_name,20) }}</h3>
                      <p class="card-text">{{ Str::limit($row->cotent, 50) }}</p>
                      <p class="card-text">วันที่อัพเดต: {{ $createdDate->format('d') }}{{$thaiMonths[$row->created_at->month]}} {{$row->created_at->year + 543}}
                      @if ($eventDate)
                      <br>วันที่จัดกิจกรรม: {{ $eventDate->format('d') }}{{$thaiMonths[$row->created_at->month]}} {{$row->created_at->year + 543}}
                      @else
                      <p class="card-text"><br></p>
                      @endif
                      </p>
                      <div class="d-flex justify-content-center">
                          <button type="button" onclick="window.location.href='{{ url('/home/view/'.$row->id) }}'" class="btn btn-primary btn-lg" style="font-size: 20px;">รายละเอียด</button>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
        <div class="d-flex justify-content-center mt-5">
          {{ $newsandactivity->links() }}
        </div>
      </div>
  </div>
</div>

  
  
  
</body>
</html>
