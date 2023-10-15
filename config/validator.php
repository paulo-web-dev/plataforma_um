<?php

return [
    'customMessages' => [
        'required' => 'O campo :attribute é obrigatório.',
        'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
        // Outras mensagens personalizadas aqui
    ],

    'extensions' => [
        'custom_rule' => App\Rules\CustomRule::class,
    ],
];
