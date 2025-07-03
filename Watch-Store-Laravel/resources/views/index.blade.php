<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('csrf')
    <title>Đồng hồ THL Watches</title>

    <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/frontend/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/frontend/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/frontend/css/reset.css">
    <link rel="stylesheet" href="assets/frontend/scss/style.css">
    <link rel="stylesheet" href="assets/frontend/scss/style-mobile.css">
</head>
<body>

    @include('header')

        @yield('main')

    @include('footer')
    
    <script defer src="assets/frontend/js/jquery-3.4.0.min.js"></script>
    <script defer src="assets/frontend/js/bootstrap.min.js"></script>
    <script defer src="assets/frontend/js/swiper-bundle.min.js"></script>
    <script defer src="assets/frontend/js/jquery.fancybox.min.js"></script>
    <script defer src="assets/frontend/js/script-slide.js"></script>
    <script defer src="assets/frontend/js/script.js"></script>
</body>
</html>