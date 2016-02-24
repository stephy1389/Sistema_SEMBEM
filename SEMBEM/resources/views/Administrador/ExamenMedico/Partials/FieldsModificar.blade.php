
<table class="table table-striped">
    <thead align="center">
    <tr>
        <th width="125px">Examen Médico</th>
        <th width="80px">Fecha Apc.</th>
        <th width="80px">Hora Apc.</th>
        <th width="90px">Fecha Rtro.</th>
        <th width="90px">Hora Rtro.</th>
        <th width="40px">Entregado</th>
        <th width="40px">Realizado</th>
        <th width="120px">Observación</th>
        <th width="40px">Acción</th>
    </tr>
    </thead>
    @foreach ($examenes as $examenmedico)
        <tr>
            <td>
                {{ $examenmedico -> ex_nombre }}
            </td>
            <td>
                {{ $examenmedico -> pivot -> pie_fecha_aplicacion }}
            </td>
            <td>
                {{ $examenmedico -> pivot -> pie_hora_aplicacion }}
            </td>
            <td>
                @if($examenmedico -> pivot -> pie_fecha_retiro == null || $examenmedico -> pivot -> pie_fecha_retiro == "")
                    {{ "POR RETIRAR" }}
                @else
                    {{ $examenmedico -> pivot -> pie_fecha_retiro }}
                @endif
            </td>
            <td>
                @if($examenmedico -> pivot -> pie_hora_retiro == null || $examenmedico -> pivot -> pie_hora_retiro == "")
                    {{ "POR RETIRAR" }}
                @else
                    {{ $examenmedico -> pivot -> pie_hora_retiro }}
                @endif
            </td>
            <td>
                @if($examenmedico -> pivot -> pie_status_entrega == false)
                    {{ "NO" }}
                @else
                    {{ "SÍ" }}
                @endif
            </td>
            <td>
                @if($examenmedico -> pivot -> pie_status_realizar == false)
                    {{ "NO" }}
                @else
                    {{ "SÍ" }}
                @endif
            </td>
            <td>
                @if($examenmedico -> pivot -> pie_observacion == null || $examenmedico -> pivot -> pie_observacion == "")
                    {{ "N/A" }}
                @else
                    {{ $examenmedico -> pivot -> pie_observacion }}
                @endif
            </td>
            <td>
                @if(($examenmedico -> pivot -> pie_status_realizar == false && $examenmedico -> pivot -> pie_status_entrega == false) || $examenmedico -> pivot -> pie_status_entrega == false)
                    {!!link_to_route('admin.examenmedico.edit', $title = 'Modificar',$parameters = $examenmedico -> pivot -> pie_id,
                                      $attributes = ['class'=>'btn btn-warning'])!!}
                @else
                    {{ "N/A" }}
                @endif
            </td>
        </tr>
    @endforeach
</table>