<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Restaurant Admin</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{asset('panel/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('panel/assets/plugins/perfectscroll/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('panel/assets/plugins/pace/pace.css')}}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{asset('panel/assets/css/main.min.css')}}" rel="stylesheet">
    <link href="{{asset('panel/assets/css/darktheme.css')}}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('panel/assets/images/neptune.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('panel/assets/images/neptune.png')}}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
    <div class="app-auth-background">

    </div>
    <div class="app-auth-container">
        <div class="logo mb-3">
            <a href="{{route('login')}}">Lara Restaurant</a>
        </div>
        <form action="{{route('login.post')}}" method="post">
            @csrf
            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">E-Posta</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail" placeholder="admin@example.com">

                <label for="signInPassword" class="form-label">Şifre</label>
                <input type="password" name="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
            </div>
            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Giriş yap</button>
                <a href="{{route('forget.password.get')}}" class="auth-forgot-password float-end">Şifremi unuttum?</a>
            </div>
        </form>
        <div class="divider"></div>
    </div>
</div>

<!-- Javascripts -->
<script src="{{asset('panel/assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('panel/assets/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('panel/assets/js/main.min.js')}}"></script>
<script src="{{asset('panel/assets/js/custom.js')}}"></script>
@include('sweetalert::alert')
</body>
</html>
