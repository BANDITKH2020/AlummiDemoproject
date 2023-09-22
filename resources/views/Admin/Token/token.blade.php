<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
              h3{
                font-weight: bold;
            }
            h2{
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
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h4 style=" font-weight: bold;">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/admin/home" class="textmenu"><h3 >หน้าข่าวประชาสัมพันธ์</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('status') }}" class="textmenu"><h3>ปรับสถานะภาพนักศึกษา</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('massege') }}" class="textmenu"><h3>รายการข้อความ</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('dashboard') }}" class="textmenu"><h3>แดชบอร์ด</h3></a>
            </div>
            <div class="col-8 mt-1"style="margin-left:50px">
              <hr style="border: 1px solid #000">
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('manage') }}" class="textmenu"><h3>จัดการบัญชีผู้ใช้</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('news') }}" class="textmenu"><h3>จัดการข่าวสาร</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('activitys') }}" class="textmenu"><h3>จัดการกิจกรรม</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('reward') }}" class="textmenu"><h3>จัดการรางวัลประกาศ</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('viewtoken') }}" class="textmenu"><h3>จัดการโค้ด</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('links') }}" class="textmenu"><h3>จัดการแบบสอบถาม</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('graduate') }}" class="textmenu"><h3>จัดการทำเนียบบัณทิต</h3></a>
            </div>
            
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" style="font-size: 24px;">ออกจากระบบ</button>
              </form>
            </div>
            <hr class="mt-3" style="border: 2px solid #000">
            <a href="{{ route('contact') }}" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
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
            fetch('/Admin/Token/save', {
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
            <div id="randomCodeContainer" style="font-size: 20px;border: 1px solid #ccc; padding: 5px;height:40px;border-radius:10px">
                <span class="ms-2"id="randomCode"></span>
            </div>
            <button class="btn btn-success  " id="generateCodeButton" style="font-size: 20px;position: absolute;left:540px;top:65px;">สุ่มโค้ด</button>
            </div><br>
            <div class="d-grid gap-2 col-6 mx-auto">
                <h3>วันเวลาที่หมดอายุ</h3>
                <input class="form-control" style="font-size: 20px;"type="datetime-local" id="dateTimeInput">
                <br>
            </div>
            <button class="btn btn-primary" id="saveCodeButton" style="font-size: 20px;position: absolute;left:325px;">บันทึก</button>
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
                                        <th scope="col"class="text-center">ID</th>
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
                                        <td class="text-center">{{$row->id}}</td>
                                        <td class="text-center">{{$row->code}}</td>
                                        <td class="text-center">{{$eventDate->format('d')}} {{$thaiMonths[$eventDate->month]}} {{$eventDate->year + 543}}</td>
                                        <td class="text-center" ><a href="#" class="btn btn-outline-danger"style="font-size: 20px;" title="Delete" data-toggle="tooltip" onclick="confirmDelete({{ $row->id }})">ลบข้อมูล</a></td>
                                        
                                    </tr>
                                @endforeach


                                </tbody>

                            </table>
                            {{$randomcode->links()}}
                    </div>
            </div>
        </div>
    </div>
    <style>
        /* สร้างคลาสใหม่เพื่อกำหนดขนาดตัวอักษรของข้อความใน SweetAlert */
        .swal-text {
            font-size: 24px; /* ปรับขนาดตามที่คุณต้องการ */
        }
        </style>
    <script>
            function confirmDelete(id) {
            swal({
                title: "",
                text: "คุณแน่ใจที่จะลบรหัสนี้ใช่ไหม",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                // ถ้าผู้ใช้คลิก "ตกลง"
                window.location.href = "{{ url('/Token/delete/') }}" + '/' + id;
                } else {
                // ถ้าผู้ใช้คลิก "ยกเลิก"
                swal("คุณยกเลิกการลบรหัสนี้แล้ว");
                }
            });
            return false; // เพื่อป้องกันการนำลิงก์ไปยัง URL หลังจากแสดง SweetAlert
            }
    </script> 
</div>




</body>
</html>
