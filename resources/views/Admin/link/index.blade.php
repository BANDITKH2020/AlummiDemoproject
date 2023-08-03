<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                <a href="{{ route('links') }}" class="textmenu"><h5>จัดการแบบสอบถาม</h5></a>
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
    
    <div class="container "style="position:absolute;left:500px;top: 215px;">
    <h2>จัดการแบบสอบถาม</h2>
    <hr class="mt-1" style="border: 1px solid #000">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        เพิ่มลิงก์
    </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">เพิ่มลิงก์</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('addlinks')}}" method="post" enctype="multipart/form-data" id="linkForm">
                                {{ csrf_field() }}
                                <div class="mb-3 @error('graduatedyear') error @enderror">
                                    <label for="recipient-name" class="col-form-label">ปีการศึกษาที่จบ</label>
                                    <input type="text" class="form-control" id="graduatedyear" name="graduatedyear" >
                                   
                                </div>
                                <div class="mb-3 @error('link') error @enderror">
                                    <label for="message-text" class="col-form-label">ลิงก์แบบสอบถาม</label>
                                    <input type="text" class="form-control" id="link" name="link" >
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>ยืนยัน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        <form action="" method="GET" >
                <label class="form-label" style="position: absolute;left:500px;top: 65px;">
                    <div class="col-mb-2">
                        <input type="text" class="form-control" name="search" placeholder="Search news" style="position:relative;left:300px;top:-1px" required/> 
                        <button type="submit"  class="btn btn-outline-primary" style="position: absolute;left:525px;top:-1px;">Search</button>
                    </div>
                </label>
        </form>
    
        <div class="row" >
            <div class="col-md-8">
                    <br>
                    <div class="card my-3" >
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col"class="text-center">ปีการศึกษาที่จบ</th>
                                        <th scope="col"class="text-center">ลิงก์</th>
                                        <th scope="col"class="text-center">วันที่แก้ไข</th>
                                        <th scope="col"class="text-center">ตัวเลือก</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($surveylink as $row)
                                        <tr>
                                        <td>{{$row->graduatedyear}}</td>
                                        <td>{{$row->link}}</td>
                                        <td>{{$row->created_at->format('d-m-Y')}}</td>
                                        <td><a href="#edit{{$row->id}}" data-bs-toggle="modal"><img src="{{ asset('images/pencil.jpg') }}" width="30" height="30" style="position: absolute;left:735px;"></a>
                                            
                                            <a href="{{url('/link/delete/'.$row->id)}}" 
                                            onclick="return confirm('คุณต้องการลบบริการนี้หรือไม่ ?')">
                                            <img src="{{ asset('images/trash.jpg') }}" width="30" height="30"style="position: absolute;left:775px;">
                                            </a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                             {{$surveylink->links()}}           
                    </div> 
            </div> 
        </div> 
        @foreach($surveylink as $row)
        <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">แก้ไขลิงก์</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('/link/update/'.$row->id)}}" method="post" enctype="multipart/form-data" id="linkForm">
                                {{ csrf_field() }}
                                <div class="mb-3 @error('graduatedyear') error @enderror">
                                    <label for="recipient-name" class="col-form-label">ปีการศึกษาที่จบ</label>
                                    <input type="text" class="form-control" id="graduatedyear" name="graduatedyear" value="{{$row->graduatedyear}}" >
                                   
                                </div>
                                <div class="mb-3 @error('link') error @enderror">
                                    <label for="message-text" class="col-form-label">ลิงก์แบบสอบถาม</label>
                                    <input type="text" class="form-control" id="link" name="link" value="{{$row->link}}">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary" id="submitBtn" >ยืนยัน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div> 
        @endforeach   
        @if(Session::has('alert'))
        <script>
            swal("Massage","{{Session::get('alert')}}",'info',{
                title: "Good job!",
                text: "บันทึกข้อมูลสำเร็จ",
                icon: "success",
            });
        </script>
        @endif
        
        <script>
            // JavaScript สำหรับการตรวจสอบและควบคุมปุ่ม Submit
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('linkForm');
                const graduatedYearInput = document.getElementById('graduatedyear');
                const linkInput = document.getElementById('link');
                const submitBtn = document.getElementById('submitBtn');

                form.addEventListener('input', function () {
                    // ตรวจสอบว่าทั้งสอง input fields มีค่าที่ไม่เป็นช่องว่าง
                    const graduatedYearValue = graduatedYearInput.value.trim();
                    const linkValue = linkInput.value.trim();

                    if (graduatedYearValue !== '' && linkValue !== '') {
                        // ถ้าทั้งสอง input fields ถูกกรอกครบถ้วน ปลด attribute disabled ในปุ่ม Submit
                        submitBtn.removeAttribute('disabled');
                    } else {
                        // ถ้ามีอย่างน้อยหนึ่ง input field ไม่ถูกกรอกหรือทั้งสอง fields ไม่ถูกกรอกครบ ให้เพิ่ม attribute disabled ในปุ่ม Submit
                        submitBtn.setAttribute('disabled', 'disabled');
                    }
                });
            });
        </script>
    </div>
</div>
</body>
</html>
