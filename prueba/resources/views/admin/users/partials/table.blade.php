<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Email</th>
        <!--<th>Fecha de Nacimiento</th>-->
        <th>Tipo Usuario</th>
        <th>Acciones</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <!--<td> $user->profile->fechanacimiento }}</td>-->
            <td>{{ $user->type }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user) }}">Editar</a>
                <!--Se puede pasar solo el id o el objeto completo o un array con los atributos que se quieren pasar-->
                <a href="">Eliminar</a>
            </td>
        </tr>
    @endforeach
</table>