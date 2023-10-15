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
                                .addImage{
                                    font-size: 24px;
                                    transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
                                }
                                .addImage:hover iconify-icon {
                                    color: #990099; /* สีของไอคอนเมื่อ hover */
                                }
                                .delete iconify-icon {
                                    font-size: 24px;
                                    color: #990000; /* สีตั้งต้นของไอคอน */
                                    transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
                                }

                                .delete:hover iconify-icon {
                                    color: #FF0033; /* สีของไอคอนเมื่อ hover */
                                }
                                .show iconify-icon {
                                    font-size: 24px;
                                    color: black; /* สีตั้งต้นของไอคอน */
                                    transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
                                }

                                .show:hover iconify-icon {
                                    color: black; /* สีของไอคอนเมื่อ hover */
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
                <h2 class="text-left">จัดการกิจกรรม</h2>
            </div>
            <hr class="mt-1">
            <div class="col-12">
                <form action="" method="GET">
                    <div class="col-12 row"> 
                        <div class="col-1 col-lg-1">
                            <button type="button"class="btn btn-warning" onclick="window.location.href='{{ route('saveactivitys') }}'" role="button" style="font-size: 24px;">เพิ่ม</button>
                        </div> 
                        <div class="col-4 col-lg-4 form-check">
                            <div class="input-group ">
                                <div class="input-group ">
                                    <span class="input-group-text"><input class="form-check-input ms-1 mt-0" style="font-size: 24px;" type="radio" name="News" id="flexRadioDefault1" value="1"></span>
                                    <span class="input-group-text"style="font-size: 24px;font-weight: bold;">ชื่อเรื่อง</span>
                                    <input type="text" style="font-size: 24px;" class="form-control" name="title_name"/>
                                </div>
                            </div>
                        </div> 
                        <div class="col-4 col-lg-4 form-check">
                            <div class="input-group ">
                                <div class="input-group ">
                                    <span class="input-group-text"><input class="form-check-input ms-1 mt-0" style="font-size: 24px;" type="radio" name="News" id="flexRadioDefault1" value="2"></span>
                                    <span class="input-group-text"style="font-size: 24px;font-weight: bold;">วันที่แก้ไข</span>
                                    <input type="date" style="font-size: 24px;" class="form-control" name="updated_at"/>
                                </div>
                            </div>
                        </div> 
                        <!-- <div class="col-4 col-lg-4 form-check">
                            <div class="input-group ">
                                <span class="input-group-text"><input class="form-check-input ms-1 mt-0" style="font-size: 24px;" type="radio" name="News" id="flexRadioDefault1" value="2"></span>
                                <span class="input-group-text"style="font-size: 24px;font-weight: bold;">วันที่แก้ไข</span>
                                <input type="date"  name="updated_at">
                            </div>
                        </div> -->
                        <div class="col-2 col-lg-3 form-check">
                            <div class="input-group ">
                                <select name="category" class="form-select" style="font-size: 24px;">
                                    <option value="all">ทั้งหมด</option>
                                    <option value="งานพบปะสังสรรค์" >งานพบปะสังสรรค์</option>
                                    <option value="งานวิชาการ">งานวิชาการ</option>
                                    <option value="งานแข่งขันกีฬา">งานแข่งขันกีฬา</option>
                                    <option value="กิจกรรมศิษย์เก่าสัมพันธ์">กิจกรรมศิษย์เก่าสัมพันธ์</option>
                                </select>
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
                                    <th scope="col"class="text-center"style="width: 350px;">ชื่อเรื่อง</th>
                                    <th scope="col"class="text-center">ตัวอย่างเนื้อหา</th>
                                    <th scope="col"class="text-center">วันที่แก้ไข</th>
                                    <th scope="col"class="text-center">ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($activitys as $row)
                                @php
                                $thaiMonths = [
                                1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                ];
                                $eventDate = \Carbon\Carbon::parse($row->event_date);
                                @endphp
                                <tr>
                                    <td>{{ Str::limit($row->title_name, 50) }}</td>
                                    <td>{{ Str::limit($row->cotent, 50) }}</td>
                                    <td scope="col"class="text-center">{{$row->updated_at->format('d')}} {{$thaiMonths[$row->updated_at->month]}} {{$row->updated_at->year + 543}}</td>
                                    <td class="text-center" >
                                    <a href="{{ url('/home/viewactivity/'.$row->id) }}" class="show" title="show" data-toggle="tooltip"><iconify-icon icon="carbon:view" style=" font-size: 24px;"></iconify-icon></a>
                                        <a href="{{ url('/activity/editactivity/'.$row->id) }}" class="edit" title="Edit" data-toggle="tooltip"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>
                                        <a href="#addImage{{$row->id}}" data-bs-toggle="modal" class="addImage" title="addImage" data-toggle="tooltip"><iconify-icon icon="clarity:image-line"></iconify-icon></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDelete({{ $row->id }})">
                                        <iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {{$activitys->links()}}
                        </div>               
                </div>    
            </div> 
        </div>        
    </div>
    @foreach($activitys as $row)
        <div class="modal fade" id="addImage{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">เพิ่มรูปกิจกรรม</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addImage', ['id' => $row->id]) }}" method="post" enctype="multipart/form-data" id="linkForm">
                                {{ csrf_field() }}
                                <div class="mb-3 @error('addImage') error @enderror">
                                    <label for="recipient-name" class="col-form-label"style="font-size: 24px;">จำนวนรูปภาพ</label>
                                    <input type="file"style="font-size: 24px;" class="form-control" id="addImage" name="addImage[]" multiple>
                                   
                                </div>
                                
                                    <label for="message-text" class="col-form-label"style="font-size: 24px;">รูปภาพที่อัพโหลด</label>
                                    <ul id="uploadedFiles"style="font-size: 24px;"></ul>
                                    
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" style="font-size: 24px;"data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary" style="font-size: 24px;"id="submitBtn" >ยืนยัน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
<script>
    const addImageInput = document.getElementById('addImage');
    const uploadedFilesList = document.getElementById('uploadedFiles');

    addImageInput.addEventListener('change', (event) => {
        uploadedFilesList.innerHTML = ''; // Clear previous entries

        const files = event.target.files;
        const maxFileSizeMB = 3; // ขนาดไฟล์สูงสุดที่อนุญาต (MB)
        const maxFileCount = 30; // จำนวนไฟล์สูงสุดที่อนุญาต

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const fileSizeMB = file.size / 1024 / 1024; // แปลงขนาดเป็น MB

            const allowedExtensions = /(\.pdf|\.jpeg|\.jpg|\.png|\.svg)$/i; // ชนิดไฟล์ที่อนุญาต
            if (!allowedExtensions.exec(file.name)) {
                addImageInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                alert('กรุณาเลือกไฟล์ที่มีนามสกุล .pdf, .jpeg, .jpg, .png, หรือ .svg');
                return;
            }
            if (files.length > maxFileCount) {
                alert('กรุณาเลือกไฟล์ไม่เกิน ' + maxFileCount + ' ไฟล์');
                addImageInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                return;
            }
            if (fileSizeMB > maxFileSizeMB) {
                addImageInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                alert('ขนาดของไฟล์ต้องไม่เกิน ' + maxFileSizeMB + ' MB');
                return;
            }

            const listItem = document.createElement('li');
            listItem.textContent = file.name;
            uploadedFilesList.appendChild(listItem);
        }
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
            text: "คุณแน่ใจที่จะลบข่าวนี้ใช่ไหม",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
            // ถ้าผู้ใช้คลิก "ตกลง"
            window.location.href = "{{ url('/new/delete/') }}" + '/' + id;
            } else {
                // ถ้าผู้ใช้คลิก "ยกเลิก"
            swal("คุณยกเลิกการลบข่าวแล้ว");
            }
        });
        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
    }
</script> 
</body>
</html>


