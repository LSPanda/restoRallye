@extends('layouts.default')

@section('content')
    <div id="slideMap" class="slideImage"></div>
    <div class="slideText">
        <h3>Liste des rallyes</h3>
    </div>
    <div id="slideMap" class="parallax__img"></div>
    <div class="parallax__body">
        <div itemscope itemtype="http://schema.org/FoodEvent">
            <h3 itemprop="headline" class="gamma">Rendez-vous le<span itemprop="startDate" class="span--spacing">{{--{{ $rallye->date }}--}}</span>à<span itemprop="location" class="span--spacing">Seraing</span></h3>
            <!-- TODO Microdata sur la p itemprop="description" -->
            <!-- TODO Gestion de l'affichage du prochain rallye -->
            {{--{{ $rallye->body }}--}}
        </div>
    </div>
    <div class="parallax__img parallax__img--six"></div>
    <div class="parallax__body">
        <div itemscope itemtype="http://schema.org/Thing">
            <h3 itemprop="headline" class="gamma">Inscrivez-vous pour ce Resto-Rallye</h3>
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
            <h3 itemprop="headline" class="gamma">Invitez vos amis à ce Resto-Rallye</h3>
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
    <div class="parallax__img parallax__img--height"></div>
    <div class="parallax__body">
        <div class="position--relative">
            <h3 class="gamma">Nos précédents Resto-Rallye</h3>
            <form class="forms__search forms__search--right">
                <input itemprop="object" type="text" placeholder="Recherche par Ville" class="input__text">
                <input itemprop="target" type="submit" value="S'inscrire" class="search__submit">
            </form>
            <div itemscope itemtype="http://schema.org/FoodEvent" class="inline-block thumbnails">
                <a itemprop="url" href="evenement.html" class="removeLink">
                    <h4 itemprop="attendee" class="delta">
                        Resto-Rallye à
                        <span itemprop="location" class="span--spacing">Namur</span>
                    </h4>
                    <img itemprop="image" src="../css/images/mockUp/exempleRallye.jpg" class="thumbnails__img">
                </a>
            </div>
            <div itemscope itemtype="http://schema.org/FoodEvent" class="inline-block thumbnails">
                <a itemprop="url" href="evenement.html" class="removeLink">
                    <h4 itemprop="attendee" class="delta">
                        Resto-Rallye à
                        <span itemprop="location" class="span--spacing">Namur</span>
                    </h4>
                    <img itemprop="image" src="../css/images/mockUp/exempleRallye.jpg" class="thumbnails__img">
                </a>
            </div>
            <div itemscope itemtype="http://schema.org/FoodEvent" class="inline-block thumbnails">
                <a itemprop="url" href="evenement.html" class="removeLink">
                    <h4 itemprop="attendee" class="delta">
                        Resto-Rallye à
                        <span itemprop="location" class="span--spacing">Namur</span>
                    </h4>
                    <img itemprop="image" src="../css/images/mockUp/exempleRallye.jpg" class="thumbnails__img">
                </a>
            </div>
            <div itemscope itemtype="http://schema.org/FoodEvent" class="inline-block thumbnails">
                <a itemprop="url" href="evenement.html" class="removeLink">
                    <h4 itemprop="attendee" class="delta">
                        Resto-Rallye à
                        <span itemprop="location" class="span--spacing">Namur</span>
                    </h4>
                    <img itemprop="image" src="../css/images/mockUp/exempleRallye.jpg" class="thumbnails__img">
                </a>
            </div>
            <div itemscope itemtype="http://schema.org/FoodEvent" class="inline-block thumbnails">
                <a itemprop="url" href="evenement.html" class="removeLink">
                    <h4 itemprop="attendee" class="delta">
                        Resto-Rallye à
                        <span itemprop="location" class="span--spacing">Namur</span>
                    </h4>
                    <img itemprop="image" src="../css/images/mockUp/exempleRallye.jpg" class="thumbnails__img">
                </a>
            </div>
            <div itemscope itemtype="http://schema.org/FoodEvent" class="inline-block thumbnails">
                <a itemprop="url" href="evenement.html" class="removeLink">
                    <h4 itemprop="attendee" class="delta">
                        Resto-Rallye à
                        <span itemprop="location" class="span--spacing">Namur</span>
                    </h4>
                    <img itemprop="image" src="../css/images/mockUp/exempleRallye.jpg" class="thumbnails__img">
                </a>
            </div>
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
    <div class="parallax__img parallax__img--nine"></div>
@stop
