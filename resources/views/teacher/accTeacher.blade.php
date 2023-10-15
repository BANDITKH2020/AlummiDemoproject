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
        .custom-card {
        width: 100%; /* ให้การ์ดเต็มความกว้างของ column */
        max-width: 300px; /* ขนาดสูงสุดของการ์ด */
        margin-bottom: 10px;
        font-size: 20px;
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
                @if($contactInfo === null) 
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                @else
                <img src="{{ Storage::url('image/profileuser/' . $contactInfo->image) }}" style="width:100px;height:100px;padding:10px; border-radius: 50%;">
                @endif
                <h4 style=" font-weight: bold;">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
            @if($surveylink)
                <a href="{{$surveylink->link}}" target="_blank" class="textmenu"><h3>แบบสอบถาม</h3></a>
            @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="/users/hometeacher" class="textmenu"><h3>ข่าวประชาสัมพันธ์</h3></a>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{ route('studentslist_teacher') }}" class="textmenu"><h3>รายชื่อนักศึกษา</h3></a>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('graduateuser_teacher')}}" class="textmenu"><h3>ทำเนียบบัณฑิต</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('teacherviewtoken')}}" class="textmenu"><h3>จัดการโค้ด</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('accTeacher')}}" class="textmenu"><h3>โปรไฟล์</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" style="font-size: 24px;">ออกจากระบบ</button>
              </form>
            </div>
            <div class="col-10 mt-5"><br></div>
            <div class="col-10 mt-5"><br></div>
            <hr class="mt-5" style="border: 2px solid #000">
            <a class="text-center" onclick="openContactModal()" style="color: black;text-decoration: none;cursor: pointer;"><h3>ติดต่อภาควิชา</h3></a>
        </div>
        <div class="col-10 col-lg-8 mt-5 ms-5">
            <div class="col-md-12">
                <h2 class="text-left">แก้ไขข้อมูล <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></h2>
            </div>
            <hr class="mt-1">
                <div class="col-lg-12 mt-2">   
                    <div class="row" >
                        <table width="100%" >
                            <tr>
                                <td colspan="3" align="center">
                                @if($contactInfo)
                                    @if($contactInfo->image === null)
                                    @else
                                        <img src="{{ Storage::url('image/profileuser/' . $contactInfo->image) }}" style="width:200px;height:200px;padding:10px; border-radius: 50%;">
                                    @endif
                                @else
                                    <img src="{{ asset('images/teamwork.png') }}" style="width:200px;height:200px;padding:10px; border-radius: 50%;">
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="45%">ชื่อ-นามสกุล : </td>
                                <td width="1%"></td>
                                <td width="43%">
                                        @if($user)
                                            @if($contactInfo)
                                                @if($contactInfo->prefix === null)

                                                @else
                                                    {{ $contactInfo->prefix }} {{ $user->firstname }} {{ $user->lastname }}
                                                @endif
                                            @else
                                                {{ $user->firstname }} {{ $user->lastname }}
                                            @endif
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="45%">อีเมล :</td>
                                <td></td>
                                <td>@if($contactInfo)
                                        @if($contactInfo->ID_email !== null)
                                            {{ $contactInfo->ID_email }}
                                        @endif 
                                    @else    
                                    -                       
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="45%">Facebook :</td>
                                <td></td>
                                <td>@if($contactInfo)
                                    @if($contactInfo->ID_facebook !== null)
                                        {{ $contactInfo->ID_facebook }}
                                    @endif 
                                    @else
                                     -                       
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="45%">Instagram :</td>
                                <td></td>
                                <td>@if($contactInfo)
                                    @if($contactInfo->ID_instagram !== null)
                                        {{ $contactInfo->ID_instagram }}
                                    @endif 
                                    @else
                                    -                       
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="45%">Line :</td>
                                <td></td>
                                <td>@if($contactInfo)
                                    @if($contactInfo->ID_line !== null)
                                        {{ $contactInfo->ID_line }}
                                    @endif 
                                    @else
                                    -                        
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="right" width="45%">Telephone :</td>
                                <td></td>
                                <td>@if($contactInfo)
                                    @if($contactInfo->telephone !== null)
                                        {{ $contactInfo->telephone }}
                                    @endif 
                                    @else
                                    -                        
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 40%">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">แก้ไขประวัติส่วนตัว</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/Teacher/accountuser/saveaccount/addaccount')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-lg-12">
                    <div class="col-lg-12 row">
                        <div class="col-lg-12 row">
                            <div class="col-lg-4">
                            @if($contactInfo)
                                <img src="{{ Storage::url('image/profileuser/' . $contactInfo->image) }}" style="width:200px;height:200px;padding:10px; border-radius: 50%;">
                            @else
                                <img src="{{ asset('images/teamwork.png') }}" style="width:200px;height:200px;padding:10px; border-radius: 50%;">
                            @endif
                            </div>
                            <div class="col-lg-8" style="margin-top:50px ">
                                <p style="font-size: 24px; text-align: left;">อัพโหลดรูปถ่ายขนาดไม่เกิน 1 นิ้ว</p>
                                <p style="font-size: 24px; text-align: left;">ขนาดไฟล์ไม่เกิน 3 MB ชนิดของไฟล์ JPEG, PNG และ SVG</p>
                                <input type="file" style="font-size: 20px;" name="image_profile" id="image_profile" accept="image/jpeg, image/png, image/svg" aria-label="Upload">
                            </div> 
                            <hr class="mt-3">
                            <div class="col-lg-2">  
                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">คำนำหน้า</label>
                                @if($contactInfo)
                                <select name="prefix" class="form-select"style="font-size: 24px;">
                                    <option value="{{ $contactInfo->prefix }}">{{ $contactInfo->prefix }}</option>
                                    @if($contactInfo->prefix == 'นาย' )
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    @endif
                                    @if($contactInfo->prefix == 'นาง' )
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    @endif
                                    @if($contactInfo->prefix == 'นางสาว' )
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    @endif                              
                                </select>
                                @else
                                <select name="prefix" class="form-select" style="font-size: 20px;">
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>  
                                </select>
                                @endif
                            </div>
                            <div class="col-lg-3">
                            @if($user)
                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">ชื่อ</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm text-left bg-white" name="firstname"
                                    required value="{{ $user->firstname }}"style="font-size: 24px;">
                                </div>
                            @endif     
                            </div>
                            <div class="col-lg-3">
                            @if($user)
                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">นามสกุล</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm text-left bg-white" name="lastname"
                                    required value="{{ $user->lastname }}" style="font-size: 24px;">
                                    <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                </div>
                            @endif 
                            </div>
                            <hr class="mt-3">
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center">
                                    <label class="col-form-label font-weight-bold text-dark me-3"style="font-size: 24px;">ช่องทางการติดต่อ</label>                   
                                </div>
                            </div>
                            <div class="col-lg-5">              
                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">อีเมล</label>
                                @if($contactInfo)
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm text-left bg-white" name="email"
                                    required value="{{ $contactInfo->ID_email }}"style="font-size: 24px;">
                                </div>
                                @else
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm text-left bg-white" name="email"
                                    required style="font-size: 24px;">
                                </div>
                                @endif 
                            </div>
                            <div class="col-lg-5">
                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">Line</label>
                                @if($contactInfo)
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm text-left bg-white" name="Line"
                                    required value="{{ $contactInfo->ID_line }}"style="font-size: 24px;">
                                </div>
                                @else
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm text-left bg-white" name="Line"
                                    required style="font-size: 24px;">
                                </div>
                                @endif 
                            </div>
                            <div class="col-lg-5">
                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">Facebook</label>
                                @if($contactInfo)
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm text-left bg-white" name="Facebook"
                                    required value="{{ $contactInfo->ID_facebook }}"style="font-size: 24px;">
                                </div>
                                @else
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm text-left bg-white" name="Facebook"
                                    required style="font-size: 24px;">
                                </div>
                                @endif 
                            </div>
                            <div class="col-lg-5">
                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">Tel.</label>
                                @if($contactInfo)
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-left bg-white" name="Tel"
                                        required value="{{ $contactInfo->telephone }}"style="font-size: 24px;">
                                    </div>
                                @else
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-left bg-white" name="Tel"
                                        required style="font-size: 24px;">
                                    </div>
                                @endif 
                            </div>  
                            <div class="row">
                                <div class="col-lg-5">
                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">Instagram</label>
                                    @if($contactInfo)
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-left bg-white" name="Instagram"
                                        required value="{{ $contactInfo->ID_instagram }}"style="font-size: 24px;" >
                                    </div>
                                    @else
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-left bg-white" name="Instagram"
                                        required style="font-size: 24px;" >
                                    </div>
                                    @endif  
                                </div>
                                <div class="col-lg-6 mt-5 " >
                                    <div class="form-check">
                                    @if($contactInfo)
                                        <input class="form-check-input" type="checkbox" value="{{ $contactInfo->status_contact }}" id="contactCheckbox" name="status_contact" 
                                        onclick="toggleContactStatus(this)"
                                        @if($contactInfo->status_contact)
                                            checked
                                        @endif>
                                        @if($contactInfo)
                                        <input type="hidden" name="status_contact" id="status_contact_input" value="{{ $contactInfo->status_contact }}">
                                        <label class="form-check-label" for="contactCheckbox">
                                            ไม่เปิดเผยช่องทางการติดต่อแก่ผู้อื่น
                                        </label>
                                        @endif
                                    @else
                                        <input class="form-check-input" type="checkbox" id="contactCheckbox" name="status_contact"style="font-size: 24px;">
                                        <label class="form-check-label" for="contactCheckbox">
                                            ไม่เปิดเผยช่องทางการติดต่อแก่ผู้อื่น
                                        </label>
                                    @endif     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
                <div class="modal-footer mt-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 24px;">ปิด</button>
                    <button type="submit" class="btn btn-primary"style="font-size: 24px;">บันทึก</button>
                </div>
                </form>   
            </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 30%">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">ช่องทางการติดต่อ</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                @if($department)
                                    <div class="col-lg-12 row" style="margin-left:15px">
                                        <div class="col-lg-1">
                                            <i class="fas fa-map-marker-alt" ></i>
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
                                </div>
                                <div class="col-lg-6">
                                    <iframe src="{{$department->map}}"
                                        width="500" height="300" style="border:0;margin-top:10px;margin-left:15px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function openContactModal() {
        $('#contactModal').modal('show');
    }
    // ปิดการใช้งานปุ่มย้อนกลับ
    history.pushState(null, null, location.href);
    window.addEventListener('popstate', function(event) {
        history.pushState(null, null, location.href);
    });
    function checkFileSize() {
    const input = document.getElementById('image_profile');
    const maxSizeInBytes = 3 * 1024 * 1024; 
    const fileSize = input.files[0].size;
    const fileSizeInMB = fileSize / (1024 * 1024);
    const allowedFileTypes = ['image/jpeg', 'image/png', 'image/svg+xml']; // รายการประเภทไฟล์ที่อนุญาต

    if (fileSize > maxSizeInBytes) {
        alert('ไฟล์ใหญ่เกินไป กรุณาเลือกไฟล์ขนาดไม่เกิน 3MB');
        input.value = '';
        return false;
    } else if (!allowedFileTypes.includes(input.files[0].type)) {
        alert('รูปแบบไฟล์ไม่ถูกต้อง กรุณาเลือกไฟล์ .jpg, .png, หรือ .svg');
        input.value = '';
        return false;
    } else if(OthAttentioncheckbok.checked == false ){
        OthAttentiontextbox.value = "";
    }
     else {
        return true;
    }
    }
    function toggleContactStatus(checkbox) {
        var statusContactInput = document.getElementById('status_contact_input');
        if (checkbox.checked == 1) {
            statusContactInput.value = true; // กำหนดค่าให้เป็น 1 เมื่อ checkbox ถูกติก
        }else{
            statusContactInput.value = false;
        }
    }
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
</body>
</html>


