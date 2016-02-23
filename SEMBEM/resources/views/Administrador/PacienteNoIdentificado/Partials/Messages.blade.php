
@if($errors->any())
<div class="alert alert-danger" role="alert">
    <p><b>Por favor corrige los siguientes errores:</b></p>
    <ul>
        @if($errors->first('apodo'))
            <li>
                {{ $errors->first('apodo') }}
            </li>
        @endif
        @if($errors->first('fecha'))
            <li>
                {{ $errors->first('fecha') }}
            </li>
        @endif
        @if($errors->first('genero'))
            <li>
                {{ $errors->first('genero') }}
            </li>
        @endif
    </ul>
</div>
@endif
