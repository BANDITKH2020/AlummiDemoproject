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
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="/users/homeuser" class="textmenu"><h3>ข่าวประชาสัมพันธ์</h3></a>
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
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{ route('accountuser') }}" class="textmenu"><h3>โปรไฟล์</h3></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'student')
                <a href="{{ route('viewmassege') }}" class="textmenu"><h3>ประวัติการติดต่อ</h3></a>
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
            <hr class="mt-5" style="border: 2px solid #000">
            <a class="text-center" onclick="openContactModal()" style="color: black;text-decoration: none;cursor: pointer;"><h3>ติดต่อภาควิชา</h3></a>
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
                                @if($department)
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
                                @endif
                                <div class="col-lg-6">
                                    <form action="/user/post/massage" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="col-lg-12">
                                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">ชื่อเรื่อง</label>
                                            <div class="input-group">
                                                <input type="text" style="font-size: 24px;"class="form-control form-control-sm bg-white" name="massage_name"
                                                required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">ข้อความ (สูงสุด 200 ตัวอักษร)</label>
                                            <div class="input-group">
                                                <textarea type="text"style="font-size: 24px;" id="" rows="4" cols="100" name="massage_cotent" maxlength="200"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">  
                                                <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">เลือกเอกสารที่ต้องการอัพโหลด</label>
                                                <div class="input-group">
                                                    <input type="file" style="font-size: 24px;" class="form-control" id="massage_file" name="massage_file[]" multiple>
                                                </div>
                                        </div>
                                        <br>
                                        <span id="file_count" style="font-size: 24px; color:red;"></span>
                                        <br><br><br><br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 24px;">ปิด</button>
                                            <button type="submit" class="btn btn-primary" style="font-size: 24px;">ส่ง</button>
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
        <div class="col-12 col-lg-8 mt-5 ms-5">
            <div class="col-md-12">
                <h2 class="text-left">ตั้งค่าโปรไฟล์</h2>
                <hr class="mt-2" >
            </div>
            <div class="col-lg-12 row ms-1">
                <div class="row" style="text-align: center;">
                    <ul class="nav nav-tabs">
                        <li   li class="nav-item">
                            <a class="nav-link" onclick="openCity(event, 'ประวัติส่วนตัว')" id="defaultOpen"><h3>ประวัติส่วนตัว <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></h3></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left: 50px;"onclick="openCity(event, 'ประวัติการศึกษา')" ><h3>ประวัติการศึกษา <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#Educationinfo"></i></h3></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " style="margin-left: 50px;" onclick="openCity(event, 'ประวัติการทำงาน')" ><h3>ประวัติการทำงาน <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#Workhistoryinfo"></i></h3></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left: 50px;" onclick="openCity(event, 'ทักษะ')"><h3>ทักษะ <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#Skill_info"></i></h3></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " style="margin-left: 50px;" onclick="openCity(event, 'ประวัติการฝึกอบรม')" ><h3>ประวัติการฝึกอบรม <i class="fas fa-pencil-alt fa-xs" style="cursor: pointer; margin-left: 3px; color: #000" data-bs-toggle="modal" data-bs-target="#Tranning_info"></i></h3></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 mt-2">   
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
                                <th scope="col"class="text-center">ตัวเลือก</th>
                            </tr>
                        </thead>
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
                <div id="ประวัติการทำงาน" class="tabcontent mt-3">
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
                            <th scope="col"class="text-center">ตัวเลือก</th>
                        </tr>
                        </thead>
                        @foreach( $Workhistory as $Workhistoryrow)
                        <tbody>
                        <tr>
                            <td>{{ $Workhistoryrow->Company_name }}</td>
                            <td>{{ $Workhistoryrow->position }}</td>
                            <td>{{ $Workhistoryrow->salary }}</td>
                            <td>{{ $Workhistoryrow->Company_add }}</td>
                            <td>{{ $Workhistoryrow->worktype }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($Workhistoryrow->startdate)->format('m-Y') }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($Workhistoryrow->enddate)->format('m-Y') }}</td>
                            <td class="text-center">
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
                <div id="ทักษะ" class="tabcontent mt-3">
                    <table class="table " >
                        <thead class="table-active">
                        <tr>
                            <th scope="col"class="text-center">อันดับ</th>                            
                            <th scope="col"class="text-center">ทักษะตามสาขาอาชีพ</th>                            
                            <th scope="col"class="text-center">ตัวเลือก</th>
                        </tr>
                        </thead>
                        @foreach($Skill_info as $row)

                        <tbody>
                        <tr>
                            <td class="text-center">{{ $loop->iteration + ($Skill_info->currentPage() - 1) * $Skill_info->perPage() }}</td>
                            <td class="text-center">{{$row->Skill_name}}</td>
                            <td class="text-center">
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
                    <table class="table " >
                        <thead class="table-active">
                        <tr>
                            <th scope="col"class="text-center">อันดับ</th>                            
                            <th scope="col"class="text-center">ภาษา</th>                            
                            <th scope="col"class="text-center">ฟัง</th>
                            <th scope="col"class="text-center">พูด</th>
                            <th scope="col"class="text-center">อ่าน</th>
                            <th scope="col"class="text-center">เขียน</th>
                            <th scope="col"class="text-center">ตัวเลือก</th>
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
                            <td class="text-center">
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
                <div id="ประวัติการฝึกอบรม" class="tabcontent mt-3">
                <table class="table">
                        <thead class="table-active">
                            <tr>
                                <th scope="col" class="text-center">อันดับ</th>
                                <th scope="col" class="text-center">ประกาศนียบัตร</th>
                                <th scope="col" class="text-center">บริษัทที่จัดอบรม</th>
                                <th scope="col" class="text-center">วันที่เริ่มอบรม</th>
                                <th scope="col" class="text-center">วันที่สิ้นสุดอบรม</th>
                                <th scope="col" class="text-center">ตัวเลือก</th>
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
                            @foreach($Tranning_info as $row)
                            @php
                                $startdate = \Carbon\Carbon::parse($row->startdate);
                                $enddate = \Carbon\Carbon::parse($row->enddate);
                            @endphp
                            <tr>
                                <td class="text-center">{{$loop->iteration + ($Tranning_info->currentPage() - 1) * $Tranning_info->perPage() }}</td>
                                <td class="text-center">{{ $row->Certi_name }}</td>
                                <td class="text-center">{{ $row->Organize_name }}</td>
                                <td class="text-center">{{$startdate->format('d')}} {{$thaiMonths[$startdate->month]}} {{$startdate->year + 543}} </td>
                                <td class="text-center">{{$enddate->format('d')}} {{$thaiMonths[$enddate->month]}} {{$enddate->year + 543}} </td>
                                <td class="text-center">
                                    <label class="col-form-label font-weight-bold text-danger">
                                        <a href="#editTranning{{ $row->id }}" class="edit" title="Edit" data-toggle="tooltip" data-bs-toggle="modal">
                                            <iconify-icon icon="ph:pencil-light"></iconify-icon>
                                        </a>    
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="confirmDeleteTraining({{ $row->id }})">
                                            <iconify-icon icon="ph:trash-light"></iconify-icon>
                                        </a>
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $Tranning_info->links() }}
                    </div>

                </div>
            </div>  
        </div> 
    </div>
    {{-- modal Tranning_info  --}}
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
                                                
                                                        <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                                                        <div class="mb-3">
                                                            <label class="form-label" style="font-size: 24px;">ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร</label>
                                                            <input type="text" style="font-size: 24px;" class="form-control" name="Certi_name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label"style="font-size: 24px;">ชื่อบริษัท/หน่วยงานที่จัดอบรม</label>
                                                            <input type="text" style="font-size: 24px;"class="form-control" name="Organize_name" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label"style="font-size: 24px;">วันที่เริ่ม</label>
                                                                <input type="date" style="font-size: 24px;"class="form-control" name="startdate">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label class="form-label"style="font-size: 24px;">วันที่จบ</label>
                                                                <input type="date" style="font-size: 24px;"class="form-control" name="enddate">
                                                            </div>
                                                        </div>
                                                   
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 24px;">ปิด</button>
                                                <button type="submit" class="btn btn-primary" style="font-size: 24px;">บันทึก</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                                <label class="form-label" style="font-size: 24px;">ชื่อใบประกอบวิชาชีพ/ประกาศนียบัตร</label>
                                                                <input type="text" style="font-size: 24px;" class="form-control" name="Certi_name" value="{{$row->Certi_name}}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label" style="font-size: 24px;">ชื่อบริษัท/หน่วยงานที่จัดอบรม</label>
                                                                <input type="text"  style="font-size: 24px;" class="form-control" name="Organize_name" value="{{$row->Organize_name}}" required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label" style="font-size: 24px;">วันที่เริ่ม</label>
                                                                    <input type="date"  style="font-size: 24px;" class="form-control" name="startdate" value="{{$row->startdate}}">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label class="form-label"style="font-size: 24px;">วันที่จบ</label>
                                                                    <input type="date" style="font-size: 24px;" class="form-control" name="enddate"value="{{$row->enddate}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPage()" style="font-size: 24px;">ปิด</button>
                                                    <button type="submit" class="btn btn-primary" style="font-size: 24px;">บันทึก</button>
                                                </div>  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                    </div>


    {{-- modal แก้ไขสกิล --}}
    <div>
        @foreach($Skill_info as $row  )
        <div class="modal fade" id="editskill{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">ทักษะตามสาขาอาชีพ</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"onclick="resetPage()"></button>
                </div>
                <div class="modal-body ">
                    <form action="{{ url('/update/skill/.$row->id') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-lg-12 row ">
                            <input type="hidden" id="selectedIdsInput" name="id" value="{{ $row->id}}">
                            <div class="col-lg-10 ">
                                <input type="text" class="form-control" id="Skill_name" style="font-size: 24px;" name="Skill_name" value="{{$row->Skill_name}}" required>
                            </div>
                            <div class="col-lg-2 ">
                                <button type="submit" class="btn btn-warning" style="font-size: 24px;">เพิ่มทักษะ</button>
                            </div>
                        </div>
                    </form> 
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- modal แก้ไขสกิลภาษา --}}
    <div>
        @foreach($language_skill as $row  )
        <div class="modal fade" id="editlanguage{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">แก้ไขทักษะด้านภาษา</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"onclick="resetPage()"></button>
                </div>
                <div class="modal-body ">
                    <form action="{{ url('/update/language/.$row->id') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-lg-12 row ">
                            <input type="hidden" id="selectedIdsInput" name="id" value="{{ $row->id}}">
                            <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">ภาษา</label>
                            <select name="language" id="language" class="select form-control"style="font-size: 24px;">
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
                                <option value="ไทย">ไทย</option>
                                <option value="อังกฤษ">อังกฤษ</option> 
                                <option value="จีน">จีน</option>
                                <option value="ญี่ปุ่น">ญี่ปุ่น</option>
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
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">ฟัง</label>
                            <select name="listening" id="listening" class="select form-control"style="font-size: 24px;">
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
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">พูด</label>
                            <select name="speaking" id="speaking" class="select form-control"style="font-size: 24px;">
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
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">อ่าน</label>
                            <select name="reading" id="reading" class="select form-control"style="font-size: 24px;">
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
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">เขียน</label>
                            <select name="writing" id="writing" class="select form-control"style="font-size: 24px;">
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
                        <div class="col-lg-2 mt-5">
                            
                            <button type="submit" class="btn btn-warning" style="font-size: 24px;">เพิ่มภาษา</button>
                        </div>
                        </div>
                    </form> 
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- modal สกิล --}}
    <div class="modal fade" id="Skill_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">ทักษะ</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form action="{{ url('/User/accountuser/saveskill/addskill') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3>ทักษะตามสาขาอาชีพ</h3>
                    <div class="col-lg-12 row ">
                        <div class="col-lg-10 ">
                            <input type="text" class="form-control" id="Skill_name" style="font-size: 24px;" name="Skill_name" required>
                        </div>
                        <div class="col-lg-2 ">
                            <button type="submit" class="btn btn-warning" style="font-size: 24px;">เพิ่มทักษะ</button>
                        </div>
                    </div>
                </form> 
                <form action="{{ url('/User/accountuser/saveLanguage/addLanguage') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}  
                <input type="hidden" id="selectedIdsInput" name="id" value="{{ Auth::user()->id }}">
                <h3 class="mt-3">ทักษะด้านภาษา</h3>
                <div class="col-lg-12 row  ">
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">ภาษา</label>
                            <select name="language" id="language" class="select form-control"style="font-size: 24px;">
                                <option value="ไทย">ไทย</option>
                                <option value="อังกฤษ">อังกฤษ</option> 
                                <option value="จีน">จีน</option>
                                <option value="ญี่ปุ่น">ญี่ปุ่น</option>
                                <option value="ฝรั่งเศษ">ฝรั่งเศษ</option>
                            </select>
                        </div>
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">ฟัง</label>
                            <select name="listening" id="listening" class="select form-control"style="font-size: 24px;">
                                <option value="พอใช้">พอใช้</option>
                                <option value="ดี">ดี</option>
                                <option value="ดีมาก">ดีมาก</option>
                            </select>
                        </div>
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">พูด</label>
                            <select name="speaking" id="speaking" class="select form-control"style="font-size: 24px;">
                                <option value="พอใช้">พอใช้</option>
                                <option value="ดี">ดี</option>
                                <option value="ดีมาก">ดีมาก</option>
                            </select>
                        </div>
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">อ่าน</label>
                            <select name="reading" id="reading" class="select form-control"style="font-size: 24px;">
                                <option value="พอใช้">พอใช้</option>
                                <option value="ดี">ดี</option>
                                <option value="ดีมาก">ดีมาก</option>
                            </select>
                        </div>
                        <div class="col-lg-2 ">
                            <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">เขียน</label>
                            <select name="writing" id="writing" class="select form-control"style="font-size: 24px;">
                                <option value="พอใช้">พอใช้</option>
                                <option value="ดี">ดี</option>
                                <option value="ดีมาก">ดีมาก</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mt-5">
                            
                            <button type="submit" class="btn btn-warning" style="font-size: 24px;">เพิ่มภาษา</button>
                        </div>
                    </div>
                </form>  
            </div>
            </div>
        </div>
    </div>
    
    {{-- modal ประวัติการศึกษา --}}
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
                                                        <label class="form-label"style="font-size: 24px;">สถาบัน</label>
                                                        <input type="text" class="form-control" name="School_name"style="font-size: 24px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">คณะวิชา</label>
                                                        <input type="text" class="form-control" name="faculty_study" style="font-size: 24px;"required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">สาขาวิชา</label>
                                                        <input type="text" class="form-control" name="field_study"style="font-size: 24px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">เกรดเฉลี่ย</label>
                                                        <input type="text" class="form-control" name="gpa" style="font-size: 24px;"required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">ปีที่จบการศึกษา (พ.ศ.)</label>
                                                        <select class="form-select" name="endyear" onchange="resultName(this.value);"style="font-size: 24px;">
                                                            <option value="">- เลือก -</option>
                                                            <?php
                                                            $nowYear = \Carbon\Carbon::now()->format('Y') + 543;
                                                            $selectedYear = isset($_GET['YearsSelect']) ? $_GET['YearsSelect'] : ""; // เก็บค่าปีที่ถูกเลือกจาก URL parameter
                                                            for ($y = $nowYear - 20; $y <= $nowYear; $y++) {
                                                                $selected = ($selectedYear == $y) ? "selected='selected'" : "";
                                                                echo "<option value='$y' $selected>$y</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">วุฒิการศึกษา</label>
                                                        <select name="degree" class="form-select"style="font-size: 24px;">
                                                            <option value="ประกาศนียบัตรบัณฑิต">ประกาศนียบัตรบัณฑิต</option>
                                                            <option value="ประกาศนียบัตรบัณฑิตชั้นสูง">ประกาศนียบัตรบัณฑิตชั้นสูง</option>
                                                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                                                            <option value="ปริญญาโท">ปริญญาโท</option>
                                                            <option value="ปริญญาเอก">ปริญญาเอก</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">ประเภทของสถาบันการศึกษา</label>
                                                        <select name="schooltype" class="form-select"style="font-size: 24px;">
                                                            <option value="รัฐบาล">รัฐบาล</option>
                                                            <option value="เอกชน">เอกชน</option>
                                                            <option value="ต่างประเทศ">ต่างประเทศ</option>
                                                        </select>
                                                    </div>
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
                            <div class="modal-dialog modal-lg">
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
                                                            <label class="form-label"style="font-size: 24px;">สถาบัน</label>
                                                            <input type="text" class="form-control" name="School_name" value="{{ $row->School_name }}" style="font-size: 24px;"required>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 24px;">คณะวิชา</label>
                                                            <input type="text" class="form-control" name="faculty_study"  value="{{ $row->faculty_study }}"style="font-size: 24px;" required>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 24px;">สาขาวิชา</label>
                                                            <input type="text" class="form-control" name="field_study" value="{{ $row->field_study }}"style="font-size: 24px;"required>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 24px;">เกรดเฉลี่ย</label>
                                                            <input type="text" class="form-control" name="gpa"  value="{{ $row->gpa }}"style="font-size: 24px;" required>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 24px;">ปีที่จบการศึกษา</label>
                                                            <select class="form-select" name="endyear" onchange="resultName(this.value);"style="font-size: 24px;">
                                                                <option value="{{$row->endyear }}">{{$row->endyear }}</option>
                                                                <?php
                                                                $nowYear = \Carbon\Carbon::now()->format('Y') + 543;
                                                                $selectedYear = isset($_GET['YearsSelect']) ? $_GET['YearsSelect'] : ""; // เก็บค่าปีที่ถูกเลือกจาก URL parameter
                                                                for ($y = $nowYear - 20; $y <= $nowYear; $y++) {
                                                                    $selected = ($selectedYear == $y) ? "selected='selected'" : "";
                                                                    echo "<option value='$y' $selected>$y</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6 mb-3">
                                                            <label class="form-label"style="font-size: 24px;">วุฒิการศึกษา</label>
                                                            <select name="degree" class="form-select"  value="{{ $row->degree }}"style="font-size: 24px;">
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
                                                            <label class="form-label"style="font-size: 24px;">ประเภทของสถาบันการศึกษา</label>
                                                            <select name="schooltype" class="form-select" style="font-size: 24px;">
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
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"onclick="resetPage()"style="font-size: 24px;">ปิด</button>
                                                    <button type="submit" class="btn btn-primary"style="font-size: 24px;">บันทึก</button>
                                                </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    {{-- modal ประวัติการทำงาน --}}
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
                                                        <label class="form-label"style="font-size: 24px;">เริ่มทำงาน</label>
                                                        <select id="monthSelect" name="startdate_m" class="form-select"style="font-size: 24px;">
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
                                                        <select id="yearSelect" name="startdate_y" class="form-select"style="font-size: 24px;">
                                                            <?php
                                                            $currentYear = date("Y");
                                                            for ($year = $currentYear + 543; $year >= $currentYear + 543 - 15; $year--) {
                                                                echo "<option value='$year'>$year</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-4">
                                                            <div class="row" >
                                                            <div class="input-group">
                                                            <label class="form-label"style="font-size: 24px;">ถึง</label>
                                                                <div class="form-check ms-3">
                                                                    <input class="form-check-input" type="checkbox" id="contactCheckbox" name="enddate"style="font-size: 24px;" onclick="checkdatecurrent(this)">
                                                                    <label class="form-check-label" for="contactCheckbox"style="font-size: 24px;">ถึงปัจจุบัน</label>
                                                                </div>
                                                            </div>
                                                                
                                                            </div>
                                                        
                                                        <select id="enddate_m" name="enddate_m" class="form-select"style="font-size: 24px;">
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
                                                        <select id="enddate_y" name="enddate_y" class="form-select"style="font-size: 24px;">
                                                            <?php
                                                            $currentYear = date("Y");
                                                            for ($year = $currentYear + 543; $year >= $currentYear + 543 - 15; $year--) {
                                                                echo "<option value='$year'>$year</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">ชื่อบริษัท</label>
                                                        <input type="text" class="form-control" name="Company_name" style="font-size: 24px;"required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">ตำแหน่งงาน</label>
                                                        <input type="text" class="form-control" name="position"style="font-size: 24px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">ช่วงเงินเดือน</label>
                                                        <select name="salary" class="form-select"style="font-size: 24px;">
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
                                                        <label class="form-label"style="font-size: 24px;">ที่อยู่บริษัท</label>
                                                        <input type="text" class="form-control" name="Company_add"style="font-size: 24px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">ประเภทงาน</label>
                                                        <select name="worktype" class="form-select"style="font-size: 24px;">
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option>    
                                                            <option value="">อื่นๆ</option>                                          
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">อื่นๆ</label>
                                                        <input type="text" class="form-control" name="other_worktype"style="font-size: 24px;" >
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                    <label class="col-form-label font-weight-bold text-dark"style="font-size: 24px;">รายละเอียดของงาน (ถ้ามี)</label>
                                                    <textarea id="desctiption" name="desctiption" rows="3" cols="90"></textarea>
                                                </div>
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
                    <div>
                        @foreach($Workhistory as $Why  )
                        <div class="modal fade" id="edit{{$Why->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
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
                                                        <label class="form-label" style="font-size: 24px;">เริ่มทำงาน</label>
                                                        <select id="monthSelect" name="startdate_m" class="form-select" style="font-size: 24px;">
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
                                                        <select id="yearSelect" name="startdate_y" class="form-select" style="font-size: 24px;">
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
                                                        <div class="row" >
                                                            <div class="input-group">
                                                            <label class="form-label"style="font-size: 24px;">ถึง</label>
                                                                <div class="form-check ms-3">
                                                                    <input class="form-check-input" type="checkbox" id="contactCheckbox" name="enddate"style="font-size: 24px;" onclick="checkdatecurrent(this)">
                                                                    <label class="form-check-label" for="contactCheckbox"style="font-size: 24px;">ถึงปัจจุบัน</label>
                                                                </div>
                                                            </div>
                                                                
                                                        </div>
                                                        
                                                        <select id="monthSelect" name="enddate_m" class="form-select" style="font-size: 24px;">
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
                                                        <select id="yearSelect" name="enddate_y" class="form-select" value="{{$Why->enddate_y }}" style="font-size: 24px;">
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
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">ชื่อบริษัท</label>
                                                        <input type="text" class="form-control" name="Company_name" value="{{ $Why->Company_name}}"style="font-size: 24px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label"style="font-size: 24px;">ตำแหน่งงาน</label>
                                                        <input type="text" class="form-control" name="position" value="{{ $Why->position}}"style="font-size: 24px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" style="font-size: 24px;">ช่วงเงินเดือน</label>
                                                        <select name="salary" class="form-select" value="{{ $Why->salary}}" style="font-size: 24px;">
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
                                                        <label class="form-label" style="font-size: 24px;">ที่อยู่บริษัท</label>
                                                        <input type="text" class="form-control" name="Company_add" value="{{ $Why->Company_add}}"style="font-size: 24px;" required>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        <label class="form-label" style="font-size: 24px;">ประเภทงาน</label>
                                                        <select name="worktype" class="form-select" style="font-size: 24px;">
                                                            @if($Why->worktype === 'ข้าราชการ' )
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option>  
                                                            <option value="">อื่นๆ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'รัฐวิสาหกิจ' )
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            <option value="">อื่นๆ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'พนักงานบริษัท' )
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            <option value="">อื่นๆ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'อาชีพอิสระ' )
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            <option value="">อื่นๆ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'กิจการของครอบครัว' )
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            <option value="">อื่นๆ</option> 
                                                            @endif
                                                            @if($Why->worktype === 'พนักงานบริษัทข้ามชาติ' )
                                                            <option value="พนักงานบริษัทข้ามชาติ">พนักงานบริษัทข้ามชาติ</option> 
                                                            <option value="">อื่นๆ</option> 
                                                            <option value="ข้าราชการ">ข้าราชการ</option>
                                                            <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                            <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                            <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                            <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            @endif  
                                                            @if($Why->worktype !== 'พนักงานบริษัทข้ามชาติ' && 
                                                                $Why->worktype !== 'ข้าราชการ' && 
                                                                $Why->worktype !== 'รัฐวิสาหกิจ' && 
                                                                $Why->worktype !== 'พนักงานบริษัท' && 
                                                                $Why->worktype !== 'อาชีพอิสระ' && 
                                                                $Why->worktype !== 'กิจการของครอบครัว')
                                                                <option value="">อื่นๆ</option> 
                                                                <option value="ข้าราชการ">ข้าราชการ</option>
                                                                <option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
                                                                <option value="พนักงานบริษัท">พนักงานบริษัท</option>
                                                                <option value="อาชีพอิสระ">อาชีพอิสระ</option>
                                                                <option value="กิจการของครอบครัว">กิจการของครอบครัว</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                        @if($Why->worktype !== 'พนักงานบริษัทข้ามชาติ' && 
                                                            $Why->worktype !== 'ข้าราชการ' && 
                                                            $Why->worktype !== 'รัฐวิสาหกิจ' && 
                                                            $Why->worktype !== 'พนักงานบริษัท' && 
                                                            $Why->worktype !== 'อาชีพอิสระ' && 
                                                            $Why->worktype !== 'กิจการของครอบครัว')
                                                        <label class="form-label"style="font-size: 24px;">อื่นๆ</label>
                                                        <input type="text" class="form-control" name="other_worktype"style="font-size: 24px;"value="{{$Why->worktype}}">
                                                        @else
                                                        <label class="form-label"style="font-size: 24px;">อื่นๆ</label>
                                                        <input type="text" class="form-control" name="other_worktype"style="font-size: 24px;"  >
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 mb-3">
                                                    <label class="col-form-label font-weight-bold text-dark" style="font-size: 24px;">รายละเอียดของงาน (ถ้ามี)</label>
                                                    <textarea id="desctiption" style="font-size: 24px;"name="desctiption" rows="3" cols="90">{{ $Why->desctiption}}</textarea>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="resetPage()"style="font-size: 24px;">ปิด</button>
                                                <button type="submit" class="btn btn-primary"style="font-size: 24px;">บันทึก</button>
                                            </div>
                                        </form>    
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
    {{-- modal ประวัติส่วนตัว --}}
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
                                                            <p style="font-size: 24px; text-align: left;">อัพโหลดรูปถ่ายขนาดไม่เกิน 1 นิ้ว</p>
                                                            <p style="font-size: 24px; text-align: left;">ขนาดไฟล์ไม่เกิน 3 MB ชนิดของไฟล์ JPEG, PNG และ SVG</p>
                                                             <input type="file" style="font-size: 20px;" name="image_profile" id="image_profile" accept="image/jpeg, image/png, image/svg" aria-label="Upload">
                                                        </div>
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
                                                    
                                                    <hr class="mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="d-flex align-items-center">
                                                            <label class="col-form-label font-weight-bold text-dark me-3"style="font-size: 24px;">ความสนใจ</label>
                                                        </div>
                                                        @if($contactInfo)
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox" name="category1" id="flexRadioDefault1" value="งานพบประสังสรรค์"
                                                                @if($countone)
                                                                        checked
                                                                @endif>
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">งานพบประสังสรรค์</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category2"  id="flexRadioDefault1" value="งานวิชาการ"
                                                                @if($counttwo)
                                                                        checked
                                                                @endif>
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">งานวิชาการ</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category3"  id="flexRadioDefault1" value="งานแข่งขันกีฬา"
                                                                
                                                                @if($countthree)
                                                                        checked
                                                                @endif>
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">งานแข่งขันกีฬา</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category4"  id="flexRadioDefault1" value="กิจกรรมศิษย์เก่าสัมพันธ์"
                                                                
                                                                @if($countfour)
                                                                        checked
                                                                @endif>
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">กิจกรรมศิษย์เก่าสัมพันธ์</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox" name="category5" id="category5" onclick="clearOthAttention(this)"  
                                                                @if($countOthers)
                                                                    @if($countOthers->attention != "")
                                                                        checked
                                                                    @endif
                                                                @endif
                                                                >
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">กิจกรรมอื่น ๆ</label>
                                                            
                                                            <input class="ms-3" type="text"style="font-size: 24px;" class="form-control custom-input" placeholder="โปรดระบุ" name="categoryall" id="categoryall"  aria-label="category1" aria-describedby="basic-addon1" maxlength="50" 
                                                            @if($countOthers)
                                                            value="{{$countOthers->attention}}" 
                                                            @endif>
                                                            
                                                        </div>
                                                        @else
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox" name="category1" id="flexRadioDefault1" value="งานพบประสังสรรค์">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">งานพบประสังสรรค์</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category2"  id="flexRadioDefault1" value="งานวิชาการ">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">งานวิชาการ</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category3"  id="flexRadioDefault1" value="งานแข่งขันกีฬา">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">งานแข่งขันกีฬา</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category4"  id="flexRadioDefault1" value="กิจกรรมศิษย์เก่าสัมพันธ์">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">กิจกรรมศิษย์เก่าสัมพันธ์</label>
                                                        </div>
                                                        <div class="col-form-label font-weight-bold text-dark me-3" style="display: flex; align-items: center;">
                                                            <div class="form-check" style="margin-right: 10px;">
                                                                <input class="form-check-input" type="checkbox"name="category4"  id="flexRadioDefault1" value="">
                                                            </div>
                                                            <label for="flexRadioDefault1"style="font-size: 24px;">กิจกรรมอื่น ๆ</label>
                                                            <input class="ms-3"type="text" style="font-size: 24px;" class="form-control custom-input"placeholder=" โปรดระบุ" name="categoryall" aria-label="category1" aria-describedby="basic-addon1" maxlength="50">
                                                        </div>
                                                        @endif 
                                                    </div>

                                                    <br>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"style="font-size: 24px;">ปิด</button>
                                                    <button type="submit" class="btn btn-primary"style="font-size: 24px;" onclick="return checkFileSize()">บันทึก</button>
                                                </div>
                                            </div>
                                        </form>
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

    const OthAttentioncheckbok = document.getElementById('category5');
    const OthAttentiontextbox = document.getElementById('categoryall');


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
    function resetPage() {
        // รีโหลดหน้าใหม่
        window.location.reload();
    }
    function checkdatecurrent(check){
        const enddateM = document.getElementById('enddate_m');
        const enddateY = document.getElementById('enddate_y');

        if(check.checked == 1){
            enddateM.disabled = true;
            
            enddateY.disabled = true;
            
        }else{
            enddateM.disabled = false;
            enddateY.disabled = false;
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
    function clearOthAttention(checkbox) {
        var OthAttention = document.getElementById('categoryall');
        if (checkbox.checked == 0) {
            OthAttention.value = ""; // กำหนดค่าให้เป็น 1 เมื่อ checkbox ถูกติก
            OthAttention.disabled = true;
        }else{
            OthAttention.disabled = false;
        }
    }
    function checktextinput(text) {
        text.value = text.trim();
        if (text.value == "") {
        alert()
        }else{
        OthAttention.disabled = false;
        }
    }
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
    //ลบการศึกษา
    document.getElementById('massage_file').addEventListener('change', function () {
        var fileInput = this;
        var fileCount = fileInput.files.length;
        var fileCountElement = document.getElementById('file_count');
            
        for (var i = 0; i < fileCount; i++) {
            var file = fileInput.files[i];
            var fileSize = file.size / 1024 / 1024; // แปลงขนาดเป็น MB

            var allowedExtensions = /(\.pdf|\.jpeg|\.jpg|\.png|\.svg)$/i; // ชนิดไฟล์ที่อนุญาต
            if (!allowedExtensions.exec(file.name)) {
                fileInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                fileCountElement.innerText = 'กรุณาเลือกไฟล์ที่มีนามสกุล .pdf, .jpeg, .jpg, .png, หรือ .svg';
                return;
            }
            if (fileCount > 3) {
                fileCountElement.innerText = 'กรุณาเลือกไฟล์ไม่เกิน 3 ไฟล์';
                fileInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                return;
            }
            if (fileSize > 10) {
                fileInput.value = ''; // ล้างค่าไฟล์ที่ถูกเลือก
                fileCountElement.innerText = 'ขนาดของไฟล์ต้องไม่เกิน 10MB';
                return;
            }
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

            // แสดงการแจ้งเตือน (alert) ด้วย JavaScript โดยใช้ค่าจาก Controller
            var msg = "{{ $msg ?? '' }}"; // กำหนดค่า msg จาก Controller
            if (msg) {
                alert(msg);
            }
    </script>
 @endif
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
        swal("คุณยกเลิกการลบประวัติทำงานแล้ว");
        }
        });
        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
    }
    function confirmDeleteskill(id) {
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
    function confirmDeletelanguage(id) {
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
        swal("คุณแน่ใจที่จะลบภาษานี้ใช่ไหม");
        }
        });
        return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
    }
    function confirmDeleteTraining(id) {
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
</body>
</html>


