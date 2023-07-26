    <!DOCTYPE html>
    <html dir="rtl" lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
        <title>Help</title>

        <style>
            .details .usersDetails
            {
                justify-content: center !important;
            }
        </style>
    </head>
    <body>

        <div class="container" >
            <div class="navigation" >
                <ul>
                    <li>
                        <a href="{{url('/help')}}"  class="loge">
                            <span class="icon" ><img src="{{asset('admin/image/quranLoge.jpg')}}"alt="" height="50" width="50"></span>
                            <span class="title logo" >مسابقة القرآن</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/help')}}">
                            <span class="icon" ><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title" >حسابي</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/help')}}">
                            <span class="icon" ><ion-icon name="help-outline"></ion-icon></span>
                            <span class="title" >مساعدة</span>  
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logout')}}">
                            <span class="icon" ><ion-icon name="log-out-outline"></ion-icon></span>
                            <span class="title" >تسجيل الخروج</span>
                        </a>
                    </li>
                </ul>
            </div>


            <!-- main -->

            <div class="main" >
                <div class="topbar">
                    <div class="toggle" >
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                    <!-- search -->
                    <div class="search">
                        <label for="">
                            <input type="text" placeholder="ابحث هنا" >
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                    <!-- userImag -->
                    
                        {{Auth::user()->name}}
                    
                </div>

                <!-- table -->

                <div class="details" >
                    <div class="usersDetails">
                        <img src="{{asset('admin/image/help1.jpg')}}" alt="">
                        <img src="{{asset('admin/image/help2.jpg')}}" alt="">
                        <img src="{{asset('admin/image/help3.jpg')}}" alt="">
                        <img src="{{asset('admin/image/help4.jpg')}}" alt="">

                    </div>

                </div>

            

            </div>



        

        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="{{asset('admin/JS/JS.js')}}" ></script>
    </body>
    </html>