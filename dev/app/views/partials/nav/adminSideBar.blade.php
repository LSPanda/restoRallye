<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('adminIndex') }}">Tableau de bord</a></li>
    </ul>
    <hr>
    <ul class="nav nav-sidebar">
        <li><a href="{{ route('restaurantAdminIndex') }}">Restaurants</a></li>
        <li><a href="{{ route('menuAdminIndex') }}">Menus</a></li>
        <li><a href="{{ route('rallyeAdminIndex') }}">Rallyes</a></li>
        <li><a href="{{ route('postAdminIndex') }}">Articles</a></li>
        <li><a href="{{ route('pageAdminList') }}">Contenus</a></li>
        <li><a href="{{ route('userAdminIndex') }}">Utilisateurs</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href=""></a></li>
    </ul>
    <hr>
    {{ Request::path() }}
</div>

