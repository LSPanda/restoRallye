<header><h2>Menu de navigation du site Resto Rallye</h2>
    <nav>
        <ul>
            <li><a href="{{ route('restaurants.index') }}">Restaurants</a></li>
            <li><a href="{{ route('rallyes.index') }}">Rallye</a></li>
            <li class="banners"><a href="{{ route('home') }}"><img src="/css/images/Ecusson.png" alt="Banners Resto Rallye"></a>
            </li>
            <li><a href="{{ route('posts.index') }}">Blog</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>
</header>
