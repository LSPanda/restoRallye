@extends('layouts.default')

@section('content')
    <div id="slideMap" class="parallax__img" style="background: url(/uploads/restaurants/{{ $restaurant->id }}/main.jpg) center fixed no-repeat"></div>
    <div itemscope itemtype="http://schema.org/Restaurant" class="parallax__body">
        <div class="restaurant">
            <h3 itemprop="name" class="gamma">{{ $restaurant->name }}</h3>
            <div class="inline-block restaurant__body">
                <!-- TODO Type de restaurant ? -->
                <h4 itemprop="servesCuisine" class="delta">Cuisine Italienne</h4>
                <!-- TODO Microdata sur la p itemprop="about" -->
                {{ $restaurant->body }}
            </div>
            <div class="inline-block restaurant__details">
                <h4 itemprop="headline" class="delta">Coordonnées</h4>
                <address itemprop="address">
                    <span class="block">{{ $restaurant->adress }}</span>
                    <span class="block">{{ $restaurant->postal_code }}, {{ $restaurant->city }}</span>
                </address>
                @if ($restaurant->tel)
                    <div itemprop="telephone" class="block restaurant__details--tel">
                        Tel&nbsp;:<span class="span--spacing">{{ $restaurant->tel }}</span>
                    </div>
                @endif
                @if ($restaurant->website)
                    <a href="{{ $restaurant->website }}" target="_blank" itemprop="url" class="block">{{ $restaurant->website }}</a>
                @endif
            </div>
            <div class="restaurant__gallery">
             <!-- TODO lister les fichiers présents dans le dossier uploads -->
                <h4 itemprop="headline" class="delta">Notre salle</h4>
                <div class="inline-block gallery">
                    <a itemprop="url" href="../css/images/mockUp/exempleRest.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                        <img itemprop="image" src="../css/images/mockUp/exempleRest.jpg" class="gallery__img">
                    </a>
                </div>
                <div class="inline-block gallery">
                    <a itemprop="url" href="../css/images/mockUp/exempleRest.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                        <img itemprop="image" src="../css/images/mockUp/exempleRest.jpg" class="gallery__img">
                    </a>
                </div>
                <div class="inline-block gallery">
                    <a itemprop="url" href="../css/images/mockUp/exempleRest.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                        <img itemprop="image" src="../css/images/mockUp/exempleRest.jpg" class="gallery__img">
                    </a>
                </div>
                <div class="inline-block gallery">
                    <a itemprop="url" href="../css/images/mockUp/exempleRest.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                        <img itemprop="image" src="../css/images/mockUp/exempleRest.jpg" class="gallery__img">
                    </a>
                </div>
                <div class="inline-block gallery">
                    <a itemprop="url" href="../css/images/mockUp/exempleRest.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                        <img itemprop="image" src="../css/images/mockUp/exempleRest.jpg" class="gallery__img">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax__img parallax__img--heighteen"></div>
@stop
