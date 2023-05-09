<?php

namespace App\Services;

use Minicli\App;
use Minicli\ServiceInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class TwigService implements ServiceInterface
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../app/Views');
        $this->twig = new Environment($loader, [
            'cache' => __DIR__ . '/../../app/Views/cache',
        ]);
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function view(string $template, array $data = []): string
    {
        return $this->twig->render($template, $data);
    }

    public function load(App $app): void
    {
        // Nothing to do here
    }
}
