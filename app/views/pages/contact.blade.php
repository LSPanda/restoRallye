@extends('layouts.default')

@section('content')
    <div class="parallax__img parallax__img--nineteen"></div>
    <div class="parallax__body">
        <div itemscope itemtype="http://schema.org/Thing">
            <h3 itemprop="headline" class="gamma">Un problème&nbsp;?</h3>
            <p itemprop="description">La moindre question &nbsp;? N'hesiter pas à nous contacter par mail ou via ce formulaire, nous serons heureux de vous répondre.</p>
            {{ Form::open(['route' => 'sendMail', 'class' => 'form']) }}
                {{ Form::inputContact('name', 'Nom', [ 'placeholder' => 'Doe', 'id' => 'name', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('surname', 'Prénom', [ 'placeholder' => 'John', 'id' => 'surname', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('subject', 'Sujet', [ 'placeholder' => 'Votre question', 'id' => 'subject', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('email', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'id' => 'mail', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('content', 'Votre message', [ 'placeholder' => 'Votre question', 'id' => 'content', 'class' => 'input__text' ], $errors, true, true) }}
                {{ Form::submitContact('Envoyez') }}

            {{ Form::close() }}
        </div>
    </div>
    <div class="parallax__img parallax__img--twenty"></div>
    <div class="parallax__body">
    <div itemscope itemtype="http://schema.org/Thing">
    <h3 itemprop="headline" class="gamma">Votre restaurant hôte d'un soir</h3>
    <p itemprop="description">Désireux de faire connaître votre restaurant, et par la même occasion faire découvrir votre carte à nos membres&nbsp;? Remplissez donc ce formulaire, il vous permettera de rentrer en contact avec l'un de nos organisateur et peut-être, vous serez à l'affiche du prochain Resto-Rallye&nbsp;!
    <div class="inline-block form__element">
    <label for="nomRestaurant" class="hightlight label__text">Nom du restaurant<span class="span--spacing asterisque">*</span></label>
    <input id="nomRestaurant" type="text" placeholder="La Bonne Fourchette" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="nomResponsable" class="hightlight label__text">Nom du responsable<span class="span--spacing asterisque">*</span></label>
    <input id="nomResponsable" type="text" placeholder="Doe" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="prenomResponsable" class="hightlight label__text">Prénom du responsable<span class="span--spacing asterisque">*</span></label>
    <input id="prenomResponsable" type="text" placeholder="John" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="addressRestaurant" class="hightlight label__text">Adresse<span class="span--spacing asterisque">*</span></label>
    <input id="addressRestaurant" type="text" placeholder="Rue de la Province, n° 10" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="villeRestaurant" class="hightlight label__text">Ville<span class="span--spacing asterisque">*</span></label>
    <input id="villeRestaurant" type="text" placeholder="Liège" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="postalRestaurant" class="hightlight label__text">Code Postal<span class="span--spacing asterisque">*</span></label>
    <input id="postalRestaurant" type="text" placeholder="4400" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="telRestaurant" class="hightlight label__text">Tel ou GSM<span class="span--spacing asterisque">*</span></label>
    <input id="telRestaurant" type="text" placeholder="0498 32 72 89" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="faxRestaurant" class="hightlight label__text">Fax</label>
    <input id="faxRestaurant" type="text" placeholder="063 14 85 62" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="mailRestaurant" class="hightlight label__text">Mail<span class="span--spacing asterisque">*</span></label>
    <input id="mailRestaurant" type="text" placeholder="johndoe@gmail.com" class="input__text">
    </div>
    <div class="inline-block form__element">
    <label for="confirmMailRestaurant" class="hightlight label__text">Confirmer mail<span class="span--spacing asterisque">*</span></label>
    <input id="confirmMailRestaurant" type="text" placeholder="johndoe@gmail.com" class="input__text">
    </div>
    <div class="block form__element--fullSize">
    <label for="msgRestaurant" class="hightlight label__text">Votre message</label>
    <textarea id="msgRestaurant" rows="10" placeholder="Quelque chose à rajouter ?" class="input__text"></textarea>
    </div>
    <div class="block form__element--fullSize">
    <input type="submit" value="Inscrivez votre restaurant !" class="input__submit">
    <label class="hightlight label__text">Tous les champs munis d’un astérisque<span class="span--spacing asterisque">(*)</span>sont obligatoires</label>
    </div>
    </p>
    </div>
    </div>
    <div class="parallax__img parallax__img--twenty-one"></div>
@stop
