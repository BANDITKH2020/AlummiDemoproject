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
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

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
        .custom-action-buttons a {
        margin-right: 10px; /* กำหนดระยะห่างด้านขวาของปุ่ม */
    }
        .view iconify-icon {
            font-size: 24px;
            color: black; /* สีตั้งต้นของไอคอน */
            transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
        }

        .view:hover iconify-icon {
            color: #778899; /* สีของไอคอนเมื่อ hover */
        }
        .star iconify-icon {
            font-size: 24px;
            
        }
        
        .icon-text-container {
            display: flex;
            align-items: center;
            gap: 10px; /* ระยะห่างระหว่างไอคอนและข้อมูล */

            /* เพิ่มขอบรอบและระยะห่างรอบ */
            padding: 10px;
            border-radius: 5px;
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
                <h2 class="text-left">รายการข้อความ</h2>
            </div>
            <hr class="mt-1">
            <div class="col-12" >
                <form action="" method="GET">
                    <div class="col-12 row"> 
                        <div class="col-6 col-lg-7">
                        </div> 
                        <div class="col-4 col-lg-2">
                        <select name="searchdata" class="form-select"style="font-size: 24px;" >
                            <option value="all">ทั้งหมด</option>
                            <option value="name">ชื่อผู้ส่ง</option>
                            <option value="massage_name">ชื่อเรื่อง</option>
                            <option value="status_read">สถานะ</option>
                            <option value="status_massage">ดาว</option>
                        </select>   
                        </div>  
                        <div class="col-2 col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ค้นหาข้อความ" style="font-size: 24px;" /> 
                                <button type="submit"  class="btn btn-primary" style="font-size: 24px;">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-10 mt-5 ms-5 ">
                        <table class="table table-bordered">
                            <thead class="table-warning" >
                                <tr>
                                    <th scope="col"class="text-center"style="width: 200px;">ชื่อผู้ส่ง</th>
                                    <th scope="col"class="text-center"style="width: 250px;">ชื่อเรื่อง</th>
                                    <th scope="col"class="text-center"style="width: 150px;">ไฟล์แนบ</th>
                                    <th scope="col"class="text-center"style="width: 250px;">วันเวลาที่ส่ง</th>
                                    <th scope="col"class="text-center"style="width: 120px;">สถานะ</th>
                                    <th scope="col"class="text-center"style="width: 120px;">ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $row)
                            @php
                            $thaiMonths = [
                                1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                            ];
                            @endphp
                                <tr>
                                    <td>{{ $row->firstname }} {{ $row->lastname }}</td>
                                    <td>{{$row->massage_name}}</td>
                                    <td class="text-center">
                                    @foreach($fileMassage as $file)
                                        @if($file->massage_id == $row->id)
                                            @if(Str::contains($file->massage_file, '.png'))
                                            <a href="{{ asset('storage/' . $file->massage_file) }}" target="_blank" class="file-link"><i class="fa-solid fa-file-image"></i></a>
                                            @endif
                                            @if(Str::contains($file->massage_file, '.jpg'))
                                            <a href="{{ asset('storage/' . $file->massage_file) }}" target="_blank" class="file-link"><i class="fa-solid fa-image"></i></a>
                                            @endif
                                            @if(Str::contains($file->massage_file, '.jpeg'))
                                            <a href="{{ asset('storage/' . $file->massage_file) }}" target="_blank" class="file-link"><i class="fa-regular fa-image"></i></a>
                                            @endif
                                            @if(Str::contains($file->massage_file, '.pdf'))
                                            <a href="{{ asset('storage/' . $file->massage_file) }}" target="_blank"><i class="fa-solid fa-file-pdf"></i></a>
                                            @endif
                                            @if(Str::contains($file->massage_file, '.svg'))
                                            <a href="{{ asset('storage/' . $file->massage_file) }}" target="_blank"><i class="fa-regular fa-file"></i></a>
                                            @endif
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>{{$row->created_at->format('d')}} {{$thaiMonths[$row->created_at->month]}} {{$row->created_at->year + 543}} เวลา {{$row->created_at->format('H:m')}} น.</td>
                                    @if($row->status_read == 0)
                                    <td class="text-center">ยังไม่ได้อ่าน</td>
                                    @else
                                    <td class="text-center">อ่านแล้ว</td>
                                    @endif
                                    <td class="text-center">
                                        <a href="#view{{$row->id}}" data-bs-toggle="modal" class="view" title="view" id="view" data-toggle="tooltip">
                                            <iconify-icon icon="carbon:view" style=" font-size: 24px;"></iconify-icon></a>
                                        <a href="{{ route('readmassege', ['id' => $row->id, 'star' => 1]) }}" id="star" class="star" title="star" data-toggle="tooltip">
                                            @if ($row->status_massage === 1)
                                                <iconify-icon icon="octicon:star-fill-16" style="color: #FFCC00; font-size: 24px;"></iconify-icon>
                                            @else
                                                <iconify-icon icon="octicon:star-fill-16" style="color: black; font-size: 24px;"></iconify-icon>
                                            @endif
                                        </a>
                                        @foreach($users as $user)
                                            @if($user->student_id === $row->ID_student)
                                            <a href="mailto:{{$user->email}}" class="mail" title="mail" data-toggle="tooltip"><iconify-icon icon="ic:outline-mail"></iconify-icon></a>
                                               
                                            @endif
                                        @endforeach
                                        
                                    </td>
                                </tr>
                            @endforeach 
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $messages->links() }}
                        </div>               
                </div>    
            </div> 
        </div>        
    </div>
    @foreach ($messages as $row)
    <div class="modal fade" id="view{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('read_massege', ['id' => $row->id, 'view' => 1]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                
                                <h3>เรื่อง {{ $row->massage_name }}</h3>
                                <p>เนื้อหา {{ $row->massage_cotent }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" style="font-size: 24px;">ปิด</button>
                            </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    @endforeach

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


