<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attribute debe ser aceptado.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'alpha'                => ':attribute solo debe contener letras.',
    'alpha_dash'           => ':attribute solo debe contener letras, números y guiones.',
    'alpha_num'            => ':attribute solo debe contener letras y números.',
    'array'                => ':attribute debe ser un conjunto.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'between'              => [
        'numeric' => ':attribute tiene que estar entre :min - :max.',
        'file'    => ':attribute debe pesar entre :min - :max kilobytes.',
        'string'  => ':attribute tiene que tener entre :min - :max caracteres.',
        'array'   => ':attribute tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo :attribute debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'email'                => ':attribute no es un correo válido',
    'exists'               => ':attribute es inválido.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute es inválido.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'json'                 => 'El campo :attribute debe tener una cadena JSON válida.',
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => ':attribute no debe ser mayor que :max kilobytes.',
        'string'  => ':attribute no debe ser mayor que :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => ':attribute debe ser un archivo con formato: :values.',
    'min'                  => [
        'numeric' => 'El tamaño de :attribute debe ser de al menos :min.',
        'file'    => 'El tamaño de :attribute debe ser de al menos :min kilobytes.',
        'string'  => ':attribute debe contener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser numérico.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => ':attribute debe contener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'string'               => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone'             => 'El :attribute debe ser una zona válida.',
    'unique'               => ':attribute ya ha sido registrado.',
    'url'                  => 'El formato :attribute es inválido.',
    'alpha_spaces'         => 'El :attribute debe contener solo letras y espacios.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        //Para los datos de telefono
        't_fijo'    => 'Teléfono Fijo',
        't_movil'   => 'Teléfono Móvil',
        't_oficina' => 'Teléfono Oficina',

        //Para los datos de persona
        'p_nombre_primer'    => 'Primer Nombre',
        'p_nombre_segundo'   => 'Segundo Nombre',
        'p_apellido_primer'  => 'Primer Apellido',
        'p_apellido_segundo' => 'Segundo Apellido',
        'p_nacionalidad'     => 'Nacionalidad',
        'p_cedula'           => 'Cédula',
        'p_edo_civil'        => 'Estado Civil',
        'p_fecha_nacimiento' => 'Fecha de Nacimiento',
        'p_sexo'             => 'Género',
        'p_direccion'        => 'Dirección',
        'p_correo'           => 'Correo Electrónico',
        'p_tipo'             => 'Tipo de Paciente',

        //Para los datos de personal
        'per_id_especialidad' => 'Especialidad',
        'per_id_jerarquia'    => 'Jerarquía',
        'per_seccion'         => 'Sección',
        'per_nro_equipo'      => 'Número de Equipo',

        //Para select del cargo
        'pc_id_cargo' => 'Cargo',

        //Para los datos de usuario
        'u_permisologia_acc'  => 'Permisología de Acceso',
        'u_permisologia_morb' => 'Permisología Morbilidad',
        'u_status'            => 'Estatus de Acceso',

        //Para los datos de paciente no identificado
        'pni_fecha_ing'      => 'Fecha y Hora de Ingreso',
        'pni_color_ojos'     => 'Color de Ojos',
        'pni_color_piel'     => 'Color de Piel',
        'pni_color_cabello'  => 'Color de Cabello',
        'pni_estatura'       => 'Estatura',
        'pni_apodo'          => 'Apodo',
        'pni_contextura'     => 'Contextura',
        'pni_vestimenta'     => 'Vestimenta',
        'pni_diagnostico'    => 'Diagnóstico',
        'pni_tratamiento'    => 'Tratamiento',

        //Para consultar personal
        'nombre'     => 'Nombre de Personal',
        'jerarquia'  => 'Jerarquía',
        'cargo'      => 'Cargo',

        //Para consultar paciente no identificado
        'fecha'  => 'Fecha de Ingreso',
        'apodo'  => 'Apodo del Paciente',
        'genero' => 'Género',

        //Para los datos de examen médico
        'pie_id_examen_medico' => 'Examen Médico',
        'pie_fecha_aplicacion' => 'Fecha y Hora de Aplicación',

        //Para consultar los exámenes médicos de un paciente identificado
        'fechaapc'   => 'Fecha de Aplicación',
        'fechartro'  => 'Fecha de Retiro',
        'examen'     => 'Examen Médico',

        'pie_status_realizar' => 'Examen Médico Realizado',
        'pie_observacion'     => 'Observación',
        'pie_status_entrega'  => 'Examen Médico Entregado',
        'pie_fecha_retiro'    => 'Fecha y Hora de Retiro'
    ],

];
