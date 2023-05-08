<?php

namespace App\Command\Demo;

use Minicli\Command\CommandController;
use function Termwind\ask;
use function Termwind\render;

class AskController extends CommandController
{
    public function handle(): void
    {
        $name = ask(<<<HTML
            <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
                What is your name?
            </span>
        HTML);

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

