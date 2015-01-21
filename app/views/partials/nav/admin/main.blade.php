<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('admin.home') }}">RestoRallye</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                <li><a href="{{ route('home') }}" target="_blank">Voir le site</a></li>
                <li class="text-center visible-xs-block"><a>Gestion</a></li>
                <li class="visible-xs-block"><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
                <li class="visible-xs-block"><a href="{{ route('admin.menus.index') }}">Menus</a></li>
                <li class="visible-xs-block"><a href="{{ route('admin.rallyes.index') }}">Rallyes</a></li>
                <li class="visible-xs-block"><a href="{{ route('admin.posts.index') }}">Articles</a></li>
                <li class="visible-xs-block"><a href="{{ route('admin.pages.index') }}">Contenus</a></li>
                <li class="visible-xs-block"><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
                <li><a href="{{ route('logout') }}">Déconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>
