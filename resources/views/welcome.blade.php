<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <style>
            body {
                margin: auto;
                font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                overflow: auto;
                background: linear-gradient(315deg, rgba(101,0,94,1) 3%, rgba(60,132,206,1) 38%, rgba(48,238,226,1) 68%, rgba(255,25,25,1) 98%);
                animation: gradient 15s ease infinite;
                background-size: 400% 400%;
                background-attachment: fixed;
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 0%;
                }
                50% {
                    background-position: 100% 100%;
                }
                100% {
                    background-position: 0% 0%;
                }
            }

            .wave {
                background: rgb(255 255 255 / 25%);
                border-radius: 1000% 1000% 0 0;
                position: fixed;
                width: 200%;
                height: 12em;
                animation: wave 10s -3s linear infinite;
                transform: translate3d(0, 0, 0);
                opacity: 0.8;
                bottom: 0;
                left: 0;
                z-index: -1;
            }

            .wave:nth-of-type(2) {
                bottom: -1.25em;
                animation: wave 18s linear reverse infinite;
                opacity: 0.8;
            }

            .wave:nth-of-type(3) {
                bottom: -2.5em;
                animation: wave 20s -1s reverse infinite;
                opacity: 0.9;
            }

            @keyframes wave {
                2% {
                    transform: translateX(1);
                }

                25% {
                    transform: translateX(-25%);
                }

                50% {
                    transform: translateX(-50%);
                }

                75% {
                    transform: translateX(-25%);
                }

                100% {
                    transform: translateX(1);
                }
            }

            h2:before{
                content: attr(data-text);
                background: linear-gradient(#f70000, #f89200, #f8f501, #038f00,#0168f8, #a200f7);
                -webkit-background-clip: text;
                color: transparent;
                background-size: 100% 90%;
                line-height: 0.9;
                clip-path: ellipse(120px 120px at -2.54% -9.25%);
                animation: swing 5s infinite;
                animation-direction: alternate;
            }

            @keyframes swing{
                0%{
                    -webkit-clip-path: ellipse(120px 120px at -2.54% -9.25%)
                    clip-path: ellipse(120px 120px at -2.54% -9.25%)
                }
                50%{
                    -webkit-clip-path: ellipse(120px 120px at 49.66% 64.36%);
                    clip-path: ellipse(120px 120px at 49.66% 64.36%);

                }
                100%{
                    -webkit-clip-path: ellipse(120px 120px at 102.62% -1.61%;);
                    clip-path: ellipse(120px 120px at 102.62% -1.61%);
                }
            }

            .noselect {
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                -webkit-tap-highlight-color: transparent;
            }

            button {
                cursor: pointer;
                background: #ffc421;
                border: 2px solid black;
                box-shadow: 0px 0px 0px rgba(0,0,0,0.4);
                transition: 500ms;
            }

            button:after {
                content: '';
                position: absolute;
                transform: translateX(-55px) translateY(-40px);
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: transparent;
                box-shadow: 0px 0px 50px transparent;
                transition: 500ms;
            }

            button:hover {
                transform: translateY(-5px);
                box-shadow: 0px 10px 10px rgba(0,0,0,0.4);
            }

            button:hover:after {
                background: white;
                box-shadow: 0px 0px 20px #1170ff, 0px 0px 30px #1170ff, inset 0px 0px 10px #1170ff;
                animation: spin 1s infinite linear;
            }

            @keyframes spin{
                25%{transform: translateX(-25px) translateY(-35px);
                        width: 15px;
                        height: 15px;}
                50% {transform: translateX(-55px) translateY(-30px);
                        width: 5px;
                        height: 5px;}
                75% {transform: translateX(-85px) translateY(-35px);
                        width: 15px;
                        height: 15px;}
            }

            button:focus {
                outline: none;
            }
        </style>
    </head>
    <body class="container">
        <div class="col-lg-12 row">
            <div class="col-lg-12 row">
                <div class="col-lg-12 row mt-5">
                    <div class="d-flex align-items-center justify-content-between" style="padding: 0px 15px;">
                        <div class="col-lg-8 align-items-center justify-content-start">
                            <h2 data-text= "Rajamangala University of" style="color:#FFD53F"></h2>
                            <h2 data-text= "Technology Thanyaburi" style="margin-left:200px;color:#FFD53F"></h2>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button class="btn btn-primary noselect" onclick="window.location.href='{{ route('register') }}'">ลงทะเบียน</button>
                            <button class="btn btn-warning" onclick="window.location.href='{{ route('pressrelease') }}'">หน้าข่าว</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5"></div>
                <div class="col-lg-12 mt-5"></div>
                <div class="col-lg-8 row mt-5">
                    <div class="col-lg-8">
                        <h1 style="color:#FFD53F">ยินดีต้อนรับ</h1>
                        <h1 style="color:#FFD53F">ศิษย์เก่าทุกท่านกลับเข้าสู่รั้ว</h1>
                        <h1 style="color:#FFD53F">ราชมงคลธัญบุรี</h1>
                        <h1 style="color:#FFD53F">คณะวิศวกรรมคอมพิวเตอร์</h1>
                        <button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('login') }}'">เข้าสู่ระบบ ></button>
                    </div>
                </div>
                <div class="col-lg-4 row">
                    <div class="d-flex align-items-center flex-column">
                        <img src="{{ asset('images/1.jpg') }}" style="width: 300px; height: 300px;margin-right: 180px">
                    </div>
                    <div class="d-flex align-items-center flex-column">
                        <img src="{{ asset('images/2.jpg') }}" style="width: 300px; height: 300px;margin-left: 180px">
                    </div>
                </div>
            </div>
            <div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
             </div>
        </div>
    </body>
</html>
