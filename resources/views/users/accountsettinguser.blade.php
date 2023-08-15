<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        .select {
            width: 100%;
            height: 45%;
            border-radius: 10px;
        }

        /* h5:hover{
            color: #05FF2D;
        } */
    </style>
  <div class="col-12">
        <div class="col-12 outset" style="background-color: #EFF4FF;">
            <div class="col-12">
                <div class="col-12 row">
                <div class="col-1">
                    <img src="{{ asset('images/logo-rmutt-icon.jpg') }}" style="width: 140px; height: 140px;padding: 10px;">
                </div>
                <div class="col-4" style="padding: 15px;">
                    <h2>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</h2>
                    <hr class="mt-1" style="border: 1px solid #000">
                    <h2>Computer Engineering Alummi</h2>
                </div>
                </div>
                <hr class="mt-1" style="border: 2px solid #000">
            </div>
        </div>

        <div class="col-12 row">
            <div class="col-2 mt-5" style="border: 2px solid #000;margin-left:80px;border-radius:10px;">
                <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;">
                    <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                    {{-- <h3>{{ Auth::user()->firstname }}</h3> --}}
                </div>
                <div class="col-7 mt-3" style="margin-left:50px">
                    <a href="/User/homeuser" class="textmenu"><h5>หน้าหลัก</h5></a>
                </div>
                <div class="col-10 mt-1" style="margin-left:50px">
                    <a href="/User/accountsettinguser" class="textmenu"><h5>รายชื่อนักศึกษา</h5></a>
                </div>
                <div class="col-10 mt-1" style="margin-left:50px">
                    <a href="#" class="textmenu"><h5>ทำเนียบบัณฑิต</h5></a>
                </div>
                <div class="col-10 mt-1" style="margin-left:50px">
                    <a href="#" class="textmenu"><h5>รางวัลประกาศ</h5></a>
                </div>
                <div class="col-10 mt-1" style="margin-left:50px">
                    <a href="#" class="textmenu"><h5>แบบสอบถาม</h5></a>
                </div>
                <div class="col-10 mt-1" style="margin-left:50px">
                    <a href="#" class="textmenu"><h5>ตั้งค่าบัญชี</h5></a>
                </div>
                <div class="col-10 mt-1" style="margin-left:50px">
                    <a href="#" class="textmenu"><h5>ประวัติการติดต่อ</h5></a>
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

            <div class="col-9 mt-5" style="border: 2px solid #000;margin-left:30px;border-radius:10px;">
                <h4 class="mt-3">ตั้งค่าโปรไฟล์</h4>
                <hr>
                <div class="col-12" style="text-align: end">
                    <h5>วันที่แก้ไข</h5>
                </div>
                <div class="col-10 mx-auto mt-3 text-center">
                    <img src="{{asset('images/teamwork.png')}}" style="width:200px;height:200px;padding:10px">
                    <h5>ชื่อ-นามสกุล <a class="fas fa-pencil-alt fa-xs" style="cursor: pointer;margin-left:3px;color:#000"
                        onclick="accountSetting('personalHistory')"></a></h5>
                </div>
                <hr>
                <div class="col-12 row">
                    <div class="col-3" style="text-align: center">
                        <h5>ประวัติการศึกษา <a class="fas fa-pencil-alt fa-xs" style="cursor: pointer;margin-left:3px;color:#000"
                            onclick="accountSetting('educationHistory')"></a></h5>
                    </div>
                    <div class="col-3" style="text-align: center">
                        <h5>ประวัติการทำงาน <a class="fas fa-pencil-alt fa-xs" style="cursor: pointer;margin-left:3px;color:#000"
                            onclick="accountSetting('workHistory')"></a></h5>
                    </div>
                    <div class="col-3" style="text-align: center">
                        <h5>ทักษะ <a class="fas fa-pencil-alt fa-xs" style="cursor: pointer;margin-left:3px;color:#000"
                            onclick="accountSetting('skills')"></a></h5>
                    </div>
                    <div class="col-3" style="text-align: center">
                        <h5>ประวัติการฝึกอบรม <a class="fas fa-pencil-alt fa-xs" style="cursor: pointer;margin-left:3px;color:#000"
                            onclick="accountSetting('traningHistory')"></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row" style="position: absolute;left:500px;top:180px;">
            @foreach ($newsandactivity as $row)
            <div class="col-md-4" style="max-width: 350px;">
            <div class="card mt-5 " >
                <div class='card-body'>
                <img src="{{ asset($row->title_image) }}" class="img-fluid rounded-start"style="width: 300px;" >
                <h5 class='card-title'>{{ $row->title_name }}</h5>
                <h6 class='sub-subtitle mb-2 text-muted'>{{ $row->title_name }}</h6>
                <p class='card-text'>{{ $row->category }}</p>
                <a href="#" class="btn btn-primary">edit</a>
                <a href="#" class="btn btn-danger">delete</a>
                </div>
            </div>
            </div>
            @endforeach
            {{ $newsandactivity->links() }}
        </div>
    </div>

    <div class="modal fade" id="Studentinfo" tabindex="-1" aria-labelledby="Studentinfo" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 40%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขประวัติส่วนตัว</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-lg-12">
                            <div class="col-lg-12 row">
                                <div class="col-lg-2">
                                    <label class="col-form-label font-weight-bold text-dark">คำนำหน้า</label>
                                    <select name="" id="" class="select">
                                        <option value="นาย">นาย</option>
                                        <option value="นาย">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label font-weight-bold text-dark">ชื่อ</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-center bg-white"
                                        required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-form-label font-weight-bold text-dark">นามสกุล</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-center bg-white"
                                        required>
                                    </div>
                                </div>
                                <hr class="mt-3">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <label class="col-form-label font-weight-bold text-dark me-3">ช่องทางการติดต่อ</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox">
                                            <label class="form-check-label" for="contactCheckbox">ไม่เปิดเปิดเผยช่องทางการติดต่อ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <label class="col-form-label font-weight-bold text-dark">อีเมล</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-center bg-white"
                                        required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <label class="col-form-label font-weight-bold text-dark">Line</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-center bg-white"
                                        required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <label class="col-form-label font-weight-bold text-dark">Facebook</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-center bg-white"
                                        required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <label class="col-form-label font-weight-bold text-dark">Tel.</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-center bg-white"
                                        required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <label class="col-form-label font-weight-bold text-dark">Instagram</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm text-center bg-white"
                                        required>
                                    </div>
                                </div>
                                <hr class="mt-3">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <label class="col-form-label font-weight-bold text-dark me-3">ความสนใจ</label>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label class="col-form-label font-weight-bold text-dark me-3"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="">
                                            <label class="form-check-label" for="">งานพบปะสังสรรค์ประจำปี</label>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label class="col-form-label font-weight-bold text-dark me-3"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="">
                                            <label class="form-check-label" for="">อบรมให้ความรู้วิชาการ</label>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label class="col-form-label font-weight-bold text-dark me-3"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="">
                                            <label class="form-check-label" for="">แข่งขันกีฬาศิษย์เก่าสัมพันธ์</label>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label class="col-form-label font-weight-bold text-dark me-3"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="">
                                            <label class="form-check-label" for="">กิจกรรมศิษย์เก่าสัมพันธ์</label>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label class="col-form-label font-weight-bold text-dark me-3"></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="">
                                            <label class="form-check-label" for="">กิจกรรมอื่นๆ</label>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center"
                                            style="max-width:300px;margin-left:3px" placeholder="กรุณาระบุ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
</body>


</html>





<script>
    function accountSetting(action) {
        console.log('action', action);
        switch(action){
            case 'personalHistory' : {
                $('#Studentinfo').modal('show');
            }break;

            case 'educationHistory' : {
                $('#').modal('show');
            }break;

            case 'workHistory' : {
                $('#').modal('show');
            }break;

            case 'skills' : {
                $('#').modal('show');
            }break;

            case 'traningHistory' : {
                $('#').modal('show');
            }break;
        }

    }
</script>