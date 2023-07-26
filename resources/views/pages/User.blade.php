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


            
            <div class="tabe"  >
                <div class="card" onclick="newComp();" >
                    <h2>لتسجيل على المسابقة :</h2>
                    <h3>رمضان</h3>
                    <p>
                        تاريخ انتهاء التسجيل : 15/8/2023
                    </p>
                    <p>
                        تاريخ المسابقة : 31/8/2023
                    </p>
                    <span>جديد</span>
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
            
            <div class="overlay" >

            </div>

            <div class="ContestRegistration contenar">

                <div class=" userDetailsTitle ContestRegistrationDetails " >
                    <h3 style="font-weight: bold; color: #005937;"> رمضان</h3>
                    <div class="closeCard" onclick="closeCard();">
                    <ion-icon name="close-outline"  ></ion-icon>
                    </div>
                </div> 
                <div class="userDetails  " >
                    
                    <form action="" class="flexDetailsInput">

                        <!-- 1 -->

                        <div class="flexDetails  activeQ">
                            <label for="">هل سبرتي بالاوقاف؟</label>
                            <div class="radio" >
                                <div class="radioDetails" >
                                    <span>نعم</span>
                                    <input data-goto="2" type="radio" name="quest_1" value="y" class="q1-yes">
                                </div>
                                <div class="radioDetails">
                                    <span>لا</span>
                                    <input data-goto="3" type="radio" name="quest_1" value="n" class="q1-no" >
                                </div>
                            </div>   
                        </div>

                        <!-- 2 -->
                        <div class="flexDetails  inactiveQ" id="sounded-q2 " data-goto="3">
                            <label for="">ما هي الاجزاء التي سبرتيها ؟</label>
                            <div class="sounded" id="soundedQ">
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
                                <div>
                                    <p>  هل نجحتي بهم</p>
                                    <div class="soundedYN" >
                                        <div class="radioDetails" >
                                            <span>نعم</span>
                                            <input  type="radio" name="quest_1" value="y" >
                                        </div>
                                        <div class="radioDetails">
                                            <span>لا</span>
                                            <input  type="radio" name="quest_1" value="n"  >
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="addNewSounded" onclick="addSounded();" >
                                    <span  >+</span>
                                </div>
                            </div>
                            
                            
                        </div>

                    <!-- 3 -->
                        <div class="flexDetails  inactiveQ">
                            <label for="">ما هو الفرع الذي سوف تشاركين به بالمسابقة ؟</label>
                            <div class="" >
                                <p>الاجزاء</p>
                                <select class="" >
                                    <option value="1" data-goto="4">ثلاثة اجزاء</option>
                                    <option value="2" data-goto="5"> خمسة اجزاء</option>
                                    <option value="3" data-goto="6"> العشر الاجزاء</option>
                                    <option value="4" data-goto="8">خمسة عشرة جزء  </option>
                                    <option value="5" data-goto="7">العشرون جزء </option>
                                    <option value="6" data-goto="9">القرآن كامل</option>
                                </select>
                            </div>
                            
                        </div>
                        
                        <!-- 4 -->
                        <div class="flexDetails  inactiveQ">
                            <label for="">ما هي الاجزاء الذي سوف تشاركين بها بالمسابقة ؟</label>
                            <div class="" >
                                <p> ادخل الاجزاء </p>
                            <input type="text" data-goto="10">
                            </div>
                            
                        </div>

                        <!-- 5 -->
                        <div class="flexDetails  inactiveQ">
                            <label for="">ما هي الاجزاء الذي سوف تشاركين بها بالمسابقة ؟</label>
                            <div class="" >
                                <p>الاجزاء</p>
                                <select class="" >
                                    <option value="1" data-goto="10"> خمسة اولى</option>
                                    <option value="2" data-goto="10">  خمسة ثانية</option>
                                    <option value="3" data-goto="10">  خمسة ثالثة</option>
                                    <option value="4" data-goto="10">    خمسة رابعة</option>
                                    <option value="5" data-goto="10">  خمسة خامسة</option>
                                    <option value="6" data-goto="10"> خمسة آخيرة</option>
                                </select>
                            </div>
                            
                        </div>
                        <!-- 6 -->
                        <div class="flexDetails  inactiveQ">
                            <label for="">ما هي الاجزاء الذي سوف تشاركين بها بالمسابقة ؟</label>
                            <div class="" >
                                <p>الاجزاء</p>
                                <select class="" >
                                    <option value="1" data-goto="10"> عشرة اولى</op>
                                    <option value="2" data-goto="10">  عشرة ثانية</option>
                                    <option value="3" data-goto="10">  عشرة ثالثة</option>
                                </select>
                            </div>
                            
                        </div>
                        <!-- 7 -->
                        <div class="flexDetails  inactiveQ">
                            <label for="">ما هي الاجزاء الذي سوف تشاركين بها بالمسابقة ؟</label>
                            <div class="" >
                                <p>الاجزاء</p>
                                <select class="" >
                                    <option value="1" data-goto="10"> عشرون الاولى</option>
                                    <option value="2" data-goto="10">  عشرون الثانية</option>
                                </select>
                            </div>
                            
                        </div>
                        <!-- 8 -->
                        <div class="flexDetails  inactiveQ">
                            <label for="">ما هي الاجزاء الذي سوف تشاركين بها بالمسابقة ؟</label>
                            <div class="" >
                                <p>الاجزاء</p>
                                <select class="" >
                                    <option value="1" data-goto="10"> خمسة عشر الاولى</option>
                                    <option value="2" data-goto="10">  خمسة عشر الثانية</option>
                                </select>
                            </div>
                            
                        </div>
                        <!-- 9 -->
                        <div class="flexDetails  inactiveQ" >
                            <label for="">ما هي الاجزاء الذي سوف تشاركين بها بالمسابقة ؟</label>
                            <div class="" >
                                <p>الاجزاء</p>
                                <select class="" >
                                    <option value="1" data-goto="10"> مفردات الخمسة الاولى </option>
                                    <option value="2" data-goto="10">  مفردات الخمسة الثانية</option>
                                    <option value="3" data-goto="10">  مفردات الخمسة الثالثة</option>
                                    <option value="4" data-goto="10">   مفردات الخمسة الرابعة</option>
                                    <option value="5" data-goto="10"> مفردات الخمسة الخامسة</option>
                                    <option value="6" data-goto="10">  مفردات الخمسة الآخيرة</option>
                                </select>
                            </div>
                        </div>
                        <!-- 10 -->
                        <div class="flexDetails  inactiveQ" >
                            <div>
                                <p>في اي فترة ستشاركين</p>
                                <div class="radio" >
                                    <div class="radioDetails" >
                                        <span>الصباحية</span>
                                        <input data-goto="11" type="radio" name="quest_" value="y" class="">
                                    </div>
                                    <div class="radioDetails">
                                        <span>المسائية</span>
                                        <input data-goto="11" type="radio" name="quest_" value="n" class="" >
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- 11 -->
                        <div class="flexDetails  inactiveQ">
                            <div>
                                <p> تم الانتهاء من التسجيل بنجاح</p>
                            </div>
                        </div>

                        
                    </form>
                    <button type="button" id="next_question" onclick="nextQ()" >حفظ</button>
                </div>
            </div>
        </div>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{asset('admin/JS/user.js')}}" ></script>

</body>
</html>