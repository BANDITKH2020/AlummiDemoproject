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
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h4>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="/users/homeuser" class="textmenu"><h5>หน้าหลัก</h5></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{ route('studentslist') }}" class="textmenu"><h5>รายชื่อนักศึกษา</h5></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{route('graduateuser')}}" class="textmenu"><h5>ทำเนียบบัณฑิต</h5></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{route('rewarduser')}}" class="textmenu"><h5>รางวัลประกาศ</h5></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                    @if($surveylink)
                        <a href="{{$surveylink->link}}" target="_blank" class="textmenu"><h5>แบบสอบถาม</h5></a>
                    @endif
                @endif
                
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{ route('accountuser') }}" class="textmenu"><h5>ตั้งค่าบัญชี</h5></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a style="color: black;text-decoration: none;cursor: pointer;" onclick="openMassageModal()" class="textmenu"><h5>ประวัติการติดต่อ</h5></a>
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


    <div class="container"  style="position: absolute; left: 500px; top: 180px;" >
        <div class="col-md-12">
        <h2 class="text">รายชื่อนักศึกษา</h2>
        </div>
        <hr class="mt-1" style="border: 1px solid #000">
            <form action="" method="GET" >
                <label class="form-label" style="position: absolute;left:750px;top: 65px;">
                    <select name="searchdata" class="form-select" >
                        <option value="all">ทั้งหมด</option>
                        <option value="student_id" >รหัสนักศึกษา</option>
                        <option value="firstname">ชื่อ</option>
                        <option value="lastname">นามสกุล</option>
                        <option value="graduatesem">ภาคการศึกษาที่จบ</option>
                        <option value="student_grp">กลุ่มนักศึกษา</option>
                        <option value="active">สถานะเข้าใช้งาน</option>
                    </select>
                    <div class="col-mb-2">
                        <input type="text" class="form-control" name="search" placeholder="" style="position:relative;left:250px;top:-37px" /> 
                        <button type="submit"  class="btn btn-outline-primary" style="position: absolute;left:475px;top:1px;">Search</button>
                    </div>
                </label>
            </form><br>
            <div class="col-12 my-5">
                @foreach ($student as $row) 
                <div class="row">
                    <div class="col-md-2 mt-3">
                        <div class="card text-center">
                            <img class="mx-auto mt-3" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:60%;">
                            <h5 class="mt-3">{{$row->firstname}} {{$row->lastname}}</h5>
                            <p>{{$row->student_grp}}</p>
                            <p><a class="btn btn-primary mt-2" onclick="window.location.href='{{ url('/User/studentslist/view/'.$row->id) }}'" >ดูโปรไฟล์</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $student->links() }}
            </div>
    </div>
   
    
  

















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
                                        <div class="col-lg-10">
                                            <h5>39 หมู่ที่ 1 ถนนรังสิต-นครนายก ตำบลคลองหก อำเภอคลองหลวง จังหวัดปทุมธานี</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 row" style="margin-left:15px">
                                        <div class="col-lg-1">
                                            <i class="fas fa-phone" style="margin-top:15px"></i>
                                        </div>
                                        <div class="col-lg-10">
                                            <h5>ช่วงเวลาติดต่อ จ-ศ 08.30 - 16.30 น.<br>โทร.02 549 3460</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 row" style="margin-left:15px">
                                        <div class="col-lg-1">
                                            <a href="https://www.facebook.com/ComputerEngineeringRmutt" target="_blank">
                                                <img src="{{ asset('images/facebook-icon.png') }}" style="width:25px;height:25px">
                                            </a>
                                        </div>
                                        <div class="col-lg-1">
                                            <a href="https://cpe.engineer.rmutt.ac.th/" target="_blank">
                                                <img src="{{ asset('images/www-icon.png') }}" style="width:25px;height:25px">
                                            </a>
                                        </div>
                                    </div>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7741.4212556805005!2d100.7219335028924!3d14.035159447469107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d78a4a8713c3f%3A0xf019238243532a0!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lij4Liy4LiK4Lih4LiH4LiE4Lil4LiY4Lix4LiN4Lia4Li44Lij4Li1!5e0!3m2!1sth!2sth!4v1692540328004!5m2!1sth!2sth"
                                        width="500" height="300" style="border:0;margin-top:10px;margin-left:15px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                <div class="col-lg-6">
                                    <form action="/user/post/massage" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="col-lg-12">
                                            <label class="col-form-label font-weight-bold text-dark">ชื่อเรื่อง</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm text-center bg-white" name="massage_name"
                                                required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="col-form-label font-weight-bold text-dark">ข้อความ</label>
                                            <div class="input-group">
                                                <textarea type="text" id="" rows="4" cols="100" name="massage_cotent"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">  
                                                <label class="col-form-label font-weight-bold text-dark">เลือกเอกสารที่ต้องการอัพโหลด</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="massage_file" name="massage_file">
                                                </div>
                                        </div>
                                        <br><br><br><br><br>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">ส่ง</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="MassageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ประวัติข้อความ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($messages as $date => $groupedMessages)
                    <table class="table caption-top ">
                        <thead>
                            <tr>
                            <th scope="col"colspan="4"class="table-info">{{ $groupedMessages['date'] }}</th>
                            </tr>
                        </thead>
                        @foreach ($groupedMessages['messages'] as $message)
                            @if ($message->ID_student === Auth::user()->student_id)
                            <tbody>
                                <tr>
                                <th>{{ $message->massage_name }}</th>
                                <td>{{ $message->massage_cotent }}</td>
                                <td>{{ $message->created_at->format('H:i:s') }}</td>
                                </tr>
                            </tbody>
                            @endif
                        @endforeach
                    </table>
                    @endforeach
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
    function openContactModal() {
        $('#contactModal').modal('show');
    }
    function openMassageModal() {
        $('#MassageModal').modal('show');
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


