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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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

        h3{
            font-weight: bold;
        }
        h2{
            font-weight: bold;
        }
        p{
            font-size: 24px;
        }
        .custom-card {
            width: 100%; /* ให้การ์ดเต็มความกว้างของ column */
            max-width: 300px; /* ขนาดสูงสุดของการ์ด */
            margin-bottom: 10px;
            font-size: 20px;
        }
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .centered-image {
            width: 300px;
            height: 250px;
            object-fit: cover;
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
    <div class="col-12 row" >
        <div class="col-2 col-lg-2 mt-4" style="border: 2px solid #000;margin-left:80px;border-radius:10px;background-color: #EFF4FF ">
            <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;background-color: #FFFFFF">
                @if($contactInfo === null) 
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                @else
                <img src="{{ Storage::url('image/profileuser/' . $contactInfo->image) }}" style="width:100px;height:100px;padding:10px; border-radius: 50%;">
                @endif
                <h4 style=" font-weight: bold;">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
            @if($surveylink)
                <a href="{{$surveylink->link}}" target="_blank" class="textmenu"><h3>แบบสอบถาม</h3></a>
            @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="/users/hometeacher" class="textmenu"><h3>ข่าวประชาสัมพันธ์</h3></a>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{ route('studentslist_teacher') }}" class="textmenu"><h3>รายชื่อนักศึกษา</h3></a>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('graduateuser_teacher')}}" class="textmenu"><h3>ทำเนียบบัณฑิต</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('teacherviewtoken')}}" class="textmenu"><h3>จัดการโค้ด</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('accTeacher')}}" class="textmenu"><h3>โปรไฟล์</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" style="font-size: 24px;">ออกจากระบบ</button>
              </form>
            </div>
            <div class="col-10 mt-5"><br></div>
            <div class="col-10 mt-5"><br></div>
            <hr class="mt-5" style="border: 2px solid #000">
            <a class="text-center" onclick="openContactModal()" style="color: black;text-decoration: none;cursor: pointer;"><h3>ติดต่อภาควิชา</h3></a>
        </div>
        <div class="col-10 col-lg-8 mt-5 ms-5">
            <div class="col-md-12">
                <h2 class="text-center">{{$view->title_name}}</h2>
                <hr class="mt-2" >
            </div>
            <div class="col-12" >
                <div class="col-12 row"> 
                    <div class="col-6 col-lg-6  text-center">
                        @if($view->category) <!-- ตรวจสอบว่า event_date ไม่ว่างเปล่า -->
                            <p style="font-size: 24px;" >ประเภทของเนื้อหา :  {{$view->category}}</p>
                        @endif
                        </div>  
                        <div class="col-6 col-lg-6  text-center">
                        @if ($view->cotent_type) <!-- ตรวจสอบว่า event_date ไม่ว่างเปล่า -->
                            @if ($view->cotent_type == 2) <!-- ตรวจสอบว่า event_date เป็น 1 -->
                                <p class="card-text" style="font-size: 24px;">วันที่จัดกิจกรรม: 
                                {{ Carbon\Carbon::parse($view->event_date)->format('d-m-Y') }}
                                </p>
                            @else
                                <p style="font-size: 24px;">วันที่ลงเนื้อหา: {{$view->created_at->format('d-m-Y')}}</p>
                            @endif
                        @endif
                        </div>
                    </div>
                    <div class="col-12 row mt-1 my-3 centered-container "> 
                    <img src="{{ asset($view->title_image) }}" class="centered-image img-fluid rounded-start" alt="Image" onclick="openModal('{{ asset($view->title_image) }}')">

                    </div>
                    <div class="col-12 row "> 
                        @if ($view->objective) <!-- ตรวจสอบว่า objective ไม่ว่างเปล่า -->
                        <div class="col-1">
                            <p style="font-size: 24px; font-weight: bold;" class="card-text">วัตถุประสงค์</p>
                        </div>
                        <div class="col-11">
                            <p style="font-size: 24px;" class="card-text">{{$view->objective}}</p>
                        </div>
                        @endif
                    </div>
                    <div class="col-12 row mt-1"> 
                        @if ($view->cotent) <!-- ตรวจสอบว่า objective ไม่ว่างเปล่า -->
                        <div class="col-1">
                            <t style="font-size: 24px; font-weight: bold;" class="card-text">เนื้อหา</t>
                        </div>
                        <div class="col-11">
                            {{$view->cotent}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="col-12 row" >
        <div class="col-2 col-lg-2 " style="margin-left:80px;">
        </div>
        <div class="col-10 col-lg-8 ms-5">
            <div class="col-12">
                <div class="row">
                    @if($view->images->count() > 0)
                    <p style="font-size: 24px; font-weight: bold;">รูปภาพกิจกรรม</p>
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
            </div>
            <div class="d-flex justify-content-center">
                <button onclick="window.location.href='{{ url('/users/hometeacher') }}'"class="btn btn-danger"style="font-size: 24px;">ย้อนกลับ</button>
            </div>
        </div>
    </div>
    <div id="imageModal" class="modal">
        <div style="display: grid; place-items: center; max-height: 80vh;">
            <p><br></p>
            <p><br></p>
            <img id="modalImage" src="ตำแหน่งรูปภาพ" style="max-width: 50%; max-height: 100%;">
            <p><br></p>
            <button id="closeButton" onclick="closeModal()" style="position: absolute; top: 10px; right: 10px; z-index: 1;">ปิด</button>
        </div>
    </div>
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 30%">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">ช่องทางการติดต่อ</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                @if($department)
                                    <div class="col-lg-12 row" style="margin-left:15px">
                                        <div class="col-lg-1">
                                            <i class="fas fa-map-marker-alt" ></i>
                                        </div>
                                    <div class="col-lg-11">
                                        <h3>{{$department->address}}</h3>
                                    </div>
                                    <div class="col-lg-12 row">
                                        <div class="col-lg-1">
                                            <i class="fas fa-phone" style="margin-top:15px"></i>
                                        </div>
                                        <div class="col-lg-11">
                                            <h3>ช่วงเวลาติดต่อ{{$department->contact_time}}<br>{{$department->phone_number}}</h3>
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
                                @endif
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
    // ปิดการใช้งานปุ่มย้อนกลับ
    history.pushState(null, null, location.href);
    window.addEventListener('popstate', function(event) {
        history.pushState(null, null, location.href);
    });
    document.getElementById('massage_file').addEventListener('change', function () {
        var fileInput = this;
        var fileCount = fileInput.files.length;
        var fileCountElement = document.getElementById('file_count');
            
        for (var i = 0; i < fileCount; i++) {
            var file = fileInput.files[i];
            var fileSize = file.size / 1024 / 1024; // แปลงขนาดเป็น MB

            var allowedExtensions = /(\.pdf|\.jpeg|\.jpg|\.png|\.svg)$/i; // ชนิดไฟล์ที่อนุญาต
            if (!allowedExtensions.exec(file.name)) {
                fileInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                fileCountElement.innerText = 'กรุณาเลือกไฟล์ที่มีนามสกุล .pdf, .jpeg, .jpg, .png, หรือ .svg';
                return;
            }
            if (fileCount > 3) {
                fileCountElement.innerText = 'กรุณาเลือกไฟล์ไม่เกิน 3 ไฟล์';
                fileInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                return;
            }
            if (fileSize > 10) {
                fileInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                fileCountElement.innerText = 'ขนาดของไฟล์ต้องไม่เกิน 10MB';
                return;
            }
        }
    });
    function openModal(imageSrc) {
        console.log="awdalwk";
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
<style>
    .my-swal-title {
        font-size: 24px; /* ปรับขนาดตามที่คุณต้องการ */
        font-weight: bold; /* กำหนดความหนาของตัวอักษร (ถ้าต้องการ) */
    }
    .swal-button{
        color:red;
    }
</style>
@if(Session::has('alert'))
    <script>
            swal({
                title: "{{ Session::get('alert') }}",
                icon: "success",
                customClass: {
                    title: "my-swal-title" // กำหนดคลาสใหม่สำหรับข้อความหัวเรื่อง
                }
            });

            // แสดงการแจ้งเตือน (alert) ด้วย JavaScript โดยใช้ค่าจาก Controller
            var msg = "{{ $msg ?? '' }}"; // กำหนดค่า msg จาก Controller
            if (msg) {
                alert(msg);
            }
    </script>
 @endif  
</body>
</html>


