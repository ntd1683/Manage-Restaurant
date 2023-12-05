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

    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>

    @vite(['resources/js/app.ts', 'resources/js/user.ts'])

    @stack("css")
</head>

<body>

<x-partials.pre-loader />

<x-user.layouts.partials.header />

{{ $slot }}

<x-user.layouts.partials.footer />
<x-partials.dark-mode />

@stack("js")
</body>
</html>
