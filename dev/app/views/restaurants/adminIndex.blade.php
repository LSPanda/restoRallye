/var/www/local.dev/restoRallye/dev/app/views/restaurants/index.blade.php

<ul>
    @foreach($restaurants as $restaurant)
        <li>{{ $restaurant->name }}</li>
    @endforeach
</ul>
