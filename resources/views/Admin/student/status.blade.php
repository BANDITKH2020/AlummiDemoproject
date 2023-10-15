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
        .table-color{
            background-color: Orange;
            color: black;
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
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h4 style=" font-weight: bold;">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/admin/home" class="textmenu"><h3 >หน้าข่าวประชาสัมพันธ์</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('status') }}" class="textmenu"><h3>ปรับสถานภาพนักศึกษา</h3></a>
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
            <hr class="mt-5" style="border: 2px solid #000">
            <a href="{{ route('contact') }}" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
        </div>
        <div class="col-10 col-lg-8 mt-5 ms-5">
            <div class="col-md-12">
                <h2 class="text-left">ปรับสถานภาพนักศึกษา</h2>
            </div>
            <hr class="mt-1">
            <div class="col-12" >
                <form action="" method="GET">
                    <div class="col-12 row"> 
                        <div class="col-6 col-lg-7">
                        <button type="button" class="btn btn-warning" id="openModalButton" data-bs-toggle="modal" data-bs-target="#statusStudent" style="font-size: 24px;">
                        ปรับสถานะนักศึกษา
                        </button>
                        </div> 
                        <div class="col-4 col-lg-2">
                        <select name="searchdata" class="form-select"style="font-size: 24px;" >
                            <option value="all">ทั้งหมด</option>
                            <option value="student_id" >รหัสนักศึกษา</option>
                            <option value="firstname">ชื่อ</option>
                            <option value="lastname">นามสกุล</option>
                            <option value="graduatesem">ภาคการศึกษาที่จบ</option>
                            <option value="Term">ปีการศึกษาที่จบ</option>
                            <option value="student_grp">กลุ่มนักศึกษา</option>
                            <option value="educational_status">สถานภาพ</option>
                        </select>   
                        </div>  
                        <div class="col-2 col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ค้นหานักศึกษา" style="font-size: 24px;" /> 
                                <button type="submit"  class="btn btn-primary" style="font-size: 24px;">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12  ">
                <div class="col-10 mt-5">
                    <div class="card"style="margin-left: 100px; " >
                        <table class="table table-bordered">
                            <thead class="table-warning">
                                <tr>
                                    <th scope="col"class="text-center"><input type="checkbox" id="checkboxall" name="checkboxall" aria-label="เลือกทั้งหมด"></th>
                                    <th scope="col"class="text-center">รหัสนักศึกษา</th>
                                    <th scope="col"class="text-center">ชื่อ</th>
                                    <th scope="col"class="text-center">นามสกุล</th>
                                    <th scope="col"class="text-center">ปีการศึกษา</th>
                                    <th scope="col"class="text-center">กลุ่มนักศึกษา</th>
                                    <th scope="col"class="text-center">สถานภาพ</th>
                                </tr>
                            </thead>
                            <tbody>     
                                @foreach($users as $row)
                                <tr>
                                    @if($row->educational_status =='จบการศึกษา')
                                    <td scope="col"class="text-center"></td>
                                    <td scope="col"class="text-center">{{$row->student_id}}</td>
                                    <td scope="col">{{$row->firstname}}</td>
                                    <td scope="col">{{$row->lastname}}</td>
                                    <td scope="col"class="text-center">{{$row->graduatesem}}</td>
                                    <td scope="col"class="text-center">{{$row->student_grp}}</td>
                                    <td scope="col"class="text-center">{{$row->educational_status}}</td>
                                    @else
                                    <td scope="col"class="text-center"><input type="checkbox" class="checkbox" name="checkbox[]" value="{{$row->id}}" aria-label="เลือกรายการ"></td>
                                    <td scope="col"class="text-center">{{$row->student_id}}</td>
                                    <td scope="col">{{$row->firstname}}</td>
                                    <td scope="col">{{$row->lastname}}</td>
                                    <td scope="col"class="text-center">{{$row->graduatesem}}</td>
                                    <td scope="col"class="text-center">{{$row->student_grp}}</td>
                                    <td scope="col"class="text-center">{{$row->educational_status}}</td>
                                    @endif
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
    <div class="modal fade" id="statusStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel" >การปรับสถานะนักศึกษา</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" > <!-- ตรวจสอบ ID ที่ถูกต้องให้กับอิลิเมนต์นี้ -->
                    <h4>จำนวนนักศึกษาที่ปรับสถานะ <span id="selectedIdsCount"></span> คน</h4>  
                    <span id="selectedIds" style="display: none;"></span> 
                    <form action="/Admin/student/status/graduatesem_up" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                        <div id="graduatesemForm" style="display: none;">
                            <div class="row">
                                <div class="col mb-3 @error('graduatesem') error @enderror">
                                    <label for="recipient-name" class="col-form-label" style="font-size: 26px;">ปีการศึกษาที่จบ</label>
                                    <input type="text" class="form-control" id="graduatesem" name="graduatesem" style="font-size: 24px;">
                                </div>
                                <div class="col mb-3 @error('graduatesem') error @enderror">
                                    <label for="recipient-name" class="col-form-label" style="font-size: 26px;">ภาคการศึกษาที่จบ</label>
                                    <select name="Term" class="form-select" style="font-size: 24px;">
                                        <option value="1">ภาคเรียน 1</option>
                                        <option value="2">ภาคเรียน 2</option>
                                        <option value="3">ฤดูร้อน</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="message" style="display: none;">
                            <div class="alert alert-danger" role="alert">
                            กรุณาเลือกนักศึกษาเพื่อปรับสถานภาพ
                            </div>
                        </div>
                        <div id="messageon" style="display: block;">
                            <div class="alert alert-danger" role="alert">
                            กรุณาเลือกนักศึกษาเพื่อปรับสถานภาพ
                            </div>
                        </div>
                        <input type="hidden" id="selectedIdsInput" name="selectedIds" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"style="font-size:24px;">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary" id="submitBtn" style="font-size:24px;">ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxAll = document.getElementById("checkboxall");
        const checkboxes = document.querySelectorAll('.checkbox');
        const selectedIdsElement = document.getElementById("selectedIds");
        const selectedIdsCountSpan = document.getElementById("selectedIdsCount");
        checkboxAll.addEventListener("change", function() {
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = checkboxAll.checked;
            });
        });

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                const allChecked = Array.from(checkboxes).every(function(checkbox) {
                    return checkbox.checked;
                });
                checkboxAll.checked = allChecked;
            });
        });
        checkboxAll.addEventListener("change", function() {
            var graduatesemForm = document.getElementById("graduatesemForm");
            var messageElement = document.getElementById("message");
            var messageonElement = document.getElementById("messageon");
            if (checkboxAll.checked) {
                checkboxes.forEach(function(checkbox) {
                    console.log("Checkbox with value " + checkbox.value + " is checked: " + checkbox.checked);
                    graduatesemForm.style.display = "block";
                    messageElement.style.display = "none";
                    messageonElement.style.display = "none";
                });
            } else {
                graduatesemForm.style.display = "none";
                messageElement.style.display = "block";
                console.clear(); // เคลียร์ค่าใน Console เมื่อ checkboxAll ไม่ถูกเลือก
            }
        });
        openModalButton.addEventListener("click", function() {  
            const selectedIds = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);    
            selectedIdsElement.textContent = selectedIds.join(", ");
            selectedIdsCountSpan.textContent = selectedIds.length.toString();
            document.getElementById("selectedIdsInput").value = selectedIds.join(",");
        });
    });
</script>
<style>
    .my-swal-title {
        font-size: 24px; /* ปรับขนาดตามที่คุณต้องการ */
        font-weight: bold; /* กำหนดความหนาของตัวอักษร (ถ้าต้องการ) */
    }
    .swal-button{
        font-size: 24px;
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


