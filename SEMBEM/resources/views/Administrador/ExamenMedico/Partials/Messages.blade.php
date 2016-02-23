
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <p><b>Por favor corrige los siguientes errores:</b></p>
        <ul>
            @if($errors->first('fechaapc'))
                <li>
                    {{ $errors->first('fechaapc') }}
                </li>
            @endif
            @if($errors->first('fechartro'))
                <li>
                    {{ $errors->first('fechartro') }}
                </li>
            @endif
            @if($errors->first('examen'))
                <li>
                    {{ $errors->first('examen') }}
                </li>
            @endif
        </ul>
    </div>
@endif
