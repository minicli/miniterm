<?php

use App\Services\TermwindOutputHandler;
use App\Services\TermwindService;
use App\Services\TwigService;
use Minicli\App;
use Minicli\Command\CommandCall;
use Symfony\Component\Console\Output\BufferedOutput;

use function Termwind\renderUsing;

function getCommandsPath(): string
{
    return __DIR__ . '/../app/Command';
}

function getApp(): App
{
    $config = [
        'app_path' => getCommandsPath()
    ];

    $app = new App($config);
    $app->addService('termwind', new TermwindService());
    $app->addService('twig', new TwigService());
    $app->setOutputHandler(new TermwindOutputHandler());

    return $app;
}

function getProdApp(): App
{
    $config = [
        'app_path' => getCommandsPath(),
        'debug' => false
    ];

    return new App($config);
}

function getCommandCall(array $parameters = null): CommandCall
{
    return new CommandCall(array_merge(['minicli'], $parameters));
}

function getOutput(): BufferedOutput
{
    $output = new BufferedOutput();
    renderUsing($output);

    return $output;
}
