<?php

namespace App\Config;

class TermwindOutputConfig
{
    public function styles(): array
    {
        return [
            'default' => 'text-white',
            'alt' => 'text-gray-400',
            'error' => 'text-red-600',
            'error_alt' => 'text-red-400',
            'info' => 'text-cyan-600',
            'info_alt' => 'text-cyan-400',
            'success' => 'text-green-600',
            'success_alt' => 'text-green-400',
            'warning' => 'text-yellow-600',
            'warning_alt' => 'text-yellow-400',
            'bold' => 'font-bold',
            'dim' => 'text-gray-500',
            'italic' => 'italic',
            'underline' => 'underline',
            'invert' => 'bg-gray-400 text-black',
        ];
    }

    public function enableLabels(): bool
    {
        return false;
    }

    public function stylesWithLabels(): array
    {
        return [
            'info',
            'info_alt',
            'success',
            'success_alt',
            'error',
            'error_alt',
            'warning',
            'warning_alt',
        ];
    }
}
