<?php

declare(strict_types=1);

namespace App\Command\Demo;

use App\Command\BaseController;

class ColorController extends BaseController
{
    public function handle(): void
    {
        $this->display("Hello World");
        $this->error("Hello World");
        $this->info("Hello World");
        $this->success("Hello World");
        $this->warning("Hello World");
        $this->display("Hello World", true);
        $this->error("Hello World", true);
        $this->info("Hello World", true);
        $this->success("Hello World", true);
        $this->warning("Hello World", true);
        $this->out("Hello World!\r\n", 'underline');
        $this->out("Hello World!\r\n", 'dim');
        $this->out("Hello World!\r\n", 'bold');
        $this->out("Hello World!\r\n", 'invert');
        $this->out("Hello World!\r\n", 'italic');
    }
}
