<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class IpInRangeTest extends TestCase
{
    /**
     * @test
     * A basic test example.
     *
     * @return void
     */
    public function ipTest()
    {
        if (ipInRange('10.0.0.50', '10.0.0.0/24')) {
            ddd('10.0.0.50 esta dentro de 10.0.0.0/24');
        } else {
            ddd('10.0.0.50 no esta dentro de 10.0.0.0/24');
        }
        if (ipInRange('10.0.0.50', '10.0.0.0/26')) {
            ddd('10.0.0.50 esta dentro de 10.0.0.0/26');
        } else {
            ddd('10.0.0.50 no esta dentro de 10.0.0.0/26');
        }
        if (ipInRange('10.0.0.50', '10.0.0.0/28')) {
            ddd('10.0.0.50 esta dentro de 10.0.0.0/28');
        } else {
            ddd('10.0.0.50 no esta dentro de 10.0.0.0/28');
        }
    }
}
