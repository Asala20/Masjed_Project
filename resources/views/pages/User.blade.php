<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <title>حسابي</title>
    <link rel="icon" type="image/png" href="{{asset('admin/image/quranLoge.png')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Gulzar&family=Montserrat:wght@100;200;300;500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    <div class="container" >
        <div class="navigation" >
            <ul>
                <li>
                    <a href="{{url('/profile')}}"  class="loge">
                        <span class="icon" ><img src="{{asset('admin/image/quranLoge.jpg')}}"alt="" height="50" width="50"></span>
                        <span class="title logo" >مسابقة القرآن</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/profile')}}">
                        <span class="icon" ><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title" >حسابي</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('help')}}">
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


            
            <div class="tabe" >
                <div class="card" >
                    <h3>Ramadan</h3>
                    <p>
                        Expiry date : 15/8/2023
                    </p>
                    <p>
                        Contest date : 31/8/2023
                    </p>
                    <span>New</span>
                </div>
            </div>

            <div class="details" >
                <div class="usersDetails">
                    <div class="tableHeader">
                        <h2>مسابقاتي</h2>
                        
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>اسم المسابقة</th>
                                <th>الاجزاء</th>
                                <th>الفرع</th>
                                <th class="flitter" >العلامة<ion-icon name="swap-vertical-outline"></ion-icon></th>
                                <th >التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $competitions as $competition)
                            <tr class="hoverEvent" onclick="addMark();" >
                                <td>{{$competition->name}}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        
                        <tr>
                            <th colspan="3" > SHOWING 21-30 OF 100</th>
                            <th class="hoverEvent arrowsIcon" >
                            <img height="25" width="25" src="https://img.icons8.com/sf-black/64/null/back.png"/>
                            <img height="25" width="25" src="https://img.icons8.com/sf-black/64/null/forward.png"/>
                            </th>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>
            
        </div>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{asset('admin/JS/JS.js')}}" ></script>

</body>
</html>