<?php

namespace App\Command\Demo;

use Minicli\Command\CommandController;

use function Termwind\render;

class DefaultController extends CommandController
{
    public function handle(): void
    {
        render(<<<HTML
            <div class="py-2">
                <div class="px-1 bg-cyan-600">INFO</div>
                <span class="ml-1">
                  Run <span class="font-bold italic">./minicli help</span> for usage help.
                </span>
            </div>
        HTML);
    }
}
