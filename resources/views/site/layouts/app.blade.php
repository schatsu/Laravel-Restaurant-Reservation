<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Laravel">
    <meta name="theme-color" content="#900020"/>
    @yield('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{isset($settings) ? asset('storage/'.$settings->logo) : ''}}" type="image/x-icon">
    <title>Lara restaurant | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('site/assets/web/assets/mobirise-icons2/mobirise2.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/bootstrap/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/bootstrap/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/animatecss/animate.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/dropdown/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/socicon/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/theme/css/style.css')}}">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i&display=swap"></noscript>
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
    <link rel="preload" as="style" href="{{asset('site/assets/mobirise/css/mbr-additional.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/mobirise/css/mbr-additional.css')}}" type="text/css">
    @yield('style')
</head>
<body>

@include('site.layouts.header')
@yield('content')


@include('site.layouts.footer')
@include('site.layouts.script')
@yield('js')
<div id="scrollToTop" class="scrollToTop mbr-arrow-up">
    <a style="text-align: center;">
        <i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i>
    </a>
</div>
<input name="animation" type="hidden">
</body>
</html>
