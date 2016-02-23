<div class="row">
    <div class="col-md-4">
        {!! Form::label('pie_id_examen_medico', 'Examen Médico') !!}
        {!! Form::select('pie_id_examen_medico', config('options.examenesmedicos'), $examenmedico -> pie_id_examen_medico, ['class' => 'form-control', 'disabled']) !!}
        {!! Form::hidden('pie_id_examen_medico', $examenmedico -> pie_id_examen_medico) !!}
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        {!! Form::label('pie_fecha_aplicacion', 'Fecha de Aplicación') !!}
        {!! Form::text('pie_fecha_aplicacion', null, ['class' => 'form-control', 'id' => '_pie_fecha_aplicacion', 'readonly']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('pie_status_realizar', 'Examen Médico Realizado') !!}
        @if($examenmedico -> pie_status_realizar == false)
            {!! Form::select('pie_status_realizar', config('options.realizarexamen'), 'f', ['class' => 'form-control', 'id' => 'pie_status_realizar', 'onchange' => 'activaInput();']) !!}
        @else
            {!! Form::select('pie_status_realizar', config('options.realizarexamen'), 't', ['class' => 'form-control', 'disabled']) !!}
        @endif
        <div class="colortext"> {{ $errors->first('pie_status_realizar') }} </div>
    </div>
    <div class="col-md-4">
        {!! Form::label('pie_observacion', 'Observación') !!}
        @if($examenmedico -> pie_status_realizar == true)
            {!! Form::text('pie_observacion', null, ['class' => 'form-control', 'placeholder' => 'Ej: Retraso del laboratorio', 'readonly']) !!}
        @else
            {!! Form::text('pie_observacion', null, ['class' => 'form-control', 'placeholder' => 'Ej: Retraso del laboratorio']) !!}
        @endif
        <div class="colortext"> {{ $errors->first('pie_observacion') }} </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Form::label('pie_hora_aplicacion', 'Hora de Aplicación') !!}
        {!! Form::text('pie_hora_aplicacion', null, ['class' => 'form-control', 'readonly']) !!}
    </div>
    <div class="col-md-4">
        {!! Form::label('pie_status_entrega', 'Examen Médico Entregado') !!}
            @if($examenmedico -> pie_status_entrega == false)
                {!! Form::select('pie_status_entrega', config('options.entregaexamen'), 'f', ['class' => 'form-control', 'id' => 'pie_status_entrega', 'onchange' => 'activaInputFechaHora();']) !!}
            @endif
        <div class="colortext"> {{ $errors->first('pie_status_entrega') }} </div>
    </div>
    <div class="col-md-4">
        {!! Form::label('pie_fecha_retiro', 'Fecha y Hora de Retiro') !!}
        {!! Form::text('pie_fecha_retiro', null, ['class' => 'form-control', 'placeholder' => 'Ej: 08/01/2016 09:00 am', 'id' => 'pie_fecha_retiro']) !!}
        <div class="colortext"> {{ $errors->first('pie_fecha_retiro') }} </div>
    </div>
</div>