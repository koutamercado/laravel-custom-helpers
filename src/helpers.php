<?php

use Illuminate\Support\Debug\Dumper;

if (! function_exists('ddd')) {
    /**
     * Dump the passed variables.
     *
     * @param  mixed  $args
     * @return void
     */
    function ddd(...$args)
    {
        foreach ($args as $x) {
            (new Dumper)->dump($x);
        }
    }
}
