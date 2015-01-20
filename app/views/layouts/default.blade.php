<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Resto Rallye</title>
    <!-- TODO Description dynamique -->
    <meta name="description" content="Bienvenue au Resto Rallye! Le Resto Rallye est un itinéraire gourmand en trois restaurants, pourquoi toujours se limiter à un seul restaurant pour déguster l’entièreté d’un menu ? Le Resto Rallye offre la possibilité à ses « gastronomades » de faire connaissance, en une seule soirée, de plusieurs établissements d’une ville ainsi que de découvrir une nouvelle région de façon originale et ludique.">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="">
    {{ HTML::style('css/main.css') }}
    @yield('styles')
</head>
<body>
    @include('partials.nav.main')

    @yield('content')

    @include('partials.footer')

    {{ HTML::script('js/vendor/modernizr/modernizr-2.6.2.min.js') }}
    {{ HTML::script('js/vendor/jquery/jquery.min.js') }}
    {{ HTML::script('js/script.min.js') }}
    @yield('script')
</body>
