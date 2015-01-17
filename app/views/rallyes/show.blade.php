@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/fresco/fresco.css') }}
@stop

@section('content')
    <div id="slideMap" class="parallax__img"></div>
    <div itemscope itemtype="http://schema.org/FoodEvent" class="parallax__body">
        <h3 itemprop="attendee" class="gamma">
            Resto-Rallye de
            <span itemprop="location" class="span--spacing">{{ $rallye->city }}</span>
        </h3>
        <!-- TODO Microdata sur la p itemprop="about" -->
        {{ $rallye->body }}
        </div>
        <div class="parallax__img parallax__img--ten"></div>
        <div itemscope itemtype="http://schema.org/Thing" class="parallax__body">
            <h3 itemprop="headline" class="gamma">Les hôtes de la soirée</h3>
            @foreach($restaurants as $restaurant){{--
                --}}<div itemscope itemtype="http://schema.org/Restaurant" class="inline-block thumbnails">
                    <a itemprop="url" href="{{ route( 'restaurants.show', $restaurant-> id )}}" class="removeLink">
                        <h4 itemprop="name" class="delta">{{ $restaurant->name }}</h4>
                        <img itemprop="image" src="/uploads/restaurants/{{ $restaurant->id }}/main.jpg" class="thumbnails__img">
                        <!-- TODO menu -->
                        <dl class="block">
                            <dt class="hightlight">Entrée froide</dt>
                            <dd itemprop="menu">Foie gras de canard</dd>
                            <dt class="hightlight">Entrée chaude</dt>
                            <dd itemprop="menu">Croquette de fromage sur son lit de laitue</dd>
                            <dt class="hightlight">Plat principale</dt>
                            <dd itemprop="menu">Ours à la bière</dd>
                        </dl>
                    </a>
                </div>{{--
            --}}@endforeach
        </div>
        <div class="parallax__img parallax__img--eleven"></div>
        <div itemscope itemtype="http://schema.org/ImageGallery" class="parallax__body">
            <h3 itemprop="headline">Souvenirs en image</h3>
            <!-- TODO gallerie -->
            <div itemscope itemrprop="about">
                @for($i = 0; $i < 10; $i++){{--
                    --}}<div class="inline-block gallery">
                        <a itemprop="url" href="/css/images/mockUp/exempleGallery1.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                            <img itemprop="image" src="/css/images/mockUp/exempleGallery.jpg" class="gallery__img">
                        </a>
                    </div>{{--
                --}}@endfor
                <!-- TODO pagination -->
                <div class="pagination">
                    <span class="inline-block pagination__element">
                        <a href="#" class="block removeLink pagination__element--links">&lang;&lang;</a>
                    </span>
                    <span class="inline-block pagination__element">
                        <a href="#" class="block pagination__element--links">1</a>
                    </span>
                    <span class="inline-block pagination__element">
                        <a href="#" class="block pagination__element--links">2</a>
                    </span>
                    <span class="inline-block pagination__element">
                        <a href="#" class="block pagination__element--links">3</a>
                    </span>
                    <span class="inline-block pagination__element">
                        <a href="#" class="block removeLink pagination__element--links">&rang;&rang;</a>
                    </span>
                </div>
            </div>
        </div>
    <div class="parallax__img parallax__img--twelve"></div>
@stop

@section ('script')
    <script type="text/javascript">
      var addressRdv = "{{ $rallye->adress . ', ' . $rallye->postal_code . ' ' . $rallye->city . ', Belgique'}}";
      var addressRsts = [];
      @foreach ($restaurants as $restaurant)
        addressRsts.push("{{ $restaurant->adress . ', ' . $restaurant->postal_code . ' ' . $restaurant->city . ', Belgique'}}");
      @endforeach

      console.log(addressRsts);

    </script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&amp;sensor=false"></script>
    <script type="text/javascript" src="/js/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/js/script.min.js"></script>
    <script type="text/javascript" src="/js/vendor/fresco/fresco.js"></script>
@stop
