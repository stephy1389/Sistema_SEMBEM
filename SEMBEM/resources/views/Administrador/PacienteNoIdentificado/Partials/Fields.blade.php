<div class="row">
    <div class="col-md-3">
        {!! Form::label('pni_color_ojos', 'Color de Ojos') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('pni_color_ojos', config('options.coloresojos'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('pni_color_ojos') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('pni_color_piel', 'Color de Piel') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('pni_color_piel', config('options.colorespiel'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('pni_color_piel') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('pni_color_cabello', 'Color de Cabello') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('pni_color_cabello', config('options.colorescabello'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('pni_color_cabello') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('pni_estatura', 'Estatura') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('pni_estatura', null, ['class' => 'form-control', 'placeholder' => 'Ej: Baja']) !!}
        <div class="colortext"> {{ $errors->first('pni_estatura') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('pni_apodo', 'Apodo') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('pni_apodo', null, ['class' => 'form-control', 'placeholder' => 'Ej: Catire de ojos café']) !!}
        <div class="colortext"> {{ $errors->first('pni_apodo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('pni_contextura', 'Contextura') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('pni_contextura', config('options.contexturas'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('pni_contextura') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('pni_vestimenta', 'Vestimenta') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('pni_vestimenta', null, ['class' => 'form-control', 'placeholder' => 'Ej: Camisa de rayas azules']) !!}
        <div class="colortext"> {{ $errors->first('pni_vestimenta') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_tipo', 'Tipo de Paciente') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('p_tipo', config('options.tiposDePaciente'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_tipo') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Form::label('pni_diagnostico', 'Diagnóstico') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('pni_diagnostico', null, ['class' => 'form-control', 'placeholder' => 'Ej: Quemaduras, fractura']) !!}
        <div class="colortext"> {{ $errors->first('pni_diagnostico') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('pni_tratamiento', 'Tratamiento') !!}
        {!! Form::text('pni_tratamiento', null, ['class' => 'form-control', 'placeholder' => 'Ej: Inmovilización con férula']) !!}
        <div class="colortext"> {{ $errors->first('pni_tratamiento') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('p_sexo', 'Género') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('p_sexo', config('options.generos'), null, ['class' => 'form-control']) !!}
        <div class="colortext"> {{ $errors->first('p_sexo') }} </div>
    </div>
    <div class="col-md-3">
        {!! Form::label('pni_fecha_ing', 'Fecha y Hora de Ingreso') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('pni_fecha_ing', null, ['class' => 'form-control', 'placeholder' => 'Ej: 08/01/2016 09:00 am']) !!}
        <div class="colortext"> {{ $errors->first('pni_fecha_ing') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        {!! Form::label('p_direccion', 'Dirección u Observación') !!}
        {!! Form::text('p_direccion', null, ['class' => 'form-control', 'placeholder' => 'Ciudad, Zona, Calle o Callejón, N° de Casa o de Apt., Estado']) !!}
        <div class="colortext"> {{ $errors->first('p_direccion') }} </div>
    </div>
</div>
