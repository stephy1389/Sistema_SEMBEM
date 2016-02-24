
<table class="table table-striped">
    <thead>
    <tr>
        <th width="110px">Nombre</th>
        <th width="120px">Apellido</th>
        <th>Cédula</th>
        <th width="100px">Nro. Equipo</th>
        <th>Sección</th>
        <th width="180px">Jerarquía</th>
        <th width="200px">Cargo</th>
        <th width="180px">Especialidad</th>
        <th>Acción</th>
    </tr>
    </thead>
    @foreach ($personals as $personal)
        <tr>
            <td>
                {{ $personal -> persona -> p_nombre_primer }}
            </td>
            <td>
                {{ $personal -> persona -> p_apellido_primer }}
            </td>
            <td>
                {{ $personal -> persona -> p_cedula }}
            </td>
            <td>
                @if(($personal -> per_nro_equipo == null) || ($personal -> per_nro_equipo == ""))
                    {{ "N/A" }}
                @else
                    {{ $personal -> per_nro_equipo }}
                @endif
            </td>
            <td>
                @if(($personal -> per_seccion == null) || ($personal -> per_seccion == " "))
                    {{ "N/A" }}
                @else
                    {{ $personal -> per_seccion }}
                @endif
            </td>
            <td>
                {{ $personal -> jerarquia ->  j_descripcion }}
            </td>
            <td>
                @for($i=0; $i < count($personal -> cargo); $i++)
                    @if(($i+1) == count($personal -> cargo))
                        {{$personal -> cargo[$i] -> c_descripcion}}
                    @else
                        {{$personal -> cargo[$i] -> c_descripcion.", "}}
                    @endif
                @endfor
            </td>
            <td>
                @if(($personal -> per_id_especialidad == null) || ($personal -> per_id_especialidad == ""))
                    {{ "N/A" }}
                @else
                    {{ $personal -> especialidad -> e_descripcion }}
                @endif
            </td>
            <td>
                {!!link_to_route('admin.personal.edit', $title = 'Modificar',$parameters = $personal -> id,
                                 $attributes = ['class'=>'btn btn-warning'])!!}
            </td>
        </tr>
    @endforeach
</table>