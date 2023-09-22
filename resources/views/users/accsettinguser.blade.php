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

        h5:hover{
            /* color: #05FF2D; */
        }
        .delete iconify-icon {
            font-size: 24px;
            color: #990000; /* สีตั้งต้นของไอคอน */
            transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
        }
        .delete:hover iconify-icon {
            color: #FF0033; /* สีของไอคอนเมื่อ hover */
        }
        .horizontal-text {
            display: flex; /* ให้แสดงเป็น Flex Container */
            flex-direction: row; /* กำหนดเรียงแนวนอน */
            align-items: center; /* ให้เนื้อหาอยู่ตรงกลางแนวดิ่ง */
        }
        .horizontal-text h5 {
            margin-right: 10px; /* กำหนดระยะห่างระหว่างข้อความ */
        }
        h3{
            font-weight: bold;
        }
        h2{
            font-weight: bold;
        }
        p{
            font-size: 20px;
        }
        h4{
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
        .custom-input {
            width: 40%;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
        }
        .tab button.active {
            background-color: #ccc;
        }

            /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: none;
        }
        .edit iconify-icon {
            font-size: 24px;
            color: #fd7e14; /* สีตั้งต้นของไอคอน */
            transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
        }

        .edit:hover iconify-icon {
            color: yellow; /* สีของไอคอนเมื่อ hover */
        } 
    </style>
    <div class="container"  style="position: absolute; left: 500px; top: 180px;" >
        <div class="col-12 ">
            <h2>ตั้งค่าโปรไฟล์</h2>
            <hr>
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
                        <p>วันที่แก้ไข: วันที่ไม่มีการแก้ไข</p>
                    @else
                        <p>วันที่แก้ไข: {{$contactInfo->updated_at->format('d')}} {{$thaiMonths[$contactInfo->updated_at->month]}} {{$contactInfo->updated_at->year + 543}}</p>
                    @endif
                @else
                    <p>วันที่แก้ไข: วันที่ไม่มีการแก้ไข</p>
                @endif
            </div>
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
                <h4>@if($user){{ $user->firstname }} {{ $user->lastname }}@endif<a  class="fas fa-pencil-alt fa-xs" style="cursor: pointer;margin-left:3px;color:#000" data-bs-toggle="modal" data-bs-target="#exampleModal"></a></h4>
            </div>
            <br>
        </div>
        <div class="col-12 row">
        <hr class="mt-5" style="border: 1px solid #000">
            <div class="row" style="text-align: center;" >
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" onclick="openCity(event, 'ประวัติการศึกษา')" id="defaultOpen"><h4>ประวัติการศึกษา <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#Educationinfo"></i></h4></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="margin-left: 180px;" onclick="openCity(event, 'ประวัติการทำงาน')" ><h4>ประวัติการทำงาน <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#Workhistoryinfo"></i></h4></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-left: 180px;" onclick="openCity(event, 'ทักษะ')" id="defaultOpen"><h4>ทักษะ <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#Skill_info"></i></h4></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="margin-left: 180px;" onclick="openCity(event, 'ประวัติการฝึกอบรม')" ><h4>ประวัติการฝึกอบรม <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#Tranning_info"></i></h4></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container" style="position: relative; left: 200px; ">
            <div id="ประวัติการศึกษา" class="tabcontent mt-3">
                @if($education_infom)
                    @if($education_infom === null)
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อสถาบัน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">คณะ :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">สาขา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">วุฒิการศึกษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">เกรดเฉลี่ย :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ปีที่สำเร็จการศึกษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                    @else
                    <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อสถาบัน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education_infom->School_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">คณะ :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education_infom->faculty_study }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">สาขา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{$education_infom->field_study }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">วุฒิการศึกษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education_infom->degree }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">เกรดเฉลี่ย :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education_infom->gpa }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ปีที่สำเร็จการศึกษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education_infom->endyear }}</p>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="container" style="position: relative; left: 200px; "> 
            <div id="ประวัติการทำงาน" class="tabcontent mt-3">
                @if($Workhistory_info)
                @php
                $thaiMonths = [
                    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                    4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                    7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                    10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                ];
                @endphp
                    @if($Workhistory_info === null)
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อบริษัท :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ตำแหน่งงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">รายละเอียดงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">เริ่มต้นทำงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">สิ้นสุดทำงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ช่วงเงินเดือน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ที่อยู่บริษัท :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ประเภทของงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อบริษัท :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $Workhistory_info->Company_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ตำแหน่งงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $Workhistory_info->position }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">รายละเอียดงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $Workhistory_info->desctiption }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">เริ่มต้นทำงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $thaiMonths[\Carbon\Carbon::parse($Workhistory_info->startdate)->format('n')] }}/{{ \Carbon\Carbon::parse($Workhistory_info->startdate)->format('Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">สิ้นสุดทำงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $thaiMonths[\Carbon\Carbon::parse($Workhistory_info->enddate)->format('n')] }}/{{ \Carbon\Carbon::parse($Workhistory_info->enddate)->format('Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ช่วงเงินเดือน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $Workhistory_info->salary }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ที่อยู่บริษัท :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $Workhistory_info->Company_add }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ประเภทของงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $Workhistory_info->worktype }}</p>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <div class="container" style="position: relative; left: 200px; "> 
            <div id="ทักษะ" class="tabcontent mt-3">
                @if($Skill)
                    @if($Skill === null)
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ทักษะ :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>   
                    @else
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ทักษะ :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $Skill->Skill_name }}</p>
                            </div>
                        </div>
                    @endif
                @endif 
                @if($language)
                    @if($language === null)
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ภาษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ฟัง :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">พูด :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">อ่าน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">เขียน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ภาษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $language->language }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ฟัง :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $language->listening }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">พูด :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $language->speaking }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">อ่าน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $language->reading }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">เขียน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $language->writing }}</p>
                            </div>
                        </div>
                    @endif
                @endif 
            </div>
        </div>
        <div class="container" style="position: relative; left: 200px; ">
        <div id="ประวัติการฝึกอบรม" class="tabcontent mt-3">
                @if($Tranning)
                    @php
                    $thaiMonths = [
                        1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                        4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                        7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                        10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                        
                    ];
                    $startdate = \Carbon\Carbon::parse($Tranning->startdate);
                    $enddate = \Carbon\Carbon::parse($Tranning->enddate);
                    @endphp
                    @if($Tranning === null)
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อบริษัท/หน่วยงานที่จัดอบรม :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">วันที่เริ่มอบรม :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">วันที่สิ้นสุดอบรม :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $Tranning->Certi_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อบริษัท/หน่วยงานที่จัดอบรม :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $Tranning->Organize_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">วันที่เริ่มอบรม :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$startdate->format('d')}} {{$thaiMonths[$startdate->month]}} {{$startdate->year + 543}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">วันที่สิ้นสุดอบรม :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$enddate->format('d')}} {{$thaiMonths[$enddate->month]}} {{$enddate->year + 543}}</p>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("nav-link");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // โปรดตั้งค่าแท็บเริ่มต้นที่คุณต้องการให้เปิดโดยค่าเริ่มต้น
            document.getElementById("defaultOpen").click();
        </script>


    </div>         
                    <div>
                        <div class="modal fade" id="Tranning_info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="staticBackdropLabel">ประวัติการฝึกอบรม</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('addTranning') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <div class="container">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                        <div class="mb-3">
                                                            <label class="form-label" style="font-size: 20px;">ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร</label>
                                                            <input type="text" style="font-size: 20px;" class="form-control" name="Certi_name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"style="font-size: 20px;">ชื่อบริษัท/หน่วยงานที่จัดอบรม</label>
                                                            <input type="text" style="font-size: 20px;"class="form-control" name="Organize_name" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label"style="font-size: 20px;">วันที่เริ่ม</label>
                                                                <input type="date" style="font-size: 20px;"class="form-control" name="startdate">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label"style="font-size: 20px;">วันที่จบ</label>
                                                                <input type="date" style="font-size: 20px;"class="form-control" name="enddate">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container mt-2">
                                                @php
                                                $thaiMonths = [
                                                    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                                    4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                                    7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                                    10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                                ];
                                                @endphp
                                                 
                                                <table class="table">  
                                                @foreach($Tranning_info as $row)
                                                    @php
                                                        $startdate = \Carbon\Carbon::parse($row->startdate);
                                                        $enddate = \Carbon\Carbon::parse($row->enddate);
                                                    @endphp
                                                        <tbody>
                                                            <tr>
                                                                <td>อันดับ :{{ $loop->iteration }}</td>
                                                                <td> {{$row->Certi_name}} </td>
                                                                <td> {{$row->Organize_name}} </td>
                                                                <td> {{$startdate->format('d')}} {{$thaiMonths[$startdate->month]}} {{$startdate->year + 543}} </td>
                                                                <td> {{$enddate->format('d')}} {{$thaiMonths[$enddate->month]}} {{$enddate->year + 543}} </td>                             
                                                                <td>
                                                                    <label class="col-form-label font-weight-bold text-danger">
                                                                        <a href="#editTranning{{$row->id}}" class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>    
                                                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDeleteTraining({{ $row->id }})">
                                                                        <iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                @endforeach
                                                </table>
                                                <div class="d-flex justify-content-center">
                                                    {{$Tranning_info->links()}}
                                                </div>
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 20px;">ปิด</button>
                                                <button type="submit" class="btn btn-primary" style="font-size: 20px;">บันทึก</button>
                                            </div>
                                        </form>
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
                    <style>
                    /* สร้างคลาสใหม่เพื่อกำหนดขนาดตัวอักษรของข้อความใน SweetAlert */
                    .swal-text {
                        font-size: 24px; /* ปรับขนาดตามที่คุณต้องการ */
                    }
                    </style>
                    <script>
                        function confirmDeleteTraining (id) {
                        swal({
                            title: "",
                            text: "คุณแน่ใจที่จะลบใบประกอบวิชาชีพ/ประกาศนียบัตรนี้ใช่ไหม",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                            // ถ้าผู้ใช้คลิก "ตกลง"
                            window.location.href = "{{ url('/User/accountuser/tranning/delete/') }}" + '/' + id;
                            } else {
                            // ถ้าผู้ใช้คลิก "ยกเลิก"
                            swal("คุณยกเลิกการลบใบประกอบวิชาชีพ/ประกาศนียบัตรแล้ว");
                            }
                        });
                        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
                        }
                    </script> 
                    <div>
                        
                        @foreach($Tranning_info as $row)
                            <div class="modal fade" id="editTranning{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">แก้ไขประวัติการฝึกอบรม</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetPage()"></button>
                                    </div>
                                    <div class="modal-body">
                                            <form action="{{ url('/update/tranning/ .$row->id') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="container">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <input type="hidden" id="selectedIdsInput" name="id" value="{{ $row->id}}">
                                                            <div class="mb-3">
                                                                <label class="form-label" style="font-size: 20px;">ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร</label>
                                                                <input type="text" style="font-size: 20px;" class="form-control" name="Certi_name" value="{{$row->Certi_name}}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" style="font-size: 20px;">ชื่อบริษัท/หน่วยงานที่จัดอบรม</label>
                                                                <input type="text"  style="font-size: 20px;" class="form-control" name="Organize_name" value="{{$row->Organize_name}}" required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label" style="font-size: 20px;">วันที่เริ่ม</label>
                                                                    <input type="date"  style="font-size: 20px;" class="form-control" name="startdate" value="{{$row->startdate}}">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label"style="font-size: 20px;">วันที่จบ</label>
                                                                    <input type="date" style="font-size: 20px;" class="form-control" name="enddate"value="{{$row->enddate}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPage()" style="font-size: 20px;">ปิด</button>
                                                    <button type="submit" class="btn btn-primary" style="font-size: 20px;">บันทึก</button>
                                                </div>  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                    </div>
                    <div>
                        @foreach($Workhistory as $Why  )
                        <div class="modal fade" id="edit{{$Why->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">แก้ไขประวัติการทำงาน</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetPage()"></button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ url('/update/Workhistory/ .$Why->id') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="container">
                                                <div class="row">
                                                    <input type="hidden" id="selectedIdsInput" name="id" value="{{ $Why->id}}">
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" style="font-size: 20px;">ระยะเวลา</label>
                                                        <select id="monthSelect" name="startdate_m" class="form-select" style="font-size: 20px;">
                                                        @php
                                                            $thaiMonths = [
                                                                1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                                                4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                                                7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                                                10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                                            ];
                                                        @endphp
                                                        @php
                                                            $parsedDate = \Carbon\Carbon::parse($Why->startdate);
                                                            $monthN = $parsedDate->format('n');
                                                            $monthNw = $parsedDate->format('m');
                                                        @endphp
                                                        <option value="{{ $monthNw }}">
                                                            {{ $thaiMonths[$monthN] }}
                                                        </option>

                                                            <option value="01">มกราคม</option>
                                                            <option value="02">กุมภาพันธ์</option>
                                                            <option value="03">มีนาคม</option>
                                                            <option value="04">เมษายน</option>
                                                            <option value="05">พฤษภาคม</option>
                                                            <option value="06">มิถุนายน</option>
                                                            <option value="07">กรกฎาคม</option>
                                                            <option value="08">สิงหาคม</option>
                                                            <option value="09">กันยายน</option>
                                                            <option value="10">ตุลาคม</option>
                                                            <option value="11">พฤศจิกายน</option>
                                                            <option value="12">ธันวาคม</option>
                                                        </select>
                                                        <br>
                                                        <select id="yearSelect" name="startdate_y" class="form-select" style="font-size: 20px;">
                                                            <option value="{{ $Why->startdate ? \Carbon\Carbon::parse($Why->startdate)->format('Y') : date('Y') }}">
                                                                {{ $Why->startdate ? \Carbon\Carbon::parse($Why->startdate)->format('Y') : date('Y') }}
                                                            </option>
                                                            <?php
                                                            $currentYear = date("Y");
                                                            for ($year = $currentYear + 543; $year >= $currentYear + 543 - 15; $year--) {
                                                                echo "<option value='$year'>$year</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <label class="form-label">ถึง</label>
                                                        <select id="monthSelect" name="enddate_m" class="form-select" style="font-size: 20px;">
                                                        @php
                                                            $thaiMonths = [
                                                                1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                                                4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                                                7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                                                10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                                            ];
                                                        @endphp
                                                        @php
                                                            $parsedDate = \Carbon\Carbon::parse($Why->enddate);
                                                            $monthNumber = $parsedDate->format('n');
                                                            $monthNw = $parsedDate->format('m');
                                                        @endphp
                                                        <option value="{{ $monthNw }}">
                                                            {{ $thaiMonths[$monthNumber] }}
                                                        </option>
                                                            <option value="01">มกราคม</option>
                                                            <option value="02">กุมภาพันธ์</option>
                                                            <option value="03">มีนาคม</option>
                                                            <option value="04">เมษายน</option>
                                                            <option value="05">พฤษภาคม</option>
                                                            <option value="06">มิถุนายน</option>
                                                            <option value="07">กรกฎาคม</option>
                                                            <option value="08">สิงหาคม</option>
                                                            <option value="09">กันยายน</option>
                                                            <option value="10">ตุลาคม</option>
                                                            <option value="11">พฤศจิกายน</option>
                                                            <option value="12">ธันวาคม</option>
                                                        </select>
                                                        <br>
                                                        <select id="yearSelect" name="enddate_y" class="form-select" value="{{$Why->enddate_y }}">
                                                            <option value="{{ $Why->enddate ? \Carbon\Carbon::parse($Why->enddate)->format('Y') : date('Y') }}">
                                                                {{ $Why->enddate ? \Carbon\Carbon::parse($Why->enddate)->format('Y') : date('Y') }}
                                                            </option>
                                                            <?php
                                                            $currentYear = date("Y");
                                                            for ($year = $currentYear + 543; $year >= $currentYear + 543 - 15; $year--) {
                                                                echo "<option value='$year'>$year</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="form-check mt-3">
                                                            <input class="form-check-input" type="checkbox" id="contactCheckbox" name="enddate" style="font-size: 20px;">
                                                            <label class="form-check-label" for="contactCheckbox" style="font-size: 20px;">ถึงปัจจุบัน</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ชื่อบริษัท</label>
                                                        <input type="text" class="form-control" name="Company_name" value="{{ $Why->Company_name}}"style="font-size: 20px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ตำแหน่งงาน</label>
                                                        <input type="text" class="form-control" name="position" value="{{ $Why->position}}"style="font-size: 20px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" style="font-size: 20px;">ช่วงเงินเดือน</label>
                                                        <select name="salary" class="form-select" value="{{ $Why->salary}}" style="font-size: 20px;">
                                                            @if($Why->salary === 'น้อยกว่า 15,000' )
                                                            <option value="น้อยกว่า 15,000">น้อยกว่า 15,000</option>
                                                            <option value="15,000-20,000">15,000-20,000</option>
                                                            <option value="20,001-25,000">20,001-25,000</option>
                                                            <option value="25,001-30,000">25,001-30,000</option>
                                                            <option value="30,001-35,000">30,001-35,000</option>
                                                            <option value="35,001-40,000">35,001-40,000</option>
                                                            <option value="40,001 ขึ้นไป">40,001 ขึ้นไป</option> 
                                                            @endif
                                                            @if($Why->salary === '15,000-20,000' )
                                                            <option value="15,000-20,000">15,000-20,000</option>
                                                            <option value="น้อยกว่า 15,000">น้อยกว่า 15,000</option>
                                                            <option value="20,001-25,000">20,001-25,000</option>
                                                            <option value="25,001-30,000">25,001-30,000</option>
                                                            <option value="30,001-35,000">30,001-35,000</option>
                                                            <option value="35,001-40,000">35,001-40,000</option>
                                                            <option value="40,001 ขึ้นไป">40,001 ขึ้นไป</option> 
                                                            @endif
                                                            @if($Why->salary === '20,001-25,000' )
                                                            <option value="20,001-25,000">20,001-25,000</option>
                                                            <option value="น้อยกว่า 15,000">น้อยกว่า 15,000</option>
                                                            <option value="15,000-20,000">15,000-20,000</option>
                                                            <option value="25,001-30,000">25,001-30,000</option>
                                                            <option value="30,001-35,000">30,001-35,000</option>
                                                            <option value="35,001-40,000">35,001-40,000</option>
                                                            <option value="40,001 ขึ้นไป">40,001 ขึ้นไป</option> 
                                                            @endif
                                                            @if($Why->salary === '25,001-30,000' )
                                                            <option value="25,001-30,000">25,001-30,000</option>
                                                            <option value="น้อยกว่า 15,000">น้อยกว่า 15,000</option>
                                                            <option value="15,000-20,000">15,000-20,000</option>
                                                            <option value="20,001-25,000">20,001-25,000</option>
                                                            <option value="30,001-35,000">30,001-35,000</option>
                                                            <option value="35,001-40,000">35,001-40,000</option>
                                                            <option value="40,001 ขึ้นไป">40,001 ขึ้นไป</option> 
                                                            @endif
                                                            @if($Why->salary === '30,001-35,000' )
                                                            <option value="30,001-35,000">30,001-35,000</option>
                                                            <option value="น้อยกว่า 15,000">น้อยกว่า 15,000</option>
                                                            <option value="15,000-20,000">15,000-20,000</option>
                                                            <option value="20,001-25,000">20,001-25,000</option>
                                                            <option value="25,001-30,000">25,001-30,000</option>
                                                            <option value="35,001-40,000">35,001-40,000</option>
                                                            <option value="40,001 ขึ้นไป">40,001 ขึ้นไป</option> 
                                                            @endif
                                                            @if($Why->salary === '35,001-40,000' )
                                                            <option value="35,001-40,000">35,001-40,000</option>
                                                            <option value="น้อยกว่า 15,000">น้อยกว่า 15,000</option>
                                                            <option value="15,000-20,000">15,000-20,000</option>
                                                            <option value="20,001-25,000">20,001-25,000</option>
                                                            <option value="25,001-30,000">25,001-30,000</option>
                                                            <option value="30,001-35,000">30,001-35,000</option>
                                                            <option value="40,001 ขึ้นไป">40,001 ขึ้นไป</option> 
                                                            @endif
                                                            @if($Why->salary === '40,001 ขึ้นไป' )
                                                            <option value="40,001 ขึ้นไป">40,001 ขึ้นไป</option> 
                                                            <option value="น้อยกว่า 15,000">น้อยกว่า 15,000</option>
                                                            <option value="15,000-20,000">15,000-20,000</option>
                                                            <option value="20,001-25,000">20,001-25,000</option>
                                                            <option value="25,001-30,000">25,001-30,000</option>
                                                            <option value="30,001-35,000">30,001-35,000</option>
                                                            <option value="35,001-40,000">35,001-40,000</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" style="font-size: 20px;">ที่อยู่บริษัท</label>
                                                        <input type="text" class="form-control" name="Company_add" value="{{ $Why->Company_add}}"style="font-size: 20px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" style="font-size: 20px;">ประเภทงาน</label>
                                                        <select name="worktype" class="form-select" style="font-size: 20px;">
                                                            @if($Why->worktype === 'ข้าราชการ' )
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option>  
                                                            @endif
                                                            @if($Why->worktype === 'รัฐวิสาหกิจ' )
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'พนักงานบริษัท' )
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'อาชีพอิสระ' )
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'กิจการของครอบครัว' )
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'พนักงานบริษัทข้ามชาติ' )
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            @endif                                          
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                    <label class="col-form-label font-weight-bold text-dark" style="font-size: 20px;">รายละเอียดของงาน (ถ้ามี)</label>
                                                    <textarea id="desctiption" style="font-size: 20px;"name="desctiption" rows="3" cols="25">{{ $Why->desctiption}}</textarea>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPage()"style="font-size: 20px;">ปิด</button>
                                                <button type="submit" class="btn btn-primary"style="font-size: 20px;">บันทึก</button>
                                            </div>
                                        </form>    
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div>
                        <div class="modal fade" id="Skill_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">ทักษะตามสาขาอาชีพ</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            {{ csrf_field() }}
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="font-weight-bold text-dark">ทักษะตามสาขาอาชีพ (สูงสุด 10 ทักษะ)</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <form action="{{ url('/User/accountuser/saveskill/addskill') }}" method="post" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                    <div class="input-group mb-2 my-3">
                                                                        <input type="text" class="form-control text-center bg-white" id="Skill_name" name="Skill_name" required>
                                                                        <div class="input-group-append">
                                                                            <button type="submit" class="btn btn-warning" style="font-size: 20px;">เพิ่มทักษะ</button>
                                                                        </div>
                                                                        <div class="container mt-2">
                                                                            <table class="table">
                                                                            @php($i=1)
                                                                            @foreach($Skill_info as $row  )
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>อันดับ : {{$i++}} </td>
                                                                                        <td>{{$row->Skill_name}}</td>
                                                                                        <td>
                                                                                            <label class="col-form-label font-weight-bold text-danger">
                                                                                            <a href="#editskill{{$row->id}}" class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>    
                                                                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDeleteskill({{ $row->id }})">
                                                                                            <iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            @endforeach
                                                                            </table>
                                                                            <div class="d-flex justify-content-center">
                                                                                {{$Skill_info->links()}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <form action="{{ url('/User/accountuser/saveLanguage/addLanguage') }}" method="post" enctype="multipart/form-data">
                                                                    {{ csrf_field() }}
                                                                    <div class="row">
                                                                        <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                                        <div class="col-lg-2 my-5">
                                                                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 20px;">ภาษา</label>
                                                                            <select name="language" id="language" class="select form-control"style="font-size: 20px;">
                                                                                <option value="ไทย">ไทย</option>
                                                                                <option value="อังกฤษ">อังกฤษ</option> 
                                                                                <option value="จีน">จีน</option>
                                                                                <option value="ญี่ปุ่น">ญี่ปุ่น</option>
                                                                                <option value="ฝรั่งเศษ">ฝรั่งเศษ</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-2 my-5">
                                                                            <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">ฟัง</label>
                                                                            <select name="listening" id="listening" class="select form-control"style="font-size: 20px;">
                                                                                <option value="พอใช้">พอใช้</option>
                                                                                <option value="ดี">ดี</option>
                                                                                <option value="ดีมาก">ดีมาก</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-2 my-5">
                                                                            <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">พูด</label>
                                                                            <select name="speaking" id="speaking" class="select form-control"style="font-size: 20px;">
                                                                                <option value="พอใช้">พอใช้</option>
                                                                                <option value="ดี">ดี</option>
                                                                                <option value="ดีมาก">ดีมาก</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-2 my-5">
                                                                            <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">อ่าน</label>
                                                                            <select name="reading" id="reading" class="select form-control"style="font-size: 20px;">
                                                                                <option value="พอใช้">พอใช้</option>
                                                                                <option value="ดี">ดี</option>
                                                                                <option value="ดีมาก">ดีมาก</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-2 my-5">
                                                                            <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">เขียน</label>
                                                                            <select name="writing" id="writing" class="select form-control"style="font-size: 20px;">
                                                                                <option value="พอใช้">พอใช้</option>
                                                                                <option value="ดี">ดี</option>
                                                                                <option value="ดีมาก">ดีมาก</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-2 mt-2">
                                                                            <br><br><br>
                                                                            <button type="submit" class="btn btn-warning btn-block" style="font-size: 20px;">เพิ่มภาษา</button>
                                                                        </div>
                                                                        <div class="container mt-2">
                                                                            <table class="table">
                                                                            @php($i=1)
                                                                            @foreach($language_skill as $row  )
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>อันดับ : {{$i++}} </td>
                                                                                        <td>{{$row->language}}</td>
                                                                                        <td>{{$row->listening}}</td>
                                                                                        <td>{{$row->speaking}}</td>
                                                                                        <td>{{$row->reading}}</td>
                                                                                        <td>{{$row->writing}}</td>
                                                                                        <td>
                                                                                            <label class="col-form-label font-weight-bold text-danger">
                                                                                            <a href="#editlanguage{{$row->id}}" class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>    
                                                                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDeletelanguage({{ $row->id }})">
                                                                                            <iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                                                                            </label>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            @endforeach
                                                                            </table>
                                                                            <div class="d-flex justify-content-center">
                                                                                {{$language_skill->links()}}
                                                                            </div>
                                                                        </div>
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
                        </div>
                    </div>
                    <script>
                        function confirmDeleteskill (id) {
                        swal({
                            title: "",
                            text: "คุณแน่ใจที่จะลบทักษะนี้ใช่ไหม",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                            // ถ้าผู้ใช้คลิก "ตกลง"
                            window.location.href = "{{ url('/User/accountuser/skill/delete/') }}" + '/' + id;
                            } else {
                            // ถ้าผู้ใช้คลิก "ยกเลิก"
                            swal("คุณยกเลิกการลบทักษะแล้ว");
                            }
                        });
                        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
                        }
                    </script> 
                    <script>
                        function confirmDeletelanguage (id) {
                        swal({
                            title: "",
                            text: "คุณแน่ใจที่จะลบภาษานี้ใช่ไหม",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                            // ถ้าผู้ใช้คลิก "ตกลง"
                            window.location.href = "{{ url('/User/accountuser/language/delete/') }}" + '/' + id;
                            } else {
                            // ถ้าผู้ใช้คลิก "ยกเลิก"
                            swal("คุณยกเลิกการลบภาษาแล้ว");
                            }
                        });
                        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
                        }
                    </script> 
                    <div>
                        @foreach($Skill_info as $row  )
                        <div class="modal fade" id="editskill{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="staticBackdropLabel">แก้ไขทักษะ</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetPage()"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/update/skill/.$row->id') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="input-group mb-2 my-3">
                                                    <input type="hidden" id="selectedIdsInput" name="id" value="{{ $row->id}}">
                                                    <input type="text" class="form-control text-center bg-white" id="Skill_name" name="Skill_name" required value="{{$row->Skill_name}}"style="font-size: 20px;">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-warning"style="font-size: 20px;" >เพิ่มทักษะ</button>
                                                    </div>                              
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        @foreach($language_skill as $row  )
                        <div class="modal fade" id="editlanguage{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="staticBackdropLabel">แก้ไขทักษะด้านภาษา</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="resetPage()"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/update/language/.$row->id') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-2 my-5">
                                                    <input type="hidden" id="selectedIdsInput" name="id" value="{{ $row->id}}">
                                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">ภาษา</label>
                                                    <select name="language" id="language" class="select form-control"style="font-size: 20px;">     
                                                        @if($row->language === 'ไทย' )
                                                        <option value="ไทย">ไทย</option>
                                                        <option value="อังกฤษ">อังกฤษ</option> 
                                                        <option value="จีน">จีน</option>
                                                        <option value="ญี่ปุ่น">ญี่ปุ่น</option>
                                                        <option value="ฝรั่งเศษ">ฝรั่งเศษ</option>
                                                        @endif
                                                        @if($row->language === 'อังกฤษ' )
                                                        <option value="อังกฤษ">อังกฤษ</option> 
                                                        <option value="ไทย">ไทย</option>
                                                        <option value="จีน">จีน</option>
                                                        <option value="ญี่ปุ่น">ญี่ปุ่น</option>
                                                        <option value="ฝรั่งเศษ">ฝรั่งเศษ</option>
                                                        @endif
                                                        @if($row->language === 'จีน' )
                                                        <option value="จีน">จีน</option>
                                                        <option value="ไทย">ไทย</option>
                                                        <option value="อังกฤษ">อังกฤษ</option> 
                                                        <option value="ญี่ปุ่น">ญี่ปุ่น</option>
                                                        <option value="ฝรั่งเศษ">ฝรั่งเศษ</option>
                                                        @endif
                                                        @if($row->language === 'ญี่ปุ่น' )
                                                        <option value="ญี่ปุ่น">ญี่ปุ่น</option>
                                                        <option value="ไทย">ไทย</option>
                                                        <option value="อังกฤษ">อังกฤษ</option> 
                                                        <option value="จีน">จีน</option>
                                                        <option value="ฝรั่งเศษ">ฝรั่งเศษ</option>
                                                        @endif
                                                        @if($row->language === 'ฝรั่งเศษ' )
                                                        <option value="ฝรั่งเศษ">ฝรั่งเศษ</option>
                                                        <option value="ไทย">ไทย</option>
                                                        <option value="อังกฤษ">อังกฤษ</option> 
                                                        <option value="จีน">จีน</option>
                                                        <option value="ญี่ปุ่น">ญี่ปุ่น</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 my-5">
                                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">ฟัง</label>
                                                    <select name="listening" id="listening" class="select form-control"style="font-size: 20px;">
                                                        @if($row->listening === 'พอใช้' )
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดี">ดี</option>
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        @endif
                                                        @if($row->listening === 'ดี' )
                                                        <option value="ดี">ดี</option>
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        @endif
                                                        @if($row->listening === 'ดีมาก' )
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดี">ดี</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 my-5">
                                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">พูด</label>
                                                    <select name="speaking" id="speaking" class="select form-control"style="font-size: 20px;">
                                                        @if($row->speaking === 'พอใช้' )
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดี">ดี</option>
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        @endif
                                                        @if($row->speaking === 'ดี' )
                                                        <option value="ดี">ดี</option>
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        @endif
                                                        @if($row->speaking === 'ดีมาก' )
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดี">ดี</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 my-5">
                                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">อ่าน</label>
                                                    <select name="reading" id="reading" class="select form-control"style="font-size: 20px;">
                                                        @if($row->reading === 'พอใช้' )
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดี">ดี</option>
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        @endif
                                                        @if($row->reading === 'ดี' )
                                                        <option value="ดี">ดี</option>
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        @endif
                                                        @if($row->reading === 'ดีมาก' )
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดี">ดี</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 my-5">
                                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">เขียน</label>
                                                    <select name="writing" id="writing" class="select form-control"style="font-size: 20px;">
                                                        @if($row->writing === 'พอใช้' )
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดี">ดี</option>
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        @endif
                                                        @if($row->writing === 'ดี' )
                                                        <option value="ดี">ดี</option>
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        @endif
                                                        @if($row->writing === 'ดีมาก' )
                                                        <option value="ดีมาก">ดีมาก</option>
                                                        <option value="พอใช้">พอใช้</option>
                                                        <option value="ดี">ดี</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 mt-2">
                                                    <br><br><br>
                                                    <button type="submit" class="btn btn-warning btn-block" style="font-size: 20px;">เพิ่มภาษา</button>
                                                </div>                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        <div class="modal fade" id="Educationinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">แก้ไขประวัติการศึกษา</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/User/accountuser/saveEducation/addEducation') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="container">
                                                <div class="row">
                                                    <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">สถาบัน</label>
                                                        <input type="text" class="form-control" name="School_name"style="font-size: 20px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">คณะวิชา</label>
                                                        <input type="text" class="form-control" name="faculty_study" style="font-size: 20px;"required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">สาขาวิชา</label>
                                                        <input type="text" class="form-control" name="field_study"style="font-size: 20px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">เกรดเฉลี่ย</label>
                                                        <input type="text" class="form-control" name="gpa" style="font-size: 20px;"required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ปีที่จบการศึกษา</label>
                                                        <select class="form-select" name="endyear" onchange="resultName(this.value);"style="font-size: 20px;">
                                                            <option value="">-</option>
                                                            <?php
                                                            $selectedYear = isset($_GET['YearsSelect']) ? $_GET['YearsSelect'] : ""; // เก็บค่าปีที่ถูกเลือกจาก URL parameter
                                                            for ($y = 2560; $y <= 2580; $y++) {
                                                                $selected = ($selectedYear == $y) ? "selected='selected'" : "";
                                                                echo "<option value='$y' $selected>$y</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">วุฒิการศึกษา</label>
                                                        <select name="degree" class="form-select"style="font-size: 20px;">
                                                            <option value="ประกาศนียบัตรบัณฑิต">ประกาศนียบัตรบัณฑิต</option>
                                                            <option value="ประกาศนียบัตรบัณฑิตชั้นสูง">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                                                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                                                            <option value="ปริญญาโท">ปริญญาโท</option>
                                                            <option value="ปริญญาเอก">ปริญญาเอก</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ประเภทของสถาบันการศึกษา</label>
                                                        <select name="schooltype" class="form-select"style="font-size: 20px;">
                                                            <option value="รัฐบาล">รัฐบาล</option>
                                                            <option value="เอกชน">เอกชน</option>
                                                            <option value="ต่างประเทศ">ต่างประเทศ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="container mt-2">
                                                <table class="table ">
                                                    @foreach($education as $Education)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $Education->School_name }}</td>
                                                            <td>{{ $Education->faculty_study }}</td>
                                                            <td>{{ $Education->field_study }}</td>
                                                            <td>{{ $Education->gpa }}</td>
                                                            <td>{{ $Education->endyear }}</td>
                                                            <td>{{ $Education->degree }}</td>
                                                            <td>{{ $Education->schooltype }}</td>
                                                            <td>
                                                                <label class="col-form-label font-weight-bold text-danger">
                                                                <a href="#editEducation{{$Education->id}}" class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>    
                                                                <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDeleteEducation({{ $Education->id }})">
                                                                <iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                                <div class="d-flex justify-content-center">
                                                    {{$education->links()}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 20px;">ปิด</button>
                                                <button type="submit" class="btn btn-primary"style="font-size: 20px;">บันทึก</button>
                                            </div>
                                        </form>            
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    
                    @foreach($education as $row  )
                        <div class="modal fade" id="editEducation{{$row->id}}" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">แก้ไขประวัติการศึกษา</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"onclick="resetPage()"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('/update/Education/'.$row->id)}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="container">
                                                    <div class="row">
                                                        <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 20px;">สถาบัน</label>
                                                            <input type="text" class="form-control" name="School_name" value="{{ $row->School_name }}" style="font-size: 20px;"required>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 20px;">คณะวิชา</label>
                                                            <input type="text" class="form-control" name="faculty_study"  value="{{ $row->faculty_study }}"style="font-size: 20px;" required>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 20px;">สาขาวิชา</label>
                                                            <input type="text" class="form-control" name="field_study" value="{{ $row->field_study }}"style="font-size: 20px;"required>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 20px;">เกรดเฉลี่ย</label>
                                                            <input type="text" class="form-control" name="gpa"  value="{{ $row->gpa }}"style="font-size: 20px;" required>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 20px;">ปีที่จบการศึกษา</label>
                                                            <select class="form-select" name="endyear" onchange="resultName(this.value);"style="font-size: 20px;">
                                                                <option value="{{$row->endyear }}">{{$row->endyear }}</option>
                                                                <?php
                                                                $selectedYear = isset($_GET['YearsSelect']) ? $_GET['YearsSelect'] : ""; // เก็บค่าปีที่ถูกเลือกจาก URL parameter
                                                                for ($y = 2560; $y <= 2580; $y++) {
                                                                    $selected = ($selectedYear == $y) ? "selected='selected'" : "";
                                                                    echo "<option value='$y' $selected>$y</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 20px;">วุฒิการศึกษา</label>
                                                            <select name="degree" class="form-select"  value="{{ $row->degree }}"style="font-size: 20px;">
                                                                @if($row->degree === 'ประกาศนียบัตรบัณฑิต' )
                                                                <option value="ประกาศนียบัตรบัณฑิต">ประกาศนียบัตรบัณฑิต</option>
                                                                <option value="ประกาศนียบัตรบัณฑิตชั้นสูง">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                                                                <option value="ปริญญาตรี">ปริญญาตรี</option>
                                                                <option value="ปริญญาโท">ปริญญาโท</option>
                                                                <option value="ปริญญาเอก">ปริญญาเอก</option>
                                                                @endif
                                                                @if($row->degree === 'ประกาศนียบัตรบัณฑิตชั้นสูง' )
                                                                <option value="ประกาศนียบัตรบัณฑิตชั้นสูง">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                                                                <option value="ประกาศนียบัตรบัณฑิต">ประกาศนียบัตรบัณฑิต</option>
                                                                <option value="ปริญญาตรี">ปริญญาตรี</option>
                                                                <option value="ปริญญาโท">ปริญญาโท</option>
                                                                <option value="ปริญญาเอก">ปริญญาเอก</option>
                                                                @endif
                                                                @if($row->degree === 'ปริญญาตรี' )
                                                                <option value="ปริญญาตรี">ปริญญาตรี</option>
                                                                <option value="ประกาศนียบัตรบัณฑิต">ประกาศนียบัตรบัณฑิต</option>
                                                                <option value="ประกาศนียบัตรบัณฑิตชั้นสูง">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                                                                <option value="ปริญญาโท">ปริญญาโท</option>
                                                                <option value="ปริญญาเอก">ปริญญาเอก</option>
                                                                @endif
                                                                @if($row->degree === 'ปริญญาโท' )
                                                                <option value="ปริญญาโท">ปริญญาโท</option>
                                                                <option value="ประกาศนียบัตรบัณฑิต">ประกาศนียบัตรบัณฑิต</option>
                                                                <option value="ประกาศนียบัตรบัณฑิตชั้นสูง">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                                                                <option value="ปริญญาตรี">ปริญญาตรี</option>
                                                                <option value="ปริญญาเอก">ปริญญาเอก</option>
                                                                @endif
                                                                @if($row->degree === 'ปริญญาเอก' )
                                                                <option value="ปริญญาเอก">ปริญญาเอก</option>
                                                                <option value="ประกาศนียบัตรบัณฑิต">ประกาศนียบัตรบัณฑิต</option>
                                                                <option value="ประกาศนียบัตรบัณฑิตชั้นสูง">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                                                                <option value="ปริญญาตรี">ปริญญาตรี</option>
                                                                <option value="ปริญญาโท">ปริญญาโท</option>
                                                                @endif
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 20px;">ประเภทของสถาบันการศึกษา</label>
                                                            <select name="schooltype" class="form-select" style="font-size: 20px;">
                                                                @if($row->schooltype === 'รัฐบาล' )
                                                                <option value="รัฐบาล">รัฐบาล</option>
                                                                <option value="เอกชน">เอกชน</option>
                                                                <option value="ต่างประเทศ">ต่างประเทศ</option>
                                                                @endif
                                                                @if($row->schooltype === 'เอกชน' )
                                                                <option value="เอกชน">เอกชน</option>
                                                                <option value="รัฐบาล">รัฐบาล</option>
                                                                <option value="ต่างประเทศ">ต่างประเทศ</option>
                                                                @endif
                                                                @if($row->schooltype === 'ต่างประเทศ' )
                                                                <option value="ต่างประเทศ">ต่างประเทศ</option>
                                                                <option value="รัฐบาล">รัฐบาล</option>
                                                                <option value="เอกชน">เอกชน</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"onclick="resetPage()"style="font-size: 20px;">ปิด</button>
                                                    <button type="submit" class="btn btn-primary"style="font-size: 20px;">บันทึก</button>
                                                </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <script>
                        function confirmDeleteEducation (id) {
                        swal({
                            title: "",
                            text: "คุณแน่ใจที่จะลบประวัติการศึกษานี้ใช่ไหม",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                            // ถ้าผู้ใช้คลิก "ตกลง"
                            window.location.href = "{{ url('/User/accountuser/Education/delete/') }}" + '/' + id;
                            } else {
                            // ถ้าผู้ใช้คลิก "ยกเลิก"
                            swal("คุณยกเลิกการลบประวัติการศึกษาแล้ว");
                            }
                        });
                        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
                        }
                    </script> 
                    
                        
                    

                    <div>
                        <div class="modal fade" id="Workhistoryinfo" tabindex="-1" aria-labelledby="Workhistoryinfo" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="Workhistoryinfo">ประวัติการทำงาน</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/User/Workhistory/saveWorkhistory/addWorkhistory') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="container">
                                                <div class="row">
                                                    <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ระยะเวลา</label>
                                                        <select id="monthSelect" name="startdate_m" class="form-select"style="font-size: 20px;">
                                                            <option value="01">มกราคม</option>
                                                            <option value="02">กุมภาพันธ์</option>
                                                            <option value="03">มีนาคม</option>
                                                            <option value="04">เมษายน</option>
                                                            <option value="05">พฤษภาคม</option>
                                                            <option value="06">มิถุนายน</option>
                                                            <option value="07">กรกฎาคม</option>
                                                            <option value="08">สิงหาคม</option>
                                                            <option value="09">กันยายน</option>
                                                            <option value="10">ตุลาคม</option>
                                                            <option value="11">พฤศจิกายน</option>
                                                            <option value="12">ธันวาคม</option>
                                                        </select>
                                                        <br>
                                                        <select id="yearSelect" name="startdate_y" class="form-select"style="font-size: 20px;">
                                                            <?php
                                                            $currentYear = date("Y");
                                                            for ($year = $currentYear + 543; $year >= $currentYear + 543 - 15; $year--) {
                                                                echo "<option value='$year'>$year</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                        <label class="form-label"style="font-size: 20px;">ถึง</label>
                                                        <select id="monthSelect" name="enddate_m" class="form-select"style="font-size: 20px;">
                                                            <option value="01">มกราคม</option>
                                                            <option value="02">กุมภาพันธ์</option>
                                                            <option value="03">มีนาคม</option>
                                                            <option value="04">เมษายน</option>
                                                            <option value="05">พฤษภาคม</option>
                                                            <option value="06">มิถุนายน</option>
                                                            <option value="07">กรกฎาคม</option>
                                                            <option value="08">สิงหาคม</option>
                                                            <option value="09">กันยายน</option>
                                                            <option value="10">ตุลาคม</option>
                                                            <option value="11">พฤศจิกายน</option>
                                                            <option value="12">ธันวาคม</option>
                                                        </select>
                                                        <br>
                                                        <select id="yearSelect" name="enddate_y" class="form-select"style="font-size: 20px;">
                                                            <?php
                                                            $currentYear = date("Y");
                                                            for ($year = $currentYear + 543; $year >= $currentYear + 543 - 15; $year--) {
                                                                echo "<option value='$year'>$year</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="form-check mt-3">
                                                            <input class="form-check-input" type="checkbox" id="contactCheckbox" name="enddate"style="font-size: 20px;">
                                                            <label class="form-check-label" for="contactCheckbox"style="font-size: 20px;">ถึงปัจจุบัน</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ชื่อบริษัท</label>
                                                        <input type="text" class="form-control" name="Company_name" style="font-size: 20px;"required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ตำแหน่งงาน</label>
                                                        <input type="text" class="form-control" name="position"style="font-size: 20px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ช่วงเงินเดือน</label>
                                                        <select name="salary" class="form-select"style="font-size: 20px;">
                                                            <option value="น้อยกว่า 15,000">น้อยกว่า 15,000</option>
                                                            <option value="15,000-20,000">15,000-20,000</option>
                                                            <option value="20,001-25,000">20,001-25,000</option>
                                                            <option value="25,001-30,000">25,001-30,000</option>
                                                            <option value="30,001-35,000">30,001-35,000</option>
                                                            <option value="35,001-40,000">35,001-40,000</option>
                                                            <option value="40,001 ขึ้นไป">40,001 ขึ้นไป</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ที่อยู่บริษัท</label>
                                                        <input type="text" class="form-control" name="Company_add"style="font-size: 20px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 20px;">ประเภทงาน</label>
                                                        <select name="worktype" class="form-select"style="font-size: 20px;">
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option>                                            
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">รายละเอียดของงาน (ถ้ามี)</label>
                                                    <textarea id="desctiption" name="desctiption" rows="3" cols="40"></textarea>
                                                </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="container mt-2">
                                                <table class="table ">
                                                    @foreach( $Workhistory as $Workhistoryrow)
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $Workhistoryrow->Company_name }}</td>
                                                            <td>{{ $Workhistoryrow->position }}</td>
                                                            <td>{{ $Workhistoryrow->salary }}</td>
                                                            <td>{{ $Workhistoryrow->Company_add }}</td>
                                                            <td>{{ $Workhistoryrow->worktype }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($Workhistoryrow->startdate)->format('m-Y') }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($Workhistoryrow->enddate)->format('m-Y') }}</td>
                                                            <td>
                                                                <label class="col-form-label font-weight-bold text-danger">
                                                                <a href="#edit{{$Workhistoryrow->id}}" class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>
                                                                <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDeleteWorkhistory({{ $Workhistoryrow->id }})">
                                                                <iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                                <div class="d-flex justify-content-center">
                                                    {{$Workhistory->links()}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 20px;">ปิด</button>
                                                <button type="submit" class="btn btn-primary"style="font-size: 20px;">บันทึก</button>
                                            </div>
                                        </form>            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function confirmDeleteWorkhistory(id) {
                        swal({
                            title: "",
                            text: "คุณแน่ใจที่จะลบประวัติการทำงานนี้ใช่ไหม",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                            // ถ้าผู้ใช้คลิก "ตกลง"
                            window.location.href = "{{ url('/User/accountuser/Workhistory/delete/') }}" + '/' + id;
                            } else {
                            // ถ้าผู้ใช้คลิก "ยกเลิก"
                            swal("คุณยกเลิกการลบประวัติการทำงานแล้ว");
                            }
                        });
                        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
                        }
                    </script> 
                    <div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" style="max-width: 40%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">แก้ไขประวัติส่วนตัว</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('/User/accountuser/saveaccount/addaccount')}}" method="post" enctype="multipart/form-data">
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
                                                            <p style="font-size: 16px; text-align: left;">อัพโหลดรูปถ่ายขนาดไม่เกิน 1 นิ้ว</p>
                                                            <p style="font-size: 16px; text-align: left;">ขนาดไฟล์ไม่เกิน 3 MB ชนิดของไฟล์ JPEG, PNG และ SVG</p>
                                                             <input type="file" style="font-size: 20px;"name="image" accept="image/jpeg, image/png, image/svg" aria-label="Upload">
                                                        </div>
                                                    </div>
                                                    <hr class="mt-3">
                                                    <div class="col-lg-2">
                                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">คำนำหน้า</label>
                                                        @if($contactInfo)
                                                        <select name="prefix" class="form-select"style="font-size: 20px;">
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
                                                        <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">ชื่อ</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="firstname"
                                                            required value="{{ $user->firstname }}"style="font-size: 20px;">
                                                        </div>
                                                    @endif  
                                                    </div>
                                                    <div class="col-lg-3">
                                                    @if($user)
                                                        <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">นามสกุล</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="lastname"
                                                            required value="{{ $user->lastname }}" style="font-size: 20px;">
                                                            <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                        </div>
                                                    @endif 
                                                    </div>
                                                    <hr class="mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center">
                                                            <label class="col-form-label font-weight-bold text-dark me-3"style="font-size: 20px;">ช่องทางการติดต่อ</label>
                                                            @if($contactInfo)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="contactCheckbox" name="status_contact" 
                                                                @if($contactInfo->status_contact === 1)
                                                                    checked
                                                                @endif
                                                                onclick="toggleContactStatus(this)">
                                                                <input type="hidden" name="status_contact" id="status_contact_input" value="{{ $contactInfo->status_contact }}">
                                                                @if($contactInfo->status_contact === 1)
                                                                <label class="form-check-label" for="contactCheckbox">
                                                                    เปิดเผยช่องทางการติดต่อ
                                                                </label>
                                                                @else
                                                                <label class="form-check-label" for="contactCheckbox">
                                                                    ไม่เปิดเผยช่องทางการติดต่อ
                                                                </label>
                                                                @endif
                                                               
                                                            </div>
                                                            @endif 
                                                        </div>
                                                    </div> 
                                                    
                                                    <div class="col-lg-5">
                                                
                                                        <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">อีเมล</label>
                                                        @if($contactInfo)
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="email"
                                                            required value="{{ $contactInfo->ID_email }}"style="font-size: 20px;">
                                                        </div>
                                                        @else
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="email"
                                                            required style="font-size: 20px;">
                                                        </div>
                                                        @endif 
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">Line</label>
                                                        @if($contactInfo)
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="Line"
                                                            required value="{{ $contactInfo->ID_line }}"style="font-size: 20px;">
                                                        </div>
                                                        @else
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="Line"
                                                            required style="font-size: 20px;">
                                                        </div>
                                                        @endif 
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">Facebook</label>
                                                        @if($contactInfo)
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="Facebook"
                                                            required value="{{ $contactInfo->ID_facebook }}"style="font-size: 20px;">
                                                        </div>
                                                        @else
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="Facebook"
                                                            required style="font-size: 20px;">
                                                        </div>
                                                        @endif 
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">Tel.</label>
                                                        @if($contactInfo)
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="Tel"
                                                            required value="{{ $contactInfo->telephone }}"style="font-size: 20px;">
                                                        </div>
                                                        @else
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="Tel"
                                                            required style="font-size: 20px;">
                                                        </div>
                                                        @endif 
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label class="col-form-label font-weight-bold text-dark"style="font-size: 20px;">Instagram</label>
                                                        @if($contactInfo)
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="Instagram"
                                                            required value="{{ $contactInfo->ID_instagram }}"style="font-size: 20px;" >
                                                        </div>
                                                        @else
                                                        <div class="input-group">
                                                            <input type="text" class="form-control form-control-sm text-center bg-white" name="Instagram"
                                                            required style="font-size: 20px;" >
                                                        </div>
                                                        @endif 
                                                    </div>
                                                    <hr class="mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center">
                                                            <label class="col-form-label font-weight-bold text-dark me-3"style="font-size: 20px;">ความสนใจ</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox" name="category1" id="flexRadioDefault1" value="งานพบประสังสรรค์ประจำปี">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 20px;">งานพบประสังสรรค์ประจำปี</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category2"  id="flexRadioDefault1" value="อบรมให้ความรู้วิชาการ">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 20px;">อบรมให้ความรู้วิชาการ</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category3"  id="flexRadioDefault1" value="งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 20px;">งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category4"  id="flexRadioDefault1" value="กิจกรรมศิษย์เก่าสัมพันธ์">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 20px;">กิจกรรมศิษย์เก่าสัมพันธ์</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category4"  id="flexRadioDefault1" value="">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 20px;">กิจกรรมอื่นๆ</label>
                                                            <input type="text" class="form-control custom-input"placeholder=" โปรดระบุ" name="categoryall" aria-label="category1" aria-describedby="basic-addon1" maxlength="50">
                                                        </div>
                                                        
                                                    </div>

                                                    <br>
                                                </div>
                                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 20px;">ปิด</button>
                                                    <button type="submit" class="btn btn-primary"style="font-size: 20px;">บันทึก</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function toggleContactStatus(checkbox) {
                                var statusContactInput = document.getElementById('status_contact_input');
                                if (checkbox.checked == 1) {
                                    statusContactInput.value = true; // กำหนดค่าให้เป็น 1 เมื่อ checkbox ถูกติก
                                } else if(checkbox.checked == 0) {
                                    statusContactInput.value = true; // กำหนดค่าให้เป็น 0 เมื่อ checkbox ไม่ถูกติก
                                }else{
                                    statusContactInput.value = false;
                                }
                            }
                        </script>
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
    //กดปุ่มปิดการให้เห็นช่องทางติดต่อ
</script>
<script>
    // ปิดการใช้งานปุ่มย้อนกลับ
    history.pushState(null, null, location.href);
    window.addEventListener('popstate', function(event) {
        history.pushState(null, null, location.href);
    });
    // เมื่อปิด Modal หรือเมื่อต้องการรีเซ็ตหน้าจอ
function resetPage() {
    // รีโหลดหน้าใหม่
    window.location.reload();
}

</script>
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


