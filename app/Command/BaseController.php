<?php

namespace App\Command;

use Minicli\Command\CommandController;
use Symfony\Component\Console\Output\OutputInterface;
use Termwind\Terminal;
use Termwind\ValueObjects\Style;

abstract class BaseController extends CommandController
{
    protected function render(string $content, int $options = OutputInterface::OUTPUT_NORMAL): void
    {
        $this->getApp()->termwind->render($content, $options);
    }

    protected function style(string $name, Closure $callback = null): Style
    {
        return $this->getApp()->termwind->style($name, $callback);
    }

    protected function terminal(): Terminal
    {
        return $this->getApp()->termwind->terminal();
    }

    protected function ask(string $question, iterable $autocomplete = null): mixed
    {
        return $this->getApp()->termwind->ask($question, $autocomplete);
    }

    protected function view(string $template, array $data = []): void
    {
        $app = $this->getApp();

        $app->termwind->render($app->plates->view($template, $data));
    }
}
