<?php

namespace App\Command\Demo;

use App\Command\BaseController;

class ColorController extends BaseController
{
    public function handle(): void
    {
        $this->getPrinter()->display("Hello World");
        $this->getPrinter()->error("Hello World");
        $this->getPrinter()->info("Hello World");
        $this->getPrinter()->success("Hello World");
        $this->getPrinter()->display("Hello World", true);
        $this->getPrinter()->error("Hello World", true);
        $this->getPrinter()->info("Hello World", true);
        $this->getPrinter()->success("Hello World", true);
        $this->getPrinter()->out("Hello World!\r\n", 'underline');
        $this->getPrinter()->out("Hello World!\r\n", 'dim');
        $this->getPrinter()->out("Hello World!\r\n", 'bold');
        $this->getPrinter()->out("Hello World!\r\n", 'inverted');
        $this->getPrinter()->out("Hello World!\r\n", 'italic');
    }
}
