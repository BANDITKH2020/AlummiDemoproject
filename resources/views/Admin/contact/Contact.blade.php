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
                font-family:'THSarabunNew';
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
                top:275px;
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
    <div class="container">
        <div class="centered-text">
            <h1>ช่องทางการติดต่อ</h1>
        </div>
        <div class="d-flex justify-content-center">
            <hr class="vertical-hr">
        </div>
        @if($department)
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
                    <h2>ช่วงเวลาติดต่อ{{$department->contact_time}}<br>{{$department->phone_number}}</h2>
                </div>
            </div>
            <div class="col-lg-12 row" style="margin-left:55px">
                <div class="col-lg-1">
                    <a href="{{$department->facebook}}" target="_blank">
                        <img src="{{ asset('images/facebook-icon.png') }}" style="width:50px;height:50px">
                    </a>
                </div>
                <div class="col-lg-1">
                    <a href="{{$department->web}}" target="_blank">
                        <img src="{{ asset('images/www-icon.png') }}" style="width:50px;height:50px">
                    </a>
                </div>
                </div>
            </div>
        </div>
        <div class="custom-map">
            <iframe src="{{$department->map}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        @endif
        <div class="d-flex justify-content" style="position:absolute;left:842.5px;top: 755px;">
            <button class="btn btn-info" onclick="window.location.href='/admin/home'" role="button" style="margin-right: 10px;">กลับหน้าหลัก</button>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#department" role="button" >แก้ไขข้อมูลภาควิชา</button>
        </div>
    </div>

    <div class="modal fade" id="department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">ข้อมูลติดต่อ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/Admin/Contact/save')}}" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="col-lg-12 row">
                    <div class="col-lg-12 mt-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="" required>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <label for="contact_time" class="form-label">ช่วงเวลาติดต่อ</label>
                        <input type="text" name="contact_time" class="form-control" id="contact_time" placeholder="" required>
                    </div>  
                    <div class="col-lg-6 mt-3">
                        <label for="phone_number" class="form-label">เบอร์โทร</label>
                        <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="" required>
                    </div>   
                    <div class="col-lg-12 mt-3">
                        <label for="facebook" class="form-label">facebook</label>
                        <input type="text" name="facebook" class="form-control" id="facebook" placeholder="" required>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="web" class="form-label">เว็บภาควิชาวิศวกรรมคอมพิวเตอร์</label>
                        <input type="text" name="web" class="form-control" id="web" placeholder="" required>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="map" class="form-label">แผนที่มหาวิยาลัย</label>
                        <input type="text" name="map" class="form-control" id="map" placeholder="" required>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>
    @if(Session::has('alert'))
        <script>
            swal("{{Session::get('alert')}}",{
                icon: "success",
                if(exist){
                    alert(msg);
            }});
        </script>
    @endif  
</body>
</html>
