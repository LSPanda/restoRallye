@extends('layouts.default')

@section('content')
    <div class="parallax__img parallax__img--twenty-two"></div>
    <section itemscope itemtype="http://schema.org/Thing" class="parallax__body">
        <h2 itemprop="headline">Modification du profil</h2>

        {{ Form::open(['route' => 'updateProfile', 'class' => 'form']) }}{{--
            --}}{{ Form::inputContact('name', 'Nom', [ 'placeholder' => 'Doe', 'class' => 'input__text' ], $errors, true, $user->name) }}{{--
            --}}{{ Form::inputContact('surname', 'Prénom', [ 'placeholder' => 'John', 'class' => 'input__text' ], $errors, true, $user->surname) }}{{--
            --}}{{ Form::inputContact('adress', 'Adresse', [ 'placeholder' => 'Rue de la Province, n° 10', 'class' => 'input__text' ], $errors, true, $user->adress) }}{{--
            --}}{{ Form::inputContact('postal_code', 'Code postal', [ 'placeholder' => '4400', 'class' => 'input__text' ], $errors, true, $user->postal_code) }}{{--
            --}}{{ Form::inputContact('city', 'Ville', [ 'placeholder' => 'Liège', 'class' => 'input__text' ], $errors, true, $user->city) }}{{--
            --}}{{ Form::inputContact('phone', 'Téléphone', [ 'placeholder' => '043 44 65 34', 'class' => 'input__text' ], $errors, $user->phone) }}{{--
            --}}{{ Form::inputContact('gsm', 'GSM', [ 'placeholder' => '0498 32 72 89', 'class' => 'input__text' ], $errors, $user->gsm) }}{{--
            --}}{{ Form::inputContact('email', 'Mail', [ 'placeholder' => 'johndoe@gmail.com', 'class' => 'input__text' ], $errors, true, $user->email) }}
            <h2 class="gamma">Modification du mot de passe</h2>
            {{ Form::passwordContact( 'password', 'Mot de passe', [ 'placeholder' => '******', 'class' => 'input__text' ], $errors) }}{{--
            --}}{{ Form::passwordContact( 'passwordConf', 'Confirmation du mot de passe', [ 'placeholder' => '******', 'class' => 'input__text' ], $errors) }}{{--
            --}}{{ Form::submitContact('Modifier profil') }}
        {{ Form::close() }}
    </section>
    <div class="parallax__img parallax__img--twenty-three"></div>
@stop
