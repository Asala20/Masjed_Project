    <!DOCTYPE html>
    <html dir="rtl" lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Gulzar&family=Montserrat:wght@100;200;300;500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

        <title>المسابقة</title>
    </head>
    <body>

        <div class="container" >
            <div class="navigation" >
                <ul>
                    <li>
                        <a href="{{url('users')}}"  class="loge">
                            <span class="icon" ><img src="{{asset('admin/image/quranLoge.jpg')}}"alt="" height="50" width="50"></span>
                            <span class="title logo" >مسابقة القرآن</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('users')}}">
                            <span class="icon" ><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title" >إدارة الحسابات</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('competitions')}}">
                            <span class="icon" ><ion-icon name="library-outline"></ion-icon></span>
                            <span class="title" >إدارة المسابقات</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="help.html">
                            <span class="icon" ><ion-icon name="help-outline"></ion-icon></span>
                            <span class="title" >المساعدة</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{route('loginForm')}}">
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
                        <form action="{{url('search/thoseUsers/'.$competition->id)}}" method="get" role="search">
                            <label for="">
                                <input name="search" type="text" placeholder="ابحث هنا">
                                <ion-icon name="search-outline"></ion-icon>
                            </label>
                        </form>
                    </div>
                    <!-- userImag -->
                    
                    {{Auth::user()->name}}
                    
                </div>

                <!-- table -->

                <div class="details" >
                    <div class="usersDetails">
                        <div class="tableHeader">
                            <h2>مسابقة/ <span>{{$competition->name}}</span>- <span>{{$competition->start_date}}</span></h2>
                            
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>اسم المستخدم</th>
                                    <th>الأجزاء</th>
                                    <th>الفرع</th>
                                    <th>العلامة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )
                                    <tr class="hoverEvent" onclick="addMark(event)" >
                                        <td>{{$user->name}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                
                                <tr>
                                    <th colspan="2" > SHOWING 21-30 OF 100</th>
                                    <th class="hoverEvent arrowsIcon" >
                                        <img height="25" width="25" src="https://img.icons8.com/sf-black/64/null/back.png"/>
                                        <img height="25" width="25" src="https://img.icons8.com/sf-black/64/null/forward.png"/>
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            <!-- overlay -->


                        <div class="overlay" >

                        </div>


                        <!-- addUserCard  -->
        
        
                        <div class="addMarkCard contenar " >
                        <div class=" userDetailsTitle " >
                            <h3>Add Mark</h3>
                            <div class="closeCard"onclick="offaddMark();">
                                <ion-icon name="close-outline"  ></ion-icon>
                            </div>
                            
                        </div>      
                        <div class="userDetails  " >
                        
                            <form action="" class="flexDetailsInput">
                                <div class="flexDetails" >
                                    <label for="">Mark :</label>
                                    <input type="text">
                                </div>
                            
                            </form>
                            </div>
                                
                            <div class="AouqphDetails" >
                                <form action="" class="flexDetailsInput">
                                    <div class="saveIcon" >
                                        <ion-icon name="save-outline"></ion-icon>
                                    </div>
                                </form>
                        
                            </div>
                        </div>

            </div>



        

        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="{{asset('admin/JS/JS.js')}}" ></script>
        <script>
            function addMark(e) {
                console.log(e.target);
                onaddMark();
            };
                
            function onaddMark() {
                    document.querySelector(".overlay").style.display = "block";
                    document.querySelector(".addMarkCard").style.display = "block";
            };
                
            function offaddMark() {
                    document.querySelector(".overlay").style.display = "none";
                    document.querySelector(".addMarkCard").style.display = "none";
            };
        </script>
    </body>
    </html>