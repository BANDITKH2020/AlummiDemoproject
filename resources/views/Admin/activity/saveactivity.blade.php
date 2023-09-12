<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
        <form action="{{route('addactivitys')}}" method="post" enctype="multipart/form-data">  
        @csrf
        <div class="container "style="position: absolute;left:500px;top: 180px;">
            <h2>เพิ่มกิจกรรม</h2>
            <hr class="mt-1" style="border: 1px solid #000">
            
            <div class="card mb-4" style="max-width: 440px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{ asset('images/imagephoto.png') }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text">1.อัพโหลดรูปภาพ</p>
                                <p class="card-text">2.ชนิดของไฟล์ JPEG,PNG และ SVG</p>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="title_image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    @error('title_image')
                                    <div class="my-1">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>    
            </div>
        </div>
        <div class="col-4" style="padding: 15px; position: absolute;left:500px;top: 430px;">
                <h3>หัวข้อกิจกรรม</h3>
                <input type="text" class="form-control" name="title_name" aria-label="title_name" aria-describedby="basic-addon1">
                @error('title_name')
                    <div class="my">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror
                <br>
                <h3>เนื้อหากิจกรรม</h3>
                <textarea type="text" name="cotent" rows="3" cols="25" class="form-control" aria-label="With textarea"></textarea>
                @error('cotent')
                    <div class="my">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror<br>
                <h3>วัตถุประสงค์ของกิจกรรมนี้</h3>
                <textarea type="text" name="objective" rows="3" cols="25" class="form-control" aria-label="With textarea"></textarea>
                @error('objective')
                    <div class="my">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror<br>
                <br>
                <button class="btn btn-primary" style="position: absolute;left:200px;">บันทึก</button>
                <a href="{{ route('news') }}" class="btn" style="background-color:#dc3545; color: white; position: absolute;left:300px;">ยกเลิก</a>
        </div>
        <div class="card mb-4" style="max-width: 440px;position: absolute;left:1200px;top: 280px;">
            <div class="card-body">  
            <h4>ประเภทกิจกรรม</h4>
                <div class="form-check">
                    <input class="form-check-input " type="radio" name="category" id="flexRadioDefault1" value="1">งานพบประสังสรรค์ประจำปี
                </div>
                <div class="form-check">
                    <input class="form-check-input " type="radio" name="category" id="flexRadioDefault1" value="2">อบรมให้ความรู้วิชาการ
                </div>
                <div class="form-check">
                    <input class="form-check-input " type="radio" name="category" id="flexRadioDefault1"  value="3">งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์
                </div>
                <div class="form-check">
                    <input class="form-check-input " type="radio" name="category" id="flexRadioDefault1"  value="4">กิจกรรมศิษย์เก่าสัมพันธ์
                </div>
                <div class="form-check"  >
                    <input class="form-check-input" type="radio" name="category"  id="flexRadioDefault1" value="5">กิจกรรมอื่นๆ
                    <input type="text" class="form-control" name="categoryall" aria-label="category1" aria-describedby="basic-addon1"><br>
                </div>
                <h4>วันที่จัดกิจกรรม</h4>
                <input class="form-control" type="date" id="event_date" name="event_date" required>
                @error('category')
                    <div class="my">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror<br>
            </div>
        </div>
        
        
        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
            alert(msg);
            }
        </script>
        
    </form>
</form>
</body>
</html>
