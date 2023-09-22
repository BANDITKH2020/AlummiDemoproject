<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


  <style>
    .custom-card {
        width: 100%; /* ให้การ์ดเต็มความกว้างของ column */
        max-width: 500px; /* ขนาดสูงสุดของการ์ด */
        margin-bottom: 10px;
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

    .message-details {
        /* ให้ข้อความและวันที่อยู่ในคอลัมน์เดียว */
        display: flex;
        flex-direction: column;
    }

    /* เพิ่มสไตล์ให้เป็นตัวหนังสือหัวข้อ */
    

    /* เพิ่มสไตล์ให้กับวันที่ */
    p{
        font-size: 24px;
        color: #888;
        
    }
  </style>
  <div class="container"  style="position: absolute; left: 500px; top: 180px;">
    <div class="col-md-12">
      <h2 class="text-center">รายการข้อความ</h2>
    </div>
    <hr class="mt-1" style="border: 1px solid #000">
        <form action="" method="GET" >
            <label class="form-label" style="position: absolute;left:750px;top: 65px;">
                <select name="searchdata" class="form-select"  style="font-size: 20px;" >
                    <option value="all">ทั้งหมด</option>
                    <option value="name">ชื่อผู้ส่ง</option>
                    <option value="massage_name">ชื่อเรื่อง</option>
                    <option value="status_read">สถานะ</option>
                    <option value="status_massage">ดาว</option>
                </select>
                <div class="col-mb-2">
                    <input type="text" class="form-control" name="search" placeholder="ค้นหาข้อความ" style="font-size: 20px; position:relative;left:280px;top:-44px" /> 
                    <button type="submit"  class="btn btn-primary" style="font-size: 20px; position: absolute;left:475px;top:1px;">ค้นหา</button>
                </div>
            </label>
        </form>
    <br><br><br>
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 50rem; position: absolute;left:250px;top: 165px;" > <!-- กำหนดขนาดของ Card -->
                <div class="card-body">
                <h3 class="card-title">ข้อความจากศิษย์เก่า</h3>
                @foreach ($messages->groupBy(function ($message) {
                    return $message->created_at->format('d-m-Y');
                })->reverse() as $date => $groupedMessages)
                @php
                    $carbonDate = \Carbon\Carbon::createFromFormat('d-m-Y', $date);
                    $thaiMonths = [
                        1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                        4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                        7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                        10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                    ];
                    $thaiDate = $carbonDate->format('d') . ' ' . $thaiMonths[$carbonDate->month] . ' ' . ($carbonDate->year + 543);
                @endphp
                    <table class="table caption-top ">
                        <thead>
                            <tr>
                                <th scope="col" colspan="6" class="table-info">{{ $thaiDate }}</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupedMessages as $message)
                                <tr>
                                    <td >จาก {{ $message->firstname }} {{ $message->lastname }}<br>{{ Str::limit($message->massage_cotent, 50) }}</td>
                                    <td class="custom-action-buttons" style="text-align: right;">
                                        <a href="#view{{$message->id}}" data-bs-toggle="modal" class="view" title="view" id="view" data-toggle="tooltip">
                                            <iconify-icon icon="carbon:view" style=" font-size: 24px;"></iconify-icon></a>
                                        <a href="{{ route('readmassege', ['id' => $message->id, 'star' => 1]) }}" id="star" class="star" title="star" data-toggle="tooltip">
                                            @if ($message->status_massage === 1)
                                                <iconify-icon icon="octicon:star-fill-16" style="color: #FFCC00; font-size: 24px;"></iconify-icon>
                                            @else
                                                <iconify-icon icon="octicon:star-fill-16" style="color: black; font-size: 24px;"></iconify-icon>
                                            @endif
                                        </a>
                                    </td>
                                    @if ($message->status_read === 1)
                                        <td scope="col" class="text-center">อ่านแล้ว</td>
                                    @else
                                        <td scope="col" class="text-center">ยังไม่ได้อ่าน</td>
                                    @endif
                                    <td scope="col" class="text-center">{{ $message->created_at->format('H:i') }}</td>
                                    <td scope="col" class="text-center"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
                </div>
                {{ $messages->links() }}
            </div>
        </div>
    </div>
    @foreach ($messages as $message)
        <div class="modal fade" id="view{{$message->id}}"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" >
                    <div class="modal-header">
                        <div class="message-details">
                            <h3 style=" margin-top: 10px;font-size: 24px; ">จาก {{ $message->firstname }} {{ $message->lastname }} 
                                @if($message->status_massage === 1 )
                                    <iconify-icon icon="octicon:star-fill-16" style="color: #FFCC00;"></iconify-icon>
                                @else
                                    <iconify-icon icon="octicon:star-fill-16" style="color: black;"></iconify-icon>
                                @endif
                            </h3>
                            <p>{{ $message->created_at }}</p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('read_massege', ['id' => $message->id, 'view' => 1]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <h3>เรื่อง {{ $message->massage_name }}</h3>
                                <p>เนื้อหา {{ $message->massage_cotent }}</p>
                                @if ($message->massage_file === '-')
                                <p>ไม่มีไฟล์ที่สามารถดาวน์โหลดได้</p>
                                @else
                                    <a href="{{ asset('storage/' . $message->massage_file) }}" download><iconify-icon icon="formkit:file" style="color: black; font-size: 24px;"></iconify-icon><p>ดาวน์โหลด</p></a>
                                @endif
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

</div>
</body>
</html>
