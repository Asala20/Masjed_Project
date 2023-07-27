  <!DOCTYPE html>
  <html dir="rtl" lang="ar">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/userDetails.css')}}">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Gulzar&family=Montserrat:wght@100;200;300;500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

      <title>تفاصيل المستخدم</title>
  </head>
  <body>

        <div class="container" >
          <div class="navigation" >
            <ul>
              <li>
                <a href="#"  class="loge">
                    <span class="icon" ><img src="{{asset('admin/image/quranLoge.jpg')}}"alt="" height="50" width="50"></span>
                    <span class="title logo" >مسابقة القرآن</span>
                </a>
            </li>
                <li>
                    <a href="{{route('users.index')}}">
                        <span class="icon" ><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title" >إدارة الحسابات</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('competitions.index')}}">
                        <span class="icon" ><ion-icon name="library-outline"></ion-icon></span>
                        <span class="title" >إدارة المسابقات</span>
                    </a>
                </li>
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
                    <form action="{{url('search/thoseCompetitions/'.$user->id)}}" method="get" role="search">
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

                <!-- userDetails -->


      
              <div class="moreDetails">
                <div class="userDetailsSection" id="template" >
                      <form action="" method="post">
                        @csrf
                        {{-- @method() --}}
                        <p id="UserName" class="UserName">الاسم: </p>
                        <label for="UserName" class="UserNameLable">{{$user->name}}</label>
                    
                    
                        <p id="Almasijed" class="AlmasijedName">المسجد: </p>
                        <label for="Almasijed" class="AlmasijedNameLable">{{$user->masjed}}</label>
                    
                        <p id="Password" class="Password" >كلمة المرور: </p>
                        <label for="Password" class="PasswordLable" ></label>
                  
                        
                        <p id="supervisor" class="supervisor" >المشرفة: </p>
                        <label for="supervisor" class="supervisorLabele" >{{$user->superviser}}</label>
        
                        <ion-icon name="create-outline"  onclick="editUserDetails()"></ion-icon>
                        <ion-icon name="save-outline" class="saveMoreDetails"></ion-icon>
                      </form>                
                </div>
              </div>

              
                <!-- probe -->

            @foreach ($aoqafs as $aoqaf)
              <div class="probe" >
                <div class="probeDetails" >
                  <form action="">
                    <p id="PartName" class="PartName">الأجزاء :</p>
                    <label for="PartName" class="UserPartLable">{{$aoqaf->parts}}</label>
                    <p id="Date" class="Date" >التاريخ :</p>
                    <label for="Date" class="DateLable" >{{$aoqaf->date}}</label>
                    <ion-icon name="create-outline" class="icon" onclick="editProbe()">{{$aoqaf->date}}</ion-icon>
                    <ion-icon name="save-outline" class="saveProbe" ></ion-icon>  
                  </form>
                </div>
              </div>
            @endforeach



              <div class="details" >
                  <div class="usersDetails">
                      <div class="tableHeader">
                          <h2>المسابقات</h2>
                          
                      </div>
                      <table>
                          <thead>
                              <tr>
                                <th>اسم المسابقة</th>
                                <th>الأجزاء</th>
                                <th>العلامة</th>
                                <th>الفرع</th>
                                <th>التاريخ</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($competitions as $competition)
                                <tr class="hoverEvent" onclick="addMark();" >
                                  <td>{{$competition->name}}</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>{{$competition->end_date}}</td>
                                </tr>
                              @endforeach
                              <tr>
                                <th colspan="3" > SHOWING 21-30 OF 100</th>
                                <th class="hoverEvent arrowsIcon" >
                                  <img height="25" width="25" src="https://img.icons8.com/sf-black/64/null/back.png"/>
                                  <img height="25" width="25" src="https://img.icons8.com/sf-black/64/null/forward.png"/>
                                </th>
                              </tr>
                          </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="asset/JS.js" ></script>
      <script>
        function addMark() {
    
            document.querySelector(".hoverEvent").addEventListener('click', function () {
            onaddMark();
            
            });
        };
            
        function onaddMark() {
                document.querySelector(".overlay").style.display = "block";
                document.querySelector(".addMarkCard").style.display = "block";
        };
            
        function offaddMark() {
                document.querySelector(".overlay").style.display = "none";
                document.querySelector(".addMarkCard").style.display = "none";
        };

        
        function editUserDetails() {
    
        
        
        const Item1 = document.querySelector(".supervisorLabele");
        const newItem = document.createElement('input');
        Item1.parentNode.replaceChild(newItem, Item1);

        const Item2 = document.querySelector(".UserNameLable");
        const newItem2 = document.createElement('input');
        Item2.parentNode.replaceChild(newItem2, Item2);

        const Item3 = document.querySelector(".AlmasijedNameLable");
        const newItem3 = document.createElement('input');
      
        Item3.parentNode.replaceChild(newItem3, Item3);

        const Item4 = document.querySelector(".PasswordLable");
        const newItem4 = document.createElement('input');
        Item4.parentNode.replaceChild(newItem4, Item4);

        onEditMoreDetails();
      
      };


      function editProbe() {
        const Item5 = document.querySelector(".UserPartLable");
        const newItem5 = document.createElement('input');
        Item5.parentNode.replaceChild(newItem5, Item5);

        const Item7 = document.querySelector(".DateLable");
        const newItem7 = document.createElement('input');
        newItem7.setAttribute("type", "date");
        Item7.parentNode.replaceChild(newItem7, Item7);

        onEditProbe();
      }




      function offEditProbe() {
        document.querySelector(".saveProbe").style.display= "none";
        document.querySelector(".editIconprobe").style.display= "block";
        
      }

      function onEditProbe() {
        document.querySelector(".saveProbe").style.display= "block";
        document.querySelector(".editIconprobe").style.display= "none";
        
    }
    
    function offEditMoreDetails() {
        document.querySelector(".saveMoreDetails").style.display= "none";
        document.querySelector(".editIconMoreDetails").style.display= "block";
        
      }

      function onEditMoreDetails() {
        document.querySelector(".saveMoreDetails").style.display= "block";
        document.querySelector(".editIconMoreDetails").style.display= "none";
    }
    </script>
  </body>
  </html>