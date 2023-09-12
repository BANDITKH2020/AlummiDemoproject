<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        .form-control{
                width: 300px; 
                height: 40px;
                position: absolute;
                left:500px;
                
        } 
        .form-select{
                width: 300px; 
                height: 40px;
                position: absolute;
                left:500px;
        }
       
        .flex-container {
            display: flex;
            align-items: center;
            flex-direction: row; /* เพิ่มบรรทัดนี้ */
        }
        h4{
           
            margin-left: 300px;
        }
        .text-danger{
            position: absolute;
            left:850px;

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
                <h3>{{ Auth::user()->firstname }}</h3>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/admin/home" class="textmenu"><h5>หน้าหลัก</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('manage') }}" class="textmenu"><h5>จัดการบัญชีผู้ใช้</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
            <a href="{{ route('status') }}" class="textmenu"><h5>ปรับสภาพนักศึกษา</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('news') }}" class="textmenu"><h5>จัดการข่าวสาร</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('activitys') }}" class="textmenu"><h5>จัดการกิจกรรม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('reward') }}" class="textmenu"><h5>จัดการรางวัลประกาศ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('viewtoken') }}" class="textmenu"><h5>จัดการโค้ด</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('links') }}" class="textmenu"><h5>จัดการแบบสอบถาม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('graduate') }}" class="textmenu"><h5>จัดการทำเนียบบัณทิต</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('massege') }}" class="textmenu"><h5>รายการข้อความ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('dashboard') }}" class="textmenu"><h5>แดชบอร์ด</h5></a>
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
            
            <a href="{{ route('contact') }}" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
        </div>
    </div>
    <form action="{{url('/Admin/reward/update/'.$reward->id)}}" method="post" enctype="multipart/form-data">  
        @csrf
        <div class="container "style="position: absolute;left:500px;top: 215px;">
            <h2>เพิ่มรางวัลประกาศ</h2>
            <hr class="mt-1" style="border: 1px solid #000">
            <br>
            <div style="display: flex; align-items: center;">
                <h4 style="margin-right: 15px;">รหัสนักศึกษา</h4>
                <input type="text" class="form-control" name="student_id" aria-label="student_id" aria-describedby="basic-addon1" value="{{$reward->student_id}}">
                @error('student_id')
                    <div>
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror
            </div>
           
            <br>
            <div style="display: flex; align-items: center;">
                <h4 style="margin-right: 15px;">ชื่อ</h4>
                <input type="text" class="form-control" name="firstname" aria-label="firstname" aria-describedby="basic-addon1"value="{{$reward->firstname}}">
                @error('firstname')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror
            </div>
            <br>
            <div style="display: flex; align-items: center;">
                <h4 style="margin-right: 15px;">นามสกุล</h4>
                <input type="text" class="form-control" name="lastname" aria-label="lastname" aria-describedby="basic-addon1" value="{{$reward->lastname}}">
                @error('lastname')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror
            </div>
            <br>
            <div style="display: flex; align-items: center;">
                <h4 style="margin-right: 15px;">ปีการศึกษาที่จบ</h4>
                <select class="form-select" name="year" onchange="resultName(this.value);" >
                    <option value="">-</option>
                    <?php
                    $selectedYear = isset($_GET['YearsSelect']) ? $_GET['YearsSelect'] : ""; // เก็บค่าปีที่ถูกเลือกจาก URL parameter
                    for ($y = 2564; $y <= 2580; $y++) {
                        $selected = ($selectedYear == $y) ? "selected='selected'" : "";
                        echo "<option value='$y' $selected>$y</option>";
                    }
                    ?>
                </select>
            </div>
            <br>
            <div style="display: flex; align-items: center;">
                <h4 style="margin-right: 15px;">ผู้จัด</h4>
                <input type="text" class="form-control" name="organizer" aria-label="organizer" aria-describedby="basic-addon1" value="{{$reward->organizer}}" >
                @error('organizer')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror
            </div>
            <br>
            <div style="display: flex; align-items: center;">
                <h4 style="margin-right: 15px;">ชื่อทุน/รางวัล</h4>
                <input type="text" class="form-control" name="award_name" aria-label="award_name" aria-describedby="basic-addon1" value="{{$reward->award_name}}">
                @error('award_name')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror
            </div>
            <br>
            <div style="display: flex; align-items: center;">
                <h4 style="margin-right: 15px;">มูลค่าทุน/อันดับ</h4>
                <input type="text" class="form-control" name="amount" aria-label="amount" aria-describedby="basic-addon1" value="{{$reward->amount}}">
                @error('amount')
                    <div class="my-2">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror
            </div>  
            <br>
            <div style="display: flex; align-items: center;">
                <h4 style="margin-right: 15px;">ประเภทรางวัล</h4>
                <select name="reward_type" class="form-select" >
                        <option value="reward">รางวัล</option>
                        <option value="scholarship" >ทุนการศึกษา</option>
                </select>
            </div>   
                <br>
                <button class="btn btn-primary" style="position: absolute;left:500px;">บันทึก</button>
                <a href="{{ route('reward') }}" class="btn" style="background-color:#dc3545; color: white; position: absolute;left:600px; ">ยกเลิก</a>
        </div>
        @if(Session::has('alert'))
        <script>
            swal("{{Session::get('alert')}}",{
                icon: "success",
                if(exist){
                    alert(msg);
            }});
        </script>
        @endif 
    </form>

</body>
</html>
