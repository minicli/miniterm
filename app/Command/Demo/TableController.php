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

        $html = '<table><thead><tr>';
        foreach ($headers as $header) {
            $html .= "<th>$header</th>";
        }

        $html .= '</tr></thead><tbody>';
        foreach ($rows as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= "<td>$cell</td>";
            }
            $html .= '</tr>';
        }

        render($html);
    }
}
