@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/fresco/fresco.css') }}
@stop
@section('content')
    <div class="parallax__img parallax__img parallax__img--nine"></div>
    <section itemscope itemtype="http://schema.org/Restaurant" class="parallax__body">
        <div class="restaurant">
            <h2 itemprop="name" class="gamma">{{ $restaurant->name }}</h2>
            <article class="inline-block restaurant__body">{{--
                <!-- TODO Type de restaurant ? -->
                <h3 itemprop="servesCuisine" class="delta">Cuisine Italienne</h3>
                <!-- TODO Microdata sur la p itemprop="about" -->
                {{ $restaurant->body }}
            --}}</article>
            <article class="inline-block restaurant__details">{{--
                <h3 itemprop="headline" class="delta">Coordonnées</h3>
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
            --}}</article>{{--
            --}}<article class="restaurant__gallery" id="paginationAnchor">
                <h3 itemprop="headline" class="delta">Notre salle</h3>
                @for($i = $photos->getFrom(); $i <= $photos->getTo(); $i++){{--
                    --}}<div class="inline-block gallery">
                        <a itemprop="url" href="/uploads/restaurants/{{ $restaurant->id }}/{{ $photos[$i - 1] }}" data-fresco-group="unique_name" class="fresco gallery__link">
                            <img itemprop="image" src="/uploads/restaurants/{{ $restaurant->id }}/{{ $photos[$i - 1] }}" class="gallery__img" alt="Photo du restaurant {{ $restaurant->name }} - {{ $i }}">
                        </a>
                    </div>{{--
                --}}@endfor
                {{ $photos->links('partials.paginate') }}
            </article>
        </div>
    </section>
    <div id="slideMap" class="parallax__map" ></div>
@stop
@section ('script')
    <script type="text/javascript">
      var addressRdv = "{{ $restaurant->adress . ', ' . $restaurant->postal_code . ' ' . $restaurant->city . ', Belgique'}}";
      var addressRsts = ["{{ $restaurant->adress . ', ' . $restaurant->postal_code . ' ' . $restaurant->city . ', Belgique'}}"];

    </script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&amp;sensor=false"></script>
    {{ HTML::script('js/vendor/fresco/fresco.js') }}
@stop
