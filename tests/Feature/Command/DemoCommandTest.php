<?php

declare(strict_types=1);

test('default command "demo" is correctly loaded', function (): void {
    $output = getOutput();

    $app = getApp();
    $app->runCommand(['minicli', 'demo']);

    expect($output->fetch())->toContain('help');
});

test('the "demo test" command echoes command parameters', function (): void {
    $output = getOutput();

    $app = getApp();
    $app->runCommand(['minicli', 'demo', 'test', 'user=erika']);

    expect($output->fetch())->toContain('Hello, erika');
});

test('the "demo table" command prints test table', function (): void {
    $output = getOutput();

    $app = getApp();
    $app->runCommand(['minicli', 'demo', 'table']);

    expect($output->fetch())->toContain('Header 3');
});
