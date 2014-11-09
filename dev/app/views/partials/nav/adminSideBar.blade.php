<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li{{ Request::is( 'admin') ? ' class="active"' : '' }}><a href="{{ route('adminIndex') }}">Tableau de bord</a></li>
    </ul>
    <hr>
    <ul class="nav nav-sidebar">
        <li{{ Request::is( 'admin/restaurants*') ? ' class="active"' : '' }}><a href="{{ route('restaurantAdminIndex') }}">Restaurants</a></li>
        <li{{ Request::is( 'admin/menus*') ? ' class="active"' : '' }}><a href="{{ route('admin.menus.index') }}">Menus</a></li>
        <li{{ Request::is( 'admin/rallye*') ? ' class="active"' : '' }}><a href="{{ route('rallyeAdminIndex') }}">Rallyes</a></li>
        <li{{ Request::is( 'admin/posts*') ? ' class="active"' : '' }}><a href="{{ route('postAdminIndex') }}">Articles</a></li>
        <li{{ Request::is( 'admin/contents*') ? ' class="active"' : '' }}><a href="{{ route('pageAdminList') }}">Contenus</a></li>
        <li{{ Request::is( 'admin/users*') ? ' class="active"' : '' }}><a href="{{ route('userAdminIndex') }}">Utilisateurs</a></li>
    </ul>
    <hr>
</div>
