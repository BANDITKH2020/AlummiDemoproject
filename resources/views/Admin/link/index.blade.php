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
                                    justify-content: center;
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
                <h2 class="text-left">จัดการแบบสอบถาม</h2>
            </div>
            <hr class="mt-1">
            <div class="col-12">
                <form action="{{ url('/search') }}" method="GET">
                    <div class="col-12 row"> 
                        <div class="col-4 col-lg-4">
                        <button type="button" class="btn btn-warning" style="font-size: 24px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                เพิ่มลิงก์
                        </button>
                        </div> 
                        <div class="col-5 col-lg-5"> 
                        </div>  
                        <div class="col-3 col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ปีการศึกษาที่จบ" style="font-size: 24px;" /> 
                                <button type="submit"  class="btn btn-primary" style="font-size: 24px;">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 ms-5 ">
                <div class="col-10 mt-5">
                        <table class="table table-bordered">
                            <thead class="table-warning" >
                                <tr>
                                    <th scope="col"class="text-center">ปีการศึกษาที่จบ</th>
                                    <th scope="col"class="text-center">ลิงก์</th>
                                    <th scope="col"class="text-center">วันที่แก้ไข</th>
                                    <th scope="col"class="text-center">ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($surveylink as $row)
                            @php
                                $thaiMonths = [
                                    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                    4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                    7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                    10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                ];
                            @endphp
                                <tr>
                                    <td class="text-center">{{$row->graduatedyear}}</td>
                                    <td><a href="{{$row->link}}" target="_blank">{{$row->link}}</a></td>
                                    @if($row->updated_at)
                                    <td class="text-center">{{$row->updated_at->format('d')}} {{$thaiMonths[$row->updated_at->month]}} {{$row->updated_at->year + 543}}</td>
                                    @else
                                    <td class="text-center">-</td>
                                    @endif
                                    <td class="custom-action-buttons">
                                        <a href="#edit{{$row->id}}" data-bs-toggle="modal" class="edit" title="Edit" data-toggle="tooltip"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDelete({{ $row->id }})">
                                        <iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$surveylink->links()}}
                        </div>               
                </div>    
            </div> 
        </div>        
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">เพิ่มลิงก์</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('addlinks')}}" method="post" enctype="multipart/form-data" id="linkForm">
                    {{ csrf_field() }}
                        <div class="mb-3 @error('graduatedyear') error @enderror">
                            <label for="recipient-name" class="col-form-label"style="font-size: 24px;">ปีการศึกษาที่จบ</label>
                            <input type="text" class="form-control" id="graduatedyear" name="graduatedyear" style="font-size: 24px;">  
                        </div>
                        <div class="mb-3 @error('link') error @enderror">
                            <label for="message-text"style="font-size: 24px;" class="col-form-label">ลิงก์แบบสอบถาม</label>
                            <input type="text" class="form-control" id="link" name="link" style="font-size: 24px;"> 
                        </div>
                        <div class="mb-3 @error('sendEmail') error @enderror">
                            <label for="message-text" class="col-form-label"style="font-size: 24px;">ส่งข้อความ</label>
                            <select name="sendEmail" class="form-select"style="font-size: 24px;">
                                <option value="1">ใช่</option>
                                <option value="0">ไม่ใช่</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button"style="font-size: 24px;" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" style="font-size: 24px;" class="btn btn-primary" id="submitBtn" disabled>ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
    @foreach($surveylink as $row)
        <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">แก้ไขลิงก์</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('/link/update/'.$row->id)}}" method="post" enctype="multipart/form-data" id="linkForm">
                                {{ csrf_field() }}
                                <div class="mb-3 @error('graduatedyear') error @enderror">
                                    <label for="recipient-name" class="col-form-label"style="font-size: 24px;">ปีการศึกษาที่จบ</label>
                                    <input type="text" class="form-control" id="graduatedyear" name="graduatedyear" value="{{$row->graduatedyear}}"style="font-size: 24px;" >
                                   
                                </div>
                                <div class="mb-3 @error('link') error @enderror">
                                    <label for="message-text" class="col-form-label"style="font-size: 24px;">ลิงก์แบบสอบถาม</label>
                                    <input type="text" class="form-control" id="link" name="link" value="{{$row->link}}"style="font-size: 24px;">
                                </div>
                                <div class="mb-3 @error('sendEmail') error @enderror">
                                    <label for="message-text" class="col-form-label"style="font-size: 24px;">ส่งข้อความ</label>
                                    <select name="sendEmail" class="form-select"style="font-size: 24px;">
                                        <option value="1">ใช่</option>
                                        <option value="0">ไม่ใช่</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"style="font-size: 24px;">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary" id="submitBtn" style="font-size: 24px;">ยืนยัน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div> 
    @endforeach   
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('linkForm');
        const graduatedYearInput = document.getElementById('graduatedyear');
        const linkInput = document.getElementById('link');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('input', function () {
        // ตรวจสอบว่าทั้งสอง input fields มีค่าที่ไม่เป็นช่องว่าง
        const graduatedYearValue = graduatedYearInput.value.trim();
        const linkValue = linkInput.value.trim();
            if (graduatedYearValue !== '' && linkValue !== '') {
                // ถ้าทั้งสอง input fields ถูกกรอกครบถ้วน ปลด attribute disabled ในปุ่ม Submit
                submitBtn.removeAttribute('disabled');
            } else {
                // ถ้ามีอย่างน้อยหนึ่ง input field ไม่ถูกกรอกหรือทั้งสอง fields ไม่ถูกกรอกครบ ให้เพิ่ม attribute disabled ในปุ่ม Submit
                submitBtn.setAttribute('disabled', 'disabled');
            }
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
    .swal-buttons{
        font-size: 24px;
    }
    .swal-text{
        font-size: 24px;
        font-weight: bold;
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
<script>
    function confirmDelete(id) {
        swal({
            title: "",
            text: "คุณแน่ใจที่จะลบลิงค์นี้ใช่ไหม",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            // ถ้าผู้ใช้คลิก "ตกลง"
            window.location.href = "{{ url('/link/delete/') }}" + '/' + id;
            } else {
                // ถ้าผู้ใช้คลิก "ยกเลิก"
            swal("คุณยกเลิกการลบลิงค์แล้ว");
            }
        });
        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
    }
</script> 
</body>
</html>


