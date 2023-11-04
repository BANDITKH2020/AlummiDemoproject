<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        body {
                font-family:'TH Niramit AS';
                font-size: 20px;
            }
        a:link {
                color: black;
                background-color: transparent;
                text-decoration: none;
            }
        .centered-text {
                text-align: center;
            }
        .vertical-hr {
                border: none;
                border-left: 3px solid #000;
                height: 500px; /* ความสูงที่คุณต้องการ */
                margin-top: 1rem; /* ระยะห่างด้านบน */
                
            }
        .custom-icon {
                font-size: 2rem;
                position: absolute;
                left:350px;
                top:325px;
            }
        .custom-tel {
                font-size: 2rem;
                position: absolute;
                left:350px;
                top:475px;
            }
        .custom-face {
                font-size: 2rem;
                position: absolute;
                left:350px;
                top:585px;
            }
        .custom-school {
                font-size: 2rem;
                position: absolute;
                left:350px;
                top:645px;
            }
        .custom-map { 
                position: absolute;
                left:1050px;
                top:205px;
            }
        h3{
            font-weight: bold;
        }
        h2{
            font-weight: bold;
        }
        h1{
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
    <div class="container">
        <div class="centered-text">
            <h1>ช่องทางการติดต่อ</h1>
        </div>
        <div class="d-flex justify-content-center">
            <hr class="vertical-hr">
        </div>
        @if($department === null)
            <div style="position: absolute;left:275px;top:325px;" >
            <h1>ไม่ได้เพิ่มข้อมูลการติดต่อ</h1>
            </div>
        @else
            <div style="position: absolute;left:275px;top:325px;" >
                <div class="col-lg-6">
                    <div class="col-lg-12 row" style="margin-left:15px">
                        <div class="col-lg-1">
                            <i class="fas fa-map-marker-alt" style="margin-top:15px"></i>
                        </div>
                    <div class="col-lg-10">
                        <h2>{{$department->address}}</h2>
                    </div>
                </div>
                <div class="col-lg-12 row" style="margin-left:15px">
                    <div class="col-lg-1">
                        <i class="fas fa-phone" style="margin-top:15px"></i>
                    </div>
                    <div class="col-lg-11">
                        <h2>ช่วงเวลาติดต่อ {{$department->contact_time}}<br>{{$department->phone_number}}</h2>
                    </div>
                </div>
                <div class="col-lg-8 row" style="margin-left:50px">
                    <div class="col-lg-2">
                        <a href="{{$department->facebook}}" target="_blank">
                            <img src="{{ asset('images/facebook-icon.png') }}" style="height:40px">
                        </a>
                    </div>
                    <div class="col-lg-1">
                        <a href="{{$department->web}}" target="_blank">
                            <img src="{{ asset('images/www-icon.png') }}" style="height:40px">
                        </a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="custom-map"style="margin-left:40px">
                <iframe src="{{$department->map}}" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        @endif
       
    </div>
    <div style="position:absolute;left:832.5px;top: 755px;">
            <button class="btn btn-info"    onclick="window.location.href='/admin/home'" role="button" style="margin-right: 10px;font-size: 24px;" >กลับหน้าหลัก</button>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#department" role="button" style="font-size: 24px;">แก้ไขข้อมูลภาควิชา</button>
    </div>
    <div class="modal fade" id="department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered"style="max-width: 30%;">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalLabel">ข้อมูลติดต่อภาควิชา</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if($department === null)
            <div class="modal-body">
                <form action="{{url('/Admin/Contact/save')}}" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="col-lg-12 row">
                    <div class="col-lg-12 mt-3">
                        <label for="address" class="form-label" style="font-size: 24px;">ที่อยู่</label>
                        <input type="text" name="address" class="form-control" style="font-size: 24px;"id="address" placeholder="" value="" style="font-size: 20px;" required>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="contact_time" class="form-label" style="font-size: 24px;">ช่วงเวลาติดต่อ</label>
                        <input type="text" name="contact_time" class="form-control" id="contact_time"style="font-size: 24px;" placeholder="" value="" style="font-size: 20px;"  required>
                    </div>  
                    <div class="col-lg-6 mt-3">
                        <label for="phone_number" class="form-label"style="font-size: 24px;">เบอร์โทร</label>
                        <input type="text" name="phone_number" class="form-control"style="font-size: 24px;" id="phone_number" placeholder="" value="" style="font-size: 20px;"required>
                    </div>   
                    <div class="col-lg-12 mt-3">
                        <label for="facebook" class="form-label"style="font-size: 24px;">Facebook</label>
                        <input type="text" name="facebook" class="form-control" id="facebook" style="font-size: 24px;"placeholder="" value="" style="font-size: 20px;"required>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="web" class="form-label"style="font-size: 24px;">เว็บภาควิชา</label>
                        <input type="text" name="web" class="form-control" id="web"style="font-size: 24px;" placeholder="" value="" style="font-size: 20px;" required>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="map" class="form-label"style="font-size: 24px;">โค้ดฝังของแผนที่</label> 
                        </div>
                        <div class="col" style="text-align:right; color:blue;">
                            <p type="text" style="font-size: 24px;"  data-bs-toggle="popover" title="วิธีนำโค้ดฝังแผนที่มาใช้งาน" data-bs-content="ใช้โค้ดฝังดังตัวอย่างนี้!! https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509.706946324125!2d100.72991286843705!3d14.036090222993476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d78a4a8713c3f%3A0xf019238243532a0!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lij4Liy4LiK4Lih4LiH4LiE4Lil4LiY4Lix4LiN4Lia4Li44Lij4Li1!5e0!3m2!1sth!2sth!4v1695547909346!5m2!1sth!2sth">ตัวอย่าง</p>
                        </div>
                        
                    </div>
                    <div class="col-lg-12 mt-3 ms-2">
                        <textarea type="text"style="font-size: 24px;" name="map" rows="3" cols="25" class="form-control" placeholder="ถ้าไม่มีเนื้อหาส่วนนี้ให้ใส่ -"aria-label="With textarea"></textarea>
                    </div>
                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 24px;">ปิด</button>
                    <button button type="submit" class="btn btn-primary"style="font-size: 24px;">บันทึกข้อมูล</button>
                </div>
                </form>
            </div>
            @else
            <div class="modal-body">
                <form action="{{url('/Admin/Contact/save')}}" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="col-lg-12 row">
                    <div class="col-lg-12 mt-3">
                        <label for="address" class="form-label" style="font-size: 24px;">ที่อยู่</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="" value="{{$department->address}}" style="font-size: 24px;" required>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="contact_time" class="form-label" style="font-size: 24px;">ช่วงเวลาติดต่อ</label>
                        <input type="text" name="contact_time" class="form-control" id="contact_time" placeholder="" value="{{$department->contact_time}}" style="font-size: 24px;"  required>
                    </div>  
                    <div class="col-lg-6 mt-3">
                        <label for="phone_number" class="form-label"style="font-size: 24px;">เบอร์โทร</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="" value="{{$department->phone_number}}" style="font-size: 24px;"required>
                    </div>   
                    <div class="col-lg-12 mt-3">
                        <label for="facebook" class="form-label"style="font-size: 24px;">Facebook</label>
                        <input type="text" name="facebook" class="form-control" id="facebook" placeholder="" value="{{$department->facebook}}" style="font-size: 24px;"required>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="web" class="form-label"style="font-size: 24px;">เว็บภาควิชาวิศวกรรมคอมพิวเตอร์</label>
                        <input type="text" name="web" class="form-control" id="web" placeholder="" value="{{$department->web}}" style="font-size: 24px;" required>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="map" class="form-label"style="font-size: 24px;">แผนที่มหาวิทยาลัย</label> 
                        </div>
                        <div class="col" style="text-align:right; color:blue;">
                            <p type="text" style="font-size: 24px;"  data-bs-toggle="popover" title="วิธีนำโค้ดฝังแผนที่มาใช้งาน" data-bs-content="ใช้โค้ดฝังดังตัวอย่างนี้!! https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509.706946324125!2d100.72991286843705!3d14.036090222993476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d78a4a8713c3f%3A0xf019238243532a0!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lij4Liy4LiK4Lih4LiH4LiE4Lil4LiY4Lix4LiN4Lia4Li44Lij4Li1!5e0!3m2!1sth!2sth!4v1695547909346!5m2!1sth!2sth ">ตัวอย่าง</p>
                        </div>
                        
                    </div>
                    <div class="col-lg-12 mt-1 ms-1">
                    <textarea type="text"style="font-size: 24px;" name="map" rows="3" cols="25" class="form-control" placeholder="ถ้าไม่มีเนื้อหาส่วนนี้ให้ใส่ -"aria-label="With textarea">{{$department->map}}</textarea>
                    </div> 
                </div>
                <div class="modal-footer mt-3 ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 24px;">ปิด</button>
                    <button button type="submit" class="btn btn-primary"style="font-size: 24px;">บันทึกข้อมูล</button>
                </div>
                </form>
            </div>
            @endif
            </div>
        </div>
    </div>
    
    <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
    })
    </script>
        <style>
        .my-swal-title {
            font-size: 24px; /* ปรับขนาดตามที่คุณต้องการ */
            font-weight: bold; /* กำหนดความหนาของตัวอักษร (ถ้าต้องการ) */
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
        @if(Session::has('error'))
        <script>
            swal({
                title: "{{ Session::get('error') }}",
                icon: "error",
                customClass: {
                    title: "my-swal-title" // กำหนดคลาสใหม่สำหรับข้อความหัวเรื่อง
                }
            });

            // แสดงการแจ้งเตือน (error) ด้วย JavaScript โดยใช้ค่าจาก Controller
            var msg = "{{ $msg ?? '' }}"; // กำหนดค่า msg จาก Controller
            if (msg) {
                alert(msg);
            }
        </script>
        @endif
</body>
</html>
