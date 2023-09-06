<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
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
                <a href="{{ route('manage') }}" class="textmenu"><h5>การจัดการบัญชีผู้ใช้</h5></a>
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
    
    <div class="container "style="position:absolute;left:500px;top: 215px;">
        <h2>รางวัล/ทุนการศึกษา</h2>
        <hr class="mt-1" style="border: 1px solid #000">
        <a class="btn btn-outline-warning" href="{{ route('savereward') }}" role="button" >เพิ่มรางวัล</a>
        <form action="" method="GET" >
                <label class="form-label" style="position: absolute;left:500px;top: 65px;">
                    <select name="searchdata" class="form-select" >
                        <option value="all">ทั้งหมด</option>
                        <option value="year" >ปีการศึกษา</option>
                        <option value="student_id">รหัสนักศึกษา</option>
                        <option value="firstname">ชื่อ</option>
                        <option value="lastname" >นามสกุล</option>
                        <option value="organizer">ผู้จัด</option>
                        <option value="award_name">รางวัล/ชื่อทุน</option>
                        <option value="amount">อันดับ/มูลค่าทุน</option>
                    </select>
                    <div class="col-mb-2">
                        <input type="text" class="form-control" name="search" placeholder="ค้นหารางวัล" style="position:relative;left:300px;top:-37px" /> 
                        <button type="submit"  class="btn btn-outline-primary" style="position: absolute;left:525px;top:1px;">ค้นหา</button>
                    </div>
                </label>
        </form>
        <div class="d-grid gap-2 col-12 mx-auto "style="position: absolute;left:125px;top:125px;">
            <div class="row" >
                <div class="col-md-8">
                        <br>
                        <div class="card my-3" >
                            <style>
                                .custom-action-buttons {
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }

                                .custom-action-buttons a {
                                    margin-right: 10px; /* กำหนดระยะห่างด้านขวาของปุ่ม */
                                }
                                .custom-action-buttons a.btn {
                                    color: black;
                                }
                                .custom-icon {
                                    font-size: 24px;
                                    color: #FFC107;
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
                                
                                .table-color{
                                    background-color: Orange;
                                    color: black;
                                }
                            
                            </style>
                            
                                <table class="table table-bordered">
                                    <thead class="table-color">
                                        <tr>
                                            <th scope="col"class="text-center">ปีการศึกษา</th>
                                            <th scope="col"class="text-center">รหัสนักศึกษา</th>
                                            <th scope="col"class="text-center">ชื่อ-นามสกุล</th>
                                            <th scope="col"class="text-center">ผู้จัด</th>
                                            <th scope="col"class="text-center">รางวัล/ชื่อทุน</th>
                                            <th scope="col"class="text-center">อันดับ/มูลค่าทุน</th>
                                            <th scope="col"class="text-center">ตัวเลือก</th>
                                            
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
                                            <td class="custom-action-buttons">
                                                <a href="{{ url('/Admin/reward/editreward/'.$row->id) }}" class="edit" title="Edit" data-toggle="tooltip"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>
                                                <a href="{{ url('/Admin/reward/delete/'.$row->id) }}"  onclick="return confirm('คุณต้องการลบบริการนี้หรือไม่ ?')"class="delete" title="Delete" data-toggle="tooltip"><iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $reward->links() }}
                                </div>   
                            </div>                
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
</div> 
</body>
</html>
