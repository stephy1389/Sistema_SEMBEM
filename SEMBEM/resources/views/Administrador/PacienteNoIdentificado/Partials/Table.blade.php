<table class="table table-striped">
    <thead>
    <tr>
        <th width="90px">Fecha</th>
        <th width="90px">Hora</th>
        <th width="270px">Dirección u Observación</th>
        <th width="170px">Apodo</th>
        <th width="135px">Género</th>
        <th>Vestimenta</th>
        <th width="50px">Ver</th>
    </tr>
    </thead>
    @foreach ($pacientesnoidentificados as $pacientenoidentificado)
        <tr>
            <td>
                {{ $pacientenoidentificado -> pni_fecha_ing }}
            </td>
            <td>
                {{ $pacientenoidentificado -> pni_hora_ing }}
            </td>
            <td>
                @if(($pacientenoidentificado -> paciente -> persona -> p_direccion == null) || ($pacientenoidentificado -> paciente -> persona -> p_direccion == ""))
                    {{ "N/A"  }}
                @else
                    {{ $pacientenoidentificado -> paciente -> persona -> p_direccion }}
                @endif
            </td>
            <td>
                {{ $pacientenoidentificado -> pni_apodo }}
            </td>
            <td>
                {{ config('options.generos.'.$pacientenoidentificado -> paciente -> persona -> p_sexo )}}
            </td>
            <td>
                {{ $pacientenoidentificado -> pni_vestimenta }}
            </td>
            <td>
                <a href="{{ route('admin.pacientenoidentificado.show',$pacientenoidentificado) }}"><i class="fa fa-search fa-fw" style="color:darkblue"></i></a>
            </td>
        </tr>
    @endforeach
</table>