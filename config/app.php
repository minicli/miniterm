<?php

declare(strict_types=1);

return [
    /****************************************************************************
     * Application Settings
     * --------------------------------------------------------------------------
     *
     * These are the core settings for your application.
     *****************************************************************************/

    'app_name' => envconfig('MINICLI_APP_NAME', 'MiniTerm - MiniCLI Application Template powered with Termwind and Plates'),

    'app_path' => [
        __DIR__.'/app/Command',
        '@minicli/command-help'
    ],

    'theme' => '',

    'debug' => true,
];
