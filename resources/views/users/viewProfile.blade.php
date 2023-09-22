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
            font-family:'TH Niramit AS';
                font-size: 20px;
            }
        a:link {
                color: black;
                background-color: transparent;
                text-decoration: none;
            }
        .profile-info {
        font-size: 18px; /* ปรับขนาดตัวอักษร */
        /* ปรับระยะห่างด้านบนและด้านล่าง */
        margin-left: 20px;
        }
        .nav-pills {
            display: flex;
            justify-content: center;
            align-items: center; /* จัดตำแหน่งตามแนวดิ่งกลาง */
            height: 1000px;
        }

        .nav-item {
            margin-right: 100px; /* ระยะห่างระหว่างปุ่ม */
        }
        
        h4{
            font-weight: bold;
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
    <div class="container"  style="position: absolute; left: 350px; top: 180px;">
        <div class="col-md-12">
            <h3 class="text">ชื่อ {{$user->firstname}} {{$user->lastname}}</h3>
        </div>
        <hr class="mt-1" style="border: 1px solid #000">
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
            </div>   
            <h4 class="text mt-3 "style="margin-left: 504px;">ชื่อ-นามสกุล : {{$user->firstname}} {{$user->lastname}}</h4>
            @if($contactInfo)
                @if($contactInfo->status_contact === 0)
                <h5 class="text mt-3 "style="margin-left: 572px;">อีเมล : {{$contactInfo->ID_email}} </h5>
                <h5 class="text mt-3 "style="margin-left: 524px;">เบอร์โทรศัพท์ : {{$contactInfo->telephone}} </h5>
                @else
                <h5 class="text mt-3 "style="margin-left: 572px;">อีเมล : - </h5>
                <h5 class="text mt-3 "style="margin-left: 524px;">เบอร์โทรศัพท์ : - </h5>
                @endif
            @endif
            <hr class="mt-5" style="border: 1px solid #000">
            <div class="col-12">
                <div class="row" style="text-align: center;margin-left: 50px;">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " onclick="openCity(event, 'ประวัติการศึกษา')" id="defaultOpen"><h4>ประวัติการศึกษา</h4></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " onclick="openCity(event, 'ประวัติการทำงาน')" id="tab2Link"><h4>ประวัติการทำงาน</h4></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " onclick="openCity(event, 'ทักษะ')" id="tab2Link"><h4>ทักษะ</h4></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " onclick="openCity(event, 'ประวัติการฝึกอบรม')" id="tab2Link"><h4>ประวัติการฝึกอบรม</h4></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="openCity(event, 'รางวัลประกาศ')" id="tab5Link"><h4>รางวัลประกาศ</h4></a>
                        </li>
                    </ul>
                </div>
            </div>

        <div class="container" style="position: relative; left: 200px; ">
            <div id="ประวัติการศึกษา" class="tabcontent mt-3">
                @foreach($education_infom as $education)
                    @if($education === null)
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
                                <p style="text-align: left; font-size: 20px;">{{$education->School_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">คณะ :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education->faculty_study }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">สาขา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{$education->field_study }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">วุฒิการศึกษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education->degree }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">เกรดเฉลี่ย :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education->gpa }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ปีที่สำเร็จการศึกษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$education->endyear  }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div style="position: relative; left: 350px; ">
                    {{$education_infom->links()}}
                </div>
            </div>
        </div>
        <div class="container" style="position: relative; left: 200px; ">
            <div id="ประวัติการทำงาน" class="tabcontent mt-3">
                @php
                $thaiMonths = [
                    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                    4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                    7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                    10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                ];
                @endphp
                @foreach($Workhistory_info as $work_history)
                    @if($work_history === null)
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
                                <p style="text-align: left; font-size: 20px;">{{ $work_history->Company_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ตำแหน่งงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $work_history->position }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">รายละเอียดงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $work_history->desctiption }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">เริ่มต้นทำงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $thaiMonths[\Carbon\Carbon::parse($work_history->startdate)->format('n')] }}/{{ \Carbon\Carbon::parse($work_history->startdate)->format('Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">สิ้นสุดทำงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $thaiMonths[\Carbon\Carbon::parse($work_history->enddate)->format('n')] }}/{{ \Carbon\Carbon::parse($work_history->enddate)->format('Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ช่วงเงินเดือน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $work_history->salary }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ที่อยู่บริษัท :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $work_history->Company_add }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ประเภทของงาน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;"> {{ $work_history->worktype }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div style="position: relative; left: 350px; ">
                    {{$Workhistory_info->links()}}
                </div>
            </div>
        </div>
        <div class="container" style="position: relative; left: 200px; ">
            <div id="ทักษะ" class="tabcontent mt-3">
                @foreach($Skill_info as $Skill)
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
                @endforeach 
                @foreach($language_skill as $language)
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
                @endforeach 
                <div style="position: relative; left: 350px; ">
                    {{$language_skill->links()}}
                </div>
            </div>
        </div>
        <div class="container" style="position: relative; left: 200px; ">
            <div id="ประวัติการฝึกอบรม" class="tabcontent mt-3">
                @foreach($Trainings as $Training)
                    @php
                    $thaiMonths = [
                        1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                        4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                        7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                        10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                        
                    ];
                    $startdate = \Carbon\Carbon::parse($Training->startdate);
                    $enddate = \Carbon\Carbon::parse($Training->enddate);
                    @endphp
                    @if($Training === null)
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
                                <p style="text-align: left; font-size: 20px;">{{ $Training->Certi_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ชื่อบริษัท/หน่วยงานที่จัดอบรม :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{ $Training->Organize_name }}</p>
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
                @endforeach
                <div style="position: relative; left: 350px; ">
                    {{$Trainings->links()}}
                </div>
            </div>
        </div>
        <div class="container" style="position: relative; left: 200px; ">
            <div id="รางวัลประกาศ" class="tabcontent mt-3">
                @foreach($reward as $row)
                    @if($row === null)
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ปีการศึกษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ผู้จัด :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">รางวัล/ชื่อทุน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">อันดับ/มูลค่าทุน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">-</p>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ปีการศึกษา :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$row->year}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">ผู้จัด :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$row->organizer}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">รางวัล/ชื่อทุน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$row->award_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-4 col-form-label text-md-end"style="font-size: 20px;">อันดับ/มูลค่าทุน :</p>
                            <div class="col-md-5 mt-2">
                                <p style="text-align: left; font-size: 20px;">{{$row->amount}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div style="position: relative; left: 350px; ">
                    {{$reward->links()}}
                </div>
            </div>
        </div>
    </div>
        @if (Auth::check() && Auth::user()->role_acc === 'student')
        <div style="position: relative; left: 200px; top: 75px;">
            <button class="btn btn-warning"   onclick="window.location.href='{{ route('studentslist') }}'"style=" font-size: 20px;"role="button" >กลับหน้าหลัก</button>
        </div>
        @endif
        @if (Auth::check() && Auth::user()->role_acc === 'teacher')
        <div style="position: relative; left: 200px; top: 75px;">
            <button class="btn btn-warning" onclick="window.location.href='{{ route('studentslist_teacher') }}'" style=" font-size: 20px;"role="button" >กลับหน้าหลัก</button>
        </div>
        @endif
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
    
    <script>
        // ปิดการใช้งานปุ่มย้อนกลับ
        history.pushState(null, null, location.href);
        window.addEventListener('popstate', function(event) {
            history.pushState(null, null, location.href);
        });
    </script>

</body>
</html>


