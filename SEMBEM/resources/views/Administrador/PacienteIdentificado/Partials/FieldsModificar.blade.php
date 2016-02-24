<div class="row">
    <div class="col-md-3">
        {!! Form::label('p_nombre_primer', 'Primer Nombre') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_nombre_primer', null, ['class' => 'form-control', 'placeholder' => 'Ej: José']) !!}
        <div class="colortext"> {{ $errors->first('p_nombre_primer') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_nombre_segundo', 'Segundo Nombre') !!}
        {!! Form::text('p_nombre_segundo', null, ['class' => 'form-control', 'placeholder' => 'Ej: Enrique']) !!}
        <div class="colortext"> {{ $errors->first('p_nombre_segundo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_apellido_primer', 'Primer Apellido') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_apellido_primer', null, ['class' => 'form-control', 'placeholder' => 'Ej: Rodriguez']) !!}
        <div class="colortext"> {{ $errors->first('p_apellido_primer') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_apellido_segundo', 'Segundo Apellido') !!}
        {!! Form::text('p_apellido_segundo', null, ['class' => 'form-control', 'placeholder' => 'Ej: Medina']) !!}
        <div class="colortext"> {{ $errors->first('p_apellido_segundo') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('p_cedula', 'Cédula') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_cedula', null, ['class' => 'form-control', 'placeholder' => 'Ej: 18752693', 'readonly']) !!}
        <div class="colortext"> {{ $errors->first('p_cedula') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_fecha_nacimiento', 'Fecha de Nacimiento') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_fecha_nacimiento', null, ['class' => 'form-control', 'placeholder' => 'Ej: 08/01/2016']) !!}
        <div class="colortext"> {{ $errors->first('p_fecha_nacimiento') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_sexo', 'Género') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('p_sexo', config('options.generos'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_sexo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_edo_civil', 'Estado Civil') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('p_edo_civil', config('options.edosciviles'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_edo_civil') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('p_nacionalidad', 'Nacionalidad') !!}
        {!! Form::select('p_nacionalidad', config('options.nacionalidades'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_nacionalidad') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('t_fijo', 'Teléfono Fijo') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('t_fijo', $persona->telefono->t_fijo, ['class' => 'form-control', 'placeholder' => 'Ej: 02124443366']) !!}
        <div class="colortext"> {{ $errors->first('t_fijo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('t_movil', 'Teléfono Móvil') !!}
        {!! Form::text('t_movil',  $persona->telefono->t_movil, ['class' => 'form-control', 'placeholder' => 'Ej: 04125552244']) !!}
        <div class="colortext"> {{ $errors->first('t_movil') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('t_oficina', 'Teléfono Oficina') !!}
        {!! Form::text('t_oficina',  $persona->telefono->t_oficina, ['class' => 'form-control', 'placeholder' => 'Ej: 02125689563']) !!}
        <div class="colortext"> {{ $errors->first('t_oficina') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('p_correo', 'Correo Electrónico') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_correo', null, ['class' => 'form-control', 'placeholder' => 'jose.rodriguez@hotmail.com']) !!}
        <div class="colortext"> {{ $errors->first('p_correo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_tipo', 'Tipo de Paciente') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('p_tipo', config('options.tiposDePaciente'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_tipo') }} </div>
    </div>
    <div class="col-md-6">
        {!! Form::label('p_direccion', 'Dirección') !!}
        {!! Form::text('p_direccion', null, ['class' => 'form-control', 'placeholder' => 'Ciudad, Zona, Calle o Callejón, N° de Casa o de Apt., Estado']) !!}
        <div class="colortext"> {{ $errors->first('p_direccion') }} </div>
    </div>
</div>


