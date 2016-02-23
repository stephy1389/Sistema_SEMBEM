
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <p><b>Por favor corrige los siguientes errores:</b></p>
        <ul>
            @if($errors->first('nombre'))
                <li>
                    {{ $errors->first('nombre') }}
                </li>
            @endif
            @if($errors->first('jerarquia'))
                <li>
                    {{ $errors->first('jerarquia') }}
                </li>
            @endif
            @if($errors->first('cargo'))
                <li>
                    {{ $errors->first('cargo') }}
                </li>
            @endif
        </ul>
    </div>
@endif
