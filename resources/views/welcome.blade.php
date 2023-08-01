<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>เว็บไซต์ศิษย์เก่าวิศวกรรมคอมพิวเตอร์</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <style>
            body {
                margin: auto;
                font-family:'THSarabunNew';
                overflow: auto;
                background: linear-gradient(315deg, rgb(146, 143, 146) 3%, rgb(150, 162, 173) 38%, rgb(149, 167, 165) 68%, rgb(173, 162, 162) 98%);
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

            h1 {
                font-size: 40px;
                color: #fff;
            }
            .waviy {
                position: relative;
                -webkit-box-reflect: below -20px linear-gradient(transparent, rgba(0,0,0,.2));
                font-size: 60px;
            }
            .waviy span {
                position: relative;
                display: inline-block;
                color: #fff;
                text-transform: uppercase;
                animation: waviy 1s infinite;
                animation-delay: calc(.1s * var(--i));
            }
            @keyframes waviy {
                0%,40%,100% {
                    transform: translateY(0)
                }
                20% {
                    transform: translateY(-20px)
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

            .gallery {
                --g: 8px;   /* the gap */
                --s: 400px; /* the size */

                display: grid;
                border-radius: 50%;
            }
            .gallery > img {
                grid-area: 1/1;
                width: 400px;
                aspect-ratio: 1;
                object-fit: cover;
                border-radius: 50%;
                transform: translate(var(--_x,0),var(--_y,0));
                cursor: pointer;
                z-index: 0;
                transition: .3s, z-index 0s .3s;
            }
            .gallery img:hover {
                --_i: 1;
                z-index: 1;
                transition: transform .2s, clip-path .3s .2s, z-index 0s;
            }
            .gallery:hover img {
                transform: translate(0,0);
            }
            .gallery > img:nth-child(1) {
                clip-path: polygon(50% 50%,calc(50%*var(--_i,0)) calc(120%*var(--_i,0)),0 calc(100%*var(--_i,0)),0 0,100% 0,100% calc(100%*var(--_i,0)),calc(100% - 50%*var(--_i,0)) calc(120%*var(--_i,0)));
                --_y: calc(-1*var(--g))
            }
            .gallery > img:nth-child(2) {
                clip-path: polygon(50% 50%,calc(100% - 120%*var(--_i,0)) calc(50%*var(--_i,0)),calc(100% - 100%*var(--_i,0)) 0,100% 0,100% 100%,calc(100% - 100%*var(--_i,0)) 100%,calc(100% - 120%*var(--_i,0)) calc(100% - 50%*var(--_i,0)));
                --_x: var(--g)
            }
            .gallery > img:nth-child(3) {
                clip-path: polygon(50% 50%,calc(100% - 50%*var(--_i,0)) calc(100% - 120%*var(--_i,0)),100% calc(100% - 120%*var(--_i,0)),100% 100%,0 100%,0 calc(100% - 100%*var(--_i,0)),calc(50%*var(--_i,0)) calc(100% - 120%*var(--_i,0)));
                --_y: var(--g)
            }
            .gallery > img:nth-child(4) {
                clip-path: polygon(50% 50%,calc(120%*var(--_i,0)) calc(50%*var(--_i,0)),calc(100%*var(--_i,0)) 0,0 0,0 100%,calc(100%*var(--_i,0)) 100%,calc(120%*var(--_i,0)) calc(100% - 50%*var(--_i,0)));
                --_x: calc(-1*var(--g))
            }

        </style>
    </head>
    <body class="container">
        <div class="col-lg-12 row">
            <div class="col-lg-12 row">
                <div class="col-lg-12 row mt-5">
                    <div class="d-flex align-items-center justify-content-between" style="padding: 0px 15px;">
                        <div class="col-lg-8 align-items-center justify-content-start">
                            <h1 >Rajamangala University of</h1>
                            <h1 style="margin-left:200px">Technology Thanyaburi</h1>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <button class="btn btn-primary noselect" onclick="window.location.href='{{ route('userregister') }}'">ลงทะเบียน</button>
                            <button class="btn btn-warning" onclick="window.location.href='{{ route('homeuser') }}'">หน้าข่าว</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-5"></div>
                <div class="col-lg-12 mt-5"></div>
                <div class="col-lg-8 mt-5">
                    <div class="col-lg-12">
                        <div class="waviy">
                            <span style="--i:1">ยิ</span>
                            <span style="--i:2">น</span>
                            <span style="--i:3">ดี</span>
                            <span style="--i:4">ต้</span>
                            <span style="--i:5">อ</span>
                            <span style="--i:6">น</span>
                            <span style="--i:7">รั</span>
                            <span style="--i:8">บ</span>
                        </div>
                        <div class="mt-5"></div>
                        <h1>ศิษย์เก่าทุกท่านกลับเข้าสู่รั้ว</h1>
                        <h1>ราชมงคลธัญบุรี</h1>
                        <h1>คณะวิศวกรรมคอมพิวเตอร์</h1>
                        <button class="btn btn-primary mt-2" onclick="window.location.href='{{ route('userlogin') }}'">เข้าสู่ระบบ</button>
                    </div>
                </div>
                <div class="col-lg-4 gallery">
                    <img src="{{ asset('images/1.jpg') }}">
                    <img src="{{ asset('images/2.jpg') }}">
                    <img src="{{ asset('images/student.jpg') }}">
                    <img src="{{ asset('images/teamwork.png') }}">
                </div>
            </div>
            {{-- <div>
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
             </div> --}}
        </div>
    </body>
</html>
