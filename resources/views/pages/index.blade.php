    <!DOCTYPE html>
    <html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
        <title>الحسابات</title>
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
                        <form action="{{url('search/users')}}" method="get" role="search">
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
                <div class="tabe" >
                    <a href="{{route('users.index')}}" class="userTabe" >الحسابات</a>
                    <a href="{{route('trashedUsers')}}" class="archiveTabe" >الأرشيف</a>
                </div>

                <div class="details usersTable" >

                    <div class="usersDetails">
                    

                        <div class="tableHeader">
                            <h2 style="font-weight: bold;" >الحسابات</h2>
                            <button href="" class="btn " >إضافة حساب</button>
                        </div>


                        <table class="userTable">
                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>المسجد</th>
                                    <th>المشرفة</th>
                                    <th class="rowWidth" ></th>
                                </tr>
                            </thead>
                            <tbody class="parantTr" >
                                @foreach ($users as $user)
                                    <tr class="hoverEvent"  onclick="redirect('{{$user->id}}');">
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->masjed}}</td>
                                        <td>
                                            @if($user->superviser)
                                                {{$user->superviser}}
                                            @else ------------------
                                            @endif
                                        </td>
                                        <td class="tableIcon">
                                            @if ($user->status == '0')
                                                <form action="{{route('acceptUser', $user->id)}}" style="display: inline" method="post">
                                                    @csrf
                                                    <button style="background-color: transparent !important" type="submit">
                                                        <img class="check" height="25" width="25" src="https://img.icons8.com/emoji/48/null/check-mark-emoji.png" />
                                                    </button>
                                                </form>
                                                <form action="{{route('users.destroy', $user->id)}}" style="display: inline" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button style="background-color: transparent !important" type="submit" >
                                                        <img class="delete" height="25" width="25" src="https://img.icons8.com/color/48/null/delete-sign--v1.png"/>    
                                                    </button>
                                                </form>
                                                
                                            @elseif ($user->id != Auth::user()->id)
                                            <form action="{{route('users.destroy', $user->id)}}" style="display: inline" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" style="color: white; background-color: #eb455f !important; text-decoration: none; padding: 5px 20px; border-radius: 2px">
                                                    حذف
                                                </button>
                                            </form> 
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3" > SHOWING 21-30 OF 100</th>
                                    <th class="hoverEvent arrowsIcon " >
                                        <ion-icon name="chevron-back-outline"></ion-icon>
                                        <ion-icon name="chevron-forward-outline"></ion-icon>
                                    </th>
                                </tr>
                            </tbody>
                        </table>


                    </div>

                </div>






                <!-- archive -->

            <!-- overlay -->


                        <div class="overlay" >

                        </div>


                        <!-- addUserCard  -->
        
                        <div class="addUserCard contenar" >
                        <div class=" userDetailsTitle " >
                            <h3 style="font-weight: bold; color: #005937;">تفاصيل المتسابق</h3>
                            <div class="closeCard"onclick="closeCard();">
                                <ion-icon name="close-outline"  ></ion-icon>
                            </div>
                            
                        </div>      
                        <div class="userDetails  " >
                        
                            <form action="{{route('users.store')}}" method="post" class="flexDetailsInput" >
                                @csrf
                                <div class="flexDetails" >
                                    <label for="">الاسم:</label>
                                    <input type="text" id="textUserName" name="name">
                                </div>
                                <div class="flexDetails" >
                                    <label for="">المسجد:</label>
                                    <input type="text" id="textAlmasijed" name="masjed">
                                </div>
                                <div class="flexDetails" >
                                    <label for="">المشرفة:</label>
                                    <input type="text"id="textSupervisor" name="superviser">
                                </div>
                                <div class="flexDetails" >
                                    <label for="">كلمة المرور:</label>
                                    <input type="password" id="numPassword" name="password">
                                </div>
                                <div class="flexDetails" >
                                    <label for="">تأكيد كلمة المرور:</label>
                                    <input type="password" id="textConffer">
                                </div>
                            
                            </div>
                        
                            <div class=" AouqphDetailsTitle " >
                                <h3>سبر الاوقاف</h3>
                                </div>      
                                <div class="AouqphDetails" >
                                    
                                        <div class="flexDetails" id="sounded-q" >
                                            <div class="addUsersounded" id="addUsersoundedQ">
                                                <div class="" >
                                                    <p>الاجزاء</p>
                                                    <select class="" >
                                                        <option vlaue="1"> الخمسة الاخيرة</option>
                                                        <option vlaue="2"> الخمسة الاولى</option>
                                                        <option vlaue="3"> العشرة الاولى</option>
                                                        <option vlaue="4"> العشرة الثانية</option>
                                                        <option vlaue="5"> العشرة الثالثة</option>
                                                        <option vlaue="6"> الخمسة عشر الاولى</option>
                                                        <option vlaue="7"> الخمسة عشر الثانية</option>
                                                        <option vlaue="8"> عشرون الاولى</option>
                                                        <option vlaue="9"> عشرون الثانية</option>
                                                        <option vlaue="10">القرآن كامل</option>
                                                    </select>
                                                </div>
                                                <div class="flexDetails" >
                                                    <label for="">التاريخ</label>
                                                    <input type="date"id="numDate">
                                                </div>
                                                <div class="addNewSounded" onclick="soundedNew();" >
                                                    <span  >+</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="addtd" >
                                            <button id="" >حفظ</button>
                                        </div>
                                    </form>
                            
                                </div>
                        </div>
                    

            </div>



        

        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="{{asset('admin/JS/JS.js')}}" ></script>
    </body>
    </html>