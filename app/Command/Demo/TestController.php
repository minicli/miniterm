<?php

namespace App\Command\Demo;

use Minicli\Command\CommandController;

use function Termwind\render;

class TestController extends CommandController
{
    public function handle(): void
    {
        $name = $this->hasParam('user') ? $this->getParam('user') : 'World';

        render(<<<HTML
            <div class="py-2">
                <div class="px-1 bg-green-600">MiniTerm</div>
                <em class="ml-1">
                  Hello, {$name}
                </em>
            </div>
        HTML);
    }
}
