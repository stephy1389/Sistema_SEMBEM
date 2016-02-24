<div class="row">
    <div class="col-md-3">
        {!! Form::label('password', 'Contraseña Actual') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('password') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('password_nueva', 'Nueva Contraseña') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::password('password_nueva', ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('password_nueva') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('password_nueva_confirmation', 'Confirme Contraseña') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::password('password_nueva_confirmation', ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('password_nueva_confirmation') }} </div>
    </div>
</div>