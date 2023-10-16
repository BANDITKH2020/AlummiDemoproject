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
                    @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                    <li class="nav-item">
                        <a class="nav-link" onclick="openCity(event, 'ประวัติส่วนตัว')" id="defaultOpen"><h3>ประวัติส่วนตัว</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-left: 100px;"onclick="openCity(event, 'ประวัติการศึกษา')" ><h3>ประวัติการศึกษา</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="margin-left: 100px;" onclick="openCity(event, 'ประวัติการทำงาน')" ><h3>ประวัติการทำงาน</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-left: 100px;" onclick="openCity(event, 'ทักษะ')"><h3>ทักษะ</h3></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="margin-left: 100px;" onclick="openCity(event, 'ประวัติการฝึกอบรม')"><h3>ประวัติการฝึกอบรม</h3></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " style="margin-left: 100px;" onclick="openCity(event, 'รางวัลประกาศ')"><h3>รางวัลประกาศ</h3></a>
                    </li>
                    @else
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
                    @endif
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
                    
                    <table class="table ">
                        <thead class="table-active">
                            <tr>
                                <th scope="col"class="text-center">ชื่อสถาบัน</th>                            
                                <th scope="col"class="text-center">คณะ</th>
                                <th scope="col"class="text-center">สาขา</th>                            
                                <th scope="col"class="text-center">เกรดเฉลี่ย</th>
                                <th scope="col"class="text-center">จบการศึกษา</th>                            
                                <th scope="col"class="text-center">วุฒิการศึกษา </th>  
                                <th scope="col"class="text-center">ประเภทสถาบัน</th>                          
                            </tr>
                        </thead>
                        @foreach($education_infom as $education)
                        <tbody>                               
                        <tr>
                            <td>{{ $education->School_name }}</td>
                            <td>{{ $education->faculty_study }}</td>
                            <td>{{ $education->field_study }}</td>
                            <td>{{ $education->gpa }}</td>
                            <td>{{ $education->endyear }}</td>
                            <td>{{ $education->degree }}</td>
                            <td>{{ $education->schooltype }}</td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
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
                    <table class="table ">
                        <thead class="table-active">
                        <tr>
                            <th scope="col"class="text-center">ชื่อบริษัท</th>                            
                            <th scope="col"class="text-center">ตำแหน่งงาน</th>
                            <th scope="col"class="text-center">ช่วงเงินเดือน</th>                            
                            <th scope="col"class="text-center">ที่อยู่บริษัท</th>
                            <th scope="col"class="text-center">ประเภทของงาน</th>                            
                            <th scope="col"class="text-center">เริ่มต้นทำงาน</th>
                            <th scope="col"class="text-center">สิ้นสุดทำงาน </th>                            
                        </tr>
                        </thead>
                        @foreach( $Workhistory_info as $Workhistoryrow)
                        <tbody>
                        <tr>
                            <td>{{ $Workhistoryrow->Company_name }}</td>
                            <td>{{ $Workhistoryrow->position }}</td>
                            @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                            <td class="text-center">{{ $Workhistoryrow->salary }}</td>
                            @endif
                            @if (Auth::check() && Auth::user()->role_acc === 'student')
                            <td class="text-center">-</td>
                            @endif
                            <td>{{ $Workhistoryrow->Company_add }}</td>
                            <td class="text-center">{{ $Workhistoryrow->worktype }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($Workhistoryrow->startdate)->format('m-Y') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($Workhistoryrow->enddate)->format('m-Y') }}</td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
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
                    <table class="table " >
                        <thead class="table-active">
                        <tr>
                            <th scope="col"class="text-center">อันดับ</th>                            
                            <th scope="col"class="text-center">ทักษะตามสาขาอาชีพ</th>                            
                        </tr>
                        </thead>
                        @foreach($Skill_info as $row)

                        <tbody>
                        <tr>
                            <td class="text-center">{{ $loop->iteration + ($Skill_info->currentPage() - 1) * $Skill_info->perPage() }}</td>
                            <td class="text-center">{{$row->Skill_name}}</td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="row">
                        <div class="d-flex justify-content-center mt-2">
                            {{$Skill_info->links()}}
                        </div>
                    </div>
                @endif
                @if($language_skill->isEmpty())
                <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                    </div>
                @else
                    <table class="table " >
                        <thead class="table-active">
                        <tr>
                            <th scope="col"class="text-center">อันดับ</th>                            
                            <th scope="col"class="text-center">ภาษา</th>                            
                            <th scope="col"class="text-center">ฟัง</th>
                            <th scope="col"class="text-center">พูด</th>
                            <th scope="col"class="text-center">อ่าน</th>
                            <th scope="col"class="text-center">เขียน</th>
                        </tr>
                        </thead>
                        @foreach($language_skill as $row )
                        <tbody>
                        <tr>
                            <td class="text-center">{{$loop->iteration + ($language_skill->currentPage() - 1) * $language_skill->perPage() }}</td>
                            <td class="text-center">{{$row->language}}</td>
                            <td class="text-center">{{$row->listening}}</td>
                            <td class="text-center">{{$row->speaking}}</td>
                            <td class="text-center">{{$row->reading}}</td>
                            <td class="text-center">{{$row->writing}}</td>
                        </tr>
                        </tbody>
                        @endforeach
                    </table>
                @endif 
                <div class="row">
                    <div class="d-flex justify-content-center">
                        {{$language_skill->links()}}
                    </div>
                </div>
            </div>
            <div id="ประวัติการฝึกอบรม" class="tabcontent mt-3">
                @if($Trainings->isEmpty())
                <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                    </div>
                @else
                <table class="table">
                        <thead class="table-active">
                            <tr>
                                <th scope="col" class="text-center">อันดับ</th>
                                <th scope="col" class="text-center">ประกาศนียบัตร</th>
                                <th scope="col" class="text-center">บริษัทที่จัดอบรม</th>
                                <th scope="col" class="text-center">วันที่เริ่มอบรม</th>
                                <th scope="col" class="text-center">วันที่สิ้นสุดอบรม</th>
                            </tr>
                        </thead>
                        @php
                            $thaiMonths = [
                                1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                            ];
                            
                        @endphp
                        <tbody>
                            @foreach($Trainings as $row)
                            @php
                                $startdate = \Carbon\Carbon::parse($row->startdate);
                                $enddate = \Carbon\Carbon::parse($row->enddate);
                            @endphp
                            <tr>
                                <td class="text-center">{{$loop->iteration + ($Trainings->currentPage() - 1) * $Trainings->perPage() }}</td>
                                <td class="text-center">{{ $row->Certi_name }}</td>
                                <td class="text-center">{{ $row->Organize_name }}</td>
                                <td class="text-center">{{$startdate->format('d')}} {{$thaiMonths[$startdate->month]}} {{$startdate->year + 543}} </td>
                                <td class="text-center">{{$enddate->format('d')}} {{$thaiMonths[$enddate->month]}} {{$enddate->year + 543}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $Trainings->links() }}
                    </div>
                @endif
            </div> 
            @if (Auth::check() && Auth::user()->role_acc === 'teacher')
            <div id="รางวัลประกาศ" class="tabcontent mt-3">
                @if($reward->isEmpty())
                <div class="row">
                        <p class="col-md-6 col-form-label text-md-end"style="font-size: 24px;">ไม่มีข้อมูล</p>
                    </div>
                @else
                        <table class="table">
                            <thead class="table-active" >
                                <tr>
                                    <th scope="col"class="text-center">ปีการศึกษา</th>
                                    <th scope="col"class="text-center">รหัสนักศึกษา</th>
                                    <th scope="col"class="text-center">ชื่อ-นามสกุล</th>
                                    <th scope="col"class="text-center">ผู้จัด</th>
                                    <th scope="col"class="text-center">รางวัล/ชื่อทุน</th>
                                    <th scope="col"class="text-center">อันดับ/มูลค่าทุน</th> 
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($reward as $row)
                                <tr>
                                    <td>{{$row->year}}</td>
                                    <td>{{$row->student_id}}</td>
                                    <td>{{$row->firstname}} {{$row->lastname}}</td>
                                    <td>{{$row->organizer}}</td>
                                    <td>{{$row->award_name}}</td>
                                    <td>{{$row->amount}}</td>
                                </tr>
                            @endforeach 
                            </tbody>
                        </table>
                    <div class="row">
                        <div class="d-flex justify-content-center mt-2">
                        {{$reward->links()}}
                        </div>
                    </div>
                @endif
            </div> 
            @endif
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


