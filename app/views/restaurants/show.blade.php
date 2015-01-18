@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/fresco/fresco.css') }}
@stop
@section('content')
    <div id="slideMap" class="parallax__img" ></div>
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
                @for($i = 0; $i < 10; $i++){{--
                    --}}<div class="inline-block gallery">
                        <a itemprop="url" href="/uploads/restaurants/1/main.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                            <img itemprop="image" src="/uploads/restaurants/1/main.jpg" class="gallery__img">
                        </a>
                    </div>{{--
                --}}@endfor
                <!-- TODO pagination ? -->
                {{--{{ $photos->links('partials.paginate') }}--}}
            </div>
        </div>
    </div>
    <div class="parallax__img parallax__img" style="background: url(/uploads/restaurants/{{ $restaurant->id }}/main.jpg) center fixed no-repeat"></div>
@stop
@section ('script')
    <script type="text/javascript">
      var addressRdv = "{{ $restaurant->adress . ', ' . $restaurant->postal_code . ' ' . $restaurant->city . ', Belgique'}}";
      var addressRsts = ["{{ $restaurant->adress . ', ' . $restaurant->postal_code . ' ' . $restaurant->city . ', Belgique'}}"];

    </script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&amp;sensor=false"></script>
    <script type="text/javascript" src="/js/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/js/script.min.js"></script>
    <script type="text/javascript" src="/js/vendor/fresco/fresco.js"></script>
@stop
