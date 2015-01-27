@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/fresco/fresco.css') }}
@stop

@section('content')
    <div id="slideMap" class="parallax__img"></div>
    <div itemscope itemtype="http://schema.org/FoodEvent" class="parallax__body">
        <h2 itemprop="attendee" class="gamma">
            Resto-Rallye de
            <span itemprop="location" class="span--spacing">{{ $rallye->city }}</span>
        </h2>
        <!-- TODO Microdata sur la p itemprop="about" -->
        {{ $rallye->body }}
    </div>
    @if ($restaurants)
        <div class="parallax__img parallax__img--ten"></div>
        <div itemscope itemtype="http://schema.org/Thing" class="parallax__body">
            <h2 itemprop="headline" class="gamma">Les hôtes de la soirée</h2>
            @foreach($restaurants as $restaurant){{--
                --}}<div itemscope itemtype="http://schema.org/Restaurant" class="inline-block thumbnails">
                    <a itemprop="url" href="{{ route( 'restaurants.show', $restaurant-> id )}}" class="removeLink">
                        <h3 itemprop="name" class="delta">{{ $restaurant->name }}</h3>
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
    @endif
    <div class="parallax__img parallax__img--eleven"></div>
    <div itemscope itemtype="http://schema.org/ImageGallery" class="parallax__body">
        <h2 itemprop="headline">Souvenirs en image</h2>
        <div itemscope itemrprop="about">
            @for($i = $photos->getFrom(); $i <= $photos->getTo(); $i++){{--
                --}}<div class="inline-block gallery">
                    <a itemprop="url" href="/uploads/rallyes/{{ $rallye->id }}/{{ $photos[$i - 1] }}" data-fresco-group="unique_name" class="fresco gallery__link">
                        <img itemprop="image" src="/uploads/rallyes/{{ $rallye->id }}/{{ $photos[$i - 1] }}" class="gallery__img">
                    </a>
                </div>{{--
            --}}@endfor
            {{ $photos->links('partials.paginate') }}
        </div>
    </div>
    <div class="parallax__img parallax__img--twelve"></div>
@stop

@section ('script')
    <script type="text/javascript">
      var addressRdv = "{{ $rallye->adress . ', ' . $rallye->postal_code . ' ' . $rallye->city . ', Belgique'}}";
      var addressRsts = [];
      @if($restaurants)
          @foreach ($restaurants as $restaurant)
            addressRsts.push("{{ $restaurant->adress . ', ' . $restaurant->postal_code . ' ' . $restaurant->city . ', Belgique'}}");
          @endforeach
      @endif

      console.log(addressRsts);

    </script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&amp;sensor=false"></script>
    {{ HTML::script('js/vendor/fresco/fresco.js') }}
@stop
