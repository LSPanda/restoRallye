/var/www/local.dev/restoRallye/dev/app/views/restaurants/show.blade.php

<h1>{{ $restaurant->name }}</h1>

{{ $restaurant->body }}

<p>
    <adress>{{ $restaurant->adress }} {{ $restaurant->adress_number }}, {{ $restaurant->postal_code }} {{ $restaurant->city }}</adress>
</p>
