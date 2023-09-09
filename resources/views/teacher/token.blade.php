<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
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
        .re-admin iconify-icon {
        font-size: 29px;
        color: black; /* สีตั้งต้นของไอคอน */
        }
        .re-teacher iconify-icon {
        font-size: 24px;
        color: black; /* สีตั้งต้นของไอคอน */
        }
    </style>
  <div class="col-12">
    <div class="col-12 outset" style="background-color: #EFF4FF;">
      <div class="col-12">
        <div class="col-12 row">
          <div class="col-1">
            <img src="{{ asset('images/logo-rmutt-icon.jpg') }}" style="width: 140px; height: 140px;padding: 10px;">
          </div>
          <div class="col-4" style="padding: 15px; ;">
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
                <img src="{{ Storage::url('image/profileuser/' . $contactInfo->image) }}" style="width:100px;height:100px;padding:10px; border-radius: 50%;">
                <h4>{{ Auth::user()->firstname }}{{ Auth::user()->lastname }}</h4>
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
            <a class="text-center" data-bs-toggle="modal" data-bs-target="#contactModal" style="color: black;text-decoration: none;cursor: pointer;"><h3>ติดต่อภาควิชา</h3></a>
            
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
  <script>
    function generateRandomCode(length) {
        const characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let randomCode = '';

        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            randomCode += characters.charAt(randomIndex);
        }

        return randomCode;
    }

        document.addEventListener('DOMContentLoaded', function() {
            const generateCodeButton = document.getElementById('generateCodeButton');
            const saveCodeButton = document.getElementById('saveCodeButton');
            const messageDisplay = document.getElementById('messageDisplay');
            const randomCodeElement = document.getElementById('randomCode');
            const dateTimeInput = document.getElementById('dateTimeInput');

            generateCodeButton.addEventListener('click', function() {
                const newRandomCode = generateRandomCode(10);
                randomCodeElement.textContent = newRandomCode;
            });

            saveCodeButton.addEventListener('click', function() {
                const randomCode = randomCodeElement.textContent;
                const selectedDateTime = dateTimeInput.value;
                sendRandomCodeAndDateTime(randomCode, selectedDateTime);
            });

            function sendRandomCodeAndDateTime(randomCode, selectedDateTime) {
                fetch('/teacher/Token/save', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({ random_code: randomCode, selected_date_time: selectedDateTime }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        messageDisplay.textContent = data.alert;
                        console.log('Created At:', data.createdAt);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
    });
    </script> 
        <div class="container "style="position: absolute;left:500px;top: 180px;">
            <h2>จัดการโค้ด</h2>
            <hr class="mt-1" style="border: 1px solid #000">
            <p id="messageDisplay"></p>
        </div>
        <div class="col-4" style="padding: 15px; position: absolute;left:800px;top: 330px;">
            <div class="d-grid gap-2 col-6 mx-auto">
            <h3>รหัสโค้ด</h3>
            <span id="randomCode"></span><br>
            <button class="btn btn-success  " id="generateCodeButton" style="position: absolute;left:500px;top:65px;">สุ่มโค้ด</button>
            </div><br>
            <div class="d-grid gap-2 col-6 mx-auto">
                <h3>วันเวลาที่หมดอายุ</h3>
                <input class="form-control" type="datetime-local" id="dateTimeInput">
                <br>
            </div>
            <button class="btn btn-primary" id="saveCodeButton" style="position: absolute;left:275px;">บันทึก</button>    
        </div>
        <br>
    <div class="d-grid gap-2 col-6 mx-auto "style="position: absolute;left:825px;top:625px;">
    <div class="row" >
            <div class="col-md-8">
                    <br>
                    <div class="card my-3" >
                            <table class="table table-bordered">
                                <thead class="table-warning">
                                    <tr>
                                        <th scope="col"class="text-center">ลำดับ</th>
                                        <th scope="col"class="text-center">รหัสโค้ด</th>
                                        <th scope="col"class="text-center">วันเวลาที่หมดอายุ</th>
                                        <th scope="col"class="text-center">ตัวเลือก</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($randomcode as $row)
                                    @php
                                        $thaiMonths = [
                                            1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                            4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                            7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                            10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                        ];
                                        $eventDate = \Carbon\Carbon::parse($row->end_date);
                                        
                                    @endphp
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->code}}</td>
                                        <td>{{$eventDate->format('d')}} {{$thaiMonths[$eventDate->month]}} {{$eventDate->year + 543}}</td>
                                        <td><a href="{{url('/teacher/delete/'.$row->id)}}" class="btn btn-danger">ลบข้อมูล</a> </td>
                                    </tr>
                                @endforeach
                                   
                                    
                                </tbody>
                                
                            </table>
                            {{$randomcode->links()}}           
                    </div> 
            </div> 
        </div> 
    </div>
</div>

    
    @if(Session::has('alert'))
        <script>
            swal("Massage","{{Session::get('alert')}}",'info',{
                icon: "success",
                if(exist){
                    alert(msg);
            }});
        </script>
    @endif  
    <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
            alert(msg);
            }
    </script> 
  
</body>
</html>
