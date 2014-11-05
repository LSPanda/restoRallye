@if(isset($message))
    <p>{{ $message }}</p>
@endif
{{ Form::open(['route' => 'doLogin']) }}
  <div>
      {{ Form::label('login', 'Login') }}
      {{ Form::text('login') }}
      {{ $errors->first('login', '<span class="error-message">:message</span>') }}
  </div>
  <div>
      {{ Form::label('password', 'Mot de passe') }}
      {{ Form::password('password') }}
      {{ $errors->first('password', '<span class="error-message">:message</span>') }}
  </div>
  <div>
      {{ Form::submit('Connexion') }}
  </div>
{{ Form::close() }}
