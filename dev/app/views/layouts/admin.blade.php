<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Administration</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{ HTML::style('css/vendor/pace/pace.min.css') }}

        {{ HTML::style('css/vendor/bootstrap/bootstrap.min.css') }}
        {{ HTML::style('css/vendor/bootstrap/theme.bootstrap.css') }}
        {{ HTML::style('css/customStyles/dashboard.css') }}
        @yield('styles')

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>

            <script>window.html5 || document.write('{{ HTML::script("js/vendor/html5shiv.js") }}')</script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @include('partials.nav.admin.main')

        <div class="container-fluid">
            <div class="row">
                @include('partials.nav.admin.sideBar')
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @include('partials.nav.admin.breadcrumbs')
                    @yield('content')
                </div>
            </div>
        </div>

        {{ HTML::script('js/vendor/jquery/jquery.min.js') }}
        {{ HTML::script('js/vendor/bootstrap/bootstrap.min.js') }}
        @yield('scripts')
        {{ HTML::script('js/vendor/pace/pace.min.js') }}
    </body>
</html>
