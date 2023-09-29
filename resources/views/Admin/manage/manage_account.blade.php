<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <a href="/admin/home" class="textmenu"><h3>หน้าข่าวประชาสัมพันธ์</h3></a>
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
    
    <div class="container "style="position:absolute;left:500px;top: 215px;">
    <h2>จัดการบัญชีผู้ใช้</h2>
    <hr class="mt-1" style="border: 1px solid #000">
    <button class="btn btn-warning" onclick="window.location.href='{{url('/register/Admin')}}'" role="button" style="font-size: 24px;">เพิ่มบัญชีผู้ดูแลระบบ</button>
    <button class="btn btn-info" onclick="window.location.href='{{url('/register/teacher')}}'" role="button" style="font-size: 24px;">เพิ่มบัญชีอาจารย์</button>
        <div class="mt-1" style=" font-size: 20px;">
            <form action="" method="GET" >
                    <label class="form-label" style="position: absolute;left:750px;top: 65px;font-size: 24px;">
                        <select name="searchdata" class="form-select" style="font-size: 24px;">
                            <option value="all">ทั้งหมด</option>
                            <option value="student_id" >รหัสนักศึกษา</option>
                            <option value="firstname">ชื่อ</option>
                            <option value="lastname">นามสกุล</option>
                            <option value="graduatesem">ภาคการศึกษาที่จบ</option>
                            <option value="student_grp">กลุ่มนักศึกษา</option>
                            <option value="active">สถานะสิทธิเข้าใช้งาน</option>
                        </select>
                        <div class="col-mb-2">
                            <input type="text" class="form-control" name="search" placeholder="ค้นหาบัญชี" style="font-size: 24px;position:relative;left:260px;top:-48px" /> 
                            <button type="submit"  class="btn btn-primary" style="font-size: 24px;position: absolute;left:475px;top:1px;">ค้นหา</button>
                        </div>
                    </label>
            </form>
            <div class="d-grid gap-2 col-12 mx-auto "style="position: absolute;left:125px;top:125px;">
                <div class="row" >
                    <div class="col-md-10">
                            <br>
                            <div class="card my-3" >
                                <style>
                                    .custom-action-buttons {
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: center;
                                    }

                                    .custom-action-buttons a {
                                        margin-right: 10px; /* กำหนดระยะห่างด้านขวาของปุ่ม */
                                    }
                                    .custom-action-buttons a.btn {
                                        color: black;
                                    }
                                    .custom-icon {
                                        font-size: 24px;
                                        color: #FFC107;
                                    }
                                    
                                    .mail iconify-icon {
                                        font-size: 24px;
                                        color: black; /* สีตั้งต้นของไอคอน */
                                        transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
                                    }

                                    .mail:hover iconify-icon {
                                        color: #778899; /* สีของไอคอนเมื่อ hover */
                                    }
                                    .edit iconify-icon {
                                        font-size: 24px;
                                        color: #fd7e14; /* สีตั้งต้นของไอคอน */
                                        transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
                                    }

                                    .edit:hover iconify-icon {
                                        color: yellow; /* สีของไอคอนเมื่อ hover */
                                    }
                                    .delete iconify-icon {
                                        font-size: 24px;
                                        color: #990000; /* สีตั้งต้นของไอคอน */
                                        transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
                                    }

                                    .delete:hover iconify-icon {
                                        color: #FF0033; /* สีของไอคอนเมื่อ hover */
                                    }
                                    .checkbox-center {
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        height: 100%;
                                    }
                                    .form-check-input.user-status-toggle:disabled + .form-check-label::before {
                                        border-color: red; /* เปลี่ยนสีของเข็มเมื่อปิดการใช้งาน */
                                    }
                                    .custom-form {
                                        max-width: 600px;
                                        margin: 0 auto;
                                        padding: 20px;
                                        border: 1px solid #ccc;
                                        border-radius: 10px;
                                        box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
                                    }

                                    .custom-label {
                                        font-size: 24px;
                                        width: 40%;
                                        text-align: right;
                                        padding-right: 10px;
                                        padding-top: 5px;
                                    }

                                    .custom-input {
                                        width: 60%;
                                        border: 1px solid #ccc;
                                        padding: 5px;
                                        border-radius: 5px;
                                    }

                                    .mb-3 {
                                        margin-bottom: 15px;
                                    }

                                    .error {
                                        border-color: #ff5252;
                                    }
                                    .custom-column {
                                        width: 100px; /* แก้ไขขนาดตามที่คุณต้องการ */
                                    }
                                    .custom-table {
                                        width: 120%; /* แก้ไขขนาดตามที่คุณต้องการ */
                                        max-width: 1095px; /* แก้ไขขนาดตามที่คุณต้องการ */
                                    }
                                    
                                </style>
                                
                                    <table class="table table-bordered custom-table" style="font-size: 24px;">
                                        <thead >
                                            <tr>
                                                <th scope="col"class="text-center">ชื่อ</th>
                                                <th scope="col"class="text-center">นามสกุล</th>
                                                <th scope="col"class="text-center">ระดับผู้ใช้งาน</th>
                                                <th scope="col"class="text-center">วันที่เข้าใช้งาน</th>
                                                <th scope="col"class="text-center">ผู้เชิญเข้าระบบ</th>
                                                <th scope="col"class="text-center">กลุ่มนักศึกษา</th>
                                                <th scope="col"class="text-center">สถานะการใช้งานระบบ</th>
                                                <th scope="col"class="text-center">ตัวเลือก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $row)
                                                @if($row->firstname === 'Admintest')
                                                @else
                                                @php
                                                    $thaiMonths = [
                                                        1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                                        4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                                        7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                                        10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                                    ];
                                                    $loginDate = \Carbon\Carbon::parse($row->login_at);

                                                @endphp
                                                <tr class="custom-row">
                                                    <td scope="col" >{{$row->firstname}}</td>
                                                    <td scope="col" >{{$row->lastname}}</td>
                                                    @if($row->role_acc === 'teacher')
                                                    <td scope="col" >อาจารย์</td>
                                                    @elseif ($row->role_acc == 'student')
                                                    <td scope="col" >ศิษย์เก่า</td>
                                                    @else
                                                    <td scope="col" >ผู้ดูแลระบบ</td>
                                                    @endif
                                                    <td scope="col" class="text-center"> {{$loginDate->format('d')}} {{$thaiMonths[$loginDate->month]}} {{$loginDate->year + 543}}</td>
                                                    <td scope="col" >{{$row->inviteby}}</td>
                                                    <td scope="col" >{{$row->student_grp}}</td>
                                                    <td scope="col" class="text-center checkbox-center">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input user-status-toggle" type="checkbox" data-user-id="{{$row->id}}" {{$row->active ? 'checked' : ''}} disabled>
                                                            <label class="form-check-label" for="userStatus_{{$row->id}}"></label>
                                                        </div>
                                                    </td>
                                                    <td scope="col" class="text-center custom-column ">
                                                        <a class="edit" data-bs-toggle="modal" data-bs-target="#manage{{$row->id}}"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>
                                                        <a href="mailto:{{$row->email}}" class="mail" title="mail" data-toggle="tooltip"><iconify-icon icon="ic:outline-mail"></iconify-icon></a>
                                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDelete({{ $row->id }})">
                                                        <iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{$users->links()}}
                                    </div>
                                    @foreach($users as $row)
                                    <div class="modal fade" id="manage{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{url('/update-user-status/'.$row->id)}}" method="post" enctype="multipart/form-data" >
                                                {{ csrf_field() }}
                                                <div class="custom-form" >
                                                    @if($row->role_acc === 'Admin')
                                                    <div class="mb-3 row @error('active') error @enderror">
                                                        <label for="active" class="col-form-label custom-label">สถานะการใช้งานระบบ</label>
                                                        <div class="col">
                                                            <select name="active" class="form-select custom-input" value="{{$row->active}}">
                                                            @if($row->active == 1 )
                                                            <option value="true" >เปิดการใช้งาน</option>
                                                            <option value="false">ปิดการใช้งาน</option>
                                                            @endif
                                                            @if($row->active == 0 )
                                                            <option value="false">ปิดการใช้งาน</option>
                                                            <option value="true" >เปิดการใช้งาน</option>
                                                            @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="mb-3 row @error('student_id') error @enderror">
                                                        <label for="student_id" class="col-form-label custom-label"style="font-size: 24px;">รหัสนักศึกษา</label>
                                                        <div class="col">
                                                            <input type="text"style="font-size: 24px;" class="form-control custom-input @error('student_id') is-invalid @enderror" id="student_id" name="student_id" value="{{$row->student_id}}">
                                                            @error('student_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('firstname') error @enderror">
                                                        <label for="firstname" class="col-form-label custom-label"style="font-size: 24px;">ชื่อ</label>
                                                        <div class="col">
                                                            <input type="text"style="font-size: 24px;" class="form-control custom-input @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{$row->firstname}}">
                                                            @error('firstname')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('lastname') error @enderror">
                                                        <label for="lastname" class="col-form-label custom-label"style="font-size: 24px;">นามสกุล</label>
                                                        <div class="col">
                                                            <input type="text" style="font-size: 24px;"class="form-control custom-input @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{$row->lastname}}">
                                                            @error('lastname')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('graduatesem') error @enderror">
                                                        <label for="graduatesem" class="col-form-label custom-label"style="font-size: 24px;">ภาคการศึกษาที่จบ</label>
                                                        <div class="col">
                                                            <input type="text"style="font-size: 24px;" class="form-control custom-input @error('graduatesem') is-invalid @enderror" id="graduatesem" name="graduatesem"value="{{$row->graduatesem}}">
                                                            @error('graduatesem')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('student_grp') error @enderror">
                                                        <label for="student_grp" class="col-form-label custom-label"style="font-size: 24px;">กลุ่มนักศึกษา</label>
                                                        <div class="col">
                                                            <input type="text" style="font-size: 24px;"class="form-control custom-input @error('student_grp') is-invalid @enderror" id="student_grp" name="student_grp" value="{{$row->student_grp}}">
                                                            @error('student_grp')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('groupleader') error @enderror">
                                                        <label for="groupleader" class="col-form-label custom-label"style="font-size: 24px;">สถานะหัวหน้ากลุ่ม</label>
                                                        <div class="col">
                                                            <select name="groupleader" class="form-select custom-input" style="font-size: 24px;"value="{{$row->groupleader}}">
                                                                @if($row->groupleader == 'เป็นหัวหน้า' )
                                                                <option value="เป็นหัวหน้า" >เป็นหัวหน้า</option>
                                                                <option value="ไม่เป็นหัวหน้า">ไม่เป็นหัวหน้า</option>
                                                                @endif
                                                                @if($row->groupleader == 'ไม่เป็นหัวหน้า' )
                                                                <option value="ไม่เป็นหัวหน้า">ไม่เป็นหัวหน้า</option>
                                                                <option value="เป็นหัวหน้า" >เป็นหัวหน้า</option>
                                                                @endif
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('active') error @enderror">
                                                        <label for="active" class="col-form-label custom-label"style="font-size: 24px;">สถานะการใช้งานระบบ</label>
                                                        <div class="col">
                                                            <select name="active" class="form-select custom-input"style="font-size: 24px;" value="{{$row->active}}">
                                                            @if($row->active == 1 )
                                                            <option value="true" >เปิดการใช้งาน</option>
                                                            <option value="false">ปิดการใช้งาน</option>
                                                            @endif
                                                            @if($row->active == 0 )
                                                            <option value="false">ปิดการใช้งาน</option>
                                                            <option value="true" >เปิดการใช้งาน</option>
                                                            @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"style="font-size: 24px;">ยกเลิก</button>
                                                    <button type="submit" class="btn btn-primary" id="submitBtn"style="font-size: 24px;" >ยืนยัน</button>
                                                </div>
                                            </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach 
                            </div>               
                        </div>    
                    </div> 
                </div> 
            </div>
            <style>
        .my-swal-title {
            font-size: 24px; /* ปรับขนาดตามที่คุณต้องการ */
            font-weight: bold; /* กำหนดความหนาของตัวอักษร (ถ้าต้องการ) */
        }
        </style>
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
            <script>
            function confirmDelete(id) {
            swal({
                title: "",
                text: "คุณแน่ใจที่จะลบบัญชีนี้ใช่ไหม",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                // ถ้าผู้ใช้คลิก "ตกลง"
                window.location.href = "{{ url('/Admin/manage/delete/') }}" + '/' + id;
                } else {
                // ถ้าผู้ใช้คลิก "ยกเลิก"
                swal("คุณยกเลิกการลบบัญชีนี้แล้ว");
                }
            });
            return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
            }
        </script> 
        </div>
        
</div>
</body>
</html>
