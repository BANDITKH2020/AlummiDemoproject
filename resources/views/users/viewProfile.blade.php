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
    <div class="col-12 row">
        <div class="col-1 col-lg-1"></div>
        <div class="col-1">
        @if (Auth::check() && Auth::user()->role_acc === 'student')
            <button class="btn btn-warning"   onclick="window.location.href='{{ route('studentslist') }}'"style=" font-size: 24px;"role="button" >กลับหน้าหลัก</button>
        @endif
        @if (Auth::check() && Auth::user()->role_acc === 'teacher')
            <button class="btn btn-warning"   onclick="window.location.href='{{ route('studentslist_teacher') }}'"style=" font-size: 24px;"role="button" >กลับหน้าหลัก</button>
        @endif
        </div>
        <div class="col-10 col-lg-10 row mt-1">
            <h3 > ชื่อ {{$user->firstname}} {{$user->lastname}}</h3>
            <hr>
        </div>
            
        
    </div>   
    <div class="col-12 row mt-4" >
        <div class="col-1 col-lg-1"></div>
        <div class="col-1"></div>
        <div class="col-10 col-lg-10 row mt-1">
            <div class="row ms-1" style="text-align: center;" >
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" onclick="openCity(event, 'ประวัติส่วนตัว')" id="defaultOpen"><h3>ประวัติส่วนตัว</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-left: 160px;"onclick="openCity(event, 'ประวัติการศึกษา')" ><h3>ประวัติการศึกษา</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="margin-left: 160px;" onclick="openCity(event, 'ประวัติการทำงาน')" ><h3>ประวัติการทำงาน</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-left: 160px;" onclick="openCity(event, 'ทักษะ')"><h3>ทักษะ</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="margin-left: 160px;" onclick="openCity(event, 'ประวัติการฝึกอบรม')"><h3>ประวัติการฝึกอบรม</h3></a>
                    </li>
                    
                </ul>
            </div>
                <div id="ประวัติส่วนตัว" class="tabcontent mt-3">
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
                <div id="ประวัติการศึกษา" class="tabcontent mt-3">
                @if($education_infom->isEmpty())
                    <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                    </div>
                @else
                    @foreach($education_infom as $education)
                        <div class="row ">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ชื่อสถาบัน :</p>
                            <div class="col-md-6 mt-2">
                                @if($education)
                                    @if($education->School_name !== null)
                                    {{ $education->School_name }}
                                    @endif                       
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">คณะ :</p>
                            <div class="col-md-6 mt-2">
                                @if($education)
                                    @if($education->faculty_study !== null)
                                    {{ $education->faculty_study }}
                                    @endif 
                                @else
                                    -                              
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">สาขา :</p>
                            <div class="col-md-6 mt-2">
                                @if($education)
                                    @if($education->field_study !== null)
                                    {{ $education->field_study }}
                                    @endif 
                                @else
                                    -                             
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">วุฒิการศึกษา :</p>
                            <div class="col-md-6 mt-2">
                                @if($education)
                                    @if($education->degree !== null)
                                    {{ $education->degree }}
                                    @endif 
                                @else
                                    -                             
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">เกรดเฉลี่ย :</p>
                            <div class="col-md-6 mt-2">
                                @if($education)
                                    @if($education->gpa !== null)
                                    {{ $education->gpa }}
                                    @endif 
                                @else
                                    -                            
                                @endif
                            </div>
                        </div> 
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ปีที่สำเร็จการศึกษา :</p>
                            <div class="col-md-6 mt-2">
                                @if($education)
                                    @if($education->endyear !== null)
                                    {{ $education->endyear }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="d-flex justify-content-center mt-2">
                            {{$education_infom->links()}}
                        </div>
                    </div>
                @endif
            </div>     
            <div id="ประวัติการทำงาน" class="tabcontent mt-3">
                @php
                $thaiMonths = [
                    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                    4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                    7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                    10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                ];
                @endphp
                @if($Workhistory_info->isEmpty())
                <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                    </div>        
                @else
                    @foreach($Workhistory_info as $work_history)
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ชื่อบริษัท :</p>
                            <div class="col-md-6 mt-2">
                                @if($work_history)
                                    @if($work_history->Company_name !== null)
                                    {{ $work_history->Company_name }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ตำแหน่งงาน :</p>
                            <div class="col-md-6 mt-2">
                                @if($work_history)
                                    @if($work_history->position !== null)
                                    {{ $work_history->position }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">รายละเอียดงาน :</p>
                            <div class="col-md-6 mt-2">
                                @if($work_history)
                                    @if($work_history->desctiption !== null)
                                    {{ $work_history->desctiption }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">เริ่มต้นทำงาน :</p>
                            <div class="col-md-6 mt-2">
                                @if($work_history)
                                    @if($work_history->startdate !== null)
                                    {{ $thaiMonths[\Carbon\Carbon::parse($work_history->startdate)->format('n')] }}/{{ \Carbon\Carbon::parse($work_history->startdate)->format('Y') }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">สิ้นสุดทำงาน :</p>
                            <div class="col-md-6 mt-2">
                                @if($work_history)
                                    @if($work_history->enddate !== null)
                                    {{ $thaiMonths[\Carbon\Carbon::parse($work_history->enddate)->format('n')] }}/{{ \Carbon\Carbon::parse($work_history->enddate)->format('Y') }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ช่วงเงินเดือน :</p>
                            <div class="col-md-6 mt-2">
                            @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                                @if($work_history)
                                    @if($work_history->salary !== null)
                                    {{ $work_history->salary }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            @endif
                            @if (Auth::check() && Auth::user()->role_acc === 'student')
                                -
                            @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ที่อยู่บริษัท :</p>
                            <div class="col-md-6 mt-2">
                                @if($work_history)
                                    @if($work_history->Company_add !== null)
                                    {{ $work_history->Company_add }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>       
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ประเภทของงาน :</p>
                            <div class="col-md-6 mt-2">
                                @if($work_history)
                                    @if($work_history->worktype !== null)
                                    {{ $work_history->worktype }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>        
                    @endforeach
                    <div class="row">
                        <div class="d-flex justify-content-center mt-2">
                            {{$Workhistory_info->links()}}
                        </div>
                    </div>
                @endif
            </div>
            <div id="ทักษะ" class="tabcontent mt-3">
                @if($Skill_info->isEmpty())
                <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                </div>
                @else
                    @foreach($Skill_info as $Skill)
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end" style="font-size: 24px;">ทักษะ :</p>
                            <div class="col-md-6 mt-2">
                                {{ $Skill->Skill_name }}
                            </div>
                        </div>
                    @endforeach
                @endif
                @if($language_skill->isEmpty())
                <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                    </div>
                @else
                    @foreach($language_skill as $language)
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ภาษา :</p>
                            <div class="col-md-6 mt-2">
                                @if($language)
                                    @if($language->language !== null)
                                    {{ $language->language }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ฟัง :</p>
                            <div class="col-md-6 mt-2">
                                @if($language)
                                    @if($language->listening !== null)
                                    {{ $language->listening }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">พูด :</p>
                            <div class="col-md-6 mt-2">
                                @if($language)
                                    @if($language->speaking !== null)
                                    {{ $language->speaking }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">อ่าน :</p>
                            <div class="col-md-6 mt-2">
                                @if($language)
                                    @if($language->reading !== null)
                                    {{ $language->reading }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">เขียน :</p>
                            <div class="col-md-6 mt-2">
                                @if($language)
                                    @if($language->writing !== null)
                                    {{ $language->writing }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div> 
                    @endforeach 
                    
                @endif 
                <div class="row">
                    @if($Skillcount>$languagecount)
                        <div class="d-flex justify-content-center mt-2">
                            {{$Skill_info->links()}}
                        </div>
                    @else
                        <div class="d-flex justify-content-center mt-2">
                        {{$language_skill->links()}}
                        </div>
                    @endif
                </div>
            </div>
            <div id="ประวัติการฝึกอบรม" class="tabcontent mt-3">
                @if($Trainings->isEmpty())
                <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                    </div>
                @else
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
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end">ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร :</p>
                            <div class="col-md-6 mt-2">
                                @if($Training)
                                    @if($Training->Certi_name !== null)
                                    {{ $Training->Certi_name }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end">ชื่อบริษัท/หน่วยงานที่จัดอบรม :</p>
                            <div class="col-md-6 mt-2">
                                @if($Training)
                                    @if($Training->Organize_name !== null)
                                    {{ $Training->Organize_name }}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end">วันที่เริ่มอบรม :</p>
                            <div class="col-md-6 mt-2">
                                @if($Training)
                                    @if($Training->startdate !== null)
                                    {{$startdate->format('d')}} {{$thaiMonths[$startdate->month]}} {{$startdate->year + 543}}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <p class="col-md-6 col-form-label text-md-end">วันที่สิ้นสุดอบรม :</p>
                            <div class="col-md-6 mt-2">
                                @if($Training)
                                    @if($Training->enddate !== null)
                                    {{$enddate->format('d')}} {{$thaiMonths[$enddate->month]}} {{$enddate->year + 543}}
                                    @endif 
                                @else
                                    -                         
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="d-flex justify-content-center mt-2">
                        {{$Trainings->links()}}
                        </div>
                    </div>
                @endif
            </div> 
            <!-- <div id="รางวัลประกาศ" class="tabcontent mt-3">
                @if($reward->isEmpty())
                <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                    </div>
                @else
                    @foreach($reward as $row)
                    <div class="row">
                        <p class="col-md-6 col-form-label text-md-end">ปีการศึกษา :</p>
                        <div class="col-md-6 mt-2">
                            @if($row)
                                @if($row->year !== null)
                                    {{$row->year}}
                                @endif 
                            @else
                                    -                         
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <p class="col-md-6 col-form-label text-md-end">ผู้จัด :</p>
                        <div class="col-md-6 mt-2">
                            @if($row)
                                @if($row->organizer !== null)
                                    {{$row->organizer}}
                                @endif 
                            @else
                                    -                         
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <p class="col-md-6 col-form-label text-md-end">รางวัล/ชื่อทุน :</p>
                        <div class="col-md-6 mt-2">
                            @if($row)
                                @if($row->award_name !== null)
                                    {{$row->award_name}}
                                @endif 
                            @else
                                    -                         
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <p class="col-md-6 col-form-label text-md-end">อันดับ/มูลค่าทุน :</p>
                        <div class="col-md-6 mt-2">
                            @if($row)
                                @if($row->amount !== null)
                                    {{$row->amount}}
                                @endif 
                            @else
                                    -                         
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="d-flex justify-content-center mt-2">
                        {{$reward->links()}}
                        </div>
                    </div>
                @endif
            </div>  -->
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
    function check(){
        console.log($contactInfo)
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


