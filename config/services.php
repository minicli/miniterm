<?php

declare(strict_types=1);

use App\Services\PlatesService;
use App\Services\TermwindService;

return [
    /****************************************************************************
     * Application Services
     * --------------------------------------------------------------------------
     *
     * The services to be loaded for your application.
     *****************************************************************************/

    'services' => [
        'termwind' => TermwindService::class,

        'plates' => PlatesService::class,
    ],
];
