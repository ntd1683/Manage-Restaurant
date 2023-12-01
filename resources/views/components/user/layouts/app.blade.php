<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dũng Phát - Nhà Hàng Số 1 VN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="coderthemes" name="author" />

    <!-- Theme favicon -->
    <link rel="shortcut icon" href="{{ asset("favicon.ico") }}">

    <!-- Css -->
    <!--  Head js -->
{{--    <script type="module" crossorigin src="assets/home-c1b793e9.js"></script>--}}
{{--    <link rel="modulepreload" crossorigin href="assets/theme-b118ffc1.js">--}}
{{--    <link rel="modulepreload" crossorigin href="assets/free-mode-d251b1d1.js">--}}
{{--    <link rel="modulepreload" crossorigin href="assets/navigation-f8e75545.js">--}}
{{--    <link rel="modulepreload" crossorigin href="assets/thumbs-a96dec08.js">--}}
{{--    <link rel="stylesheet" href="assets/theme-c9540983.css">--}}
    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>

    @vite(['resources/js/app.ts'])

    @stack("css")
</head>

<body>

<x-user.layouts.partials.pre-loader />

<x-user.layouts.partials.header />

{{ $slot }}

<x-user.layouts.partials.footer />
<x-user.layouts.partials.dark-mode />
</body>
</html>
