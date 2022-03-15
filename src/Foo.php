<?php

namespace Jrf\Mockery\Scenario;

class Foo {

    public function __debugInfo(): array
    {
        return [ 'context' => static::class ];
    }

    public function splitString($input): array
    {
        $input = $this->clean($input);
        return explode(',', $input);
    }

    public function clean($input)
    {
        return trim($input);
    }
}
