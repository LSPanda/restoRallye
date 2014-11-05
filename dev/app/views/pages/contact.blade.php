{{ Form::open(['route' => 'sendMail', 'class' => 'form']) }}
    <div>
        {{ Form::label('name', 'Nom') }}
        {{ Form::text('name') }}
        {{ $errors->first('name', '<span class="error alert alert-danger">:message</span>') }}
    </div>
    <div>
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email') }}
        {{ $errors->first('email', '<span class="error alert alert-danger">:message</span>') }}
    </div>
    <div>
        {{ Form::label('subject', 'Sujet') }}
        {{ Form::text('subject') }}
        {{ $errors->first('subject', '<span class="error alert alert-danger">:message</span>') }}
    </div>
    <div>
        {{ Form::label('content', 'Message') }}
        {{ Form::text('content') }}
        {{ $errors->first('content', '<span class="error alert alert-danger">:message</span>') }}
    </div>
    <div>
        <div>
            {{ Form::checkbox('sendCopy') }}
            {{ Form::label('sendCopy', 'M\'envoyer une copie') }}
        </div>
        {{ Form::submit('Envoyer') }}
    </div>
{{ Form::close() }}
