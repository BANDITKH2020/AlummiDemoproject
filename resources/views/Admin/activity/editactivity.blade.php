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
                <a href="/Admin/homeadmin" class="textmenu"><h5>หน้าหลัก</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="" class="textmenu"><h5>การจัดการ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/graduatehouse" class="textmenu"><h5>การจัดการบัญชีผู้ใช้</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/awardannounce" class="textmenu"><h5>ปรับสภาพ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('news') }}" class="textmenu"><h5>จัดการข่าวสาร</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('activitys') }}" class="textmenu"><h5>จัดการกิจกรรม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/contacthistory" class="textmenu"><h5>จัดการรางวัลประกาศ</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/contacthistory" class="textmenu"><h5>จัดการโค้ด</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/contacthistory" class="textmenu"><h5>จัดการแบบสอบถาม</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/contacthistory" class="textmenu"><h5>จัดการทำเนียบบัณทิต</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
              <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">ออกจากระบบ</button>
              </form>
            </div>
            <hr class="mt-5" style="border: 2px solid #000">
            
            <a href="" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
        </div>
    </div>
        <form action="{{url('/activity/update/'.$activity->id)}}" method="post" enctype="multipart/form-data">  
        @csrf
        <div class="container "style="position: absolute;left:500px;top: 180px;">
            <h2>เพิ่มกิจกรรม</h2>
            <hr class="mt-1" style="border: 1px solid #000">
            
            <div class="card mb-4" style="max-width: 440px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{ asset($activity->title_image) }}" class="img-fluid rounded-start" alt="...">
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
                <input type="text" class="form-control" name="title_name" aria-label="title_name" aria-describedby="basic-addon1"value="{{$activity->title_name}}">
                @error('title_name')
                    <div class="my">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror
                <br>
                <h3>เนื้อหากิจกรรม</h3>
                <textarea type="text" name="cotent" rows="3" cols="25" class="form-control" aria-label="With textarea">{{$activity->cotent}}</textarea>
                @error('cotent')
                    <div class="my">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror<br>
                <h3>วัตถุประสงค์ของกิจกรรมนี้</h3>
                <textarea type="text" name="objective" rows="3" cols="25" class="form-control" aria-label="With textarea">{{$activity->objective}}</textarea>
                @error('objective')
                    <div class="my">
                        <span class="text-danger">{{$message}}</span>
                    </div>
                @enderror<br>
                <br>
                <button class="btn btn-primary" style="position: absolute;left:200px;">บันทึก</button>
                <a href="{{ route('news') }}" class="btn" style="background-color:#dc3545; color: white; position: absolute;left:300px;">ยกเลิก</a>
        </div>
    </form>
</form>
</body>
</html>
