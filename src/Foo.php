<?php

namespace Jrf\CodeCoverage\Scenario;

class Foo
{
    public function methodA()
    {
        return $this->methodB();
    }

    public function methodB()
    {
        return $this->methodC();
    }

    public function methodC()
    {
        return $this->methodD();
    }

    public function methodD()
    {
        return true;
    }

    public function methodE()
    {
        return true;
    }
}
