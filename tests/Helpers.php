<?php

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

    $termwindService = new TermwindService();
    $twigService = new TwigService();

    $app = new App($config);
    $app->addService('termwind', $termwindService);
    $app->addService('twig', $twigService);

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
