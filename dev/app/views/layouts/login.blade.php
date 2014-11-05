<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Administration</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/signin.css') }}

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>

            <script>window.html5 || document.write('{{ HTML::script("js/vendor/html5shiv.js") }}')</script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="container-fluid">
            @yield('content')
        </div>

        {{ HTML::script('js/bootstrap.min.js') }}
    </body>
</html>
