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

    @vite(['resources/js/app.ts'])
</head>
<body>
<div class="relative h-screen sm:py-16 flex items-center bg-gradient-to-b from-primary/5 via-primary/5 to-primary/10">
    {{ $slot }}
</div>

<x-partials.dark-mode />
@stack("js")
@vite("resources/js/guest.ts", "resources/js/app.ts")

<!-- Toast -->
<script>
    window.addEventListener("load", () => {
        @foreach ($errors->all() as $error)
        Toastify({
            text: "{{ $error }}",
            duration: 3000,
            close: true,
            stopOnFocus: true,
            style: {
                background: "#FF0000",
            },
        }).showToast();
        @endforeach

        @if (session()->has('success'))
        Toastify({
            text: "{{ session()->get('success') }}",
            duration: 3000,
            close: true,
            stopOnFocus: true,
            style: {
                background: "#7CFC00",
            },
        }).showToast();
        @endif
    })
</script>
</body>
</html>
