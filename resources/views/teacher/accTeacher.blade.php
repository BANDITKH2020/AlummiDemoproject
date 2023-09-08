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
                <h4>{{Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="/users/hometeacher" class="textmenu"><h5>หน้าหลัก</h5></a>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{ route('studentslist_teacher') }}" class="textmenu"><h5>รายชื่อนักศึกษา</h5></a>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('graduateuser_teacher')}}" class="textmenu"><h5>ทำเนียบบัณฑิต</h5></a>
                @endif
                @if (Auth::check() && Auth::user()->role_acc !== 'teacher')
                <h5>ทำเนียบบัณฑิต</h5>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('teacherviewtoken')}}" class="textmenu"><h5>จัดการโค้ด</h5></a>
                @endif
                @if (Auth::check() && Auth::user()->role_acc !== 'teacher')
                <h5>จัดการโค้ด</h5>
                @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
            @if($surveylink)
                <a href="{{$surveylink->link}}" target="_blank" class="textmenu"><h5>แบบสอบถาม</h5></a>
            @endif
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('accTeacher')}}" class="textmenu"><h5>ตั้งค่าบัญชี</h5></a>
                @endif
                @if (Auth::check() && Auth::user()->role_acc !== 'teacher')
                <h5>ตั้งค่าบัญชี</h5>
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
        <div class="col-12 mt-5">
            <h4 class="mt-3">ตั้งค่าโปรไฟล์</h4><hr>
                @php
                $thaiMonths = [
                1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                ];
                @endphp
                <div class="col-12" style="text-align: end">
                    @if($contactInfo)
                        @if($contactInfo->updated_at === null)
                            <h5>วันที่แก้ไข: วันที่ไม่มีการแก้ไข</h5>
                            @else
                                <h5>วันที่แก้ไข: {{$contactInfo->updated_at->format('d')}} {{$thaiMonths[$contactInfo->updated_at->month]}} {{$contactInfo->updated_at->year + 543}}</h5>
                            @endif
                            @else
                                <h5>วันที่แก้ไข: วันที่ไม่มีการแก้ไข</h5>
                            @endif

                        <div class="col-10 mx-auto mt-3 text-center">
                            @if($contactInfo)
                                @if($contactInfo->image === null)
                                    <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                                @else
                                    <img src="{{ Storage::url('image/profileuser/' . $contactInfo->image) }}" style="width:200px;height:200px;padding:10px; border-radius: 50%;">
                                @endif
                            @else
                                    <img src="{{ asset('images/teamwork.png') }}" style="width:200px;height:200px;padding:10px; border-radius: 50%;">
                            @endif
                            <h5>@if($user){{ $user->firstname }} {{ $user->lastname }}@endif<a  class="fas fa-pencil-alt fa-xs" style="cursor: pointer;margin-left:3px;color:#000" data-bs-toggle="modal" data-bs-target="#exampleModal"></a></h5>
                            <hr>
                        </div>
                </div>
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
                                    <div class="col-lg-11">
                                        <h5>{{$department->address}}</h5>
                                    </div>
                                    <div class="col-lg-12 row">
                                        <div class="col-lg-1">
                                            <i class="fas fa-phone" style="margin-top:15px"></i>
                                        </div>
                                        <div class="col-lg-11">
                                            <h5>ช่วงเวลาติดต่อ{{$department->contact_time}}<br>{{$department->phone_number}}</h5>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 40%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขประวัติส่วนตัว</h5>
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
                                            <h5 style="font-size: 16px; text-align: left;">1.อัพโหลดรูปถ่ายขนาดไม่เกิน 1 นิ้ว</h5>
                                            <h5 style="font-size: 16px; text-align: left;">2.ขนาดไฟล์ไม่เกิน 3 MB ชนิดของไฟล์ JPEG, PNG และ SVG</h5>
                                            <h5 style="font-size: 16px; text-align: left;"> <input type="file" name="image" accept="image/jpeg, image/png, image/svg" aria-label="Upload"></h5>   
                                        </div>
                                        </div>
                                        <hr class="mt-3">
                                        <div class="col-lg-2">
                                        <label class="col-form-label font-weight-bold text-dark">คำนำหน้า</label>
                                            @if($contactInfo)
                                                <select name="prefix" id="prefix" class="select">
                                                    <option value="{{ $contactInfo->prefix }}">{{ $contactInfo->prefix }}</option>
                                                    <option value="นาย">นาย</option>
                                                    <option value="นาง">นาง</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                </select>
                                            @else 
                                                <select name="prefix" id="prefix" class="select">
                                                    <option value="นาย">นาย</option>
                                                    <option value="นาง">นาง</option>
                                                    <option value="นางสาว">นางสาว</option>
                                                </select>
                                            @endif  
                                            </div>
                                            <div class="col-lg-3">
                                            @if($user)
                                                <label class="col-form-label font-weight-bold text-dark">ชื่อ</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="firstname"
                                                    required value="{{ $user->firstname }}">
                                                </div>
                                            @endif  
                                            </div>
                                            <div class="col-lg-3">
                                            @if($user)
                                                <label class="col-form-label font-weight-bold text-dark">นามสกุล</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="lastname"
                                                    required value="{{ $user->lastname }}">
                                                    <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                </div>
                                            @endif 
                                            </div>
                                            <hr class="mt-3">
                                            <div class="col-lg-12">
                                                <div class="d-flex align-items-center">
                                                    <label class="col-form-label font-weight-bold text-dark me-3">ช่องทางการติดต่อ</label>
                                                    @if($contactInfo)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="{{ $contactInfo->status_contact }}" id="contactCheckbox" name="status_contact" onclick="toggleContactStatus()" >
                                                        <input type="hidden" name="status_contact" id="status_contact_input">
                                                        <label class="form-check-label" for="contactCheckbox">ไม่เปิดเผยช่องทางการติดต่อ</label>
                                                    </div>
                                                    @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="contactCheckbox" name="status_contact" onclick="toggleContactStatus()" >
                                                        <input type="hidden" name="status_contact" id="status_contact_input">
                                                        <label class="form-check-label" for="contactCheckbox">ไม่เปิดเผยช่องทางการติดต่อ</label>
                                                    </div>
                                                    @endif 
                                                </div>
                                            </div>     
                                            <div class="col-lg-5">
                                                <label class="col-form-label font-weight-bold text-dark">อีเมล</label>
                                                @if($contactInfo)
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="email"
                                                    required value="{{ $contactInfo->ID_email }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="email"
                                                    required >
                                                </div>
                                                @endif 
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="col-form-label font-weight-bold text-dark">Line</label>
                                                @if($contactInfo)
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="Line"
                                                    required value="{{ $contactInfo->ID_line }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="Line"
                                                    required >
                                                </div>
                                                @endif 
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="col-form-label font-weight-bold text-dark">Facebook</label>
                                                @if($contactInfo)
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="Facebook"
                                                    required value="{{ $contactInfo->ID_facebook }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="Facebook"
                                                    required >
                                                </div>
                                                @endif 
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="col-form-label font-weight-bold text-dark">Tel.</label>
                                                @if($contactInfo)
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="Tel"
                                                    required value="{{ $contactInfo->telephone }}">
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="Tel"
                                                    required >
                                                </div>
                                                @endif 
                                            </div>
                                            <div class="col-lg-5">
                                                <label class="col-form-label font-weight-bold text-dark">Instagram</label>
                                                @if($contactInfo)
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="Instagram"
                                                    required value="{{ $contactInfo->ID_instagram }}" >
                                                </div>
                                                @else
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm text-center bg-white" name="Instagram"
                                                    required  >
                                                </div>
                                                @endif 
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var status_contact = true; // ให้เริ่มต้นเป็น true

                function toggleContactStatus() {
                var checkbox = document.getElementById("contactCheckbox");
                var statusContactInput = document.getElementById("status_contact_input");

                if (checkbox.checked) {
                    status_contact = false; // ถ้า checkbox ถูกติ๊ก
                } else {
                    status_contact = true; // ถ้า checkbox ไม่ถูกติ๊ก
                }

                // ตั้งค่า value ของ input แบบซ่อนเป็นค่า status_contact ที่อัพเดต
                statusContactInput.value = status_contact;
            }
        </script>
    </div>

    
<script>
    function openContactModal() {
        $('#contactModal').modal('show');
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


