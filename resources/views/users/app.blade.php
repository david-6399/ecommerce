<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Fruitkha</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->

    <link rel="stylesheet" href="{{ asset('user/fruitkha-1.0.0/assets/css/all.min.css') }}">
    
    {{-- @vite('resources/css/user/style.css') --}}
</head>

<body>
    @include('users.navbar')
    @yield('content')

    <!-- jquery -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('user/fruitkha-1.0.0/assets/js/main.js') }}"></script>


</body>

</html>
