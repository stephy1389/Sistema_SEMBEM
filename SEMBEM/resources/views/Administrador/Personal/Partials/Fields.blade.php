
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
        {!! Form::text('p_cedula', $cedula, ['class' => 'form-control', 'placeholder' => 'Ej: 18752693', 'readonly']) !!}
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
        {!! Form::text('t_fijo', null, ['class' => 'form-control', 'placeholder' => 'Ej: 02124443366']) !!}
        <div class="colortext"> {{ $errors->first('t_fijo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('t_movil', 'Teléfono Móvil') !!}
        {!! Form::text('t_movil',  null, ['class' => 'form-control', 'placeholder' => 'Ej: 04125552244']) !!}
        <div class="colortext"> {{ $errors->first('t_movil') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('t_oficina', 'Teléfono Oficina') !!}
        {!! Form::text('t_oficina',  null, ['class' => 'form-control', 'placeholder' => 'Ej: 02125689563']) !!}
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
        {!! Form::label('per_id_especialidad', 'Especialidad') !!}
        {!! Form::select('per_id_especialidad', config('options.especialidades'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('per_id_especialidad') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('per_seccion', 'Sección') !!}
        {!! Form::select('per_seccion', config('options.secciones'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('per_seccion') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('per_id_jerarquia', 'Jerarquía') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('per_id_jerarquia', config('options.jerarquias'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('per_id_jerarquia') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        {!! Form::label('p_direccion', 'Dirección') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_direccion', null, ['class' => 'form-control', 'placeholder' => 'Ciudad, Zona, Calle o Callejón, N° de Casa o de Apt., Estado']) !!}
        <div class="colortext"> {{ $errors->first('p_direccion') }} </div>
    </div>
    <div class="col-md-6">
        {!! Form::label('pc_id_cargo', 'Cargo') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('pc_id_cargo[]', config('options.cargos'), null, ['class' => 'form-control', 'id' => 'pc_id_cargo','multiple' => 'multiple']) !!}
        <div class="colortext"> {{ $errors->first('pc_id_cargo') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('per_nro_equipo', 'Número de Equipo') !!}
        {!! Form::text('per_nro_equipo', null, ['class' => 'form-control', 'placeholder' => 'Ej: 14-003']) !!}
        <div class="colortext"> {{ $errors->first('per_nro_equipo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('u_permisologia_acc', 'Permisología de Acceso') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('u_permisologia_acc', config('options.permisologiasAcc'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('u_permisologia_acc') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('u_permisologia_morb', 'Permisología Morbilidad') !!}
        {!! Form::select('u_permisologia_morb', config('options.permisologiasMor'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('u_permisologia_morb') }} </div>
    </div>
</div>

