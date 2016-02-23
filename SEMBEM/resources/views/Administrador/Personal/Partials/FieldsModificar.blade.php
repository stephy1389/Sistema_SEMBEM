<div class="row">
    <div class="col-md-3">
        {!! Form::label('p_nombre_primer', 'Primer Nombre') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_nombre_primer', $personal -> persona -> p_nombre_primer, ['class' => 'form-control', 'placeholder' => 'Ej: José']) !!}
        <div class="colortext"> {{ $errors->first('p_nombre_primer') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_nombre_segundo', 'Segundo Nombre') !!}
        {!! Form::text('p_nombre_segundo',  $personal -> persona -> p_nombre_segundo, ['class' => 'form-control', 'placeholder' => 'Ej: Enrique']) !!}
        <div class="colortext"> {{ $errors->first('p_nombre_segundo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_apellido_primer', 'Primer Apellido') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_apellido_primer',  $personal -> persona -> p_apellido_primer, ['class' => 'form-control', 'placeholder' => 'Ej: Rodriguez']) !!}
        <div class="colortext"> {{ $errors->first('p_apellido_primer') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_apellido_segundo', 'Segundo Apellido') !!}
        {!! Form::text('p_apellido_segundo',  $personal -> persona -> p_apellido_segundo, ['class' => 'form-control', 'placeholder' => 'Ej: Medina']) !!}
        <div class="colortext"> {{ $errors->first('p_apellido_segundo') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('p_cedula', 'Cédula') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_cedula',  $personal -> persona -> p_cedula, ['class' => 'form-control', 'placeholder' => 'Ej: 18752693', 'readonly']) !!}
        <div class="colortext"> {{ $errors->first('p_cedula') }} </div>
    </div>
    <div class="col-md-3">
        @if(isset($pacienteper) == true)
            {!! Form::label('_p_fecha_nacimiento', 'Fecha de Nacimiento') !!}
            {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
            {!! Form::text('p_fecha_nacimiento',  $personal -> persona -> p_fecha_nacimiento, ['class' => 'form-control', 'placeholder' => 'Ej: 08/01/2016', 'readonly']) !!}
        @else
            {!! Form::label('p_fecha_nacimiento', 'Fecha de Nacimiento') !!}
            {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
            {!! Form::text('p_fecha_nacimiento',  $personal -> persona -> p_fecha_nacimiento, ['class' => 'form-control', 'placeholder' => 'Ej: 08/01/2016']) !!}
        @endif
        <div class="colortext"> {{ $errors->first('p_fecha_nacimiento') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_sexo', 'Género') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('p_sexo', config('options.generos'),  $personal -> persona -> p_sexo, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_sexo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_edo_civil', 'Estado Civil') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('p_edo_civil', config('options.edosciviles'),  $personal -> persona -> p_edo_civil, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_edo_civil') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('p_nacionalidad', 'Nacionalidad') !!}
        {!! Form::select('p_nacionalidad', config('options.nacionalidades'),  $personal -> persona ->p_nacionalidad, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_nacionalidad') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('t_fijo', 'Teléfono Fijo') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('t_fijo',  $personal -> persona -> telefono -> t_fijo, ['class' => 'form-control', 'placeholder' => 'Ej: 02124443366']) !!}
        <div class="colortext"> {{ $errors->first('t_fijo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('t_movil', 'Teléfono Móvil') !!}
        {!! Form::text('t_movil',  $personal -> persona -> telefono -> t_movil, ['class' => 'form-control', 'placeholder' => 'Ej: 04125552244']) !!}
        <div class="colortext"> {{ $errors->first('t_movil') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('t_oficina', 'Teléfono Oficina') !!}
        {!! Form::text('t_oficina',  $personal -> persona -> telefono -> t_oficina, ['class' => 'form-control', 'placeholder' => 'Ej: 02125689563']) !!}
        <div class="colortext"> {{ $errors->first('t_oficina') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('p_correo', 'Correo Electrónico') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_correo', $personal -> persona -> p_correo, ['class' => 'form-control', 'placeholder' => 'jose.rodriguez@hotmail.com']) !!}
        <div class="colortext"> {{ $errors->first('p_correo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('per_id_especialidad', 'Especialidad') !!}
        {!! Form::select('per_id_especialidad', config('options.especialidades'), $personal -> per_id_especialidad, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('per_id_especialidad') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('per_seccion', 'Sección') !!}
        {!! Form::select('per_seccion', config('options.secciones'), $personal -> per_seccion, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('per_seccion') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('per_id_jerarquia', 'Jerarquía') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('per_id_jerarquia', config('options.jerarquias'), $personal -> per_id_jerarquia, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('per_id_jerarquia') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        {!! Form::label('p_direccion', 'Dirección') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('p_direccion', $personal -> persona -> p_direccion, ['class' => 'form-control', 'placeholder' => 'Ciudad, Zona, Calle o Callejón, N° de Casa o de Apt., Estado']) !!}
        <div class="colortext"> {{ $errors->first('p_direccion') }} </div>
    </div>

    <div class="col-md-6">
        {!! Form::label('pc_id_cargo', 'Cargo') !!}
        {!! Form::label('asterisco', '*',['class' => 'asterisco']) !!}
        <select multiple name='pc_id_cargo[]' id='pc_id_cargo_mod' style='width:504px' class="form-control">
                @for ($i=0; $i<count(config('options.cargos'))+1; $i++)
                    <?php $cont = 0?>
                    @for ($x=0; $x<count($personal->cargo); $x++)
                        @if(strcmp($personal->cargo[$x]->c_descripcion, config('options.cargos.'.$i)) == 0)
                            <option value={{$i}} selected> {{config('options.cargos.'.$i)}}</option>
                            <?php $cont++ ?>
                        @endif
                    @endfor
                    @if($cont == 0 && $i!=0)
                            <option value={{$i}}> {{config('options.cargos.'.$i)}}</option>
                    @endif
                @endfor
        </select>
        <div class="colortext"> {{ $errors->first('pc_id_cargo') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        {!! Form::label('per_nro_equipo', 'Número de Equipo') !!}
        {!! Form::text('per_nro_equipo', $personal -> per_nro_equipo, ['class' => 'form-control', 'placeholder' => 'Ej: 14-003']) !!}
        <div class="colortext"> {{ $errors->first('per_nro_equipo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('u_permisologia_acc', 'Permisología de Acceso') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('u_permisologia_acc', config('options.permisologiasAcc'), $personal -> usuario -> u_permisologia_acc, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('u_permisologia_acc') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('u_permisologia_morb', 'Permisología Morbilidad') !!}
        @if($personal -> usuario -> u_permisologia_morb == false)
            {!! Form::select('u_permisologia_morb', config('options.permisologiasMor'), 'f', ['class' => 'form-control']) !!}
        @else
            {!! Form::select('u_permisologia_morb', config('options.permisologiasMor'), 't', ['class' => 'form-control']) !!}
        @endif
        <div class="colortext"> {{ $errors->first('u_permisologia_morb') }} </div>
    </div>
    <div class="col-md-2">
        {!! Form::label('u_status', 'Estatus de Acceso') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        @if($personal -> usuario -> u_status == false)
            {!! Form::select('u_status', config('options.estatusAcc'), 'f', ['class' => 'form-control']) !!}
        @else
            {!! Form::select('u_status', config('options.estatusAcc'), 't', ['class' => 'form-control']) !!}
        @endif
        <div class="colortext"> {{ $errors->first('u_status') }} </div>
    </div>
    <div class="col-md-2">
        {!! Form::label('resetpassword', 'Resetear Contraseña') !!}
        {!! Form::checkbox('resetpassword',null, null, ['id' => 'probando']) !!}
        <div class="colortext"> {{ $errors->first('u_resetear_password') }} </div>
    </div>
</div>

