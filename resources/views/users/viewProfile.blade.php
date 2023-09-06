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
    <div class="container"  style="position: absolute; left: 350px; top: 180px;">
        <div class="col-md-12">
            <h4 class="text">ชื่อ {{$user->firstname}} {{$user->lastname}}</h4>
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
        <h5 class="text mt-3 "style="margin-left: 504px;">ชื่อ-นามสกุล : {{$user->firstname}} {{$user->lastname}}</h5>
        @if($contactInfo)
            @if($contactInfo->status_contact === 1)
            <h5 class="text mt-3 "style="margin-left: 564px;">อีเมล : - </h5>
            <h5 class="text mt-3 "style="margin-left: 494px;">เบอร์โทรศัพท์ : - </h5>
            @else
            <h5 class="text mt-3 " style="margin-left: 564px;">อีเมล : {{$contactInfo->ID_email}}</h5>
            <h5 class="text mt-3 "style="margin-left: 494px;">เบอร์โทรศัพท์ : {{$contactInfo->telephone}} </h5>
            @endif
        @endif
        <hr class="mt-5" style="border: 1px solid #000">
    </div>

        <div class="col-12 row">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#education_infom"  role="tab" aria-controls="pills-home" aria-selected="true">ประวัติการศึกษา</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#Workhistory_info"  role="tab" aria-controls="pills-profile" aria-selected="false">ประวัติการทำงาน</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#Skill-language" role="tab" aria-controls="pills-contact" aria-selected="false">ทักษะ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#Trainings"  role="tab" aria-controls="pills-disabled" aria-selected="false">ประวัติการฝึกอบรม</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#reward"  role="tab" aria-controls="pills-disabled" aria-selected="false">รางวัลประกาศ</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent" style="position: absolute; left: 350px; top: 720px;">
                <div class="tab-pane fade show active" id="education_infom" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                @foreach($education_infom as $education)
                    @if($education !== null)
                        <h5>ชื่อสถาบัน : {{$education->School_name }}</h5>
                        <h5>คณะ : {{$education->faculty_study }}</h5>
                        <h5>สาขา : {{$education->field_study }}</h5>
                        <h5>วุฒิการศึกษา : {{$education->degree }}</h5>
                        <h5>เกรดเฉลี่ย : {{$education->gpa }}</h5>
                        <h5>ปีที่สำเร็จการศึกษา : พ.ศ.{{$education->endyear }}</h5>
                    @else
                        <h5>ชื่อสถาบัน : - </h5>
                        <h5>คณะ : - </h5>
                        <h5>สาขา : - </h5>
                        <h5>วุฒิการศึกษา : - </h5>
                        <h5>เกรดเฉลี่ย : - </h5>
                        <h5>ปีที่สำเร็จการศึกษา : - </h5>
                    @endif
                @endforeach

                </div>
                <div class="tab-pane fade" id="Workhistory_info" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                @php
                $thaiMonths = [
                    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                    4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                    7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                    10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                ];
                @endphp
                @foreach($Workhistory_info as $work_history)
                    @if($work_history !== null)
                    <h5>ชื่อบริษัท : {{ $work_history->Company_name }}</h5>
                    <h5>ตำแหน่งงาน : {{ $work_history->position }}</h5>
                    <h5>รายละเอียดงาน : {{ $work_history->desctiption }}</h5>
                    <h5>เริ่มต้นทำงาน : {{ $thaiMonths[\Carbon\Carbon::parse($work_history->startdate)->format('n')] }}/{{ \Carbon\Carbon::parse($work_history->startdate)->format('Y') }}</h5> 
                    <h5>สิ้นสุดทำงาน : {{ $thaiMonths[\Carbon\Carbon::parse($work_history->enddate)->format('n')] }}/{{ \Carbon\Carbon::parse($work_history->enddate)->format('Y') }}</h5>
                    <h5>ช่วงเงินเดือน : {{ $work_history->salary }}</h5>
                    <h5>ที่อยู่บริษัท : {{ $work_history->Company_add }}</h5>
                    <h5>ประเภทของงาน : {{ $work_history->worktype }}</h5>
                    @else
                    <h5>ชื่อบริษัท : -</h5>
                    <h5>ตำแหน่งงาน : -</h5>
                    <h5>รายละเอียดงาน : -</h5>
                    <h5>เริ่มต้นทำงาน : -</h5> 
                    <h5>สิ้นสุดทำงาน : -</h5>
                    <h5>ช่วงเงินเดือน : -</h5>
                    <h5>ที่อยู่บริษัท : -</h5>
                    <h5>ประเภทของงาน : -</h5>
                    @endif
                @endforeach
                </div>
                <div class="tab-pane fade" id="Skill-language" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    @foreach($Skill_info as $Skill)
                        @if($Skill !== null)
                        <h5>ทักษะ : {{ $Skill->Skill_name }}</h5>
                        @else
                        <h5>ทักษะ : - </h5>
                        @endif
                    @endforeach 
                    @foreach($language_skill as $language)
                        @if($language !== null)
                        <h5>ภาษา : {{ $language->language }}</h5>
                        <h5>ฟัง : {{ $language->listening }}</h5>
                        <h5>พูด : {{ $language->speaking }}</h5>
                        <h5>อ่าน : {{ $language->reading }}</h5>
                        <h5>เขียน : {{ $language->writing }}</h5>
                        @else
                        <h5>ภาษา : -</h5>
                        <h5>ฟัง : -</h5>
                        <h5>พูด : -</h5>
                        <h5>อ่าน : -</h5>
                        <h5>เขียน : -</h5>
                        @endif
                    @endforeach 
                </div>
                <div class="tab-pane fade" id="Trainings" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
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
                        <h5>ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร : -</h5>
                        <h5>ชื่อบริษัท/หน่วยงานที่จัดอบรม : -</h5> 
                        <h5>วันที่เริ่มอบรม  : - </h5>
                        <h5>วันที่สิ้นสุดอบรม : - </h5>
                        @else
                        <h5>ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร : {{ $Training->Certi_name }}</h5>
                        <h5>ชื่อบริษัท/หน่วยงานที่จัดอบรม : {{ $Training->Organize_name }}</h5> 
                        <h5>วันที่เริ่มอบรม  : {{$startdate->format('d')}} {{$thaiMonths[$startdate->month]}} {{$startdate->year + 543}} </h5>
                        <h5>วันที่สิ้นสุดอบรม : {{$enddate->format('d')}} {{$thaiMonths[$enddate->month]}} {{$enddate->year + 543}}</h5>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="reward" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                @foreach($reward as $row)
                    @if($row === null)
                        <h5>ปีการศึกษา : -</h5>
                        <h5>ผู้จัด : -</h5> 
                        <h5>รางวัล/ชื่อทุน  : - </h5>
                        <h5>อันดับ/มูลค่าทุน : - </h5>
                    @else
                        <h5>ปีการศึกษา : {{$row->year}}</h5>
                        <h5>ผู้จัด : {{$row->organizer}}</h5> 
                        <h5>รางวัล/ชื่อทุน  : {{$row->award_name}} </h5>
                        <h5>อันดับ/มูลค่าทุน : {{$row->amount}}</h5>
                    @endif
                @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center" style="position: absolute; left: 0px; top: 990px;">
                {{$language_skill->links()}}
            </div>
        </div>  
        @if (Auth::check() && Auth::user()->role_acc === 'student')
        <div class="d-flex justify-content-center"style="position: absolute; left: 200px; top: 180px;">
            <a class="btn btn-outline-warning" href="{{ route('studentslist') }}" role="button" >กลับหน้าหลัก</a>
        </div>
        @endif
        @if (Auth::check() && Auth::user()->role_acc === 'teacher')
        <div class="d-flex justify-content-center"style="position: absolute; left: 200px; top: 180px;">
            <a class="btn btn-outline-warning" href="{{ route('studentslist_teacher') }}" role="button" >กลับหน้าหลัก</a>
        </div>
        @endif
    
    


   
   
    
  

















    
<script>
    // ปิดการใช้งานปุ่มย้อนกลับ
    history.pushState(null, null, location.href);
    window.addEventListener('popstate', function(event) {
        history.pushState(null, null, location.href);
    });
</script>

</body>
</html>


