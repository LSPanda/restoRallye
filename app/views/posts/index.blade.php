@extends('layouts.default')

@section('content')
    <div class="parallax__img parallax__img--thirteen"></div>
    <section itemscope itemtype="http://schema.org/BlogPosting" class="parallax__body" id="paginationAnchor">
        <h2 itemprop="headline" class="gamma">Les dernières nouvelles</h2>
        <div itemprop="about">
            @foreach($posts as $post)
                <article class="articles">
                    <div itemprop="pageStart" class="inline-block articles__img">
                        <img itemprop="image" src="/uploads/posts/{{ $post->id }}/{{ $post->photo}}" alt="ADD ATL ATTRIBUTE">
                    </div>{{--
                    --}}<div itemprop="articleBody" class="inline-block articles__body">
                        <h3 itemprop="headline" class="delta">{{ $post->name  }}</h3>
                        <span itemprop="date" class="block body__dates">Le {{ date( 'd/m/Y', strtotime($post->created_at) ) }}</span>
                        <!-- TODO Microdata sur la p itemprop="about" -->
                        {{ $post->body }}
                    </div>
                </article>
            @endforeach
        </div>
        {{ $posts->links('partials.paginate') }}
    </section>
    <div class="parallax__img parallax__img--fourteen"></div>
    <section itemscope itemtype="http://schema.org/ImageGallery" class="parallax__body">
        <h2 itemprop="headline">Nos souvenirs à travers tous nos Rallyes</h2>
        <div itemprop="about">
            <!-- TODO Prendre certaines photos des événements -->
            @for($i = 0; $i < 20; $i++){{--
                --}}<div class="inline-block gallery">
                    <a itemprop="url" href="/css/images/mockUp/exempleGallery1.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                        <img itemprop="image" src="/css/images/mockUp/exempleGallery.jpg" class="gallery__img" alt="TODO ALT IMAGE HERE">
                    </a>
                </div>{{--
            --}}@endfor
            <!-- TODO pagination ? -->
            {{--{{ $photos->links('partials.paginate') }}--}}
        </div>
    </section>
    <div class="parallax__img parallax__img--fiveteen"></div>

    <!-- IMPORTANT! Lightbox can't work without this code -->
    <div id="slideMap"></div>
    <script type="text/javascript">
      var addressRdv = "{{ $nextRallye->adress . ', ' . $nextRallye->postal_code . ' ' . $nextRallye->city . ', Belgique'}}";
      var addressRsts = [];

    </script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&amp;sensor=false"></script>
@stop
