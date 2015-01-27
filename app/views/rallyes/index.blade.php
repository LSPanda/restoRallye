@extends('layouts.default')

@section('content')
    @if ($nextRallye)
        <div id="slideMap" class="parallax__img"></div>
        <div class="parallax__body">
            <div itemscope itemtype="http://schema.org/FoodEvent">
                <h2 itemprop="headline" class="gamma">Rendez-vous le<span itemprop="startDate" class="span--spacing">{{ date('d/m/Y' , strtotime($nextRallye->date)) }}</span>à<span itemprop="location" class="span--spacing">{{ $nextRallye->city }}</span></h2>
                <!-- TODO Microdata sur la p itemprop="description" -->
                {{ $nextRallye->body }}
            </div>
        </div>
        <div class="parallax__img parallax__img--six"></div>
        <div class="parallax__body">
            <div itemscope itemtype="http://schema.org/Thing">
                <h2 itemprop="headline" class="gamma">Inscrivez-vous pour ce Resto-Rallye</h2>
                <p itemprop="description">Désireux de nous rejoindre à notre prochain événement&nbsp;? Rien de plus simple, il suffit de remplir le formulaire ci-dessous. Dépèchez-vous&nbsp;! Il ne reste plus que<span class="span--spacing hightlight">30 places</span>disponible.</p>
                {{ Form::open(['route' => 'sendMail', 'class' => 'form']) }}
                    {{ Form::inputContact('participantsRallye', 'Nombre de participants', [ 'placeholder' => '1', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('nameRallye', 'Nom', [ 'placeholder' => 'Doe', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('surnameRallye', 'Prénom', [ 'placeholder' => 'John', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('adressRallye', 'Adresse', [ 'placeholder' => 'Rue de la Province, n° 10', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('emailRallye', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('cityRallye', 'Ville', [ 'placeholder' => 'Liège', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('pcRallye', 'Code Postal', [ 'placeholder' => '4400', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('telRallye', 'Tel ou GSM', [ 'placeholder' => '0498 32 72 89', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('faxRallye', 'Fax', [ 'placeholder' => '063 14 85 62', 'class' => 'input__text' ], $errors) }}
                    {{ Form::inputContact('mailRallye', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('confirmMailRallye', 'Confirmation de mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::textareaContact('contentRallye', 'Votre message', [ 'placeholder' => 'Quelque chose à rajouter', 'class' => 'input__text' ], $errors) }}
                    {{ Form::submitContact('Envoyez') }}
                {{ Form::close() }}
            </div>
        </div>
        <div class="parallax__img parallax__img--seven"></div>
        <div class="parallax__body">
            <div itemscope itemtype="http://schema.org/Thing">
                <h2 itemprop="headline" class="gamma">Invitez vos amis à ce Resto-Rallye</h2>
                <p itemprop="description">Vous pouvez aussi décider d'offrir des places pour le prochain événement à l'un de vos amis. Vous n'avez qu'à remplir ce formulaire, nous nous occuperons de lui envoyer l'invitation. Dépèchez-vous&nbsp;! Il ne reste plus que<span class="span--spacing hightlight">30 places</span>disponible.</p>
                {{ Form::open(['route' => 'sendMail', 'class' => 'form']) }}
                    {{ Form::inputContact('participantsInvitation', 'Nombre de participants', [ 'placeholder' => '1', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('nameInvitation', 'Nom', [ 'placeholder' => 'Doe', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('surnameInvitation', 'Prénom', [ 'placeholder' => 'John', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('adressInvitation', 'Adresse', [ 'placeholder' => 'Rue de la Province, n° 10', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('emailInvitation', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('cityInvitation', 'Ville', [ 'placeholder' => 'Liège', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('pcInvitation', 'Code Postal', [ 'placeholder' => '4400', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('telInvitation', 'Tel ou GSM', [ 'placeholder' => '0498 32 72 89', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('faxInvitation', 'Fax', [ 'placeholder' => '063 14 85 62', 'class' => 'input__text' ], $errors) }}
                    {{ Form::inputContact('mailInvitation', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::inputContact('confirmMailInvitation', 'Confirmation de mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                    {{ Form::textareaContact('contentInvitation', 'Votre message', [ 'placeholder' => 'Quelque chose à rajouter', 'class' => 'input__text' ], $errors) }}
                    {{ Form::submitContact('Envoyez') }}
                {{ Form::close() }}
            </div>
        </div>
    @endif
    <div class="parallax__img parallax__img--height"></div>
    <div class="parallax__body" id="paginationAnchor">
        <div class="position--relative">
            <h2 class="gamma">Nos précédents Resto-Rallye</h2>
            <form class="forms__search forms__search--right">
                <input itemprop="object" type="text" placeholder="Recherche par Ville" class="input__text">
                <input itemprop="target" type="submit" value="S'inscrire" class="search__submit">
            </form>
            @foreach($rallyes as $rallye){{--
                --}}<div itemscope itemtype="http://schema.org/FoodEvent" class="inline-block thumbnails">
                    <a itemprop="url" href="{{ route('rallyes.show', $rallye->id) }}" class="removeLink">
                        <h3 itemprop="attendee" class="delta">
                            Resto-Rallye à
                            <span itemprop="location" class="span--spacing">{{ $rallye->city }}</span>
                        </h3>
                        <img itemprop="image" src="/uploads/rallyes/{{ $rallye->id }}/{{ $rallye->photo }}" class="thumbnails__img">
                    </a>
                </div>{{--
            --}}@endforeach
            {{ $rallyes->links('partials.paginate') }}
        </div>
    </div>
    <div class="parallax__img parallax__img--nine"></div>
@stop
@if ($nextRallye)
    @section ('script')
        <script type="text/javascript">
          var addressRdv = "{{ $nextRallye->adress . ', ' . $nextRallye->postal_code . ' ' . $nextRallye->city . ', Belgique'}}";
          var addressRsts = [];

        </script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&amp;sensor=false"></script>
    @stop
@endif
