<div class="row">
    <div class="col-md-6 col-md-offset-1">
        {!! Form::label('pie_id_examen_medico', 'Examen Médico') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::select('pie_id_examen_medico[]', config('options.examenesmedicos'), null, ['class' => 'form-control', 'id' => 'pie_id_examen_medico','multiple' => 'multiple']) !!}
        <div class="colortext"> {{ $errors->first('pie_id_examen_medico') }} </div>
    </div>
    <div class="col-md-4">
        {!! Form::label('pie_fecha_aplicacion', 'Fecha y Hora de Aplicación') !!}
        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
        {!! Form::text('pie_fecha_aplicacion', null, ['class' => 'form-control', 'placeholder' => 'Ej: 08/01/2016 09:00 am']) !!}
        <div class="colortext"> {{ $errors->first('pie_fecha_aplicacion') }} </div>
    </div>
</div>