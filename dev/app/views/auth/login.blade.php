@extends('layouts.login')

@section('content')
    <div class="container">
        @if(isset($message))
            <p>{{ $message }}</p>
        @endif
        {{ Form::open(['route' => 'doLogin', 'class' => 'form-signin']) }}
        <h2 class="form-signin-heading">Connectez vous</h2>
            {{ Form::text('login', null, [
                'placeholder'   => 'Login',
                'class'         => 'form-control',
                'required'      => 'required',
                'autofocus'     => 'autofocus'
            ]) }}
            {{ $errors->first('login', '<span class="error-message">:message</span>') }}

            {{ Form::password('password', [
                'placeholder'   => 'Mot de passe',
                'class'         => 'form-control',
                'required'      => 'required'
            ]) }}
            {{ $errors->first('password', '<span class="error-message">:message</span>') }}

            {{ Form::submit('Connexion', ['class' => 'btn btn-lg btn-primary btn-block']) }}
        {{ Form::close() }}
    </div>
@stop
