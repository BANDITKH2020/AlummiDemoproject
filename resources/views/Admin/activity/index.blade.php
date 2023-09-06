<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
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
        <h2>จัดการการกิจกรรม</h2>
        <hr class="mt-1" style="border: 1px solid #000">
        <a class="btn btn-outline-warning" href="{{route('saveactivitys')}}" role="button" >เพิ่มกิจกรรม</a>
        <form action="" method="GET" >
                <label class="form-label" style="position: absolute;left:500px;top: 65px;">
                    <select name="searchdata" class="form-select" >
                        <option value="all">ทั้งหมด</option>
                        <option value="title_name" >ชื่อเรื่อง</option>
                        <option value="category">ประเภทกิจกรรม</option>
                        <option value="created_at">วันที่จัดกิจกรรม</option>
                    </select>
                    <div class="col-mb-2">
                        <input type="text" class="form-control" name="search" placeholder="Search activitys" style="position:relative;left:300px;top:-37px" /> 
                        <button type="submit"  class="btn btn-outline-primary" style="position: absolute;left:525px;top:1px;">Search</button>
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
                                .addImage{
                                    font-size: 24px;
                                    transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
                                }
                                .addImage:hover iconify-icon {
                                    color: #990099; /* สีของไอคอนเมื่อ hover */
                                }
                                .delete iconify-icon {
                                    font-size: 24px;
                                    color: #990000; /* สีตั้งต้นของไอคอน */
                                    transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
                                }

                                .delete:hover iconify-icon {
                                    color: #FF0033; /* สีของไอคอนเมื่อ hover */
                                }
                            </style>
                            
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col"class="text-center">หัวข้อ</th>
                                            <th scope="col"class="text-center">ประเภทกิจกรรม</th>
                                            <th scope="col"class="text-center">วันที่จัดกิจกรรม</th>
                                            <th scope="col"class="text-center">ตัวเลือก</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            
                                            @foreach($activitys as $row)
                                            @php
                                            $thaiMonths = [
                                                1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม',
                                                4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน',
                                                7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน',
                                                10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
                                            ];
                                            $eventDate = \Carbon\Carbon::parse($row->event_date);
                                            @endphp
                                            <tr>
                                            <td>{{$row->title_name}}</td>
                                            <td >{{$row->category}}</td>
                                            <td >{{$eventDate->format('d')}} {{$thaiMonths[$eventDate->month]}} {{$eventDate->year + 543}} </td>
                                            <td class="custom-action-buttons">
                                                <a href="{{ url('/activity/editactivity/'.$row->id) }}" class="edit" title="Edit" data-toggle="tooltip"><iconify-icon icon="ph:pencil-light"></iconify-icon></a>
                                                <a href="#addImage{{$row->id}}" data-bs-toggle="modal" class="addImage" title="addImage" data-toggle="tooltip"><iconify-icon icon="clarity:image-line"></iconify-icon></a>
                                                <a href="{{ url('/activity/delete/'.$row->id) }}"  onclick="return confirm('คุณต้องการลบบริการนี้หรือไม่ ?')"class="delete" title="Delete" data-toggle="tooltip"><iconify-icon icon="ph:trash-light"></iconify-icon></a>
                                            </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                    
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{$activitys->links()}}
                                </div>   
                            </div>                
                        </div>    
                </div> 
            </div> 
        </div> 
        @foreach($activitys as $row)
        <div class="modal fade" id="addImage{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">เพิ่มรูปกิจกรรม</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addImage', ['id' => $row->id]) }}" method="post" enctype="multipart/form-data" id="linkForm">
                                {{ csrf_field() }}
                                <div class="mb-3 @error('addImage') error @enderror">
                                    <label for="recipient-name" class="col-form-label">ปีการศึกษาที่จบ</label>
                                    <input type="file" class="form-control" id="addImage" name="addImage[]" multiple>
                                   
                                </div>
                                
                                    <label for="message-text" class="col-form-label">รูปภาพที่อัพโหลด</label>
                                    <ul id="uploadedFiles"></ul>
                                    
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary" id="submitBtn" >ยืนยัน</button>
                                </div>
                            </form>
                            <script>
                                const addImageInput = document.getElementById('addImage');
                                const uploadedFilesList = document.getElementById('uploadedFiles');

                                addImageInput.addEventListener('change', (event) => {
                                    uploadedFilesList.innerHTML = ''; // Clear previous entries

                                    const files = event.target.files;
                                    for (let i = 0; i < files.length; i++) {
                                        const listItem = document.createElement('li');
                                        listItem.textContent = files[i].name;
                                        uploadedFilesList.appendChild(listItem);
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        @if(Session::has('alert'))
        <script>
            swal("Massage","{{Session::get('alert')}}",'info',{
                icon: "success",
                if(exist){
                    alert(msg);
            }});
        </script>
        @endif   
    </div>
</div> 
</body>
</html>
