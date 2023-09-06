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
                font-family:'THSarabunNew';
              }
        a:link {
                color: black;
                background-color: transparent;
                text-decoration: none;
              }
              .re-admin iconify-icon {
        font-size: 29px;
        color: black; /* สีตั้งต้นของไอคอน */
        }
        .re-teacher iconify-icon {
        font-size: 24px;
        color: black; /* สีตั้งต้นของไอคอน */
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
    
    <div class="col-2 mt-5" style="border: 2px solid #000;margin-left:80px;border-radius:10px;background-color: #EFF4FF ">
            <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;background-color: #EFF4FF">
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h3>{{ Auth::user()->firstname }}</h3>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/admin/home" class="textmenu"><h5>หน้าหลัก</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('manage') }}" class="textmenu"><h5>การจัดการบัญชีผู้ใช้</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
               <a href="{{ route('status') }}" class="textmenu"><h5>ปรับสภาพนักศึกษา</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('news') }}" class="textmenu"><h5>จัดการข่าวสาร</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('activitys') }}" class="textmenu"><h5>จัดการกิจกรรม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('reward') }}" class="textmenu"><h5>จัดการรางวัลประกาศ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('viewtoken') }}" class="textmenu"><h5>จัดการโค้ด</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('links') }}" class="textmenu"><h5>จัดการแบบสอบถาม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('graduate') }}" class="textmenu"><h5>จัดการทำเนียบบัณทิต</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('massege') }}" class="textmenu"><h5>รายการข้อความ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">ออกจากระบบ</button>
              </form>
            </div>
            <div  class="col-10 mt-3" style="display: flex; justify-content: center; align-items: center;">
              <a href="/register/Admin" class="re-admin" title="เพิ่มผู้ดูแลระบบ"style="margin-right: 5px;">
                  <iconify-icon icon="ri:admin-fill"></iconify-icon>
              </a>
              <a href="/register/teacher" class="re-teacher" title="เพิ่มอาจารย์"style="margin-left: 5px;">
                  <iconify-icon icon="subway:admin-1"></iconify-icon>
              </a>
            </div>
            <hr class="mt-1" style="border: 2px solid #000">
            
            <a href="{{ route('contact') }}" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
        </div>
    </div>
    
    <div class="container "style="position:absolute;left:500px;top: 215px;">
    <h2>จัดการบัญชีผู้ใช้</h2>
        <div class="mt-1" style="border: 1px solid #000">
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
                                        font-size: 16px;
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
                                
                                    <table class="table table-bordered custom-table">
                                        <thead >
                                            <tr>
                                                <th scope="col"class="text-center">ชื่อ</th>
                                                <th scope="col"class="text-center">นามสกุล</th>
                                                <th scope="col"class="text-center">ระดับผู้ใช้งาน</th>
                                                <th scope="col"class="text-center">วันที่เข้าใช้งาน</th>
                                                <th scope="col"class="text-center">อาจารย์</th>
                                                <th scope="col"class="text-center">กลุ่มนักศึกษา</th>
                                                <th scope="col"class="text-center">สถานะเข้าใช้งาน</th>
                                                <th scope="col"class="text-center">ตัวเลือก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $row)
                                                @php
                                                    $thaiMonths = [
                                                        1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                                        4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                                        7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                                        10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                                    ];
                                                    $user_id = $row->id;
                                                @endphp
                                                <tr class="custom-row">
                                                    <td scope="col" class="text-center ">{{$row->firstname}}</td>
                                                    <td scope="col" class="text-center ">{{$row->lastname}}</td>
                                                    <td scope="col" class="text-center ">{{$row->role_acc}}</td>
                                                    <td scope="col" class="text-center">
                                                @if(isset($login_at))
                                                    {{ \Carbon\Carbon::parse($login_at)->format('d') }} {{$thaiMonths[\Carbon\Carbon::parse($login_at)->month]}} {{ \Carbon\Carbon::parse($login_at)->year + 543}}
                                                @endif</td>

                                                    <td scope="col" class="text-center ">{{$row->inviteby}}</td>
                                                    <td scope="col" class="text-center ">{{$row->student_grp}}</td>
                                                    <td scope="col" class="text-center checkbox-center">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input user-status-toggle" type="checkbox" data-user-id="{{$row->id}}" {{$row->active ? 'checked' : ''}} disabled>
                                                            <label class="form-check-label" for="userStatus_{{$row->id}}"></label>
                                                        </div>
                                                    </td>
                                                    <td scope="col" class="text-center custom-column ">
                                                        <a class="edit" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>
                                                        <a href="mailto:{{$row->email}}" class="mail" title="mail" data-toggle="tooltip"><iconify-icon icon="ic:outline-mail"></iconify-icon></a>
                                                        <a href="{{ url('/Admin/manage/delete/'.$row->id) }}"  onclick="return confirm('คุณต้องการลบบริการนี้หรือไม่ ?')" class="delete" title="Delete" data-toggle="tooltip"><iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    
                                    </div>
                                    @foreach($users as $row)
                                    <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">แก้ไขข้อมูลนักศึกษา</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{url('/update-user-status/'.$row->id)}}" method="post" enctype="multipart/form-data" >
                                                {{ csrf_field() }}
                                                <div class="custom-form">
                                                    <div class="mb-3 row @error('student_id') error @enderror">
                                                        <label for="student_id" class="col-form-label custom-label">รหัสนักศึกษา</label>
                                                        <div class="col">
                                                            <input type="text" class="form-control custom-input @error('student_id') is-invalid @enderror" id="student_id" name="student_id" value="{{$row->student_id}}">
                                                            @error('student_id')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('firstname') error @enderror">
                                                        <label for="firstname" class="col-form-label custom-label">ชื่อ</label>
                                                        <div class="col">
                                                            <input type="text" class="form-control custom-input @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{$row->firstname}}">
                                                            @error('firstname')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('lastname') error @enderror">
                                                        <label for="lastname" class="col-form-label custom-label">นามสกุล</label>
                                                        <div class="col">
                                                            <input type="text" class="form-control custom-input @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{$row->lastname}}">
                                                            @error('lastname')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('graduatesem') error @enderror">
                                                        <label for="graduatesem" class="col-form-label custom-label">ภาคการศึกษาที่จบ</label>
                                                        <div class="col">
                                                            <input type="text" class="form-control custom-input @error('graduatesem') is-invalid @enderror" id="graduatesem" name="graduatesem"value="{{$row->graduatesem}}">
                                                            @error('graduatesem')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('student_grp') error @enderror">
                                                        <label for="student_grp" class="col-form-label custom-label">กลุ่มนักศึกษา</label>
                                                        <div class="col">
                                                            <input type="text" class="form-control custom-input @error('student_grp') is-invalid @enderror" id="student_grp" name="student_grp" value="{{$row->student_grp}}">
                                                            @error('student_grp')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('groupleader') error @enderror">
                                                        <label for="groupleader" class="col-form-label custom-label">สถานะหัวหน้ากลุ่ม</label>
                                                        <div class="col">
                                                            <select name="groupleader" class="form-select custom-input" value="{{$row->groupleader}}">
                                                                <option value="เป็นหัวหน้า" selected>เป็นหัวหน้า</option>
                                                                <option value="ไม่เป็นหัวหน้า">ไม่เป็นหัวหน้า</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row @error('active') error @enderror">
                                                        <label for="active" class="col-form-label custom-label">สถานะเข้าใช้งาน</label>
                                                        <div class="col">
                                                            <select name="active" class="form-select custom-input" value="{{$row->active}}">
                                                            <option value="true" {{$row->groupleader == 'true' ? 'selected' : ''}}>เปิดการใช้งาน</option>
                                                            <option value="false" {{$row->groupleader == 'false' ? 'selected' : ''}}>ปิดการใช้งาน</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                                    <button type="submit" class="btn btn-primary" id="submitBtn" >ยืนยัน</button>
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
            @if(Session::has('alert'))
            <script>
                swal("{{Session::get('alert')}}",{
                    icon: "success",
                    if(exist){
                        alert(msg);
                }});
            </script>
            @endif  
        </div>
        
</div>
</body>
</html>