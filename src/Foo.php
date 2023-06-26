<?php

namespace Jrf\PHPUnit10\Scenario;

use Exception;

class Foo
{
    /**
     * Real world example.
     */
    public function methodA($fileName)
    {
        $stream_handle = @fopen($fileName, 'wb');
        if ($stream_handle === false) {
            $error = error_get_last();
            throw new Exception($error['message']);
        }

        return $stream_handle;
    }

    /**
     * Minimal test case.
     */
    public function methodB()
    {
        @trigger_error('Triggering', E_USER_WARNING);
        return error_get_last();
    }
}
