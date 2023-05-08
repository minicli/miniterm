<?php

namespace App\Command\Demo;

use Minicli\Command\CommandController;
use function Termwind\render;

class TableController extends CommandController
{
    public function handle(): void
    {
        $headers = ['Header 1', 'Header 2', 'Header 3'];
        $rows = [];

        for ($i = 1; $i <= 10; $i++) {
            $rows[] = [(string) $i, (string) rand(0, 10), "other string $i"];
        }

        render(view('table.html', [
            'headers' => $headers,
            'rows' => $rows
        ]));
    }
}
