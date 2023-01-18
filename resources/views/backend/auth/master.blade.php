<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Exium - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="{{asset('backend')}}/image/png" sizes="16x16" href="{{asset('backend')}}/images/favicon.png">
    <link href="{{asset('backend')}}/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            @yield('content')
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('backend')}}/vendor/global/global.min.js"></script>
    <script src="{{asset('backend')}}/js/quixnav-init.js"></script>
    <script src="{{asset('backend')}}/js/custom.min.js"></script>

</body>

</html>
