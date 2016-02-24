<div class="row">
    <div class="col-md-3">
        {!! Form::label('password', 'Contraseña Actual') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('password') }} </div>
    </div>
    <div class="col-md-5">
        {!! Form::label('u_id_pregunta', 'Pregunta de Seguridad Actual') !!}
        {!! Form::select('u_id_pregunta', config('options.preguntas'), null, ['class' => 'form-control', 'disabled']) !!}
        <div class="colortext"> {{ $errors->first('u_id_pregunta') }} </div>
    </div>
    <div class="col-md-4">
        {!! Form::label('u_respuesta_actual', 'Respuesta de Seguridad Actual') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('u_respuesta_actual', null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('u_respuesta_actual') }} </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5 col-md-offset-3">
        {!! Form::label('u_id_pregunta_nueva', 'Nueva Pregunta de Seguridad') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('u_id_pregunta_nueva', config('options.preguntas'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('u_id_pregunta_nueva') }} </div>
    </div>
    <div class="col-md-4">
        {!! Form::label('u_respuesta_nueva', 'Nueva Respuesta de Seguridad') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('u_respuesta_nueva', null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('u_respuesta_nueva') }} </div>
    </div>
</div>