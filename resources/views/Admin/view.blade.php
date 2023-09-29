<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        body {
                font-family:'TH Niramit AS';
                font-size: 24px;
              }
        a:link {
                color: black;
                background-color: transparent;
                text-decoration: none;
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
    <div class="container"  style="position: absolute; left: 500px; top: 200px;">
    @csrf
    
        <h2  class="text-center">{{$view->title_name}}</h2>
        <style>
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .centered-image {
            width: 400px;
            height: 350px;
            object-fit: cover;
        }
        .indented-text {
            font-size: 24px;
            line-height: 1.5;
            text-align: justify;
            text-indent: 4em; /* ปรับค่าตามที่ต้องการ */
        }
        /* ซ่อนตัวแสดงรูป */
        #imageModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        /* ขยายรูป */
        .modal-content {
            margin: auto;
            display: absolute;
            top: 150px;
            max-width: 50%;
            max-height: 100%;
        }

        /* ปุ่มปิดตัวแสดงรูป */
        .close-button {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 30px;
            cursor: pointer;
            color: white;
        }
        .return iconify-icon {
            font-size: 50px;
            color: black; /* สีตั้งต้นของไอคอน */
            transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
        }

        .return:hover iconify-icon {
            color: #778899; /* สีของไอคอนเมื่อ hover */
        }
        h3{
            font-weight: bold;
        }
        h2{
            font-weight: bold;
        }
        </style>

        <div class="centered-container mt-3">
            <img src="{{ asset($view->title_image) }}" class="centered-image img-fluid rounded-start" alt="Image" onclick="openModal('{{ asset($view->title_image) }}')">
        </div>
        <div class="indented-text  mt-3 my-3">
            <p style="font-size: 24px;">{{$view->cotent}}</p>
        </div>
        <p>ประเภทเนื้อหา: {{$view->category}}</p>
        @if ($view->objective) <!-- ตรวจสอบว่า event_date ไม่ว่างเปล่า -->
            @if ($view->objective == '-') <!-- ตรวจสอบว่า event_date เป็น 1 -->
                <p style="font-size: 24px;" class="card-text"></p>
            @else
                <p style="font-size: 24px;" >{{$view->objective}}</p>
            @endif
        @endif
        @if ($view->cotent_type) <!-- ตรวจสอบว่า event_date ไม่ว่างเปล่า -->
            @if ($view->cotent_type == 2) <!-- ตรวจสอบว่า event_date เป็น 1 -->
                <p class="card-text" style="font-size: 24px;">วันที่จัดกิจกรรม: 
                {{ Carbon\Carbon::parse($view->event_date)->format('d-m-Y') }}
                </p>
            @else
                <p class="card-text"></p>
            @endif
        @endif
        <p style="font-size: 24px;">วันที่ลงเนื้อหา: {{$view->created_at->format('d-m-Y')}}</p>
        <div class="row">
            
            @if($view->images->count() > 0)
            <p>รูปภาพกิจกรรม</p>
                @foreach($view->images as $index => $image)
                    @if($index > 0 && $index % 6 === 0)
                        </div><div class="row">
                    @endif
                    <div class="col-md-2 mb-3">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="My Image" class="img-fluid img-thumbnail"onclick="openModal('{{ asset('storage/' . $image->image_path) }}')">
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ url('/admin/home') }}" class="return"><iconify-icon icon="ic:baseline-assignment-return"></iconify-icon></a>
        </div>
    </div>
    <div id="imageModal" class="modal">
    <span class="close-button" onclick="closeModal()">&times;</span>
    <img src="" class="modal-content" id="modalImage">
    </div>
    <script>
        // เมื่อคลิกที่รูป
        function openModal(imageSrc) {
        var modal = document.getElementById('imageModal');
        var modalImg = document.getElementById('modalImage');
        modal.style.display = 'block';
        modalImg.src = imageSrc;
        }

        // เมื่อคลิกที่ปุ่มปิด
        function closeModal() {
        var modal = document.getElementById('imageModal');
        modal.style.display = 'none';
        }

    </script>
</body>
</html>
