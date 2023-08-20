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
    </div>

        <div class="col-12 row">
            <div class="col-2">
                <div class="col-12 mt-5" style="border: 2px solid #000;margin-left:10px;border-radius:10px;">
                        <div class="col-10 mx-auto mt-3 text-center" style="border: 2px solid #000;border-radius:10px;">
                            <img src="{{ asset('images/teamwork.png') }}" style="width: 100px; height: 100px;padding: 10px">
                            {{-- <h3>{{ Auth::user()->firstname }}</h3> --}}
                        </div>
                        <div class="col-7 mt-3" style="margin-left:50px">
                            <a href="/users/homeuser" class="textmenu"><h5>หน้าหลัก</h5></a>
                        </div>
                        <div class="col-10 mt-1" style="margin-left:50px">
                            <a href="{{ route('studentslist') }}" class="textmenu"><h5>รายชื่อนักศึกษา</h5></a>
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
                            <a href="{{ route('accountsettinguser') }}" class="textmenu"><h5>ตั้งค่าบัญชี</h5></a>
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

                        <a class="text-center" onclick="openContactModal()" style="color: black;text-decoration: none;cursor: pointer;"><h3>ติดต่อภาควิชา</h3></a>
                </div>
            </div>

            <div class="col-10">
                <div class="col-12 mt-5">
                    <h4 class="mt-3">รายชื่อนักศึกษาศิษย์เก่า</h4>
                    <hr>
                    <div class="col-12">
                        <div class="row" style="text-align: end">
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <select id="" class="form-select">
                                    <option value="">กรุณาเลือก</option>
                                    <option value="option1">ตัวเลือกที่ 1</option>
                                    <option value="option2">ตัวเลือกที่ 2</option>
                                    <option value="option3">ตัวเลือกที่ 3</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <input type="text" placeholder="ค้นหา" id="searchInput" class="form-control">
                                <i class="fas fa-search" style="margin-left: 5px"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <div class="card text-center">
                                    <img class="mx-auto" src="{{ asset('images/teamwork.png') }}" alt="John" style="width:70%;">
                                    <h3>ชื่อ-นามสกุล</h3>
                                    <p>63346CPE</p>
                                    <p><button class="btn btn-primary btn-xs">View</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 60%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ช่องทางการติดต่อ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="col-lg-12">
                                <div class="col-lg-12 row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12 row" style="margin-left:15px">
                                            <div class="col-lg-1">
                                                <i class="fas fa-map-marker-alt" style="margin-top:15px"></i>
                                            </div>
                                            <div class="col-lg-10">
                                                <h5>39 หมู่ที่ 1 ถนนรังสิต-นครนายก ตำบลคลองหก อำเภอคลองหลวง จังหวัดปทุมธานี</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 row" style="margin-left:15px">
                                            <div class="col-lg-1">
                                                <i class="fas fa-phone" style="margin-top:15px"></i>
                                            </div>
                                            <div class="col-lg-10">
                                                <h5>ช่วงเวลาติดต่อ จ-ศ 08.30 - 16.30 น.<br>โทร.02 549 3460</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 row" style="margin-left:15px">
                                            <div class="col-lg-1">
                                                <a href="https://www.facebook.com/ComputerEngineeringRmutt" target="_blank">
                                                    <img src="{{ asset('images/facebook-icon.png') }}" style="width:25px;height:25px">
                                                </a>
                                            </div>
                                            <div class="col-lg-1">
                                                <a href="https://cpe.engineer.rmutt.ac.th/" target="_blank">
                                                    <img src="{{ asset('images/www-icon.png') }}" style="width:25px;height:25px">
                                                </a>
                                            </div>
                                        </div>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7741.4212556805005!2d100.7219335028924!3d14.035159447469107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d78a4a8713c3f%3A0xf019238243532a0!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lij4Liy4LiK4Lih4LiH4LiE4Lil4LiY4Lix4LiN4Lia4Li44Lij4Li1!5e0!3m2!1sth!2sth!4v1692540328004!5m2!1sth!2sth"
                                            width="500" height="300" style="border:0;margin-top:10px;margin-left:15px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <label class="col-form-label font-weight-bold text-dark">ชื่อเรื่อง</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm text-center bg-white"
                                                required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="col-form-label font-weight-bold text-dark">ข้อความ</label>
                                            <div class="input-group">
                                                <textarea type="text" id="" name="" rows="4" cols="100"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <form action="/upload" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <label class="col-form-label font-weight-bold text-dark">เลือกเอกสารที่ต้องการอัพโหลด</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="document" name="document">
                                                    {{-- <button type="submit" class="btn btn-primary">อัพโหลด</button> --}}
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">ส่ง</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>

<script>
    function openContactModal() {
        $('#contactModal').modal('show');
    }
</script>
