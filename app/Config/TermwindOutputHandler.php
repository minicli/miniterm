<?php

namespace App\Config;

use Minicli\Output\OutputHandler;
use Minicli\Output\PrinterAdapterInterface;

use function Termwind\render;

class TermwindOutputHandler extends OutputHandler
{
    private TermwindOutputConfig $config;

    public function __construct(?PrinterAdapterInterface $printer = null)
    {
        parent::__construct($printer);
        $this->config = new TermwindOutputConfig();
    }

    public function out(string $content, string $style = "default"): void
    {
        $cssClass = $this->getCssClass($style);
        $label = $this->getLabel($style);

        $formatted = <<<HTML
            <div>
                $label
                <span class="ml-1 $cssClass">
                  $content
                </span>
            </div>
        HTML;

        render($formatted);
    }

    public function rawOutput(string $content): void
    {
        render($content);
    }

    public function newline(): void
    {
        render('<br>');
    }

    public function display(string $content, bool $alt = false): void
    {
        $this->out($content, $alt ? 'alt' : 'default');
    }

    public function error(string $content, bool $alt = false): void
    {
        $this->out($content, $alt ? 'error_alt' : 'error');
    }

    public function info(string $content, bool $alt = false): void
    {
        $this->out($content, $alt ? 'info_alt' : 'info');
    }

    public function success(string $content, bool $alt = false): void
    {
        $this->out($content, $alt ? 'success_alt' : 'success');
    }

    private function getCssClass(string $style): string
    {
        $styles = $this->config->styles();

        return $styles[$style] ?? $styles['default'];
    }

    private function getLabel(string $style): string
    {
        if (
            ! $this->config->enableLabels() ||
            ! in_array($style, $this->config->stylesWithLabels())
        ) {
            return '';
        }

        $cssClass = $this->getCssClass($style);
        $color = str_replace('text-', 'bg-', $cssClass);
        $label = str_replace('_ALT', '', strtoupper($style));

        return "<div class='px-1 $color text-black'>$label</div>";
    }
}
