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

        h5:hover{
            /* color: #05FF2D; */
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

    <div class="col-2 mt-5" style="border: 2px solid #000;margin-left:80px;border-radius:10px;background-color: #EFF4FF ">
            <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;background-color: #EFF4FF">
                @if($contactInfo === null) 
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                @else
                <img src="{{ Storage::url('image/profileuser/' . $contactInfo->image) }}" style="width:100px;height:100px;padding:10px; border-radius: 50%;">
                @endif
                <h4>{{Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="/users/hometeacher" class="textmenu"><h5>หน้าหลัก</h5></a>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{ route('studentslist_teacher') }}" class="textmenu"><h5>รายชื่อนักศึกษา</h5></a>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('graduateuser_teacher')}}" class="textmenu"><h5>ทำเนียบบัณฑิต</h5></a>
                @endif
                @if (Auth::check() && Auth::user()->role_acc !== 'teacher')
                <h5>ทำเนียบบัณฑิต</h5>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('teacherviewtoken')}}" class="textmenu"><h5>จัดการโค้ด</h5></a>
                @endif
                @if (Auth::check() && Auth::user()->role_acc !== 'teacher')
                <h5>จัดการโค้ด</h5>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
            @if($surveylink)
                <a href="{{$surveylink->link}}" target="_blank" class="textmenu"><h5>แบบสอบถาม</h5></a>
            @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('accTeacher')}}" class="textmenu"><h5>ตั้งค่าบัญชี</h5></a>
                @endif
                @if (Auth::check() && Auth::user()->role_acc !== 'teacher')
                <h5>ตั้งค่าบัญชี</h5>
                @endif
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
  </div>
  <style>
    <style>
    .custom-card {
        width: 100%; /* ให้การ์ดเต็มความกว้างของ column */
        max-width: 300px; /* ขนาดสูงสุดของการ์ด */
        margin-bottom: 10px;
    }
    .content-container {
            text-align: center;
            color: red;
        }
        .modal-content1 {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 25%;
        }

        .close-bottom-right {
            font-weight: bold; 
            }

        .close-bottom-right:hover,
        .close-bottom-right:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            }
        .content-container {
            text-align: center;
            color: red;
        }
  </style>


<div class="container"  style="position: absolute; left: 500px; top: 200px;">
    @csrf
    
        <h1>{{$view->title_name}}</h1>
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

        </style>

        <div class="centered-container mt-3">
            <img src="{{ asset($view->title_image) }}" class="centered-image img-fluid rounded-start" alt="Image" onclick="openModal('{{ asset($view->title_image) }}')">
        </div>
        <div class="indented-text  mt-3 my-3">
            <h4>{{$view->cotent}}</h4>
        </div>
        <h3>ประเภทเนื้อหา: {{$view->category}}</h3>
        @if ($view->objective) <!-- ตรวจสอบว่า event_date ไม่ว่างเปล่า -->
            @if ($view->objective == '-') <!-- ตรวจสอบว่า event_date เป็น 1 -->
                <h3 class="card-text"></h3>
            @else
            <h3> {{$view->objective}}</h3>
            @endif
        @endif
        @php
        $thaiMonths = [
            1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
            4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
            7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
            10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
            ];
            $eventdate = \Carbon\Carbon::parse($view->event_date);
        @endphp
        @if ($view->cotent_type) <!-- ตรวจสอบว่า event_date ไม่ว่างเปล่า -->
            @if ($view->cotent_type == 2) <!-- ตรวจสอบว่า event_date เป็น 1 -->
                <h3 class="card-text">วันที่จัดกิจกรรม: 
                {{$eventdate->format('d')}} {{$thaiMonths[$eventdate->month]}} {{$eventdate->year + 543}}
                </h3>
            @else
                <h3 class="card-text"></h3>
            @endif
        @endif
        <h3>วันที่ลงเนื้อหา: {{$view->created_at->format('d')}} {{$thaiMonths[$view->created_at->month]}} {{$view->created_at->year + 543}}</h3>
        <div class="row">
            @if($view->images->count() > 0)
            <h3>รูปภาพกิจกรรม</h3>
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
            <a href="{{ url('/users/hometeacher') }}" class="return"><iconify-icon icon="ic:baseline-assignment-return"></iconify-icon></a>
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

    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ช่องทางการติดต่อ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="col-lg-12">
                            <div class="col-lg-12 row">
                            <div class="col-lg-6">
                                    <div class="col-lg-12 row" style="margin-left:15px">
                                        <div class="col-lg-1">
                                            <i class="fas fa-map-marker-alt" style="margin-top:15px"></i>
                                        </div>
                                    <div class="col-lg-11">
                                        <h5>{{$department->address}}</h5>
                                    </div>
                                    <div class="col-lg-12 row">
                                        <div class="col-lg-1">
                                            <i class="fas fa-phone" style="margin-top:15px"></i>
                                        </div>
                                        <div class="col-lg-11">
                                            <h5>ช่วงเวลาติดต่อ{{$department->contact_time}}<br>{{$department->phone_number}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 row" >
                                        <div class="col-lg-1">
                                            <a href="{{$department->facebook}}" target="_blank">
                                                <img src="{{ asset('images/facebook-icon.png') }}" style="width:25px;height:25px">
                                            </a>
                                        </div>
                                        <div class="col-lg-1">
                                            <a href="{{$department->web}}" target="_blank">
                                                <img src="{{ asset('images/www-icon.png') }}" style="width:25px;height:25px">
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <iframe src="{{$department->map}}"
                                        width="500" height="300" style="border:0;margin-top:10px;margin-left:15px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
    function openContactModal() {
        $('#contactModal').modal('show');
    }
</script>
<script>
    // ปิดการใช้งานปุ่มย้อนกลับ
    history.pushState(null, null, location.href);
    window.addEventListener('popstate', function(event) {
        history.pushState(null, null, location.href);
    });
</script>

</body>
</html>


