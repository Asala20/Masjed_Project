    <!DOCTYPE html>
    <html dir="rtl" lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
        <title>إدارة المسابقات</title>
        <link rel="icon" type="image/png" href="{{asset('admin/image/quranLoge.jpg')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Gulzar&family=Montserrat:wght@100;200;300;500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
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
                        <div class="tableHeader">
                            <h2 style="font-weight: bold;">المسابقات</h2>
                            <button href="" class="btn " id="btnCompetition">إضافة مسابقة</button>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>اسم المسابقة</th>
                                    <th>الناجحون</th>
                                    <th>لم تكمل</th>
                                    <th>التاريخ</th>
                                    <th class="rowWidth" ></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($competitions as $competition)
                                <tr class="hoverEvent" onclick="redirectComp('{{$competition->id}}');" >
                                    <td>{{$competition->name}}</td>
                                    <td>{{$competition->success}}</td>
                                    <td>{{$competition->repeaters}}</td>
                                    <td>{{$competition->start_date}}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                                
                                <tr>
                                    <th colspan="4" > SHOWING 21-30 OF 100</th>
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
        
        
                        <div class=" contenar addComptionCard"  >
                        <div class=" userDetailsTitle " >
                            <h3 style="font-weight: bold; color: #005937;">مسابقة جديدة</h3>
                            <div class="closeCard"onclick="closeCard();">
                                <ion-icon name="close-outline"  ></ion-icon>
                            </div>
                            
                        </div>      
                        <div class="userDetails  " >
                        
                            <form action="{{route('competitions.store')}}"  method="post" class="flexDetailsInput">
                                @csrf
                                <div class="flexDetails" >
                                    <label for="">اسم المسابقة</label>
                                    <input name="name" type="text" >
                                </div>
                                <div class="flexDetails" >
                                    <label for="">تاريخ انتهاء التسجيل</label>
                                    <input name="end_date" type="date">
                                </div>
                                <div class="flexDetails" >
                                    <label for="">تاريخ المسابقة</label>
                                    <input  name="start_date" type="date">
                                </div>
                                <div class="AouqphDetails" >
                                
                                    <div class="saveIconComption " >
                                        <button type="submit" class="saveIconComption ">حفظ</button>
                                    </div>
                            
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
            function addCompetition() {
        
        document.querySelector("#btnCompetition").addEventListener('click', function () {
        onCompetition();
    });
    };
    
        function onCompetition() {
        document.querySelector(".overlay").style.display = "block";
        document.querySelector(".addComptionCard").style.display = "block";
        
        }
    
        function offCompetition() {
        document.querySelector(".overlay").style.display = "none";
        document.querySelector(".addComptionCard").style.display = "none";
        
        }
        addCompetition();
        function closeCard() {
        
        document.querySelector(".closeCard").addEventListener('click', function () {
        
        offCompetition();
    });
    }
        </script>
    </body>
    </html>