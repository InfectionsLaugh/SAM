<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'El :attribute tiene que ser aceptado.',
    'active_url'           => 'El :attribute no es un URL válido.',
    'after'                => 'El :attribute tiene que ser una fecha después de :date.',
    'after_or_equal'       => 'El :attribute tiene que ser una fecha después o igual a :date.',
    'alpha'                => 'El :attribute solo puede contener letras.',
    'alpha_dash'           => 'El :attribute solo puede contener letras, números y guiones.',
    'alpha_num'            => 'El :attribute solo puede contener letras y números.',
    'array'                => 'El :attribute tiene que ser un arreglo.',
    'before'               => 'El :attribute tiene que ser una fecha antes que :date.',
    'before_or_equal'      => 'El :attribute tiene que ser una fecha antes que o igual a :date.',
    'between'              => [
        'numeric' => 'El :attribute tiene que ser entre :min y :max.',
        'file'    => 'El :attribute tiene que ser entre :min y :max kilobytes.',
        'string'  => 'El :attribute tiene que ser entre :min y :max caracteres.',
        'array'   => 'El :attribute tienen que tener entre :min y :max artículos.',
    ],
    'boolean'              => 'El campo :attribute tiene que ser verdadero o falso.',
    'confirmed'            => 'El :attribute de confirmación no concuerda.',
    'date'                 => 'El :attribute no es una fecha válida.',
    'date_format'          => 'El :attribute no concuerda con el formato :format.',
    'different'            => 'El :attribute y :other tienen que ser diferentes.',
    'digits'               => 'El :attribute tiene que ser de :digits dígitos.',
    'digits_between'       => 'El :attribute tiene que ser entre :min and :max dígitos.',
    'dimensions'           => 'El :attribute tiene dimensiones inválidas de la imagen.',
    'distinct'             => 'El campo :attribute tiene un valor duplicado.',
    'email'                => 'El :attribute tiene que ser una dirección válida de email.',
    'exists'               => 'El :attribute seleccionado es inválido.',
    'file'                 => 'El :attribute tiene que ser un archivo.',
    'filled'               => 'El campo :attribute debe tener un valor.',
    'image'                => 'El :attribute tiene que ser una imagen.',
    'in'                   => 'El :attribute seleccionado es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => 'El :attribute tiene que ser un entero.',
    'ip'                   => 'El :attribute tiene que ser una dirección válida de IP.',
    'ipv4'                 => 'El :attribute tiene que ser un dirección válida de IPv4.',
    'ipv6'                 => 'El :attribute tiene que ser un dirección válida de IPv6.',
    'json'                 => 'El :attribute tiene que ser una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file'    => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string'  => 'El :attribute no puede ser mayor que :max caracteres.',
        'array'   => 'El :attribute no puede tener mas de :max artículos.',
    ],
    'mimes'                => 'El :attribute tiene que ser un archivo de tipo: :values.',
    'mimetypes'            => 'El :attribute tiene que ser un archivo de tipo: :values.',
    'min'                  => [
        'numeric' => 'El :attribute tiene que ser al menos de :min.',
        'file'    => 'El :attribute tiene que ser al menos de :min kilobytes.',
        'string'  => 'El :attribute tiene que ser al menos de :min caracteres.',
        'array'   => 'El :attribute tiene que tener al menos :min archivos.',
    ],
    'not_in'               => 'El :attribute seleccionado es inválido.',
    'not_regex'            => 'El :attribute formato es inválido.',
    'numeric'              => 'El :attribute tiene que ser un número.',
    'present'              => 'El campo :attribute tiene que estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es requerido.',
    'required_if'          => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other esté en :values.',
    'required_with'        => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es requerido cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es requerido cuando :values no están presentes.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los :values están presentes.',
    'same'                 => 'El :attribute y :other deben conicidir.',
    'size'                 => [
        'numeric' => 'El :attribute tiene que ser :size.',
        'file'    => 'El :attribute tiene que ser :size kilobytes.',
        'string'  => 'El :attribute tiene que ser :size caracteres.',
        'array'   => 'El :attribute debe contener :size artículos.',
    ],
    'string'               => 'El :attribute tiene que ser una cadena.',
    'timezone'             => 'El :attribute tiene que ser una zona horaria válida.',
    'unique'               => 'El :attribute ya ha sido tomado.',
    'uploaded'             => 'El :attribute no se cargó correctamente.',
    'url'                  => 'El formato de :attribute es inválido.',

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

    'custom' => array(
      'num_tel' => array(
        'regex' => 'Password must contain at least one number and both uppercase and lowercase letters.'
      )
      ),

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | El following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
