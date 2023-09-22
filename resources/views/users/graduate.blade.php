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
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

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
                @if($contactInfo === null) 
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                @else
                <img src="{{ Storage::url('image/profileuser/' . $contactInfo->image) }}" style="width:100px;height:100px;padding:10px; border-radius: 50%;">
                @endif
                <h4 style=" font-weight: bold;">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="/users/homeuser" class="textmenu"><h3>หน้าหลัก</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{ route('studentslist') }}" class="textmenu"><h3>รายชื่อนักศึกษา</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{route('graduateuser')}}" class="textmenu"><h3>ทำเนียบบัณฑิต</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{route('rewarduser')}}" class="textmenu"><h3>รางวัลประกาศ</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
            @if($surveylink)
                <a href="{{$surveylink->link}}" target="_blank" class="textmenu"><h3>แบบสอบถาม</h3></a>
            @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{ route('accountuser') }}" class="textmenu"><h3>ตั้งค่าบัญชี</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a style="color: black;text-decoration: none;cursor: pointer;" onclick="openMassageModal()" class="textmenu"><h3>ประวัติการติดต่อ</h3></a>
                @endif
                
                
            </div>
   
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" style="font-size: 24px;">ออกจากระบบ</button>
              </form>
            </div>
            <hr class="mt-5" style="border: 2px solid #000">

            <a class="text-center" onclick="openContactModal()" style="color: black;text-decoration: none;cursor: pointer;"><h3>ติดต่อภาควิชา</h3></a>
        </div>
  </div>
  <div class="container "style="position: absolute; left: 500px; top: 180px;">
        <h2>ทำเนียบบัณฑิต</h2>
        <hr class="mt-1" style="border: 1px solid #000">
        <form action="" method="GET" >
                <label class="form-label" style="position: absolute;left:700px;top: 65px;">
                    <select name="searchdata" class="form-select"style="font-size: 20px;" >
                        <option value="all">ทั้งหมด</option>
                        <option value="graduatesem" >ปีการศึกษาที่จบ</option>
                        <option value="student_id" >รหัสนักศึกษา</option>
                        <option value="student_grp">กลุ่มนักศึกษา</option>
                        <option value="firstname">ชื่อ</option>
                        <option value="lastname">นามสกุล</option>
                    </select>
                    <div class="col-mb-2">
                        <input type="text" class="form-control" name="search" placeholder="ค้นหาบัณฑิต" style="font-size: 20px;position:relative;left:320px;top:-43px"/> 
                        <button type="submit"  class="btn btn-primary" style="font-size: 20px;position: absolute;left:525px;top:1px;">ค้นหา</button>
                    </div>
                </label>
        </form>
        <div class="d-grid gap-2 col-12 mx-auto "style="position: absolute;left:125px;top:125px;">
            <div class="row" >
                <div class="col-md-8">
                        <br>
                        <div class="card my-3" >
                            <style>
                                .table-color{
                                    background-color: Orange;
                                    color: black;
                                }
                            </style>
                            
                                <table class="table table-bordered">
                                    <thead class="table-color">
                                        <tr>
                                            <th scope="col"class="text-center">ลำดับ</th>
                                            <th scope="col"class="text-center">ปีการศึกษาที่จบ</th>
                                            <th scope="col"class="text-center">รหัสนักศึกษา</th>
                                            <th scope="col"class="text-center">ชื่อ-นามสกุล</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach($users as $row)
                                        <tr>
                                            <th scope="col"class="text-center">{{$i++}}</th>
                                            <td scope="col"class="text-center">{{$row->graduatesem}}</td>
                                            <td scope="col"class="text-center">{{$row->student_id}}</td>
                                            <td scope="col"class="text-center">{{$row->firstname}} {{$row->lastname}}</td>
                                        </tr>
                                        @endforeach  
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                {{$users->links()}}
                                </div>
                            </div>                
                        </div>    
                </div> 
            </div> 
        </div> 
    </div>
</div> 

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">ช่องทางการติดต่อ</h3>
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
                                    <iframe src="{{$department->map}}"
                                        width="500" height="300" style="border:0;margin-top:10px;margin-left:15px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                <div class="col-lg-6">
                                    <form action="/user/post/massage" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="col-lg-12">
                                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">ชื่อเรื่อง</label>
                                            <div class="input-group">
                                                <input type="text" style="font-size: 24px;"class="form-control form-control-sm text-center bg-white" name="massage_name"
                                                required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">ข้อความ</label>
                                            <div class="input-group">
                                                <textarea type="text"style="font-size: 24px;" id="" rows="4" cols="100" name="massage_cotent"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">  
                                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">เลือกเอกสารที่ต้องการอัพโหลด</label>
                                                <div class="input-group">
                                                    <input type="file"style="font-size: 24px;" class="form-control" id="massage_file" name="massage_file">
                                                </div>
                                        </div>
                                        <br><br><br><br><br>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" style="font-size: 24px;">ส่ง</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 24px;">ปิด</button>
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
                    <h3 class="modal-title" id="exampleModalLabel">ประวัติข้อความ</h3>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
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
</body>
</html>
