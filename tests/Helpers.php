<?php

declare(strict_types=1);

use App\Config\TermwindOutputHandler;
use App\Services\PlatesService;
use App\Services\TermwindService;
use Minicli\App;
use Symfony\Component\Console\Output\BufferedOutput;

use function Termwind\renderUsing;

function getApp(): App
{
    $app = new App();
    $app->addService('termwind', new TermwindService());
    $app->addService('plates', new PlatesService());
    $app->setOutputHandler(new TermwindOutputHandler());

    return $app;
}

function getOutput(): BufferedOutput
{
    $output = new BufferedOutput();
    renderUsing($output);

    return $output;
}
