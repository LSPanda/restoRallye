@extends('layouts.default')
@section('content')
    <div itemscope itemtype="http://schema.org/Thing" class="parallax__img position--relative parallax__img--one">
        <blockquote itemprop="description" class="quote">
            Ne manquez pas notre prochain <a itemprop="url" href="{{ route('rallyes.show', $nextRallye->id) }}" class="quote__link">Rendez-vous </a>dans la région de {{ $nextRallye->city }}
        </blockquote>
    </div>
    <div itemscope itemtype="http://schema.org/Thing" class="parallax__body addText">
        <h2 itemprop="headline" class="gamma">{{ $about->name }}</h2>
        <!-- Todo pouvoir mettre la microdata itemprop="description" sur les balises p -->
        {{ $about->body }}
    </div>
    <div class="parallax__img parallax__img--two"></div>
    <div itemscope itemtype="http://schema.org/Event" class="parallax__body addDL">
        <h2 itemprop="headline" class="gamma">Programme de la soirée</h2>
        <!-- Todo Lister le contenu des menus dynamiquement -->
        <dl class="inline-block programme">
            <dt itemprop="doorTime" class="hightlight">18.30 - 19.30</dt>
            <dd itemprop="description">Réception des Resto Rallyens au lieu d’accueil</dd>
            <dt itemprop="duration" class="hightlight">19.30 - 19.45</dt>
            <dd itemprop="description">Déplacement des Resto Rallyens vers les différents restaurants</dd>
            <dt itemprop="duration" class="hightlight">19.45 - 20.30</dt>
            <dd itemprop="description">Entrée froide</dd>
            <dt itemprop="duration" class="hightlight">20.30 - 20.45</dt>
            <dd itemprop="description">Déplacement des Resto Rallyens vers les différents restaurants</dd>
        </dl>
        <dl class="inline-block programme">
            <dt itemprop="duration" class="hightlight">20.45 - 21.30</dt>
            <dd itemprop="description">Entrée chaude</dd>
            <dt itemprop="duration" class="hightlight">21.30 - 21.45</dt>
            <dd itemprop="description">Déplacement des Resto Rallyens vers les différents restaurants</dd>
            <dt itemprop="duration" class="hightlight">21.45 - 22.30</dt>
            <dd itemprop="description">Plat principal</dd>
            <dt itemprop="endDate" class="hightlight">22.30 - …</dt>
            <dd itemprop="description">Retour au lieu d’accueil pour café, pousse et dessert</dd>
        </dl>
    </div>
    <div class="parallax__img parallax__img--three"></div>
    <div itemscope itemtype="http://schema.org/Event" class="parallax__body addText">
        <h2 itemprop="headline" class="gamma">Le tarif par participant s'élève à 60 €, ce prix comprend</h2>
        <ul class="tarif">
            <li itemprop="description" class="tarif__element">L'apéro et ses zakouskis</li>
            <li itemprop="description" class="tarif__element">L'entrée froide</li>
            <li itemprop="description" class="tarif__element">L'entrée chaude</li>
            <li itemprop="description" class="tarif__element">Le plat principal</li>
            <li itemprop="description" class="tarif__element">Le café et son dessert</li>
            <li itemprop="description" class="tarif__element">Le pousse-café</li>
            <li itemprop="description" class="tarif__element">Ainsi qu'un verre de vin et d'eau dans chaque restaurant</li>
        </ul>
    </div>
    <div class="parallax__img parallax__img--four"></div>
    <div itemscope itemtype="http://schema.org/Thing" class="parallax__body">
        <h2 itemprop="headline" class="gamma">Nous vous conseillons ces adresses</h2>
        @foreach($restaurants as $restaurant){{--
            --}}<div itemscope itemtype="http://schema.org/Restaurant" class="inline-block thumbnails">
                <a itemprop="url" href="{{ route('restaurants.show', $restaurant->id) }}" class="removeLink">
                    <h3 itemprop="name" class="delta">
                        {{ $restaurant->name }},
                        <span itemprop="addressLocality" class="span--spacing">{{ $restaurant->city }}</span>
                    </h3>
                    <img itemprop="image" src="uploads/restaurants/{{ $restaurant->id }}/main.jpg" class="thumbnails__img">
                </a>
            </div>{{--
        --}}@endforeach
    </div>
    <div class="parallax__img parallax__img--five"></div>
@stop
