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
                <a href="/Admin/editnew" class="textmenu"><h5>จัดการข่าวสาร</h5></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="/User/accountsetting" class="textmenu"><h5>จัดการกิจกรรม</h5></a>
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
    
    <div class="container "style="position: absolute;left:500px;top: 215px;">
    <h2>จัดการข่าวสาร</h2>
    <hr class="mt-1" style="border: 1px solid #000">
    <a class="btn btn-outline-warning" href="{{ route('savenews') }}" role="button" >เพิ่มข่าว</a>
    
        <div class="row" >   
            <div class="col-md-8">
                    @if(session("success"))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <br>
                    <div class="card">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"class="text-center">หัวข้อ</th>
                                    <th scope="col"class="text-center">เนื้อหาข่าว</th>
                                    <th scope="col"class="text-center">วันที่แก้ไข</th>
                                    <th scope="col"class="text-center">ตัวเลือก</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                    
                                    @foreach($newsandactivity as $row)
                                    <tr>
                                    <td>{{$row->title_name}}</td>
                                    <td>{{$row->cotent}}</td>
                                    <td>{{$row->created_at->diffForHumans()}}</td><!-- diffForHumans() คือเปรียบเทียบวันที่สร้างจนถึงปัจจุบัน-->
                                    <td> <a href="{{url('/service/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a></td>
                                    <td> <a href="{{url('/service/delete/'.$row->id)}}" class="btn btn-danger"
                                          onclick="return confirm('คุณต้องการลบบริการนี้หรือไม่ ?')"
                                         >ลบข้อมูล</a>
                                    </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div> 
            </div> 
        </div>             
    </div>
    
</div>
</body>
</html>