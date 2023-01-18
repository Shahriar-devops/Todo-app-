<!DOCTYPE html>
<html  class="@yield('authheight')"  >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{favicon(settings('favicon')) }}">
    <link href="{{ static_asset('backend') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{ static_asset('backend') }}/css/style.css" rel="stylesheet">

    <link href="{{ static_asset('backend') }}/icons/font-awesome-old/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ static_asset('backend') }}/vendor/jqueryui/css/jquery-ui.min.css" rel="stylesheet">
    <link href="{{ static_asset('backend') }}/css/flag-icons/flag-icons.min.css" rel="stylesheet">
    <link href="{{ static_asset('backend') }}/vendor/froala-texteditor/froala_editor.min.css" rel="stylesheet">
    <link href="{{ static_asset('backend') }}/css/custom.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     @stack('styles')
</head>

<body class="@yield('authheight')">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
