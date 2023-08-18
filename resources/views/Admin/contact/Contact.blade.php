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
        .centered-text {
                text-align: center;
            }
        .vertical-hr {
                border: none;
                border-left: 3px solid #000;
                height: 500px; /* ความสูงที่คุณต้องการ */
                margin-top: 1rem; /* ระยะห่างด้านบน */
                
            }
        .custom-icon {
                font-size: 2rem;
                position: absolute;
                left:350px;
                top:325px;
            }
        .custom-tel {
                font-size: 2rem;
                position: absolute;
                left:350px;
                top:475px;
            }
        .custom-face {
                font-size: 2rem;
                position: absolute;
                left:350px;
                top:625px;
            }
        .custom-school {
                font-size: 2rem;
                position: absolute;
                left:350px;
                top:725px;
            }
        .custom-map { 
                position: absolute;
                left:1050px;
                top:275px;
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
    <div class="container">
        <div class="centered-text">
            <h1>ช่องทางการติดต่อ</h1>
        </div>
        <div class="d-flex justify-content-center">
            <hr class="vertical-hr">
        </div>
        <div style="position: absolute;left:400px;top:325px;" >
            <h3> 39 หมู่ที่ 1 ถนนรังสิต-นครนายก ตำบลคลองหก </h3>
            <h3> อำเภอคลองหลวง </h3>
            <h3> จังหวัดปทุมธานี 12110</h3>
            <br>
            <h3>ช่วงเวลาติดต่อ  จ-ศ 08.30 - 16.30 น. </h3>
            <h3>โทร. 02 549  3460</h3>
        </div>
        <iconify-icon icon="basil:location-solid" class="custom-icon" ></iconify-icon> 
        <iconify-icon icon="foundation:telephone"class="custom-tel"></iconify-icon>  
        <iconify-icon icon="logos:facebook" class="custom-face"></iconify-icon>
        <iconify-icon icon="emojione:school"class="custom-school"></iconify-icon>
        <div class="custom-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3870.6850321332804!2d100.727662!3d14.036675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d78a4a8713c3f%3A0xf019238243532a0!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lij4Liy4LiK4Lih4LiH4LiE4Lil4LiY4Lix4LiN4Lia4Li44Lij4Li1!5e0!3m2!1sth!2sth!4v1692362016210!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    </div>
    
    
</body>
</html>
