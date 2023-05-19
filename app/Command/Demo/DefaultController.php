<?php

declare(strict_types=1);

namespace App\Command\Demo;

use App\Command\BaseController;

class DefaultController extends BaseController
{
    public function handle(): void
    {
        $this->render(<<<HTML
            <div class="py-2">
                <div class="px-1 bg-cyan-600">INFO</div>
                <span class="ml-1">
                  Run <span class="font-bold italic">./minicli help</span> for usage help.
                </span>
            </div>
        HTML);
    }
}
