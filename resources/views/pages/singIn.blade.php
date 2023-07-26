<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/sing.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@700&family=Gulzar&family=Montserrat:wght@100;200;300;500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <title>انشاء حساب</title>
</head>
<body>

    <div class="container" >
        <div class="singUp">
            <div class="partIcon">
                <img src="{{asset('admin/image/quranLoge.jpg')}}" alt="" height="300" width="300">
            </div>
            <div class="partDetails">
                {{-- @if(Session::has('message'))
                <p class="alert alert-info" style="background-color: #005937; color: white; padding:10px 20px; border-radius: 10px">{{ Session::get('message') }}</p>
                @endif --}}
                <h1 class="logo" >مسابقة القرآن</h1>
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <label for="">الاسم:</label>
                    <input type="text" name="name">
                    <label for="">كلمة المرور:</label>
                    <input type="password" name="password">
                    <button type="submit">تسجيل الدخول</button>
                </form>
                
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>