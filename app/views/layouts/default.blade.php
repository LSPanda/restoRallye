<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="fr" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html lang="fr" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html lang="fr" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="fr" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resto Rallye</title>
    <!-- TODO Description dynamique -->
    <meta name="description" content="Bienvenue au Resto Rallye! Le Resto Rallye est un itinéraire gourmand en trois restaurants, pourquoi toujours se limiter à un seul restaurant pour déguster l’entièreté d’un menu ? Le Resto Rallye offre la possibilité à ses « gastronomades » de faire connaissance, en une seule soirée, de plusieurs établissements d’une ville ainsi que de découvrir une nouvelle région de façon originale et ludique.">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/1380208_592665394124970_2094187523_n.jpg?oh=ed605aceb5982052cabdefe4d0210a2f&amp;oe=55212669&amp;__gda__=1429869376_455ac9845e14130176bc81964d126410">
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
