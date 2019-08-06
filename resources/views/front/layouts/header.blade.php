<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ setting()->sitename_en }} Demo</title>
        <meta name="description" content="{{ setting()->description }}">
        <meta name="keywords" content="{{ setting()->keywords }}">
        <link rel="shortcut icon" href="{{ Storage::url(setting()->icon) }}" type="image/x-icon">

        <!-- Icon css link -->
        <link href="{{ asset('design/front') }}/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('design/front') }}/css/simple-line-icons.css" rel="stylesheet">
        <link href="{{ asset('design/front') }}/css/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('design/front') }}/css/bootstrap.min.css" rel="stylesheet">

        <!-- Rev slider css -->
        <link href="{{ asset('design/front') }}/css/settings.css" rel="stylesheet">
        <link href="{{ asset('design/front') }}/css/layers.css" rel="stylesheet">
        <link href="{{ asset('design/front') }}/css/navigation.css" rel="stylesheet">

        <!-- Extra plugin css -->
        <link href="{{ asset('design/front') }}/css/owl.carousel.min.css" rel="stylesheet">
        <link href="{{ asset('design/front') }}/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="{{ asset('design/front') }}/css/jQuery.verticalCarousel.css" rel="stylesheet">

        <link href="{{ asset('design/front') }}/css/style.css" rel="stylesheet">
        <link href="{{ asset('design/front') }}/css/responsive.css" rel="stylesheet">
        @yield('style')
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="home_sidebar">
