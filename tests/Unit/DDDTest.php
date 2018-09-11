<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class DDDTest extends TestCase
{
    /**
     * @test
     * A basic test example.
     *
     * @return void
     */
    public function dddTest()
    {
        $x = [1,2,3,4,5];
        $y = ['a','b','c','d','e'];

        echo "function 'ddd': \n";
        ddd($x, $y);
    }
}
