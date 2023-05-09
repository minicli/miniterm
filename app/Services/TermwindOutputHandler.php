<?php

namespace App\Services;

use Minicli\Output\OutputHandler;

use function Termwind\render;

class TermwindOutputHandler extends OutputHandler
{
    private const DISPLAY_LABEL_STYLES = [
        'text-red-400',
        'text-red-200',
        'text-cyan-400',
        'text-cyan-200',
        'text-green-400',
        'text-green-200',
    ];

    public function out(string $content, string $style = "default"): void
    {
        $cssClass = $this->getCssClass($style);
        $label = $this->getLabel($cssClass);

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
        $colors = [
            'default' => 'text-gray-400',
            'alt' => 'text-gray-200',
            'error' => 'text-red-400',
            'error_alt' => 'text-red-200',
            'info' => 'text-cyan-400',
            'info_alt' => 'text-cyan-200',
            'success' => 'text-green-400',
            'success_alt' => 'text-green-200',
            'bold' => 'font-bold',
            'dim' => 'font-thin',
            'italic' => 'italic',
            'underline' => 'underline',
            'invert' => 'bg-gray-800 text-white',
        ];

        return $colors[$style] ?? 'gray-400';
    }

    private function getLabel(string $cssClass): string
    {
        if (!in_array($cssClass, self::DISPLAY_LABEL_STYLES)) {
            return '';
        }

        $color = str_replace('text-', 'bg-', $cssClass);
        $label = match ($cssClass) {
            'text-red-400', 'text-red-200' => 'ERROR',
            'text-cyan-400', 'text-cyan-200' => 'INFO',
            'text-green-400', 'text-green-200' => 'SUCCESS',
            default => 'INFO',
        };

        return "<div class='px-1 $color text-black'>$label</div>";
    }
}
