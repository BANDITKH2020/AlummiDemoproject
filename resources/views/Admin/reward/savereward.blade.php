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
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
                <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                <h4 style=" font-weight: bold;">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
            </div>
            <div class="col-7 mt-3" style="margin-left:50px">
                <a href="/admin/home" class="textmenu"><h3 >หน้าข่าวประชาสัมพันธ์</h3></a>
            </div>
            <div class="col-10 mt-1" style="margin-left:50px">
                <a href="{{ route('status') }}" class="textmenu"><h3>ปรับสถานภาพนักศึกษา</h3></a>
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
            <hr class="mt-5" style="border: 2px solid #000">
            <a href="{{ route('contact') }}" class="text-center"><h3>ติดต่อภาควิชา</h3></a>
        </div>
        <div class="col-10 col-lg-8 mt-5 ms-5">
            <div class="col-md-12">
                <h2 class="text-left">เพิ่มรางวัลประกาศ</h2>
            </div>
            <hr class="mt-1">
            <form action="{{route('addreward')}}" method="post" enctype="multipart/form-data"> 
            @csrf
            <div class="col-12 row"> 
                <div class="col-3 col-lg-3"></div> 
                <div class="col-6 col-lg-6">
                    <div class="row">
                        <h3 class="col-md-4 col-form-label text-md-end mt-3"style="font-size: 24px;">ประเภทรางวัล </h3>
                        <div class="col-md-6 col-lg-5 ">
                            <select name="reward_type" class="form-select mt-3"style="font-size: 24px;" >
                                <option value="รางวัล">รางวัล</option>
                                <option value="ทุนการศึกษา" >ทุนการศึกษา</option>
                            </select>
                        </div>
                    </div>  
                </div>
                <div class="col-3 col-lg-3"></div>
                <div class="col-3 col-lg-3"></div> 
                <div class="col-6 col-lg-6">
                    <div class="row">
                        <h3 class="col-md-4 col-form-label text-md-end mt-3"style="font-size: 24px;">ปีการศึกษา </h3>
                        <div class="col-md-6 col-lg-5 ">
                        <select class="form-select mt-3" name="year" onchange="resultName(this.value);"style="font-size: 24px;">
                            <option value="">- เลือก -</option>
                            <?php
                            $selectedYear = isset($_GET['YearsSelect']) ? $_GET['YearsSelect'] : ""; // เก็บค่าปีที่ถูกเลือกจาก URL parameter
                            for ($y = 2560; $y <= 2580; $y++) {
                                $selected = ($selectedYear == $y) ? "selected='selected'" : "";
                                echo "<option value='$y' $selected>$y</option>";
                            }
                            ?>
                        </select>
                        </div>
                    </div>  
                </div>
                <div class="col-3 col-lg-3"></div>
                <div class="col-3 col-lg-3"></div> 
                <div class="col-6 col-lg-6">
                    <div class="row">
                        <h3 class="col-md-4 col-form-label text-md-end mt-3"style="font-size: 24px;">รหัสนักศึกษา </h3>
                        <div class="col-md-6 col-lg-5 ">
                            <input type="text" style="font-size: 24px;"class="form-control mt-3" name="student_id" aria-label="student_id" aria-describedby="basic-addon1" >
                            @error('student_id')
                                <div>
                                    <span class="text-danger"style="font-size: 24px;">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>  
                </div>
                <div class="col-3 col-lg-3"></div>
                <div class="col-3 col-lg-3"></div> 
                <div class="col-6 col-lg-6">
                    <div class="row">
                        <h3 class="col-md-4 col-form-label text-md-end mt-3"style="font-size: 24px;">ชื่อ </h3>
                        <div class="col-md-6 col-lg-5 ">
                            <input type="text" style="font-size: 24px;"class="form-control mt-3" name="firstname" aria-label="firstname" aria-describedby="basic-addon1">
                            @error('firstname')
                                <div class="my-2">
                                    <span class="text-danger"style="font-size: 24px;">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>  
                </div>
                <div class="col-3 col-lg-3"></div>   
                <div class="col-3 col-lg-3"></div>   
                <div class="col-6 col-lg-6">
                    <div class="row">
                        <h3 class="col-md-4 col-form-label text-md-end mt-3"style="font-size: 24px;">นามสกุล </h3>
                        <div class="col-md-6 col-lg-5 ">
                            <input type="text" style="font-size: 24px;"class="form-control mt-3" name="lastname" aria-label="lastname" aria-describedby="basic-addon1">
                            @error('lastname')
                                <div class="my-2">
                                    <span class="text-danger"style="font-size: 24px;">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>  
                </div>
                <div class="col-3 col-lg-3"></div>   
                <div class="col-3 col-lg-3"></div>   
                <div class="col-6 col-lg-6">
                    <div class="row">
                        <h3 class="col-md-4 col-form-label text-md-end mt-3"style="font-size: 24px;">ชื่อผู้มอบรางวัล/ทุน </h3>
                        <div class="col-md-6 col-lg-5">
                            <input type="text" style="font-size: 24px;" class="form-control mt-3" name="organizer" aria-label="organizer" aria-describedby="basic-addon1"  >
                            @error('organizer')
                                <div class="my-2">
                                    <span class="text-danger"style="font-size: 24px;">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>  
                </div>
                <div class="col-3 col-lg-3"></div> 
                <div class="col-3 col-lg-3"></div>   
                <div class="col-6 col-lg-6">
                    <div class="row">
                        <h3 class="col-md-4 col-form-label text-md-end mt-3"style="font-size: 24px;">ชื่อรางวัล/ทุน </h3>
                        <div class="col-md-6 col-lg-5 ">
                            <input type="text" style="font-size: 24px;"class="form-control mt-3" name="award_name" aria-label="award_name" aria-describedby="basic-addon1" >
                            @error('award_name')
                                <div class="my-2">
                                    <span class="text-danger"style="font-size: 24px;">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>  
                </div>
                <div class="col-3 col-lg-3"></div> 
                <div class="col-3 col-lg-3"></div>   
                <div class="col-6 col-lg-6">
                    <div class="row">
                        <h3 class="col-md-4 col-form-label text-md-end mt-3"style="font-size: 24px;">อันดับ/มูลค่าทุน </h3>
                        <div class="col-md-6 col-lg-5">
                            <input type="text"style="font-size: 24px;" class="form-control mt-3" name="amount" aria-label="amount" aria-describedby="basic-addon1" >
                            @error('amount')
                                <div class="my-2">
                                    <span class="text-danger"style="font-size: 24px;">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>  
                </div>
                <div class="col-3 col-lg-3"></div> 

                <div class="col-3 col-lg-3"></div>   
                <div class="col-6 col-lg-6 text-md-center mt-3" >
                    <button type="button" onclick="window.location.href='{{ route('reward') }}'" class=" btn btn-danger" style="font-size: 24px;">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary"  style="font-size: 24px;">บันทึก</button>
                </div>
                <div class="col-3 col-lg-3"></div> 
            </div>
            
            </form> 
        </div> 
    </div>
    


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

            // แสดงการแจ้งเตือน (error) ด้วย JavaScript โดยใช้ค่าจาก Controller
        var msg = "{{ $msg ?? '' }}"; // กำหนดค่า msg จาก Controller
        if (msg) {
            alert(msg);
        }
    </script>
@endif

</body>
</html>


