
<table class="table table-striped">
    <thead>
    <tr>
        <th width="190px">Primer Nombre</th>
        <th width="190px">Segundo Nombre</th>
        <th width="190px">Primer Apellido</th>
        <th width="190px">Segundo Apellido</th>
        <th width="110px">Cédula</th>
        <th width="180px">Teléfono Fijo</th>
    </tr>
    </thead>
    <tr>
        <td>
            {{ $persona -> p_nombre_primer }}
        </td>
        <td>
            {{ $persona -> p_nombre_segundo }}
        </td>
        <td>
            {{ $persona -> p_apellido_primer }}
        </td>
        <td>
            {{ $persona -> p_apellido_segundo }}
        </td>
        <td>
            {{ $persona -> p_cedula }}
        </td>
        <td>
            {{ $persona -> telefono -> t_fijo }}
        </td>
    </tr>
</table>
<?php echo '<br>' ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th width="175px">Fecha de Nacimiento</th>
        <th width="130px">Edad</th>
        <th>Género</th>
        <th width="120px">Estado Civil</th>
        <th width="320px">Dirección</th>
        <th width="230px">Tipo de Paciente</th>
    </tr>
    </thead>
    <tr>
        <td>
            {{ $persona -> p_fecha_nacimiento }}
        </td>
        <td>
            @if( $persona -> p_edad < 1 )
                {{ "Menor a un año" }}
            @else
                {{ $persona -> p_edad }}
            @endif
        </td>
        <td>
            {{ config('options.generos.'.$persona -> p_sexo )}}
        </td>
        <td>
            {{ config('options.edosciviles.'.$persona -> p_edo_civil) }}
        </td>
        <td>
            {{ $persona -> p_direccion }}
        </td>
        <td>
            {{ $persona -> p_tipo }}
        </td>
    </tr>
</table>
