<?php

namespace App\Services;

use League\Plates\Engine;
use Minicli\App;
use Minicli\ServiceInterface;

class PlatesService implements ServiceInterface
{
    private Engine $plates;

    public function __construct()
    {
        $this->plates = new Engine(__DIR__ . '/../../app/Views');
    }

    public function view(string $template, array $data = []): string
    {
        return $this->plates->render($template, $data);
    }

    public function load(App $app): void
    {
        // Nothing to do here
    }
}
