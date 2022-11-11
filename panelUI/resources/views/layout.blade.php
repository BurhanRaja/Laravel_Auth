<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (auth('admin')->user())
        <title>Admin | Dashboard</title>
    @else
        <title>User | Dashboard</title>
    @endif

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{asset ('plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset ('dist/css/adminlte.min.css?v=3.2.0')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">


    @include('components.header')

    @include('components.sidebar')


    <div class="content-wrapper" style="min-height: 214px;">
        <main class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>

    @include('components.footer')
    @include('components.flash-message')

    <script src="{{asset ('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset ('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>

</html>
