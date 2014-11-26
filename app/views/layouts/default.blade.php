<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>::Resto Rallye::</title>
    <meta name="description" content="">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="">
    {{ HTML::style('css/screen.css') }}
    <link src="http://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet" type="text/css">
    <link src="http://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet" type="text/css">
</head>
<body>
    @include('partials.nav.main')

    @yield('content')

    @include('partials.footer')

    {{ HTML::script('js/vendor/modernizr/modernizr-2.6.2.min.js') }}
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&amp;sensor=false"></script>
    {{ HTML::script('js/vendor/jquery/jquery.min.js') }}
    {{ HTML::script('js/script.min.js') }}
</body>
