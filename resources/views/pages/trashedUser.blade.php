<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
        <title>الأرشيف</title>
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
                        <form action="{{url('search/trashedUsers')}}" method="get" role="search">
                            <label for="">
                                <input name="search" type="text" placeholder="ابحث هنا">
                                <ion-icon name="search-outline"></ion-icon>
                            </label>
                        </form>
                    </div>
                    <!-- userImag -->
                    
                    {{Auth::user()->name}}
                    
                </div>
                <div class="tabe" >
                    <a href="{{route('users.index')}}" class="userTabe" >الحسابات</a>
                    <a href="{{route('trashedUsers')}}" class="archiveTabe" >الأرشيف</a>
                </div>
                <div class="details usersTable" >
                    <div class="usersDetails">
                        <div class="tableHeader">
                            <h2 style="font-weight: bold;" >الحسابات</h2>
                            <button  class="btn " >
                                <a href="{{route('restoreAllUsers')}}" style="color: white; text-decoration: none">
                                    استرجاع الكل
                                </a>
                            </button>
                        </div>
                        <table class="userTable"  >
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
                                    <tr class="hoverEvent"  >
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->masjed}}</td>
                                        <td>
                                            @if($user->superviser)
                                                {{$user->superviser}}
                                            @else ------------------
                                            @endif
                                        </td>
                                        <td class="tableIcon">
                                            <a href="{{route('restoreUser' , $user->id)}}" style="color: black">
                                                <ion-icon name="arrow-undo-circle-outline" class="restoreIcon"></ion-icon>
                                            </a>
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
            </div>
        </div>
        
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="{{asset('admin/JS/JS.js')}}" ></script>
</body>
</html>