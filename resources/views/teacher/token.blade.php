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
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
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
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                @if (Auth::check() && Auth::user()->role_acc === 'teacher')
                <a href="{{route('teacherviewtoken')}}" class="textmenu"><h5>จัดการโค้ด</h5></a>
                @endif
                
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">ออกจากระบบ</button>
              </form>
            </div>
            <div  class="col-10 mt-3" style="display: flex; justify-content: center; align-items: center;">
              <a href="/register/Admin" class="re-admin" title="เพิ่มผู้ดูแลระบบ"style="margin-right: 5px;">
                  <iconify-icon icon="ri:admin-fill"></iconify-icon>
              </a>
              <a href="/register/teacher" class="re-teacher" title="เพิ่มอาจารย์"style="margin-left: 5px;">
                  <iconify-icon icon="subway:admin-1"></iconify-icon>
              </a>
            </div>
            <hr class="mt-1" style="border: 2px solid #000">
            
            <a href="" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
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
    <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
            alert(msg);
            }
    </script> 
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
  
  
</body>
</html>