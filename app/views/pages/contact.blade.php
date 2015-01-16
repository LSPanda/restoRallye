@extends('layouts.default')

@section('content')
    <div class="parallax__img parallax__img--nineteen"></div>
    <div class="parallax__body">
        <div itemscope itemtype="http://schema.org/Thing">
            <h3 itemprop="headline" class="gamma">Un problème&nbsp;?</h3>
            <p itemprop="description">La moindre question &nbsp;? N'hesiter pas à nous contacter par mail ou via ce formulaire, nous serons heureux de vous répondre.</p>
            {{ Form::open(['route' => 'sendMail', 'class' => 'form']) }}
                {{ Form::inputContact('nameQuestion', 'Nom', [ 'placeholder' => 'Doe', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('surnameQuestion', 'Prénom', [ 'placeholder' => 'John', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('subjectQuestion', 'Sujet', [ 'placeholder' => 'Votre question', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('emailQuestion', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::textareaContact('contentQuestion', 'Votre message', [ 'placeholder' => 'Votre question', 'class' => 'input__text' ], $errors) }}
                {{ Form::submitContact('Envoyez') }}
            {{ Form::close() }}
        </div>
    </div>
    <div class="parallax__img parallax__img--twenty"></div>
    <div class="parallax__body">
        <div itemscope itemtype="http://schema.org/Thing">
            <h3 itemprop="headline" class="gamma">Votre restaurant hôte d'un soir</h3>
            <p itemprop="description">Désireux de faire connaître votre restaurant, et par la même occasion faire découvrir votre carte à nos membres&nbsp;? Remplissez donc ce formulaire, il vous permettera de rentrer en contact avec l'un de nos organisateur et peut-être, vous serez à l'affiche du prochain Resto-Rallye&nbsp;!</p>
            {{ Form::open(['route' => 'sendMail', 'class' => 'form']) }}
                {{ Form::inputContact('nameRestaurant', 'Nom du restaurant', [ 'placeholder' => 'La Bonne Fourchette', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('ResponsableNameRestaurant', 'Nom du responsable', [ 'placeholder' => 'Doe', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('ResponsableSurnameRestaurant', 'Prénom du responsable', [ 'placeholder' => 'John', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('addressRestaurant', 'Adresse', [ 'placeholder' => 'Rue de la Province, n° 10', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('cityRestaurant', 'Ville', [ 'placeholder' => 'Liège', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('pcRestaurant', 'Code Postal', [ 'placeholder' => '4400', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('telRestaurant', 'Tel ou GSM', [ 'placeholder' => '0498 32 72 89', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('faxRestaurant', 'Fax', [ 'placeholder' => '0498 32 72 89', 'class' => 'input__text' ], $errors) }}
                {{ Form::inputContact('mailRestaurant', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::inputContact('confirmMailRestaurant', 'Confirmation de mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}
                {{ Form::textareaContact('contentRestaurant', 'Votre message', [ 'placeholder' => 'Quelque chose à rajouter', 'class' => 'input__text' ], $errors) }}
                {{ Form::submitContact('Envoyez') }}
            {{ Form::close() }}
        </div>
    </div>
    <div class="parallax__img parallax__img--twenty-one"></div>
@stop
