<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{ option("site_name", config("app.name")) . getSubtitle() }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="coderthemes" name="author"/>

    <!-- Theme favicon -->
    <link rel="shortcut icon" href="{{ asset("favicon.ico") }}">

    <script src="https://kit.fontawesome.com/3e5386a9e5.js" crossorigin="anonymous"></script>

    @vite(['resources/js/app.ts', 'resources/js/admin.ts'])

    @stack("css")
    <noscript>
        <style>
            /**
            * Reinstate scrolling for non-JS clients
            */
            .simplebar-content-wrapper {
                scrollbar-width: auto;
                -ms-overflow-style: auto;
            }

            .simplebar-content-wrapper::-webkit-scrollbar,
            .simplebar-hide-scrollbar::-webkit-scrollbar {
                display: initial;
                width: initial;
                height: initial;
            }
        </style>
    </noscript>
</head>

<body>

<x-partials.pre-loader/>

<x-admin.layouts.partials.header/>

<x-admin.layouts.partials.sidebar/>

<!-- Start Content -->
{{ $slot }}
<!-- End Content -->

<x-admin.layouts.partials.footer/>

<x-partials.dark-mode/>

@stack("js")

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
