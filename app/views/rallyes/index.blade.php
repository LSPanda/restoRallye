@extends('layouts.default')

@section('content')
    @if ($nextRallye)
        <div id="slideMap" class="parallax__map"></div>
        <section class="parallax__body">
            <div itemscope itemtype="http://schema.org/FoodEvent">
                <h2 itemprop="headline" class="gamma">Rendez-vous le<span itemprop="startDate" class="span--spacing">{{ date('d/m/Y' , strtotime($nextRallye->date)) }}</span>à<span itemprop="location" class="span--spacing">{{ $nextRallye->city }}</span></h2>
                <!-- TODO Microdata sur la p itemprop="description" -->
                {{ $nextRallye->body }}
                <p>Retrouvez nous à &laquo;<span class="span--spacing hightlight">{{ $nextRallye->adress . ', ' . $nextRallye->postal_code . ' ' . $nextRallye->city }}</span>&raquo;</p>
                <div class="eventAnchor">
                  <div class="inline-block eventAnchor__link"><!--<a href="#myInscription" class="removeLink fluidScroll eventAnchor__button">Inscription à cet événement</a>--></div>
                  <div class="inline-block eventAnchor__link"><!--<a href="#friendInscription" class="removeLink fluidScroll eventAnchor__button">Inviter un ami à cet événement</a>--></div>
                  <div class="inline-block eventAnchor__link"><!--<a href="#oldRallye" class="removeLink fluidScroll eventAnchor__button">Voir les anciens événements</a>--></div>
                </div>
            </div>
        </section>
        <div class="parallax__img parallax__img--six"></div>
        <section class="parallax__body position--relative">
            <div id="myInscription" class="anchor"></div>
            <div itemscope itemtype="http://schema.org/Thing">
                <h2 itemprop="headline" class="gamma">Inscrivez-vous pour ce Resto-Rallye</h2>
                <p itemprop="description">Désireux de nous rejoindre à notre prochain événement&nbsp;? Rien de plus simple, il suffit de remplir le formulaire ci-dessous. Dépèchez-vous&nbsp;! Il ne reste plus que<span class="span--spacing hightlight">30 places</span>disponible.</p>
                {{ Form::open(['route' => 'sendMail', 'class' => 'form']) }}{{--
                     --}}{{ Form::inputContact('participantsRallye', 'Nombre de participants', [ 'placeholder' => '1', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('nameRallye', 'Nom', [ 'placeholder' => 'Doe', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('surnameRallye', 'Prénom', [ 'placeholder' => 'John', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('adressRallye', 'Adresse', [ 'placeholder' => 'Rue de la Province, n° 10', 'class' => 'input__text' ], $errors) }}{{--
                     --}}{{ Form::inputContact('cityRallye', 'Ville', [ 'placeholder' => 'Liège', 'class' => 'input__text' ], $errors) }}{{--
                     --}}{{ Form::inputContact('pcRallye', 'Code Postal', [ 'placeholder' => '4400', 'class' => 'input__text' ], $errors) }}{{--
                     --}}{{ Form::inputContact('telRallye', 'Tel ou GSM', [ 'placeholder' => '0498 32 72 89', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('faxRallye', 'Fax', [ 'placeholder' => '063 14 85 62', 'class' => 'input__text' ], $errors) }}{{--
                     --}}{{ Form::inputContact('mailRallye', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('confirmMailRallye', 'Confirmation de mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }} {{--
                    --}}{{ Form::textareaContact('contentRallye', 'Votre message', [ 'placeholder' => 'Quelque chose à rajouter', 'class' => 'input__text' ], $errors) }}
                    {{ Form::submitContact('Envoyez') }}
                {{ Form::close() }}
            </div>
        </section>
        <div class="parallax__img parallax__img--seven"></div>
        <section class="parallax__body position--relative">
            <div id="friendInscription" class="anchor"></div>
            <div itemscope itemtype="http://schema.org/Thing">
                <h2 itemprop="headline" class="gamma">Invitez vos amis à ce Resto-Rallye</h2>
                <p itemprop="description">Vous pouvez aussi décider d'offrir des places pour le prochain événement à l'un de vos amis. Vous n'avez qu'à remplir ce formulaire, nous nous occuperons de lui envoyer l'invitation. Dépèchez-vous&nbsp;! Il ne reste plus que<span class="span--spacing hightlight">30 places</span>disponible.</p>
                {{ Form::open(['route' => 'sendMail', 'class' => 'form']) }}{{--
                     --}}{{ Form::inputContact('participantsInvitation', 'Nombre de participants', [ 'placeholder' => '1', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('nameInvitation', 'Nom', [ 'placeholder' => 'Doe', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('surnameInvitation', 'Prénom', [ 'placeholder' => 'John', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('adressInvitation', 'Adresse', [ 'placeholder' => 'Rue de la Province, n° 10', 'class' => 'input__text' ], $errors) }}{{--
                     --}}{{ Form::inputContact('cityInvitation', 'Ville', [ 'placeholder' => 'Liège', 'class' => 'input__text' ], $errors) }}{{--
                     --}}{{ Form::inputContact('pcInvitation', 'Code Postal', [ 'placeholder' => '4400', 'class' => 'input__text' ], $errors) }}{{--
                     --}}{{ Form::inputContact('telInvitation', 'Tel ou GSM', [ 'placeholder' => '0498 32 72 89', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('faxInvitation', 'Fax', [ 'placeholder' => '063 14 85 62', 'class' => 'input__text' ], $errors) }}{{--
                     --}}{{ Form::inputContact('mailInvitation', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}{{--
                     --}}{{ Form::inputContact('confirmMailInvitation', 'Confirmation de mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}{{--
                    --}}{{ Form::textareaContact('contentInvitation', 'Votre message', [ 'placeholder' => 'Quelque chose à rajouter', 'class' => 'input__text' ], $errors) }}
                    {{ Form::submitContact('Envoyez') }}
                {{ Form::close() }}
            </div>
        </section>
    @endif
    <div class="parallax__img parallax__img--height"></div>
    <section class="parallax__body position--relative" id="paginationAnchor">
        <div id="oldRallye" class="anchor"></div>
        <div class="position--relative">
            <h2 class="gamma">Nos précédents Resto-Rallye</h2>
            <form class="forms__search forms__search--right">
                <input itemprop="object" type="text" placeholder="Recherche par Ville" class="input__text">
                <input itemprop="target" type="submit" value="S'inscrire" class="search__submit">
            </form>
            @foreach($rallyes as $rallye){{--
                --}}<article itemscope itemtype="http://schema.org/FoodEvent" class="inline-block thumbnails">
                    <a itemprop="url" href="{{ route('rallyes.show', $rallye->id) }}" class="removeLink">
                        <h3 itemprop="attendee" class="delta">
                            Resto-Rallye à
                            <span itemprop="location" class="span--spacing">{{ $rallye->city }}</span>
                        </h3>
                        <img itemprop="image" src="/uploads/rallyes/{{ $rallye->id }}/{{ $rallye->photo }}" class="thumbnails__img" alt="Rallye du {{ date('d/m/Y' , strtotime($rallye->date)) }} à {{ $rallye->city }}">
                    </a>
                </article>{{--
            --}}@endforeach
            {{ $rallyes->links('partials.paginate') }}
        </div>
    </section>
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
