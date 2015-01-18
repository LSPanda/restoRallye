@extends('layouts.default')

@section('content')
    <div class="parallax__img parallax__img--sixteen"></div>
    <div itemscope itemtype="http://schema.org/Thing" class="parallax__body" id="paginationAnchor">
        <div class="position--relative">
            <h3 itemprop="headline" class="gamma">Les habitués du Resto Rallye</h3>
            <form class="forms__search forms__search--right">
                <input itemprop="object" type="text" placeholder="Recherche par région" class="input__text">
                <input itemprop="target" type="submit" value="S'inscrire" class="search__submit">
            </form>
            @foreach($restaurants as $restaurant){{--
                --}}<div itemscope itemtype="http://schema.org/Restaurant" class="inline-block thumbnails">
                    <a itemprop="url" href="{{ route('restaurants.show', $restaurant->id) }}" class="removeLink">
                        <h4 itemprop="name" class="delta">
                            {{ $restaurant->name }}
                            <span itemprop="addressLocality" class="span--spacing">{{ $restaurant->city }}</span>
                        </h4>
                        <img itemprop="image" src="uploads/restaurants/{{ $restaurant->id }}/main.jpg" class="thumbnails__img">
                    </a>
                </div>{{--
            --}}@endforeach()
             {{ $restaurants->links('partials.paginate') }}
        </div>
    </div>
    <div class="parallax__img parallax__img--seventeen"></div>
@stop
