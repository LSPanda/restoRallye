@extends('layouts.default')

@section('styles')
    {{ HTML::style('css/fresco/fresco.css') }}
@stop

@section('content')
    <div id="slideMap" class="parallax__img"></div>
    <section itemscope itemtype="http://schema.org/FoodEvent" class="parallax__body">
        <h2 itemprop="attendee" class="gamma">
            Resto-Rallye de
            <span itemprop="location" class="span--spacing">{{ $rallye->city }}</span>
        </h2>
        <!-- TODO Microdata sur la p itemprop="about" -->
        {{ $rallye->body }}
    </section>
    @if ($restaurants)
        <div class="parallax__img parallax__img--ten"></div>
        <section itemscope itemtype="http://schema.org/Thing" class="parallax__body">
            <h2 itemprop="headline" class="gamma">Les hôtes de la soirée</h2>
            @foreach($restaurants as $restaurant){{--
                --}}<article itemscope itemtype="http://schema.org/Restaurant" class="inline-block thumbnails">
                    <a itemprop="url" href="{{ route( 'restaurants.show', $restaurant-> id )}}" class="removeLink">
                        <h3 itemprop="name" class="delta">{{ $restaurant->name }}</h3>
                        <img itemprop="image" src="/uploads/restaurants/{{ $restaurant->id }}/main.jpg" class="thumbnails__img" alt="{{ $restaurant->name }}">
                        <dl class="block">
                            @foreach($restaurant->menu as $menu)
                                <dt class="hightlight">{{ $menu->name }}</dt>
                                @foreach($menu->content as $menuContent)
                                    <dd itemprop="menu">{{ $menuContent }}</dd>
                                @endforeach
                            @endforeach
                        </dl>
                    </a>
                </article>{{--
            --}}@endforeach
        </section>
    @endif
    <div class="parallax__img parallax__img--eleven"></div>
    <section itemscope itemtype="http://schema.org/ImageGallery" class="parallax__body">
        <h2 itemprop="headline">Souvenirs en image</h2>
        <div itemscope itemprop="about">
            @for($i = $photos->getFrom(); $i <= $photos->getTo(); $i++){{--
                --}}<div class="inline-block gallery">
                    <a itemprop="url" href="/uploads/rallyes/{{ $rallye->id }}/{{ $photos[$i - 1] }}" data-fresco-group="unique_name" class="fresco gallery__link">
                        <img itemprop="image" src="/uploads/rallyes/{{ $rallye->id }}/{{ $photos[$i - 1] }}" class="gallery__img" alt="Photo du rallye du {{ date('d/m/Y' , strtotime($rallye->date)) }} à {{ $rallye->city }} - {{ $i }}">
                    </a>
                </div>{{--
            --}}@endfor
            {{ $photos->links('partials.paginate') }}
        </div>
    </section>
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
    </script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&amp;sensor=false"></script>
    {{ HTML::script('js/vendor/fresco/fresco.js') }}
@stop
