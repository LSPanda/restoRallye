@extends('layouts.default')

@section('content')
    <div class="parallax__img parallax__img--twenty-two"></div>
    <section itemscope itemtype="http://schema.org/Thing" class="parallax__body">
        <h2 itemprop="headline" class="gamma">Inscrivez-vous&nbsp;!</h2>

        <p itemprop="description">Inscrivez vous à notre site et ne manquer jamais un de nos évènements, soyez toujours avertis en remplissant simplement ce formulaire.</p>

        {{ Form::open(['route' => 'doSignin', 'class' => 'form']) }}{{--
            --}}{{ Form::inputContact('name', 'Nom', [ 'placeholder' => 'Doe', 'class' => 'input__text' ], $errors, true) }}{{--
            --}}{{ Form::inputContact('surname', 'Prénom', [ 'placeholder' => 'John', 'class' => 'input__text' ], $errors, true) }}{{--
            --}}{{ Form::inputContact('adress', 'Adresse', [ 'placeholder' => 'Rue de la Province, n° 10', 'class' => 'input__text' ], $errors, true) }}{{--
            --}}{{ Form::inputContact('postal_code', 'Code postal', [ 'placeholder' => '4400', 'class' => 'input__text' ], $errors, true) }}{{--
            --}}{{ Form::inputContact('city', 'Ville', [ 'placeholder' => 'Liège', 'class' => 'input__text' ], $errors, true) }}{{--
            --}}{{ Form::inputContact('phone', 'Téléphone', [ 'placeholder' => '043 44 65 34', 'class' => 'input__text' ], $errors) }}{{--
            --}}{{ Form::inputContact('gsm', 'GSM', [ 'placeholder' => '0498 32 72 89', 'class' => 'input__text' ], $errors) }}{{--
            --}}{{ Form::inputContact('emailIns', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true) }}{{--
            --}}{{ Form::passwordContact( 'passwordIns', 'Mot de passe', [ 'placeholder' => '******', 'class' => 'input__text' ], $errors) }}{{--
            --}}{{ Form::passwordContact( 'passwordConf', 'Confirmation du mot de passe', [ 'placeholder' => '******', 'class' => 'input__text' ], $errors) }}{{--
            --}}{{ Form::submitContact('S\'inscrire') }}
        {{ Form::close() }}
    </section>
    <div class="parallax__img parallax__img--twenty-three"></div>
@stop
