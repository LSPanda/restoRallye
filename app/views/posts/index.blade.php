@extends('layouts.default')

@section('content')
    <div class="parallax__img parallax__img--thirteen"></div>
    <div itemscope itemtype="http://schema.org/BlogPosting" class="parallax__body" id="paginationAnchor">
        <h2 itemprop="headline" class="gamma">Les dernières nouvelles</h2>
        <div itemrprop="about">
            @foreach($posts as $post)
                <div class="articles">
                    <div itemrprop="pageStart" class="inline-block articles__img">
                        <img itemrprop="image" src="/uploads/posts/{{ $post->id }}/{{ $post->photo}}">
                    </div>{{--
                    --}}<div itemrprop="articleBody" class="inline-block articles__body">
                        <h3 itemrprop="headline" class="delta">{{ $post->name  }}</h3>
                        <span itemrprop="date" class="block body__dates">Le {{ date( 'd/m/Y', strtotime($post->created_at) ) }}</span>
                        <!-- TODO Microdata sur la p itemprop="about" -->
                        {{ $post->body }}
                    </div>
                </div>
            @endforeach
        </div>
        {{ $posts->links('partials.paginate') }}
    </div>
    <div class="parallax__img parallax__img--fourteen"></div>
    <div itemscope itemtype="http://schema.org/ImageGallery" class="parallax__body">
    <h2 itemprop="headline">Nos souvenirs à travers tous nos Rallyes</h2>
    <div itemrprop="about">
        <!-- TODO lister les fichiers présents dans le dossier uploads -->
        @for($i = 0; $i < 20; $i++){{--
            --}}<div class="inline-block gallery">
                <a itemprop="url" href="/css/images/mockUp/exempleGallery1.jpg" data-fresco-group="unique_name" class="fresco gallery__link">
                    <img itemprop="image" src="/css/images/mockUp/exempleGallery.jpg" class="gallery__img">
                </a>
            </div>{{--
        --}}@endfor
        <!-- TODO pagination ? -->
        {{--{{ $photos->links('partials.paginate') }}--}}
    </div>

    </div>
    <div class="parallax__img parallax__img--fiveteen"></div>
@stop
