<?php

namespace App\Command;

use Minicli\Command\CommandController;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

abstract class BaseController extends CommandController
{
    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    protected function view(string $template, array $data = []): string
    {
        return $this->getApp()->twig->view($template, $data);
    }
}
