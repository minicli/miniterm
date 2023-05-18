<?php

declare(strict_types=1);

namespace App\Services;

use Minicli\App;
use Minicli\ServiceInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Termwind\Terminal;
use Termwind\ValueObjects\Style;

use function Termwind\ask;

use function Termwind\render;

use function Termwind\style;

use function Termwind\terminal;

class TermwindService implements ServiceInterface
{
    public function load(App $app): void
    {
        // Nothing to do here
    }

    public function render(string $content, int $options = OutputInterface::OUTPUT_NORMAL): void
    {
        render($content, $options);
    }

    public function style(string $name, Closure $callback = null): Style
    {
        return style($name, $callback);
    }

    public function terminal(): Terminal
    {
        return terminal();
    }

    public function ask(string $question, iterable $autocomplete = null): mixed
    {
        return ask($question, $autocomplete);
    }
}
